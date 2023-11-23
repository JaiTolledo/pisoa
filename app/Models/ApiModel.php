<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;

class ApiModel extends Model
{
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
        $sql = "SELECT universo_id,nombre_completo, localidad,importe_autorizado, unidad_ejecutora
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

    public function insertar($data)
    {
        $date = date("Y-m-d H:i:s");

        $item_avance = [
            "obra" => $data->obra,
            "user_captura" => $data->user_captura,
            "created_at" => $date,
            "fecha_visita"=>$data->fecha_visita,
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
            $avance_partidas = [
                "avance" => $id_avance,
                "obra" => $partida->obra,
                "partida" => $partida->partida,
                "ejecutado" => $partida->ejecutado,
                "avance_componente" => $partida->avance_componente
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

        return true;
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
