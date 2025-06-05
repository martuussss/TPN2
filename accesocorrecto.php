<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio | Safe Steps</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f8;
        }

        header {
            background-color: #004080;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header-left img {
            height: 80px;
            width: auto;
            border-radius: 8px;
        }

        .header-left h1 {
            font-size: 28px;
            margin: 0;
        }

        .logout-link {
            color: white;
            text-decoration: none;
            background-color: #cc0000;
            padding: 10px 16px;
            border-radius: 6px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .logout-link:hover {
            background-color: #990000;
        }

        main {
            padding: 40px;
            text-align: center;
        }

        .welcome-box {
            background-color: white;
            max-width: 500px;
            margin: 0 auto 30px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .form-container {
            background-color: white;
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            font-size: 16px;
            text-align: left;
        }

        .form-container label {
            font-weight: bold;
        }

        .form-container input,
        .form-container select {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .form-container button {
            background-color: #004080;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #003060;
        }

        .nota-diseno {
            font-size: 12px;
            color: #777;
            font-weight: normal;
            margin-left: 8px;
        }
    </style>
</head>
<body>

    <header>
        <div class="header-left">
            <img src="https://i.pinimg.com/736x/ff/a7/40/ffa74004d653055e599aec1c6ab615ed.jpg" alt="Safe Steps Logo">
            <h1>Safe Steps</h1>
        </div>
        <a class="logout-link" href="logout.php">Cerrar sesión</a>
    </header>

    <main>
        <div class="welcome-box">
            <h2>¡Bienvenido, Has iniciado sesión correctamente.</h2>
        </div>

        <!-- Formulario de registro de brazaletes -->
        <div class="form-container">
            <h3>
                Registrar Brazaletes Enlazados
                <span class="nota-diseno">(Es solo el diseño, los datos no se guardan)</span>
            </h3>
            <form id="braceletForm" action="#" method="POST">
                <label for="responsable">Nombre de usuario a cargo:</label>
                <input type="text" id="responsable" name="responsable" required>

                <label for="cantidad">Cantidad de brazaletes enlazados:</label>
                <select id="cantidad" name="cantidad" required onchange="generarCamposUsuarios()">
                    <option value="">Selecciona una cantidad</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                <div id="camposUsuarios"></div>

                <button type="submit">Guardar</button>
            </form>
        </div>
    </main>

    <script>
        function generarCamposUsuarios() {
            const cantidad = parseInt(document.getElementById("cantidad").value);
            const contenedor = document.getElementById("camposUsuarios");
            contenedor.innerHTML = "";

            if (!isNaN(cantidad)) {
                for (let i = 1; i <= cantidad; i++) {
                    const label = document.createElement("label");
                    label.textContent = `Nombre del usuario ${i}:`;
                    const input = document.createElement("input");
                    input.type = "text";
                    input.name = `usuario_${i}`;
                    input.required = true;

                    contenedor.appendChild(label);
                    contenedor.appendChild(input);
                }
            }
        }
    </script>

</body>
</html>
