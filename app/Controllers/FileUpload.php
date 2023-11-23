<?php
namespace App\Controllers;
// use App\Models\FormModel;
use CodeIgniter\Controller;
class FileUpload extends Controller
{
    private $documentosModel;
    private $notificacionesModel;

    public function __construct()
    {
        $this->documentosModel = model('DocumentosModel');
        $this->notificacionesModel = model('NotificacionesModel');


    }
    public function index()
	{
        return view('home');
    }
    function upload() {
        helper(['form', 'url']);

        $database = \Config\Database::connect();
        $db = $database->table('documentos_qr');
        $dbhistorial = $database->table('historial');

        $input = $this->validate([
            'imss' => [
                'uploaded[imss]',
                'mime_in[imss,application/pdf]',
                'max_size[imss,1024]',
            ],
            'sat' => [
                'uploaded[sat]',
                'mime_in[sat,application/pdf]',
                'max_size[sat,1024]',
            ]
        ]);

        if (!$input) {
            print_r('Choose a valid file');
        } else {
            $imss = $this->request->getFile('imss');
            $sat = $this->request->getFile('sat');
            $id_obra=14;
           /* if(!is_dir($id_obra)){
                @mkdir($id_obra, 0755);
               }else{
                print_r ("Ya existe ese directorio\n");
               }*/
            //$file->move(WRITEPATH . './uploads/obras/'.$id_obra."/");
            $ubicacion='obras/'.$id_obra."/";
              $imss->store($ubicacion,$imss->getclientName());
              $sat->store($ubicacion,$sat->getclientName());

            $usuario= "Juan";
            $revisado="Pedro";
            $proceso_status = "Enviado";
            $dimss="IMSS";
            $dsat="SAT";
             date_default_timezone_set("America/Mexico_City");
             $completa = date("Y-m-d H:i:s");
             print_r($completa);

             $data = [
               'name' =>  $imss->getName(),
               'type'  => $imss->getClientMimeType(),
               'id_obra'  => $id_obra,
               'usuario'  => $usuario,
               'revisado'  => $revisado,
               'proceso_status'  => $proceso_status,
               'fecha_hora_enviado'  => $completa,
               'fecha_hora_revisa'  => $completa,
               'ubicacion' => $ubicacion,
               'tipo_documento'=>$dimss
            ];
            $sat = [
                'name' =>  $sat->getName(),
                'type'  => $sat->getClientMimeType(),
                'id_obra'  => $id_obra,
                'usuario'  => $usuario,
                'revisado'  => $revisado,
              'proceso_status'  => $proceso_status,
                'fecha_hora_enviado'  => $completa,
                'fecha_hora_revisa'  => $completa,
                'ubicacion' => $ubicacion,
                'tipo_documento'=>$dsat
                
             ];

            $save = $db->insert($data);
            $save = $db->insert($sat);

            $ultimoId = 1;
            $accion= "Nuevo documento";
            $tipo="Gerencia";
            $nombre_modulo="Documentos Codigo QR";
            $data2=[
                'obra_id'  => $id_obra,
                'modulo_id'  => $ultimoId,
                'nombre_modulo' => $nombre_modulo,
                'usuario'  => $usuario,
                'fecha_hora'  => $completa,
                'tipo_usuario'  => $tipo,
                'Accion'  => $accion
            ];

            $save = $dbhistorial->insert($data2);
            print_r('File has successfully uploaded');
        }
    }
    public function documentosejecutora()
    {
        $data["data"] = $this->documentosModel->getdocumentosejecutora();
        return view('listadoilegible', $data);
    }
    public function documentos(){
        $data["data"] = $this->documentosModel->getdocumentosqr();
        return view('listas',$data);
    }

    public function qrdocumentos($id){
     $documentosModel = model("DocumentosModel");
     $item = $documentosModel->getWhere(["id_documento"=>$id])->getRow ();
      $filename = $item->ubicacion;
      echo $filename;
      $name= $item->name;
      $ruta=WRITEPATH.'uploads/'.$filename.$name;
        $mime= mime_content_type($ruta);
        header('Content-length: '. filesize($ruta));
        header("Content-type: $mime");
        header('Content-Disposition: inline; filename="' . $name . '";');
        readfile($ruta);
        exit();
        }

