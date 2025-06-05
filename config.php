<?php
session_start();

// Incluir la librería de Google Client
require_once 'vendor/autoload.php'; // Si usas Composer
// O incluye manualmente los archivos de Google API Client

// Configuración de Google OAuth
$google_client = new Google_Client();

$client_id = "YOUR_GOOGLE_CLIENT_ID_HERE"; $client_secret = "YOUR_GOOGLE_CLIENT_SECRET_HERE";
$google_client->setRedirectUri('http://localhost/accesocorrecto.php'); // Ajusta la URL
$google_client->addScope('email');
$google_client->addScope('profile');

?>