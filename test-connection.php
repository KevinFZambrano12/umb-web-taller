<?php
// URL del REST de Supabase apuntando a tu tabla real
$url = "https://xoczwxfyzmueiwwjvuuh.supabase.co/rest/v1/tareas?select=*";

// Tu ANON KEY completa (la de Project Settings -> API -> anon public)
$apikey = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InhvY3p3eGZ5em11ZWl3d2p2dXVoIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NjMwNzM2NzIsImV4cCI6MjA3ODY0OTY3Mn0.NuzrZHIrLVROmhqc8x9BP2mYGwPBNNR9WdLkh3r3XA0";

$headers = [
    "apikey: $apikey",
    "Authorization: Bearer $apikey",
    "Content-Type: application/json"
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo "Error en cURL: " . curl_error($ch);
} else {
    echo $response;
}

curl_close($ch);
?>