        public function correcto(int $id){
            $estado="Correcto";
            $this->documentosModel->set('proceso_status', $estado)
                  ->where('id_documento', $id)
                  ->update();
        }
        public function incorrecto(int $id){
            helper(['form', 'url']);

            $database = \Config\Database::connect();
            $db = $database->table('notificaciones');

            $estado="incorrecto";
            //$descripcion ="Documentacion incorrecta";
            $data = [
                'proceso_status'=> $estado,
                'descripcion' => $_POST['descripcion']
            ];
            $this->documentosModel->set($data)
                  ->where('id_documento', $id)
                  ->update();


                  $ultimoId=1;
                  $nombre_modulo="Documentos Codigo QR";
                  $usuario= "Juan";
                  $dirigido="Gerencia";
                  date_default_timezone_set("America/Mexico_City");
                  $fecha_hora = date("Y-m-d H:i:s");
                  $id_obra=1;
                  $data = [
                      'modulo_id'=>$ultimoId,
                      'nombre_modulo'=>$nombre_modulo,
                      'usuario'=>$usuario,
                      'dirigido'=>$dirigido,
                      'descripcion'=>$_POST['descripcion'],
                      'fecha_hora_generado'=>$fecha_hora,
                      'usuario_visto'=>$dirigido,
                      'fecha_hora_leido'=>$fecha_hora,
                      'id_obra'=>$id_obra
                  ];
                 // $save = $dbnotificacion->insert($data);
                 $save = $db->insert($data);
                      
        }

        public function ilegible(int $id){
            $estado="Ilegible";
            $descripcion ="El siguiente documento no se muestran los datos legiblemente, por favor vuelva a enviarlo";
            $data = [
                'proceso_status'=> $estado,
                'descripcion' => $descripcion
            ];
            $this->documentosModel->set($data)
                  ->where('id_documento', $id)
                  ->update();

                  
        }
        /*public function incorrecto(int $id){
            $estado="Incorrecto";
            $descripcion ="El siguiente documento presenta información incorrecta";
            
            $dato = [
                'proceso_status'=>$estado,
                'descripcion'=>$descripcion
            ];
            
            $this->documentosModel->set('proceso_status', $dato)
                  ->where('id_documento', $id)
                  ->update();

        $database = \Config\Database::connect();
        $dbnotificacion = $database->table('notificaciones');
        $ultimoId=1;
        $nombre_modulo="Documentos Codigo QR";
        $usuario= "Juan";
        $dirigido="Gerencia";
        $descripcion="Documento incorrecto";
        date_default_timezone_set("America/Mexico_City");
        $fecha_hora = date("Y-m-d H:i:s");
        $id_obra=1;
        $data = [
            'modulo_id'=>$ultimoId,
            'nombre_modulo'=>$nombre_modulo,
            'usuario'=>$usuario,
            'dirigido'=>$dirigido,
            'descripcion'=>$descripcion,
            'fecha_hora_generado'=>$fecha_hora,
            'usuario_visto'=>$dirigido,
            'fecha_hora_leido'=>$fecha_hora,
            'id_obra'=>$id_obra
        ];
        $save = $dbnotificacion->insert($data);
        }

*/
        public function documentossecretaria()
        {
            $data["datas"] = $this->documentosModel->getdocumentossecretaria();
            $data["datos"] = $this->notificacionesModel->getnotificaciones();
            $data["dato"] = $this->notificacionesModel->totalnotificaiones();
            return view('listadosecretaria', $data);
        }
    
        public function generatePDF(int $id){
           // $id_semana=1;
           $data["data"] = $this->documentosModel->getdocumentossecretarianotificaciones($id);
    
            $dompdf= new \Dompdf\Dompdf();
            $dompdf->loadHtml(view('oficio_secretaria',$data));
            $dompdf->setPaper('A4','portrait');
            $dompdf->render();
            $dompdf->stream("Obras List");
           // return view('oficio_secretaria', $data);

        /*   $mpdf = new mPDF();
        $html = $this->load->view('oficio_secretaria',$data,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output(); // opens in browser
        //$mpdf->Output('welcome.pdf','D'); 
*/
        }

        


}
