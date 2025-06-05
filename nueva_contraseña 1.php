<?php
if (!isset($_GET['email']) || !isset($_GET['token'])) {
    header("Location: index.php");
    exit();
}

$email = $_GET['email'];
$token = $_GET['token'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Contraseña</title>
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
        .new-password-container {
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
        .info {
            background-color: #d1ecf1;
            color: #0c5460;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid #bee5eb;
        }
        .password-display {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 6px;
            margin: 20px 0;
            font-family: 'Courier New', monospace;
            font-size: 1.2rem;
            font-weight: bold;
            color: #495057;
            border: 2px solid #dee2e6;
        }
        .btn {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            margin: 10px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .btn:hover {
            background-color: #218838;
            transform: scale(1.05);
        }
        .btn-secondary {
            background-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .warning {
            background-color: #fff3cd;
            color: #856404;
            padding: 10px;
            border-radius: 4px;
            margin-top: 15px;
            border: 1px solid #ffeaa7;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="new-password-container">
        <h2>Nueva Contraseña Generada</h2>
        
        <div class="info">
            <strong>Email:</strong> <?php echo htmlspecialchars($email); ?>
        </div>
        
        <p>Se ha generado una nueva contraseña temporal para tu cuenta:</p>
        
        <div class="password-display">
            <?php echo htmlspecialchars($token); ?>
        </div>
        
        <div class="warning">
             <strong>Importante:</strong> Guarda esta contraseña en un lugar seguro. Te recomendamos cambiarla después de iniciar sesión.
        </div>
        
        <div style="margin-top: 25px;">
            <a href="confirmar_recuperacion.php?email=<?php echo urlencode($email); ?>&nueva=<?php echo urlencode($token); ?>" class="btn">
                Activar Nueva Contraseña
            </a>
            
            <a href="index.php" class="btn btn-secondary">
                Cancelar
            </a>
        </div>
    </div>
</body>
</html>