<?php

namespace App\Controllers;
// use App\Models\FormModel;
use CodeIgniter\Controller;

class ExpedienteObra extends Controller
{
    private $ExpedienteModel;

    public function __construct()
    {
        $this->ExpedienteModel = model('ExpedienteModel');
    }

    
    public function expedientes()
    {
        $data["data"] = $this->ExpedienteModel->expedienteXobraEnviadosTotales();
        return view('expediente', $data);
    }

    public function ejecutoraexpediente()
    {
        $data["data"] = $this->ExpedienteModel->expedientesejecutoras();
        return view('ejecutora', $data);
    }

    public function pdfGeneral()
    { 
       $data["data"] = $this->ExpedienteModel->expedienteXobraEnviadosTotales();
       $mpdf = new \Mpdf\Mpdf();
		$html = view('template_obras',$data);
		$mpdf->WriteHTML($html);
		$this->response->setHeader('Content-Type', 'application/pdf');
		$mpdf->Output('reporteobras.pdf','I');
    }

    public function pdfEjecutoras()
    {
        $data["data"] = $this->ExpedienteModel->expedientesejecutoras();
        $mpdf = new \Mpdf\Mpdf();
		$html = view('template_ejecutoras',$data);
		$mpdf->WriteHTML($html);
		$this->response->setHeader('Content-Type', 'application/pdf');
		$mpdf->Output('reporteobras.pdf','I');
      //  return view('template_ejecutoras');
    }

    public function pdfobrasXEjecutora($id)
    {
        $data["data"]= $this->ExpedienteModel->expedientesobrasXEjecutora($id);
        $mpdf = new \Mpdf\Mpdf();
		$html = view('template_obras_ejecutora',$data);
		$mpdf->WriteHTML($html);
		$this->response->setHeader('Content-Type', 'application/pdf');
		$mpdf->Output('reporteobras.pdf','I');
      //  return view('template_ejecutoras');
    }
    public function pdfcatalogoXObras($id)
    {
        $data["data"]= $this->ExpedienteModel->catalogoobras($id);
        $mpdf = new \Mpdf\Mpdf();
		$html = view('template_obras_catalogo',$data);
		$mpdf->WriteHTML($html);
		$this->response->setHeader('Content-Type', 'application/pdf');
		$mpdf->Output('reporteobras.pdf','I');
      //  return view('template_ejecutoras');
    }

    public function catalogoXobras($id){
        $data["data"]= $this->ExpedienteModel->catalogoobras($id);
        if($data!=null){
            return view('catalogo_obras',$data);
        }
        else{
            return view('catalogo_obras_error');   
        }
       
    }

    

    public function obrasXejecutora($id){
        $data["data"]= $this->ExpedienteModel->expedientesobrasXEjecutora($id);
        return view('obras_ejecutora',$data);
    }
}
