<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Alta de Vehículos</title>
</head>
<body>
  <div class="container">
    <h2 class="title">Registrar Vehículo</h2>
    <form action="registrar.php" method="POST" class="form">
      <label for="patente">Patente:</label>
      <input type="text" name="patente" id="patente" required placeholder="Ej: ABC-123" class="input-field"><br><br>

      <label for="tipo">Tipo:</label>
      <select name="tipo" id="tipo" required class="input-field">
        <option value="">Seleccione...</option>
        <option value="Auto">Auto</option>
        <option value="Moto">Moto</option>
        <option value="Camioneta">Camioneta</option>
      </select><br><br>

      <input type="submit" value="Registrar" class="submit-button">
    </form>
    <br>
    <a href="inicio.php" class="back-button">🏠 Volver al Inicio</a>
  </div>
</body>
</html>
