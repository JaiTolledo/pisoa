<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;

class ExpedienteModel extends Model
{
  protected $table = 'universo';
  protected $allowedFields = [
    'ejercicio', 'categoria', 'localidad', 'compromiso_gobernador', 'eje_transversal', 'eje_programatico', 'proyecto', 'proyecto_proceso', 'proyecto_validado', 'oficio_autorizacion', 'oficio_autorización_fecha', 'num_ppi', 'etapa', 'vertiente',
    'unidad_ejecutora', 'programa', 'financiamiento', 'clave_presupuestal', 'coordenadas_latitud', 'coordenadas_longitud', 'status_validacion', 'nombre_proyecto', 'nombre_completo', 'nombre_corto', 'inversion_federal', 'inversion_estatal', 'inversion_total', 'status_actual',
    'importe_autorizado', 'importe_modificado', 'importe_comprometido', 'importe_ejecutado', 'importe_ejercido', 'municipio_prioritario'
  ];

  //FUNCIONES CORRECTAS
  public function expedienteXobraEnviadosTotales()
  {
    $existencia = "SI";
    $sql = "SELECT universo_id,nombre_completo, oficio_autorizacion_fecha,obra_contrato.fecha_inicio,obra_contrato.fecha_termino,
         universo.importe_comprometido,importe_ejercido,
         (select COUNT(expediente_catalogo.num) 
        GROUP BY obra_expediente.obra) as totalXobra,
        (select sum(obra_expediente.existencia='$existencia') 
         from universo 
         GROUP BY obra_expediente.obra) as totalsinenviar 
         from universo 
         LEFT JOIN obra_expediente on universo.universo_id=obra_expediente.obra 
         LEFT JOIN expediente_catalogo on obra_expediente.num_expediente=expediente_catalogo.num 
         LEFT JOIN obra_contrato on universo.universo_id=obra_contrato.id_universo
         GROUP BY universo.universo_id";
    $obras = $this->db->query($sql)->getResult();
    $obrastotales = [];
    foreach ($obras as $obra) {
      $obrastotales[] = $this->expedienteobra($obra);
    }
    return $obrastotales;
  }

  public function expedienteobra($m)
  {
    //Primera columna
    $documentos_iniciales = 64; //Sin ninguna partida
    $fecha_obrainicio = $m->fecha_inicio;
    $fecha_obrafin = $m->fecha_termino;
    $start_contrato_date = new DateTime($fecha_obrainicio);
    $end_contrato_date = new DateTime($fecha_obrafin);
    $interval_contrato = $start_contrato_date->diff($end_contrato_date);
    $diasdiferencia_contrato = $interval_contrato->format('%R%a'); //Dias de diferencia entre fecha de inicio de la obra y dia final de la obra
    $resultado_contrato = round($diasdiferencia_contrato / 30); //meses de trabajo de la obra
    $estimaciones_documentos = $resultado_contrato * 7; //Numero de estimaciones totales en la obra

    $total_documentos = $estimaciones_documentos + $documentos_iniciales;

    //Segunda columna
    $total_enviados = $m->totalsinenviar;
    $enviados = $m->totalsinenviar;
    $fecha_autorizacion = $m->oficio_autorizacion_fecha;
    $start_date = new DateTime($fecha_autorizacion);
    $end_date = new DateTime(date("d-m-Y"));
    $interval = $start_date->diff($end_date);
    $diasdiferencia = $interval->format('%R%a');
    //print_r($diasdiferencia);

    $importe_comprometido = $m->importe_comprometido;
    $importe_ejercido = $m->importe_ejercido;
    if ($enviados == null) {
      $total_enviados = 0;
    }

    $total_pendientes = 0;

    //Tercera columna


    if ($importe_comprometido == 0 && $importe_ejercido == 0) {
      if ($diasdiferencia < 45) {
        $total_pendientes = 0;
      }
      if ($diasdiferencia >= 45) {
        $total_pendientes = 14 + $estimaciones_documentos;
      }
      if ($diasdiferencia >= 74) {
        $total_pendientes = 35;
      }

      if ($diasdiferencia >= 90) {
        $total_pendientes = 64 + $estimaciones_documentos;
      }
    }
    $m->total_documentos = $total_documentos;
    $m->total_enviados = $total_enviados;
    $m->total_pendientes = $total_pendientes;
    $m->diferencia = $total_pendientes - $total_enviados;

    return $m;
  }
  public function expedienteXejecutoraenviadosTotales($idejecutora)
  {
    $sql = "SELECT universo_id,nombre_completo, oficio_autorizacion_fecha,obra_contrato.fecha_inicio,obra_contrato.fecha_termino,
        universo.importe_comprometido,importe_ejercido,
        (select COUNT(expediente_catalogo.num) 
       GROUP BY obra_expediente.obra) as totalXobra,
       (select sum(obra_expediente.existencia='SI') 
        from universo 
        GROUP BY obra_expediente.obra) as totalsinenviar 
        from universo 
        LEFT JOIN obra_expediente on universo.universo_id=obra_expediente.obra 
        LEFT JOIN expediente_catalogo on obra_expediente.num_expediente=expediente_catalogo.num 
        LEFT JOIN obra_contrato on universo.universo_id=obra_contrato.id_universo
        WHERE universo.unidad_ejecutora=$idejecutora
        GROUP BY universo.universo_id";
    return $this->db->query($sql)->getResult();
  }

