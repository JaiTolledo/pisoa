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

    public function __construct()

    {

        $this->model = model('ComponentesPartidasModel');
    }
    public function Agregar_Componente()
    {
       
        return view('componente/agregar');
    }

}