<?php
require_once "modelo.php";

function manejarSolicitud($metodo) {
    switch ($metodo) {
        case "GET":
            return obtenerTareas();

        case "POST":
            $body = json_decode(file_get_contents("php://input"), true);
            $titulo = $body["titulo"];
            $descripcion = $body["descripcion"] ?? "";
            $usuario_id = $body["usuario_id"] ?? null;

    crearTarea($titulo, $descripcion, $usuario_id);
    return ["mensaje" => "Tarea creada"];


        case "PATCH":
            $body = json_decode(file_get_contents("php://input"), true);
            actualizarTarea($body["id"], $body["completada"]);
            return ["mensaje" => "Tarea actualizada"];

        case "DELETE":
            $body = json_decode(file_get_contents("php://input"), true);
            eliminarTarea($body["id"]);
            return ["mensaje" => "Tarea eliminada"];

        default:
            return ["error" => "Método no permitido"];
    }
}
?>

