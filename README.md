Safe Steps - Sistema de Autenticación Web

Sistema de login y registro con autenticación dual (tradicional y Google OAuth) desarrollado en PHP y MySQL.

Características

-Login tradicional con usuario/contraseña y Google OAuth
-Sistema completo de alta de nuevos usuarios
-Proceso automatico con tokens temporales
-Interfaz para gestión de "brazaletes enlazados"
-Manejo de sesiones PHP con logout completo
-Uso de `password_hash()` para seguridad

Estructura del Proyecto

```
├── config.php              # Configuración principal de Google OAuth
├── config.local.php        # Credenciales locales (no subir a producción)
├── index.php               # Página principal de login
├── registronuevo.php       # Registro de nuevos usuarios
├── accesocorrecto.php      # Dashboard principal tras login exitoso
├── logout.php              # Manejo de cierre de sesión
├── recuperar_contraseña.php # Inicio del proceso de recuperación
├── nueva_contraseña.php    # Muestra nueva contraseña temporal
├── confirmar_recuperacion.php # Activación de nueva contraseña
├── form.php                # Formulario de registro de vehículos
└── registro.sql            # Estructura de base de datos
```
Base de Datos

### Tabla `registronuevo`
- `nombre` - Nombre del usuario
- `apellido` - Apellido del usuario  
- `email` - Email único del usuario
- `usuario` - Nombre de usuario único
- `password` - Contraseña hasheada

Tabla `recuperar`
- `email` - Email para recuperación
- `clave_nueva` - Nueva clave temporal
- `token` - Token de verificación
- `fecha` - Timestamp de la solicitud

Configuración

1. Base de Datos
```sql
-- Importar archivo registro.sql
mysql -u root -p < registro.sql
```

2. Google OAuth
1. Crear proyecto en [Google Cloud Console](https://console.cloud.google.com/)
2. Habilitar Google+ API
3. Crear credenciales OAuth 2.0
4. Configurar en `config.local.php`:

```php
<?php
$client_id = "tu-client-id-real-aqui";
$client_secret = "tu-client-secret-real-aqui";
?>
```

3. Servidor Local
- PHP 7.4+ con extensiones mysqli
- MySQL/MariaDB
- Composer para Google API Client

Instalación

1. Clonar repositorio
```bash
git clone [url-del-repositorio]
cd safe-steps
```

2. Instalar dependencias
```bash
composer install
```

3. Configurar base de datos
```bash
mysql -u root -p
CREATE DATABASE registro;
USE registro;
source registro.sql;
```

4. Configurar credenciales
- Renombrar `config.local.php.example` a `config.local.php`
- Completar con tus credenciales de Google OAuth

5. Ejecutar en servidor local
```bash
php -S localhost:8000
```

Autenticación

Login Tradicional
1. Usuario ingresa credenciales en `index.php`
2. Verificación contra base de datos
3. Creación de sesión PHP
4. Redirección a `accesocorrecto.php`

 Login con Google
1. Usuario hace clic en "Login With Google"
2. Redirección a Google OAuth
3. Retorno con código de autorización
4. Intercambio de código por token de acceso
5. Obtención de datos del perfil
6. Almacenamiento en sesión PHP

Recuperación de Contraseña
1. Usuario solicita recuperación con email
2. Sistema genera contraseña temporal aleatoria
3. Almacenamiento de token en tabla `recuperar`
4. Usuario confirma activación de nueva contraseña
5. Actualización en base de datos y limpieza de token

Interfaz

- Diseño responsivo con CSS personalizado
- Bootstrap 4 para componentes
- Imagen de perfil circular en formularios
- Colores corporativos azul y verde
- Efectos hover y transiciones suaves

Seguridad

- Contraseñas hasheadas con `PASSWORD_DEFAULT`
- Prepared statements para prevenir SQL injection
- Validación de tokens temporales
- Limpieza de sesiones al cerrar
- Sanitización de entradas con `htmlspecialchars()`


Requisitos del Sistema

- PHP 7.4+
- MySQL 5.7+ / MariaDB 10.2+
- Extensiones PHP: mysqli, session, json
- Google API Client Library
- Servidor web (Apache/Nginx) o PHP built-in server

Notas

- El archivo `config.local.php` debe estar en `.gitignore`
- Cambiar URL de redirección según entorno (desarrollo/producción)
- Las credenciales de prueba están en comentarios
- Sistema preparado para expansión con más proveedores OAuth


Safe Steps- Sistema de autenticación web seguro y moderno
