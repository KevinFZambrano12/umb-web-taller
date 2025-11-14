<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header("Content-Type: application/json");

require_once "controlador.php";

$metodo = $_SERVER["REQUEST_METHOD"];

echo json_encode( manejarSolicitud($metodo) );
echo "Backend funcionando en Render 🚀"?>
