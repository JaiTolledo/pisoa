<?php

namespace App\Models;

use CodeIgniter\Model;


class DocumentosModel extends Model
{
    protected $table = 'documentos_qr';
    protected $allowedFields = ['proceso_status','id_obra','usuario','fecha_hora_enviado','revisado','fecha_hora_revisa','name','type','ubicacion','descripcion'];

    function getdocumentosqr(){
        $estado="Enviado";
        return $this->db-> query("SELECT * FROM documentos_qr where proceso_status='$estado'")->getResult();
    }
    function getdocumentosejecutora(){
        $estado="Ilegible";
        return $this->db-> query("SELECT * FROM documentos_qr where proceso_status='$estado'")->getResult();
    }
    function getdocumentossecretarianotificaciones(int $id){
        $estado="Incorrecto";
        return $this->db-> query("SELECT * FROM documentos_qr where proceso_status='$estado' and id_obra='$id'")->getResult();
    }
    public function getdocumentossecretaria(){
        $estado="Incorrecto";
        return $this->db-> query("SELECT * FROM documentos_qr where proceso_status='$estado'")->getResult();
    }
}