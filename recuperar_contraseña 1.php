<?php
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["recuperar"])) {
    $email = trim($_POST["email"]);
    $conex = mysqli_connect("localhost", "root", "", "registro");

    if (!$conex) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Usar prepared statements para evitar SQL injection
    $stmt = mysqli_prepare($conex, "SELECT * FROM registronuevo WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($resultado) == 1) {
        // Generar nueva contraseña
        $nueva_password = bin2hex(random_bytes(4)); // Ej: "a1b2c3d4"
        $hash = password_hash($nueva_password, PASSWORD_DEFAULT);

        // Verificar si ya existe un registro en la tabla recuperar
        $stmt_check = mysqli_prepare($conex, "SELECT * FROM recuperar WHERE email = ?");
        mysqli_stmt_bind_param($stmt_check, "s", $email);
        mysqli_stmt_execute($stmt_check);
        $resultado_check = mysqli_stmt_get_result($stmt_check);

        if (mysqli_num_rows($resultado_check) > 0) {
            // Actualizar registro existente
            $stmt_update = mysqli_prepare($conex, "UPDATE recuperar SET token = ?, fecha = NOW() WHERE email = ?");
            mysqli_stmt_bind_param($stmt_update, "ss", $hash, $email);
        } else {
            // Insertar nuevo registro
            $stmt_update = mysqli_prepare($conex, "INSERT INTO recuperar (email, token, fecha) VALUES (?, ?, NOW())");
            mysqli_stmt_bind_param($stmt_update, "ss", $email, $hash);
        }

        if (mysqli_stmt_execute($stmt_update)) {
            // Redirigir a nueva_contraseña.php y pasar la nueva por GET
            header("Location: nueva_contraseña.php?email=" . urlencode($email) . "&token=" . urlencode($nueva_password));
            exit();
        } else {
            $mensaje = "Error al procesar la solicitud de recuperación.";
        }
    } else {
        $mensaje = "El email ingresado no está registrado.";
    }

    mysqli_close($conex);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Recuperar contraseña</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }
        .recover-container {
            background: white;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 380px;
            box-sizing: border-box;
            text-align: center;
            overflow: visible;
        }
        .recover-container img {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
            text-align: left;
        }
        label {
            margin-bottom: 6px;
            color: #555;
            font-weight: 600;
        }
        input[type="email"] {
            padding: 10px 15px;
            margin-bottom: 20px;
            border: 1.5px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
            width: 100%;
            box-sizing: border-box;
        }
        input[type="email"]:focus {
            border-color: #007BFF;
            outline: none;
        }
        input[type="submit"] {
            background-color: #007BFF;
            border: none;
            padding: 12px;
            font-size: 1rem;
            color: white;
            font-weight: 700;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-top: 5px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        p.message {
            color: red;
            margin-bottom: 20px;
            font-weight: 600;
            text-align: center;
        }
        .links {
            margin-top: 15px;
            text-align: center;
        }
        .links a {
            color: #007BFF;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        .links a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        @media (max-width: 400px) {
            .recover-container {
                padding: 20px;
                max-width: 100%;
            }
            .recover-container img {
                width: 90px;
                height: 90px;
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="recover-container">
        <img src="https://i.pinimg.com/736x/ff/a7/40/ffa74004d653055e599aec1c6ab615ed.jpg" alt="Imagen redonda">

        <h2>Recuperar contraseña</h2>

        <?php if ($mensaje): ?>
            <p class="message"><?php echo htmlspecialchars($mensaje); ?></p>
        <?php endif; ?>

        <form method="post" action="" autocomplete="off">
            <label for="email">Ingresa tu email:</label>
            <input type="email" id="email" name="email" required />

            <input type="submit" name="recuperar" value="Recuperar" />
        </form>

        <div class="links">
            <a href="index.php">Volver al inicio de sesión</a>
        </div>
    </div>
</body>
</html>
