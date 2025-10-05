# 🚀 Sistema de Usuarios con Migraciones y Semillas

## 📋 Descripción
Sistema de usuarios con roles (administrador y usuario) implementado en CodeIgniter 4 usando migraciones y semillas con Spark.

## 🗄️ Base de Datos
- **Nombre:** `miapp` (todo en minúscula)
- **Tabla:** `usuarios` (minúscula)

## 📁 Estructura del Proyecto

### Migraciones
- `app/Database/Migrations/2024-01-01-000001_CreateUsuariosTable.php`

### Semillas
- `app/Database/Seeds/UsuariosSeeder.php`

### Modelos
- `app/Models/UsuarioModel.php`

### Controladores
- `app/Controllers/IdentificacionController.php` - Identificación (iniciar sesión, registrarse, cerrar sesión)
- `app/Controllers/WelcomeController.php` - Página principal de bienvenida

### Vistas
- `app/Views/auth/login.php` - Formulario de login
- `app/Views/auth/register.php` - Formulario de registro
- `app/Views/welcome.php` - Página de bienvenida

### Archivos de Avatar
- `public/images/users/` - Directorio para avatares
- `public/images/users/default.jpg` - Avatar por defecto

## 🛠️ Instrucciones de Instalación

### 1. Configurar Base de Datos
1. Crear la base de datos `miapp` en MySQL
2. Configurar las credenciales de la base de datos en `.env`:
   ```
   database.default.hostname = localhost
   database.default.database = miapp
   database.default.username = root
   database.default.password = 
   ```

### 2. Ejecutar Migraciones
```bash
php spark migrate
```

### 3. Ejecutar Semillas
```bash
php spark db:seed UsuariosSeeder
```

## 👥 Usuarios por Defecto

### Administrador
- **Email:** admin@miapp.com
- **Contraseña:** admin123
- **Rol:** admin

### Usuario de Prueba
- **Email:** usuario@miapp.com
- **Contraseña:** usuario123
- **Rol:** usuario
- **Avatar:** default.jpg

### Usuario Adicional
- **Email:** juan@miapp.com
- **Contraseña:** juan123
- **Rol:** usuario

## 🌐 Rutas del Sistema

### Públicas
- `/` - Redirige a iniciar sesión
- `/identificacion/iniciar-sesion` - Formulario de inicio de sesión
- `/identificacion/registrarse` - Formulario de registro

### Protegidas (requieren login)
- `/welcome` - Página de bienvenida

### Acciones
- `/identificacion/cerrar-sesion` - Cerrar sesión

## 🎨 Características

### ✅ Funcionalidades Implementadas
- ✅ Sistema de login/registro
- ✅ Gestión de sesiones
- ✅ Roles (admin/usuario)
- ✅ Subida de avatares opcional
- ✅ Validaciones de formularios
- ✅ Interfaz responsive con Bootstrap
- ✅ Migraciones para estructura de BD
- ✅ Semillas para datos iniciales
- ✅ Modelo con validaciones
- ✅ Controladores con lógica de negocio
- ✅ Vistas modernas y atractivas

### 🔐 Seguridad
- Contraseñas hasheadas con `password_hash()`
- Validación CSRF en formularios
- Verificación de permisos por rol
- Validación de archivos de avatar

### 📱 Interfaz
- Diseño responsive
- Gradientes modernos
- Iconos Font Awesome
- Animaciones CSS
- Vista previa de avatares
- Mensajes de éxito/error

## 🚀 Comandos Útiles

### Migraciones
```bash
# Ejecutar migraciones
php spark migrate

# Revertir última migración
php spark migrate:rollback

# Ver estado de migraciones
php spark migrate:status
```

### Semillas
```bash
# Ejecutar todas las semillas
php spark db:seed

# Ejecutar semilla específica
php spark db:seed UsuariosSeeder
```

### Base de Datos
```bash
# Crear migración
php spark make:migration NombreMigracion

# Crear semilla
php spark make:seeder NombreSeeder

# Crear modelo
php spark make:model NombreModel
```

## 📝 Notas Importantes

1. **Base de datos:** Asegúrate de que la BD `miapp` existe antes de ejecutar migraciones
2. **Permisos:** Todos los usuarios tienen acceso igual al sistema
3. **Avatares:** Se almacenan en `public/images/users/` con nombres aleatorios
4. **Sesiones:** Se mantienen hasta que el usuario cierre sesión
5. **Validaciones:** Todos los formularios tienen validación del lado servidor

¡El sistema está listo para usar! 🎉
