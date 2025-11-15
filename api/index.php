<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header("Content-Type: application/json");

require_once "controlador.php";

$metodo = $_SERVER["REQUEST_METHOD"];

// Ejecutar función y guardar respuesta
$respuesta = manejarSolicitud($metodo);

// Devolver JSON y terminar script
echo json_encode($respuesta);
exit;
