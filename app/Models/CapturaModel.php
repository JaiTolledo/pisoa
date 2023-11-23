<?php

namespace App\Models;

use CodeIgniter\Model;
use \DateTime;



class CapturaModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }
    protected $table = 'captura';
    protected $allowedFields = ['datos_generales', 'licitacion', 'contrato', 'partidas', 'prog_avances', 'prog_Pagos', 'num_avances', 'num_documentos', 'obra'];
    function getsemanas(){
        return  $this->db-> query("SELECT * FROM `semanas` ")->getResult();
    }
    function getdocumentosXobra(string $nombre)
    {
        return  $this->db->query("SELECT * FROM `captura` WHERE obra=2 GROUP BY obra        ")->getResult();
    }

    function capturasobras(int $num_semana)
    {
        $query = "SELECT *,71 as num_documentos FROM `universo` 
        INNER JOIN entidades AS e ON e.entidad_id=universo.unidad_ejecutora
        LEFT JOIN captura on universo.universo_id=captura.obra 
        LEFT JOIN vcaptura_documentos_status on universo.universo_id=vcaptura_documentos_status.obra 
        LEFT JOIN vcaptura_avance_status on universo.universo_id=vcaptura_avance_status.obra 
        
       ";
        return  $this->db->query($query)->getResult();
    }

    function semanacapturaobras(int $num_semana)
    {
        $query = "SELECT *,71 as num_documentos FROM `universo` 
        INNER JOIN entidades AS e ON e.entidad_id=universo.unidad_ejecutora
        LEFT JOIN semana_capturas on universo.universo_id=semana_capturas.obra 
        LEFT JOIN vsemana_captura_avance on universo.universo_id=vsemana_captura_avance.obra 
        LEFT join vsemana_captura_expediente on universo.universo_id= vsemana_captura_expediente.obra 
        LEFT JOIN semanas  on semana_capturas.semana=semanas.semana_id
        WHERE semanas.semana=$num_semana";

        return  $this->db->query($query)->getResult();
    }

    public function devolverdatos(int $num_semana)
    {

        //print_r(date('W'));
        if (date('W') == $num_semana) {
            return $this->capturasobras($num_semana);
            // $this->semanacapturaobras($num_semana);          
        } else {
            return $this->semanacapturaobras($num_semana);
        }
    }
    public function getAll($ejercicio = 2023)
    {
        $entidades = $this->db->query("select entidad_nombre,entidad from entidades 
        inner join (
        SELECT distinct entidad FROM universo where ejercicio = $ejercicio) as a on a.entidad=entidades.entidad_id ")->getResult();
        $data = array();
        foreach ($entidades as $row) {
            $obras = $this->db->query("SELECT universo_id,importe_contratado,semaforo,avance_fisico,avance_financiero FROM universo_detail_min where ejercicio = $ejercicio and entidad= $row->entidad")->getResult();
            $total_contratado = 0;
            $total_avance = 0;
            $num_licitacion = 0;
            $num_contrato = 0;
            $num_avances_prog = 0;
            $num_programa = 0;
            foreach ($obras as $obra) {
                $id = $obra->universo_id;
                $total_contratado += $obra->importe_contratado;
                $total_avance += ($total_contratado / 100) * $obra->avance_fisico;
                $num_licitacion += $this->db->query("SELECT count(*) as num FROM `licitacion` WHERE (status_validacion='enviado' or status_validacion='validado') and licitacion_id = $id")->getRow()->num;
                $num_programa += $this->db->query("SELECT count(*) as num FROM `obra_partidas_revision` WHERE (status_validacion='enviado' or status_validacion='validado') and obra = $id")->getRow()->num;

                $reg = $this->db->query("SELECT fecha_inicio,fecha_termino FROM obra_contrato WHERE (status_validacion='enviado' or status_validacion='validado') and obra = $id")->getRow();
                if (!empty($reg)) {
                    $num_contrato++;
                    //echo $reg->fecha_inicio . '__' . $reg->fecha_termino;
                    $startDate = new DateTime($reg->fecha_inicio);
                    $endDate = new DateTime($reg->fecha_termino);
                    $diff = $endDate->diff($startDate);
                    $semanas = floor($diff->days / 7);
                    $num_avances_prog += $semanas;
                }
            }

            $porcentaje_fisico = (empty($total_contratado)) ? 0 : ($total_avance / $total_contratado) * 100;
            //$row->avance = $porcentaje_fisico;
            $row->num = count($obras);
            $row->num_licitacion = $num_licitacion;
            $row->num_contrato = $num_contrato;
            $row->num_programa = $num_programa;
            $row->num_avances_prog = $num_avances_prog;

            $data[] = $row;
        }
        return $data;
    }
    function getByEntidad($entidadID, $ejercicio = 2023)
    {
        $obras = $this->db->query("SELECT universo_id,pip,importe_contratado,nombre_completo,semaforo,avance_fisico,avance_financiero FROM universo_detail_min where ejercicio = $ejercicio and entidad= $entidadID")->getResult();

        $data = array();
        foreach ($obras as $obra) {
            $id = $obra->universo_id;
            $obra->num_licitacion =  $this->db->query("SELECT count(*) as num FROM `licitacion` WHERE (status_validacion='enviado' or status_validacion='validado') and licitacion_id = $id")->getRow()->num;
            $obra->num_licitacion = empty(($obra->num_licitacion)) ? '' : $obra->num_licitacion;
            $obra->num_programa = $this->db->query("SELECT count(*) as num FROM `obra_partidas_revision` WHERE (status_validacion='enviado' or status_validacion='validado') and obra = $id")->getRow()->num;
            $obra->num_programa = empty($obra->num_programa) ? '' : $obra->num_programa;
            $reg = $this->db->query("SELECT fecha_inicio,fecha_termino FROM obra_contrato WHERE (status_validacion='enviado' or status_validacion='validado') and obra = $id")->getRow();
            $obra->num_contrato = '';
            $obra->num_avances_prog = '';
            if (!empty($reg)) {
                $obra->num_contrato = 1;

                //echo $reg->fecha_inicio . '__' . $reg->fecha_termino;
                $startDate = new DateTime($reg->fecha_inicio);
                $endDate = new DateTime($reg->fecha_termino);
                $diff = $endDate->diff($startDate);
                $semanas = floor($diff->days / 7);
                $obra->num_avances_prog =  $semanas;
            }
            $data[] = $obra;
        }
        return $data;
    }
}
