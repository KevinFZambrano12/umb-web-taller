<?php
require_once "db.php";

// === Obtener tareas ===
function obtenerTareas() {
    global $SUPABASE_URL, $SUPABASE_HEADERS;

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => "$SUPABASE_URL/rest/v1/tareas?select=*",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => $SUPABASE_HEADERS
    ]);

    $respuesta = curl_exec($curl);
    curl_close($curl);

    return json_decode($respuesta, true);
}

// === Crear nueva tarea ===
// Ahora debe recibir titulo, descripcion opcional y usuario_id opcional
function crearTarea($titulo, $descripcion = "", $usuario_id = null) {
    global $SUPABASE_URL, $SUPABASE_HEADERS;

    $data = [
        "titulo" => $titulo,
        "descripcion" => $descripcion,
        "completada" => false
    ];

    if ($usuario_id) {
        $data["usuario_id"] = $usuario_id;
    }

    $payload = json_encode($data);

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => "$SUPABASE_URL/rest/v1/tareas",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_HTTPHEADER => array_merge($SUPABASE_HEADERS, ["Prefer: return=minimal"])
    ]);

    curl_exec($curl);
    curl_close($curl);
}

// === Actualizar estado de la tarea ===
function actualizarTarea($id, $estado) {
    global $SUPABASE_URL, $SUPABASE_HEADERS;

    $payload = json_encode(["completada" => $estado]);

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => "$SUPABASE_URL/rest/v1/tareas?id=eq.$id",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "PATCH",
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_HTTPHEADER => array_merge($SUPABASE_HEADERS, ["Prefer: return=minimal"])
    ]);

    curl_exec($curl);
    curl_close($curl);
}

// === Eliminar tarea ===
function eliminarTarea($id) {
    global $SUPABASE_URL, $SUPABASE_HEADERS;

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => "$SUPABASE_URL/rest/v1/tareas?id=eq.$id",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "DELETE",
        CURLOPT_HTTPHEADER => array_merge($SUPABASE_HEADERS, ["Prefer: return=minimal"])
    ]);

    curl_exec($curl);
    curl_close($curl);
}
?>
