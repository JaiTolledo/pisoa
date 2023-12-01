<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;

class ComponentesPartidasModel extends Model
{
    public function insertar_obra_componente($data){
        $builder = $this->db->table("obra_componentes");
        $builder->insert($data);
    }

    public function listar_componentes(){
        $sql="SELECT * FROM obra_partidas 
        left join obra_componentes 
        on obra_partidas.componente=obra_componentes.componente_id";
         return  $this->db->query($sql)->getResult();
    }
}