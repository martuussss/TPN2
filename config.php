<?php
session_start();

// Incluir la librería de Google Client
require_once 'vendor/autoload.php'; // Si usas Composer
// O incluye manualmente los archivos de Google API Client

// Configuración de Google OAuth
$google_client = new Google_Client();

$google_client->setClientId('965057555284-pnubp0h0kcl38blkbvntir0ffh0sv891.apps.googleusercontent.com'); // Reemplaza con tu Client ID
$google_client->setClientSecret('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'); // Reemplaza con tu Client Secret
$google_client->setRedirectUri('http://localhost/accesocorrecto.php'); // Ajusta la URL
$google_client->addScope('email');
$google_client->addScope('profile');

?>