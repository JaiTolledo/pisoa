<?php

namespace App\Models;

use CodeIgniter\Model;


class UniversoModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getDetailFilter($filter)
    {
        return $this->db->query("SELECT * FROM filter_list WHERE name = '$filter'")->getRow();
    }


    public function getGraficaByFilter($filter = '')
    {
        $row = $this->db->query("SELECT * FROM filter_list WHERE name = '$filter'")->getRow();
       
        $columna = $row->columna;
        $agrupar = $row->agrupar;

        $where = "";
        if (!empty($row)) {
            $form = json_decode($row->filtro);
            foreach ($form as $ff) {
                if (!empty($ff->valor)) {
                    $where .= " AND  $ff->nombre $ff->comp '$ff->valor' ";
                }
            }
        }
        $sql = "SELECT $agrupar as name
        ,count(universo_id) as obras
        ,sum($columna)/1000000 AS y        
        FROM universo_detail_min WHERE 1=1 $where
        GROUP BY $agrupar 
        having obras !=0       
        ORDER BY y desc   
        ";
        if (empty($agrupar)) {
            $sql = "SELECT nombre_completo as name
            ,count(universo_id) as obras
            ,sum($columna)/1000000 AS y        
            FROM universo_detail_min WHERE 1=1 $where
            GROUP BY universo_id 
            having obras !=0 
            ORDER BY y desc   
            ";
        }
       
        $rows = $this->db->query($sql)->getResult();


        $data = array();
        $nums = 0;
        $total = 0;
        $names = [];
        foreach ($rows as $item) {            
            $names[] = $item->name;
            $item->y = floatval($item->y);
            $nums += $item->y;
            $total += floatval($item->y);
            $item->programado = 0;
            $item->ejecutado = 0;
            $data[] = $item;
        }
        return array("names" => $names,"data" => $data, "nums" => $nums, "total" => $total);
    }

}
