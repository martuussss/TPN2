<?php
if (isset($_GET['email']) && isset($_GET['nueva'])) {
    $email = $_GET['email'];
    $nueva_clara = $_GET['nueva'];
    $nueva_hash = password_hash($nueva_clara, PASSWORD_DEFAULT);

    $conex = mysqli_connect("localhost", "root", "", "registro");
    if (!$conex) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Verificar que existe una solicitud de recuperación válida
    $stmt_verify = mysqli_prepare($conex, "SELECT token FROM recuperar WHERE email = ?");
    mysqli_stmt_bind_param($stmt_verify, "s", $email);
    mysqli_stmt_execute($stmt_verify);
    $resultado_verify = mysqli_stmt_get_result($stmt_verify);

    if (mysqli_num_rows($resultado_verify) == 1) {
        // Actualizar la contraseña en la tabla de usuarios
        $stmt_update = mysqli_prepare($conex, "UPDATE registronuevo SET password = ? WHERE email = ?");
        mysqli_stmt_bind_param($stmt_update, "ss", $nueva_hash, $email);
        
        if (mysqli_stmt_execute($stmt_update)) {
            // Eliminar el token de recuperación (opcional - para que no pueda reutilizarse)
            $stmt_delete = mysqli_prepare($conex, "DELETE FROM recuperar WHERE email = ?");
            mysqli_stmt_bind_param($stmt_delete, "s", $email);
            mysqli_stmt_execute($stmt_delete);
            
            $mensaje = "La nueva contraseña ha sido activada correctamente.";
            $success = true;
        } else {
            $mensaje = "Error al actualizar la contraseña.";
            $success = false;
        }
    } else {
        $mensaje = "Solicitud de recuperación no válida o expirada.";
        $success = false;
    }

    mysqli_close($conex);
} else {
    $mensaje = "Solicitud no válida.";
    $success = false;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Recuperación</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .result-container {
            background: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            width: 400px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .message {
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 6px;
            font-weight: 600;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .btn {
            display: inline-block;
            background-color: #007BFF;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="result-container">
        <h2>Resultado de Recuperación</h2>
        
        <div class="message <?php echo $success ? 'success' : 'error'; ?>">
            <?php echo htmlspecialchars($mensaje); ?>
        </div>
        
        <a href="index.php" class="btn">Volver al inicio de sesión</a>
    </div>
</body>
</html>
