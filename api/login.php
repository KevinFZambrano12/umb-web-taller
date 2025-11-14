<?php
session_start();

$SUPABASE_URL = "https://xoczwxfyzmueiwwjvuuh.supabase.co";
$SUPABASE_KEY = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InhvY3p3eGZ5em11ZWl3d2p2dXVoIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NjMwNzM2NzIsImV4cCI6MjA3ODY0OTY3Mn0.NuzrZHIrLVROmhqc8x9BP2mYGwPBNNR9WdLkh3r3XA0"; // anon key

// Lee el body enviado desde POST (JSON)
$input = json_decode(file_get_contents("php://input"), true);

$email = $input["email@hotmail.com"] ?? "";
$password = $input["password"] ?? "";

if (!$email || !$password) {
    echo json_encode(["error" => "Email y password requeridos"]);
    exit;
}

// Configurar la URL del login
$url = "$SUPABASE_URL/auth/v1/token?grant_type=password";

// Datos del login
$data = json_encode([
    "email" => $email,
    "password" => $password
]);

$headers = [
    "apikey: $SUPABASE_KEY",
    "Authorization: Bearer $SUPABASE_KEY",
    "Content-Type: application/json",
];

// Hacer la solicitud cURL
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

$resultado = json_decode($response, true);

// ¿Login falló?
if (isset($resultado["error"])) {
    echo json_encode(["error" => $resultado["error"]["message"]]);
    exit;
}

// LOGIN CORRECTO → Guardamos la sesión
$_SESSION["usuario"] = $resultado["user"]["email"];
$_SESSION["token"]   = $resultado["access_token"];
$_SESSION["refresh"] = $resultado["refresh_token"];

echo json_encode([
    "mensaje" => "Sesión iniciada",
    "usuario" => $_SESSION["usuario"]
]);
?>
