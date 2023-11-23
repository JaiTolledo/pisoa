<?php

namespace App\Controllers;

use App\Models\ApiModel;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Controller;
use App\Libraries\Hash;



class ApiAppController  extends Controller

{
    use ResponseTrait;
    private $model;
    private $model_historial;

    public function __construct()

    {

        $this->model = model('ApiModel');
    }

    public function uploadfile()
    {
        $file = $this->request->getFile('post_featured_image');
        if (!$file->isValid())
            return $this->fail($file->getErrorString());

        $file->move('./assets/uploads');
        $data = [
            'id_avance' => $this->request->getVar('id_avance'),
            'post_featured_image' => $file->getName(),
        ];

        // Dirección y nombre de la imagen
        $imageURL = './assets/uploads/' . $file->getName();

        //Ubicacion de la imagen
        $imgLocation = $this->get_image_location($imageURL);

        //latitud & longitud
        $imgLat = $imgLocation['latitude'];
        $imgLng = $imgLocation['longitude'];

        $data['latitud'] = $imgLat;
        $data['longitud'] = $imgLng;

        $post_id = $this->model->insertar_imagen($data);
        $data['post_id'] = $post_id;
    
        // Guardando datos en la tabla historial
        $operacion = "Guardar imagen";
        $usuario = 1;
        $obra = 0;

        $this->historial($operacion, $usuario, $obra);
        return $this->respondCreated($data);
    }

    //************** Función para obtener  las Coordenadas de la imagen *************************** */

    function get_image_location($image = '')
    {
        $exif = exif_read_data($image, 0, true);
        if ($exif && isset($exif['GPS'])) {
            $GPSLatitudeRef = $exif['GPS']['GPSLatitudeRef'];
            $GPSLatitude    = $exif['GPS']['GPSLatitude'];
            $GPSLongitudeRef = $exif['GPS']['GPSLongitudeRef'];
            $GPSLongitude   = $exif['GPS']['GPSLongitude'];

            $lat_degrees = count($GPSLatitude) > 0 ? $this->gps2Num($GPSLatitude[0]) : 0;
            $lat_minutes = count($GPSLatitude) > 1 ? $this->gps2Num($GPSLatitude[1]) : 0;
            $lat_seconds = count($GPSLatitude) > 2 ? $this->gps2Num($GPSLatitude[2]) : 0;

            $lon_degrees = count($GPSLongitude) > 0 ? $this->gps2Num($GPSLongitude[0]) : 0;
            $lon_minutes = count($GPSLongitude) > 1 ? $this->gps2Num($GPSLongitude[1]) : 0;
            $lon_seconds = count($GPSLongitude) > 2 ? $this->gps2Num($GPSLongitude[2]) : 0;

            $lat_direction = ($GPSLatitudeRef == 'W' or $GPSLatitudeRef == 'S') ? -1 : 1;
            $lon_direction = ($GPSLongitudeRef == 'W' or $GPSLongitudeRef == 'S') ? -1 : 1;

            $latitude = $lat_direction * ($lat_degrees + ($lat_minutes / 60) + ($lat_seconds / (60 * 60)));
            $longitude = $lon_direction * ($lon_degrees + ($lon_minutes / 60) + ($lon_seconds / (60 * 60)));

            return array('latitude' => $latitude, 'longitude' => $longitude);
        } else {
            return false;
        }
    }

    function gps2Num($coordPart)
    {
        $parts = explode('/', $coordPart);
        if (count($parts) <= 0)
            return 0;
        if (count($parts) == 1)
            return $parts[0];
        return floatval($parts[0]) / floatval($parts[1]);
    }
    
    //********************************Función para guardar datos en la tabla historial ********** */

    public function historial($operacion, $usuario, $obra)
    {
        $date = date("Y-m-d H:i:s");
        $data = [
            "fecha" => $date,
            "operacion" => $operacion,
            "usuario" => $usuario,
            "obra" => $obra
        ];
        $insert = $this->model->insertar_historial($data);
    }

    // ***************************** Función para loguear al usuario ****************************
    public function loginUser()
    {

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $userInfo = $userModel->where('email', $email)->first();

        $checkPassword = Hash::check($password, $userInfo['password']);
        if (!$checkPassword) {
            $data['response'] = 'password invalida';
            return $this->respond($data);
        } else {
            $data['response'] = $this->model->ejecutora_usuario($email);
            $usuario = $data['response']['user']->id;
            $obra = 0;
            $operacion = "Inicio de sesión";
            $this->historial($operacion, $usuario, $obra);
            return $this->respond($data);
        }
    }

//************************************ Función para crear un avance de partidas **************** */
    public function create()
    {
        $avance = $this->request->getVar('avance');
        $insert = $this->model->insertar($avance);

        if ($insert) {
            $result = [
                "status" => 201,
                "data" => $insert,
            ];
        } else {
            $result = [
                "status" => 201,
                "data" => $insert,
            ];
        }
        $obra = $avance->obra;
        $usuario = $avance->user_captura;
        $operacion = "Insertando avance";
        $this->historial($operacion, $usuario, $obra);
        return $this->respond($result);
    }
    
}
