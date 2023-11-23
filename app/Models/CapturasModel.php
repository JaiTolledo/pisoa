<?php

namespace App\Models;

use CodeIgniter\Model;
use \DateTime;



class CapturasModel extends Model
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
        LEFT JOIN captura on universo.universo_id=captura.obra 
        LEFT JOIN vcaptura_documentos_status on universo.universo_id=vcaptura_documentos_status.obra 
        LEFT JOIN vcaptura_avance_status on universo.universo_id=vcaptura_avance_status.obra 
        
       ";
        return  $this->db->query($query)->getResult();
    }

    function semanacapturaobras(int $num_semana)
    {
        $query = "SELECT *,71 as num_documentos FROM `universo` 
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

    

    
}