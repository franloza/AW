<?php

namespace es\ucm\aw\internprise;

use es\ucm\aw\internprise\Aplicacion as App;

class UsuarioDAO
{

    public static function cargaUsuario($email)
    {
        $app = App::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM usuarios WHERE email='%s'", $conn->real_escape_string($email));
        $rs = $conn->query($query);
        if ($rs && $rs->num_rows == 1) {
            $fila = $rs->fetch_assoc();
            $user = new Usuario($fila['id_usuario'], $fila['email'], $fila['password']);
            $user->setRol($fila['rol']);
            $rs->free();

            return $user;
        }
        return false;
    }

    /**
     * @param $datos
     * @return array|bool|mixed
     */
    public static function registerEstudiante($datos) {
        $id = self::registerUsuario ($datos['email'],$datos['password'],$datos['rol']);
        if (!is_array($id)){
            $app = App::getSingleton();
            $conn = $app->conexionBd();
            $grado = $datos['grado'];

            //Conseguir id del grado o crearlo si no existe
            $query = sprintf("SELECT id_grado FROM grados WHERE nombre_grado LIKE '%s'", $conn->real_escape_string($grado));
            $rs = $conn->query($query);
            if ($rs) {
                //Se ha encontrado el grado
                $fila = $rs->fetch_assoc();
                $idGrado = intval($fila['id_grado']);
                $rs->free();
            } else {
                //No se ha encontrado el grado -> Se inserta
                $stmt = $conn->prepare('INSERT INTO grados(nombre_grado) VALUES (?)');
                $stmt->bind_param("s",$grado);
                $idGrado = $conn->insert_id;
                if (!$stmt->execute()) {
                    $result [] = "Hubo un problema en la inserción en la BBDD";
                    return $result;
                }
            }
            $stmt = $conn->prepare('INSERT INTO estudiantes(id_usuario,dni,nombre_universidad,id_Grado,
                                        nombre,apellidos,direccion,sexo, nacionalidad,fecha_nacimiento,localidad,provincia,
                                        pais,telefono,web) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
            $stmt->bind_param("ississsssssssss",$id,$datos['dni'],$datos['nombre_universidad'],$idGrado,
                $datos['nombre'],$datos['apellidos'],$datos['direccion'],$datos['sexo'], $datos['nacionalidad'],
                $datos['fecha_nacimiento'],$datos['localidad'],$datos['provincia'],$datos['pais'],$datos['telefono'],
                $datos['web']);
            if (!$stmt->execute()) {
                $result [] = $stmt->error;
                return $result;
            }
        }
        else {
            //There was an error in the insertion
            return $id;
        }
        return true;
    }
    private function registerUsuario ($email,$password,$rol) {
        $app = App::getSingleton();
        $conn = $app->conexionBd();
        $stmt = $conn->prepare("INSERT INTO usuarios (email,password,rol) VALUES (?,?,?)");
        $stmt->bind_param("sss",$email, $password, $rol);
        if (!$stmt->execute()) {
            $result [] = "Hubo un problema en la inserción en la BBDD";
            return $result;
        }
        return $conn->insert_id;
    }

    public static function registerEmpresa($datos) {
        $id = self::registerUsuario ($datos['email'],$datos['password'],$datos['rol']);
        if (!is_array($id)) {
            $app = App::getSingleton();
            $conn = $app->conexionBd();


            $stmt = $conn->prepare('INSERT INTO empresas(id_usuario ,cif ,razon_social ,direccion ,localidad ,provincia ,cp ,
                                    pais ,telefono , web ) VALUES (?,?,?,?,?,?,?,?,?,?)');
            $stmt->bind_param("isssssisss", $id, $datos['cif'], $datos['razon_social'],$datos['direccion'],
                $datos['localidad'], $datos['provincia'], $datos['cp'], $datos['pais'], $datos['telefono'], $datos['web']);
            if (!$stmt->execute()) {
                $result [] = $stmt->error;
                return $result;
            }
        }
        return true;
    }
}