<?php

namespace App\Controllers;
use CodeIgniter\Controller;


class Capturas extends Controller
{
    private $capturaModel;

    public function __construct()
    {
        $this->capturaModel = model('CapturasModel');
    }

    public function list($id_semana)
    {
        $data["datos"] = $this->capturaModel->getsemanas();
        $data["datas"] = $this->capturaModel->devolverdatos($id_semana);
        $data["semana"] = $id_semana;
     
        return view('capturas/capturas_list', $data);
    }
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

    public function listarcapturas(){
        $resultado["general"]= $this->capturaModel->expedientecaptura();
        $resultado["captura"]= $this->capturaModel->expediente_ejecutora();
        print_r($resultado);

    }
    public function pdfcapturas(){
        $resultado["general"]= $this->capturaModel->expedientecaptura();
        $resultado["captura"]= $this->capturaModel->expediente_ejecutora();
/*
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
		$html = view('capturas/capturas_obras',$resultado);
		$mpdf->WriteHTML($html);
		$this->response->setHeader('Content-Type', 'application/pdf');
		$mpdf->Output('tickets.pdf','I');*/
        print_r($resultado);
    }
}