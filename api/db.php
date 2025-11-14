<?php
// --- CONFIGURACIÓN SUPABASE ---
$SUPABASE_URL = "https://xoczwxfyzmueiwwjvuuh.supabase.co";
$SUPABASE_KEY = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InhvY3p3eGZ5em11ZWl3d2p2dXVoIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NjMwNzM2NzIsImV4cCI6MjA3ODY0OTY3Mn0.NuzrZHIrLVROmhqc8x9BP2mYGwPBNNR9WdLkh3r3XA0";

// Encabezados estándar para Supabase REST
$SUPABASE_HEADERS = [
    "apikey: $SUPABASE_KEY",
    "Authorization: Bearer $SUPABASE_KEY",
    "Content-Type: application/json",
];
?>

