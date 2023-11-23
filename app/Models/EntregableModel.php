<?php
namespace App\Models;
use CodeIgniter\Model;
use \DateTime;

class EntregableModel extends Model
{

public function ticketXmes(int $mes){
    $sql="SELECT * FROM `ticket` LEFT JOIN estado on ticket.id_status=estado.id_status where mes=$mes";
    return  $this->db->query($sql)->getResult();

}
function semana_mes(int $mes){
    $query ="SELECT MAX(semana) as semanaMax FROM semanas 
    WHERE mes=$mes";
    $num_semana =  $this->db->query($query)->getRow();
    return $num_semana->semanaMax;
}

function expedientecaptura()
{
    
    $query = "SELECT categoria,
    SUM(datos_generales = 'pendiente') AS Datos_pendientes_accion,
    SUM(datos_generales = 'enviado') AS Datos_enviado_accion,
    SUM(datos_generales = 'revisado') AS Datos_revisado_accion,
    SUM(datos_generales = 'observado') AS Datos_observado_accion,
    SUM(licitacion = 'pendiente') AS licitacion_pendientes_accion,
    SUM(licitacion = 'enviado') AS licitacion_enviado_accion,
    SUM(licitacion = 'revisado') AS licitacion_revisado_accion,
    SUM(licitacion = 'observado') AS licitacion_observado_accion,
    SUM(contrato = 'pendiente') AS contrato_pendientes_accion,
    SUM(contrato = 'enviado') AS contrato_enviado_accion,
    SUM(contrato = 'revisado') AS contrato_revisado_accion,
    SUM(contrato = 'observado') AS contrato_observado_accion,
    SUM(partidas = 'pendiente') AS partidas_pendientes_accion,
    SUM(partidas = 'enviado') AS partidas_enviado_accion,
    SUM(partidas = 'revisado') AS partidas_revisado_accion,
    SUM(partidas = 'observado') AS partidas_observado_accion,
    SUM(prog_avances = 'pendiente') AS prog_avances_pendientes_accion,
    SUM(prog_avances = 'enviado') AS prog_avances_enviado_accion,
    SUM(prog_avances = 'revisado') AS prog_avances_revisado_accion,
    SUM(prog_avances = 'observado') AS prog_avances_observado_accion,
    SUM(prog_pagos= 'pendiente') AS prog_pagos_pendientes_accion,
    SUM(prog_pagos = 'enviado') AS prog_pagos_enviado_accion,
    SUM(prog_pagos = 'revisado') AS prog_pagos_revisado_accion,
    SUM(prog_pagos = 'observado') AS prog_pagos_observado_accion
    FROM semana_capturas INNER JOIN universo 
    on semana_capturas.obra=universo.universo_id
    where semana=48
    GROUP by universo.categoria";
    return  $this->db->query($query)->getResult();
}

function unidadesejecutoras(){
    $query ="SELECT ejecutora_id, ejecutora_nombre FROM cat_unidad_ejecutora INNER JOIN universo
    on cat_unidad_ejecutora.ejecutora_id=universo.unidad_ejecutora
    GROUP by universo.unidad_ejecutora";
    $num_unidad_ejecutora = $this->db->query($query)->getResult();
    return $num_unidad_ejecutora;
}

function expediente_ejecutora(int $mes){
    $unidad_ejecutora= $this->unidadesejecutoras();
    $semana= $this->semana_mes($mes);
    $ejecutora_obras=[];

    foreach($unidad_ejecutora as $e){
         $id_ejecutora=$e->ejecutora_id;
        $query="SELECT categoria, cat_unidad_ejecutora.ejecutora_id, cat_unidad_ejecutora.ejecutora_nombre,
        SUM(datos_generales = 'pendiente') AS Datos_pendientes_accion,
        SUM(datos_generales = 'enviado') AS Datos_enviado_accion,
        SUM(datos_generales = 'revisado') AS Datos_revisado_accion,
        SUM(datos_generales = 'observado') AS Datos_observado_accion,
        SUM(licitacion = 'pendiente') AS licitacion_pendientes_accion,
        SUM(licitacion = 'enviado') AS licitacion_enviado_accion,
        SUM(licitacion = 'revisado') AS licitacion_revisado_accion,
        SUM(licitacion = 'observado') AS licitacion_observado_accion,
        SUM(contrato = 'pendiente') AS contrato_pendientes_accion,
        SUM(contrato = 'enviado') AS contrato_enviado_accion,
        SUM(contrato = 'revisado') AS contrato_revisado_accion,
        SUM(contrato = 'observado') AS contrato_observado_accion,
        SUM(partidas = 'pendiente') AS partidas_pendientes_accion,
        SUM(partidas = 'enviado') AS partidas_enviado_accion,
        SUM(partidas = 'revisado') AS partidas_revisado_accion,
        SUM(partidas = 'observado') AS partidas_observado_accion,
        SUM(prog_avances = 'pendiente') AS prog_avances_pendientes_accion,
        SUM(prog_avances = 'enviado') AS prog_avances_enviado_accion,
        SUM(prog_avances = 'revisado') AS prog_avances_revisado_accion,
        SUM(prog_avances = 'observado') AS prog_avances_observado_accion,
        SUM(prog_pagos= 'pendiente') AS prog_pagos_pendientes_accion,
        SUM(prog_pagos = 'enviado') AS prog_pagos_enviado_accion,
        SUM(prog_pagos = 'revisado') AS prog_pagos_revisado_accion,
        SUM(prog_pagos = 'observado') AS prog_pagos_observado_accion
        FROM semana_capturas INNER JOIN universo 
        on semana_capturas.obra=universo.universo_id
        Inner join cat_unidad_ejecutora
        on universo.unidad_ejecutora=cat_unidad_ejecutora.ejecutora_id
        where semana=$semana and cat_unidad_ejecutora.ejecutora_id=$id_ejecutora
        GROUP by universo.categoria";
        $e->capturas= $this->db->query($query)->getResult();
        $ejecutora_obras[]=$e;

    }
    return $ejecutora_obras;
}
public function expedienteXobraEnviadosTotales()
{
  $existencia = "SI";
  $sql = "SELECT universo_id,nombre_completo, oficio_autorizacion_fecha,obra_contrato.fecha_inicio,obra_contrato.fecha_termino,
  universo.importe_comprometido,importe_ejercido, categoria,
  (select COUNT(expediente_catalogo.num) 
 GROUP BY obra_expediente.obra) as totalXobra,
 (select sum(obra_expediente.existencia='$existencia') 
  from universo 
  GROUP BY obra_expediente.obra) as totalsinenviar 
  from universo 
  LEFT JOIN obra_expediente on universo.universo_id=obra_expediente.obra 
  LEFT JOIN expediente_catalogo on obra_expediente.num_expediente=expediente_catalogo.num 
  LEFT JOIN obra_contrato on universo.universo_id=obra_contrato.id_universo
  GROUP BY universo.categoria";
  
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
  //$m->total_documentos = $total_documentos;
 
  $m->total_documentos = $total_documentos;
  $m->total_enviados = $total_enviados;
  $m->total_pendientes = $total_pendientes;
  $m->diferencia = $total_pendientes - $total_enviados;

  return $m;
}
//
}