  public function expedientesejecutoras()
  {
    $sql = "SELECT ejecutora_id, ejecutora_nombre FROM cat_unidad_ejecutora";
    $ejecutoras = $this->db->query($sql)->getResult();
    $obrasXejecutora = [];
    foreach ($ejecutoras as $e) {
      $obrasejecutora = $this->expedienteXejecutoraenviadosTotales($e->ejecutora_id);
      $total_documentos = 0;
      $total_enviados = 0;
      $total_pendientes = 0;
      $total_diferencia = 0;
      foreach ($obrasejecutora as $o) {
        $obra = $this->expedienteobra($o);

        $total_documentos += $obra->total_documentos;
        $total_enviados += $obra->total_enviados;
        $total_pendientes += $obra->total_pendientes;
        $total_diferencia += $obra->diferencia;
      }

      $e->total_documentos = $total_documentos;
      $e->total_enviados = $total_enviados;
      $e->total_pendientes = $total_pendientes;
      $e->total_diferencia = $total_diferencia;
      if (count($obrasejecutora) != 0) {
        $obrasXejecutora[] = $e;
      }
    }
    return $obrasXejecutora;
  }
  public function catalogoobras($id_obra)
  {
    $sql = "SELECT * FROM obra_expediente
      INNER JOIN expediente_catalogo
      ON obra_expediente.num_expediente=expediente_catalogo.catalogo_id
      INNER JOIN universo
      on obra_expediente.obra=universo.universo_id
      WHERE obra_expediente.obra=$id_obra";

    $Resultado_obra_catalogo = $this->db->query($sql)->getResult();

    if (count($Resultado_obra_catalogo) == null) {
      $this->db->transStart();
      $obras = "SELECT universo_id FROM `universo` WHERE universo_id=$id_obra";
      $row = $this->db->query($obras)->getRow();   
      $this->db->transComplete();
     if($this->db->transStatus() === false){
      print_r("1111111111111111111111");
     }
      if ($row != null) {
        $this->db->transStart();

        $catalogo = "SELECT * FROM expediente_catalogo";
        $resultado_catalogo = $this->db->query($catalogo)->getResult();
        $this->db->transComplete();

        //print_r($resultado_catalogo);
        foreach ($resultado_catalogo as $result) {
         // print_r($result);
          $numExp = $result->num;
          $existe='';
          $insert = "INSERT INTO obra_expediente (obra,num_expediente,existencia) VALUES ($id_obra,'$numExp','$existe')";
          $this->db->query($insert);
          }
        $Resultado_obra_nueva = $this->db->query($sql)->getResult();

        return $Resultado_obra_nueva;
      }
      
    } else {
      return $Resultado_obra_catalogo;
    }
  }

  public function expedientesobrasXEjecutora($idejecutora)
  {
    $sql = "SELECT universo_id,nombre_completo, oficio_autorizacion_fecha,obra_contrato.fecha_inicio,obra_contrato.fecha_termino,
        universo.importe_comprometido,importe_ejercido,universo.unidad_ejecutora, ejecutora_nombre,
        (select COUNT(expediente_catalogo.num) 
       GROUP BY obra_expediente.obra) as totalXobra,
       (select sum(obra_expediente.existencia='SI') 
        from universo 
        GROUP BY obra_expediente.obra) as totalsinenviar 
        from universo 
        LEFT JOIN obra_expediente on universo.universo_id=obra_expediente.obra 
        LEFT JOIN expediente_catalogo on obra_expediente.num_expediente=expediente_catalogo.num 
        LEFT JOIN obra_contrato on universo.universo_id=obra_contrato.id_universo
        left join cat_unidad_ejecutora on universo.unidad_ejecutora=cat_unidad_ejecutora.ejecutora_id
        WHERE universo.unidad_ejecutora=$idejecutora
        GROUP BY universo.universo_id";
    $obras = $this->db->query($sql)->getResult();
    $obrastotales = [];
    foreach ($obras as $obra) {
      $obrastotales[] = $this->expedienteobra($obra);
    }
    return $obrastotales;
  }
}
