<?php

namespace App\Controllers;

use CodeIgniter\Controller;
ini_set('max_execution_time', '300');
ini_set("pcre.backtrack_limit", "5000000");

class Entregable extends Controller
{
    private $entregableModel;
    private $capturaModel;
    private $ExpedienteModel;


    public function __construct()
    {
        $this->entregableModel = model('EntregableModel');
        $this->capturaModel = model('CapturasModel');
        $this->ExpedienteModel = model('ExpedienteModel');


    }
    public function reportetickets(int $mes)
    {
        $data["data"] = $this->entregableModel->ticketXmes($mes);
        return view('entregables/reporte_tickets', $data);
    }

    public function nombremes(int $mes){
        $meses=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

        return $meses[$mes-1];
    }
    public function pdftickets(int $mes)
    {
        helper('util');
        $data["data"] = $this->entregableModel->ticketXmes($mes);
        $config = array(
            'mode' => 'utf-8',
            'format' => [215, 279],
            'default_font_size' => 10,
            'default_font' => 'arial',
            'margin_left' => 10,
            'margin_right' => 10,
            'margin-top' => 0,
            'mgt' => 0,
            'mgb' => 0,
            'margin_header' => 5,
            'margin_footer' => 0,
            'orientation' => 'L',
            'setAutoTopMargin' => 'stretch'
        );
        $mpdf = new \Mpdf\Mpdf($config);
        $data ["title"]= "REPORTE DE SOPORTE TÉCNICO"; 
        $data ["subtitle"] = $this->nombremes($mes)." del 2023 ";
		$data ["html"] = view('entregables/reporte_tickets',$data);
        $html=view('entregables/template',$data);		
		$mpdf->WriteHTML($html);
		$this->response->setHeader('Content-Type', 'application/pdf');
		$mpdf->Output('tickets.pdf','I');
    }

    public function pdfcapturas(int $mes){
        $resultado["general"]= $this->entregableModel->expedientecaptura();
        $resultado["captura"]= $this->entregableModel->expediente_ejecutora($mes);
        
                $config = array(
            'mode' => 'utf-8',
            'format' => [215, 400],
            'default_font_size' => 10,
            'default_font' => 'arial',
            'margin_left' => 10,
            'margin_right' => 10,
            'margin-top' => 0,
            'mgt' => 0,
            'mgb' => 0,
            'margin_header' => 5,
            'margin_footer' => 0,
            'orientation' => 'L',
            'setAutoTopMargin' => 'stretch'
        );
        $mpdf = new \Mpdf\Mpdf($config);
        $resultado ["title"]= "REPORTE DE CAPTURAS"; 
        $resultado ["subtitle"] = $this->nombremes($mes)." del 2023 ";
		$resultado ["html"] = view('entregables/capturas_obras',$resultado);
        $html=view('entregables/template',$resultado);
		$mpdf->WriteHTML($html);
		$this->response->setHeader('Content-Type', 'application/pdf');
		$mpdf->Output('tickets.pdf','I');

    }

    public function pdfGeneralentregable(int $mes)
    { 
       $data["data"] = $this->ExpedienteModel->expedienteXobraEnviadosTotales();
       $config = array(
        'mode' => 'utf-8',
        'format' => [215, 279],
        'default_font_size' => 10,
        'default_font' => 'arial',
        'margin_left' => 10,
        'margin_right' => 10,
        'margin-top' => 0,
        'mgt' => 0,
        'mgb' => 0,
        'margin_header' => 5,
        'margin_footer' => 0,
        'orientation' => 'L',
        'setAutoTopMargin' => 'stretch'
    );

       $mpdf = new \Mpdf\Mpdf($config);
       $data ["title"]= "REPORTE DE EXPEDIENTES POR OBRAS"; 
        $data["subtitle"] = $this->nombremes($mes)." del 2023 ";
		$data ["html"] = view('entregables/template_obras',$data);
        $html=view('entregables/template',$data);
		$mpdf->WriteHTML($html);
		$this->response->setHeader('Content-Type', 'application/pdf');
		$mpdf->Output('reporteobras.pdf','I');
    }

    public function pdfEjecutoras(int $mes)
    {
        $data["data"] = $this->ExpedienteModel->expedientesejecutoras();
        $config = array(
            'mode' => 'utf-8',
            'format' => [215, 279],
            'default_font_size' => 10,
            'default_font' => 'arial',
            'margin_left' => 10,
            'margin_right' => 10,
            'margin-top' => 0,
            'mgt' => 0,
            'mgb' => 0,
            'margin_header' => 5,
            'margin_footer' => 0,
            'orientation' => 'L',
            'setAutoTopMargin' => 'stretch'
        );

        $mpdf = new \Mpdf\Mpdf($config);
        $data ["title"]= "REPORTE DE EXPEDIENTES DE LAS EJECUTORAS"; 
        $data["subtitle"] = $this->nombremes($mes)." del 2023 ";
		$data ["html"] = view('entregables/template_ejecutoras',$data);
        $html=view('entregables/template',$data);
		$mpdf->WriteHTML($html);
		$this->response->setHeader('Content-Type', 'application/pdf');
		$mpdf->Output('reporteobras.pdf','I');
      //  return view('template_ejecutoras');
    }

    public function pdfEntregable(int $mes)
    { 
       $data["data"] = $this->entregableModel->expedienteXobraEnviadosTotales();
       $config = array(
        'mode' => 'utf-8',
        'format' => [215, 279],
        'default_font_size' => 10,
        'default_font' => 'arial',
        'margin_left' => 10,
        'margin_right' => 10,
        'margin-top' => 0,
        'mgt' => 0,
        'mgb' => 0,
        'margin_header' => 5,
        'margin_footer' => 0,
        'orientation' => 'L',
        'setAutoTopMargin' => 'stretch'
    );

       $mpdf = new \Mpdf\Mpdf($config);
       $data ["title"]= "REPORTE DE EXPEDIENTES"; 
        $data["subtitle"] = $this->nombremes($mes)." del 2023 ";
		$data ["html"] = view('entregables/expediente_obras',$data);
        $html=view('entregables/template',$data);
		$mpdf->WriteHTML($html);
		$this->response->setHeader('Content-Type', 'application/pdf');
		$mpdf->Output('reporteobras.pdf','I');
    }

    
  
}
