<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;

class ApiModel extends Model
{
    // *************************** FUNCION PARA EL LOGIN DEL USUARIO **************************************
    public function ejecutora_usuario(string $email)
    {
        $sql = "SELECT ejecutora, users.id, tipo FROM users where email='$email'";
        $id_ejecutora = $this->db->query($sql)->getRow()->ejecutora;
        $obras = $this->obras_usuario($id_ejecutora);
        $aux = [];
        foreach ($obras as $obra) {
            $componentes = [];
            $componente_obras = "SELECT * FROM obra_componentes where obra='$obra->universo_id'";
            $componentes_data = $this->db->query($componente_obras)->getResult();


            foreach ($componentes_data as $componente) {
                $partidas_componente = "SELECT * FROM obra_partidas where componente='$componente->componente_id'";
                $componente->partidas = $this->db->query($partidas_componente)->getResult();
                $componentes[] = $componente;
            }
            $obra->componentes = $componentes;
            $aux[] = $obra;
        }


        $user = "SELECT id,name, email FROM users WHERE email='$email'";
        $usuario = $this->db->query($user)->getRow();
        return ["user" => $usuario, "obras" => $aux];
    }

    public function obras_usuario($id_ejecutora)
    {
        $sql = "SELECT universo_id,nombre_completo, localidad, importe_autorizado, unidad_ejecutora
        FROM `universo`
        INNER join cat_unidad_ejecutora
        on universo.unidad_ejecutora=cat_unidad_ejecutora.ejecutora_id
        where ejecutora_id='$id_ejecutora'";
        return  $this->db->query($sql)->getResult();
    }

    public function email(string $email)
    {
        $sql = "SELECT * FROM `users` WHERE email='$email'";
        return  $this->db->query($sql)->getResult();
    }

    //****************************** FUNCION PARA INSERTAR ******************************** */
    public function insertar($data)
    {
        $id_obra = $data->obra;
       
        $date = date("Y-m-d H:i:s");

        $item_avance = [
            "obra" => $data->obra,
            "user_captura" => $data->user_captura,
            "created_at" => $date,
            "fecha_visita" => $data->fecha_visita,
            "porcentaje_ejecutado" => $data->porcentaje_ejecutado,
            "porcentaje_programado" => $data->porcentaje_programado,
            "semaforo" => $data->semaforo,
            "observaciones_sociales" => $data->observaciones_sociales,
            "observaciones_tecnicas" => $data->observaciones_tecnicas,
            "personal_observaciones" => $data->personal_observaciones,
            "material_observaciones" => $data->material_observaciones,
            "equipo_observaciones" => $data->equipo_observaciones,
            "herramienta_observaciones" => $data->herramienta_observaciones,
            "captura_tipo" => $data->captura_tipo,
            "detenida" => $data->detenida,
            "problematica" => $data->problematica,
            "problematica_descripcion" => $data->problematica_descripcion,
            "problematica_resuelta" => $data->problematica_resuelta,
        ];

        $builder = $this->db->table("avances");
        $builder->insert($item_avance);
        $id_avance = $this->db->insertid();
        print_r($id_avance);

        foreach ($data->equipos as $equipo) {
            $avance_equipo = [
                "avance" => $id_avance,
                "equipo" => $equipo->equipo,
                "cantidad" => $equipo->cantidad,
                "inactivo" => $equipo->inactivo
            ];
            $builder = $this->db->table("avance_equipo");
            $builder->insert($avance_equipo);
        }

        foreach ($data->maquinas as $maquinaria) {
            $avance_maquinaria = [
                "avance" => $id_avance,
                "maquinaria" => $maquinaria->maquinaria,
                "cantidad" => $maquinaria->cantidad
            ];
            $builder = $this->db->table("avance_maquinaria");
            $builder->insert($avance_maquinaria);
        }

        foreach ($data->materiales as $material) {
            $avance_materiales = [
                "avance" => $id_avance,
                "material" => $material->material,
                "cantidad" => $material->cantidad,
                "unidad" => $material->unidad,
                "ubicacion" => $material->ubicacion
            ];
            $builder = $this->db->table("avance_material");
            $builder->insert($avance_materiales);
        }

        foreach ($data->partidas as $partida) {
            $partida_importe = "SELECT monto FROM obra_partidas where partida_id='$partida->partida'";
            $importe = $this->db->query($partida_importe)->getRow()->monto;
            $ejecutado_porcentaje = $partida->avance_fisico;

            $resultado = ($importe * $ejecutado_porcentaje) / 100;

            $avance_partidas = [
                "avance" => $id_avance,
                "obra" => $partida->obra,
                "partida" => $partida->partida,
                "avance_fisico" => $partida->avance_fisico,
                "avance_importe" => $resultado
            ];

            $builder = $this->db->table("avance_partidas");
            $builder->insert($avance_partidas);
        }

        foreach ($data->personales as $personals) {
            $avance_personales = [
                "avance" => $id_avance,
                "personal" => $personals->personal,
                "cantidad" => $personals->cantidad,
                "hombres" => $personals->hombres,
                "mujeres" => $personals->mujeres
            ];
            $builder = $this->db->table("avance_personal");
            $builder->insert($avance_personales);
        }

        foreach ($data->componentes as $componente) {
            $id_componente = $componente->componente_id;
            $componente_importe = "SELECT SUM(avance_importe) as Total_importe, componente_monto 
           from avance_partidas 
           INNER JOIN obra_partidas
           on avance_partidas.partida=obra_partidas.partida_id
           inner JOIN obra_componentes
           on obra_partidas.componente=obra_componentes.componente_id
           where componente='$id_componente' and avance='$id_avance'";
            $importeXcomponente = $this->db->query($componente_importe)->getRow()->Total_importe;
            $componente_monto = $this->db->query($componente_importe)->getRow()->componente_monto;

            $porcentaje_fisico = ($importeXcomponente * 100) / $componente_monto;

            $avance_componentes = [
                "avance" => $id_avance,
                "obra" => $id_obra,
                "componente" => $id_componente,
                "avance_fisico" => $porcentaje_fisico,
                "avance_importe" => $importeXcomponente
            ];

            $builder = $this->db->table("avance_componente");
            $builder->insert($avance_componentes);
        }

        $avance_ejecutado="SELECT sum(avance_importe) as Importe_Ejecutado, SUM(monto) as Monto_Partidas
        FROM avance_partidas
        INNER JOIN obra_partidas
        on avance_partidas.partida=obra_partidas.partida_id
        WHERE avance='$id_avance'";
        $importeEjecutado_Avance = $this->db->query($avance_ejecutado)->getRow()->Importe_Ejecutado;
        $Monto_avance = $this->db->query($avance_ejecutado)->getRow()->Monto_Partidas;
         
        $porcentaje_ejecutado= ($importeEjecutado_Avance*100)/$Monto_avance;
       

        $this->db->table("avances")->set('porcentaje_ejecutado', $porcentaje_ejecutado)
                  ->where('avance_id', $id_avance)
                  ->update();
        return $data;
    }

    public function insertar_imagen($data)
    {
        $table = "avance_imagen";
        $builder = $this->db->table($table);
        $builder->insert($data);
        //  $avance_equipo=$this->insertar_avances_equipo($data);
        // return $avance_equipo;
        return true;
    }

    public function insertar_historial($data)
    {
        $table = "historial";
        $builder = $this->db->table($table);
        $builder->insert($data);
        //  $avance_equipo=$this->insertar_avances_equipo($data);
        // return $avance_equipo;
        return true;
    }
}
