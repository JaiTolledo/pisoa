<?php

namespace App\Controllers;

use App\Models\ApiModel;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Controller;
use App\Libraries\Hash;



class ComponentesPartidasController  extends Controller

{
    private $model;
    use ResponseTrait;


    public function __construct()

    {

        $this->model = model('ComponentesPartidasModel');
    }
    public function Agregar_Componente()
    {
        return view('componente/agregar');
    }

    public function registrar(){
        $clave = $this->request->getVar('componente_clave');
        $nombre = $this->request->getVar('componente_nombre');
        $monto = $this->request->getVar('componente_monto');
        $obra=2;

        $data = [
            "obra" => $obra,
            "componente_clave" => $clave,
            "componente_nombre" => $nombre,
            "componente_monto" => $monto
        ];
        $insert = $this->model->insertar_obra_componente($data);
        return view('componente/agregar');

    }

    public function reportetickets()
    {
        $data["data"] = $this->model->listar_componentes();
        return view('componente/agregar');
    }

}