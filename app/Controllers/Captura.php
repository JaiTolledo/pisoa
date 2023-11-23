<?php

namespace App\Controllers;
use CodeIgniter\Controller;


class Captura extends Controller
{
    private $obraModel;
    private $avanceModel;
    private $estimacionModel;
    private $capturaModel;
    private $universoModel;

    public function __construct()
    {
        $this->obraModel = model('ObraModel');
        $this->avanceModel = model('AvanceModel');
        $this->estimacionModel = model('EstimacionModel');
        $this->universoModel = model('UniversoModel');
        $this->capturaModel = model('CapturaModel');
    }

    public function index()
    {
        $data["data"] = $this->capturaModel->getAll($ejercicio = 2023);

        //$data["secretarias"] =  $this->universoModel->getSecretarias();
        //$data["ejecutoras"] = $this->universoModel->getEntidades();
        return view('capturas/capturas_item', $data);
    }

  

  /*  function entidad()
    {
        $entidadID =  $this->request->getPost('entidad');
        $data = $this->capturaModel->getByEntidad($entidadID);
        return $this->response->setJSON($data);
    }*/
    public function list($id_semana)
    {
        
        $data["datos"] = $this->capturaModel->getsemanas();
        
        $data["datas"] = $this->capturaModel->devolverdatos($id_semana);
        $data["semana"] = $id_semana;
        


        return view('capturas/capturas_list', $data);
    }
   /* function getDataJSON()
    {
        $semana = $this->request->getVar('semana');
        $data = $this->capturaModel->devolverdatos($semana);
        return $this->response->setJSON($data);
    }*/

    public function generatePDF()
    {

        $id_semana = 1;
        $data["datos"] = $this->capturaModel->getsemanas();
        $data["datas"] = $this->capturaModel->capturasobras($id_semana);


        /*$dompdf= new \Dompdf\Dompdf();
         $dompdf->loadHtml(view('template_tabla',$data));
         $dompdf->setPaper('A4','landscape');
         $dompdf->render();
         $dompdf->stream("Obras List");*/
    }
}
