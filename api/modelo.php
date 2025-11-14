<?php
require_once "db.php";

// === LEER TAREAS ===
function obtenerTareas() {
    global $SUPABASE_URL, $SUPABASE_HEADERS;

    $url = "$SUPABASE_URL/rest/v1/tareas?select=*";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $SUPABASE_HEADERS);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    curl_close($ch);

    return json_decode($resp, true);
}

// === CREAR TAREA ===
function crearTarea($titulo) {
    global $SUPABASE_URL, $SUPABASE_HEADERS;

    $data = json_encode([
        "titulo" => $titulo,
        "completada" => false
    ]);

    $url = "$SUPABASE_URL/rest/v1/tareas";

    // Añadir Prefer
    $headers = array_merge($SUPABASE_HEADERS, [
        "Prefer: return=minimal"
    ]);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    curl_close($ch);
}

// === ACTUALIZAR TAREA ===
function actualizarTarea($id, $completada) {
    global $SUPABASE_URL, $SUPABASE_HEADERS;

    $data = json_encode([ "completada" => $completada ]);

    $url = "$SUPABASE_URL/rest/v1/tareas?id=eq.$id";

    $headers = array_merge($SUPABASE_HEADERS, [
        "Prefer: return=minimal"
    ]);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    curl_close($ch);
}

// === ELIMINAR TAREA ===
function eliminarTarea($id) {
    global $SUPABASE_URL, $SUPABASE_HEADERS;

    $url = "$SUPABASE_URL/rest/v1/tareas?id=eq.$id";

    $headers = array_merge($SUPABASE_HEADERS, [
        "Prefer: return=minimal"
    ]);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    curl_close($ch);
}
?>
