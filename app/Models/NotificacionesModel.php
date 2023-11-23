<?php

namespace App\Models;

use CodeIgniter\Model;


class NotificacionesModel extends Model
{
    protected $table = 'notificaciones';
    protected $allowedFields = ['modulo_id','nombre_modulo','usuario','dirigido','descripcion','fecha_hora_generado','usuario_visto','fecha_hora_leido','id_obra'];

    function getnotificaciones(){
        $estado="gerencia";
        return $this->db-> query("SELECT * FROM notificaciones where dirigido='$estado'")->getResult();
    }

    function totalnotificaiones(){
        $estado="gerencia";
        return $this->db-> query("SELECT *, COUNT(*) as totalnotificaciones FROM notificaciones where dirigido='$estado'")->getResult();
    }
   
}