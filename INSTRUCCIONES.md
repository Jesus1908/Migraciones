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

### 1. Clonar el Repositorio
```bash
git clone [URL_DEL_REPOSITORIO]
cd Migraciones-semillas
```

### 2. Instalar Dependencias
```bash
composer install
```

### 3. Configurar Base de Datos
1. Crear la base de datos `miapp` en MySQL
2. Copiar `env.example` a `.env`
3. Configurar las credenciales de la base de datos en `.env`:
   ```
   database.default.hostname = localhost
   database.default.database = miapp
   database.default.username = root
   database.default.password = tu_password
   ```

### 4. Ejecutar Migraciones
```bash
php spark migrate
```

### 5. Ejecutar Semillas
```bash
php spark db:seed UsuariosSeeder
```

### 6. Configurar Servidor Web
- **Apache/Nginx:** Apuntar al directorio `public/`
- **Laragon:** Crear virtual host apuntando a `public/`
- **XAMPP:** Mover contenido de `public/` a `htdocs/`

### 7. Acceder al Sistema

#### 🖥️ **Laragon (Windows)**
```
URL: http://Migraciones-semillas.test/
```

#### 🐧 **XAMPP**
```
URL: http://localhost/Migraciones-semillas/
```

#### 🐧 **Apache/Nginx**
```
URL: http://tu-dominio/
```

### 8. URLs de Acceso
- **Página Principal:** `http://[nombre-carpeta]/`
- **Iniciar Sesión:** `http://[nombre-carpeta]/identificacion/iniciar-sesion`
- **Registrarse:** `http://[nombre-carpeta]/identificacion/registrarse`
- **Bienvenida:** `http://[nombre-carpeta]/welcome`

### 📝 **Ejemplo Simple**
```bash
# 1. Clonar
git clone https://github.com/tu-usuario/Migraciones-semillas.git

# 2. Mover a directorio web
# Laragon: C:\laragon\www\Migraciones-semillas\
# XAMPP: C:\xampp\htdocs\Migraciones-semillas\

# 3. Acceder
# Laragon: http://Migraciones-semillas.test/
# XAMPP: http://localhost/Migraciones-semillas/
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

## 🔧 Solución de Problemas

### ❌ **Error 404 - Ruta no encontrada**
```bash
# Limpiar cache de rutas
php spark cache:clear
```

### ❌ **Error de Base de Datos**
```bash
# Verificar conexión
php spark db:show

# Recrear base de datos
php spark migrate:rollback
php spark migrate
php spark db:seed UsuariosSeeder
```

### ❌ **Error de Permisos (Linux/Mac)**
```bash
# Dar permisos a directorios
chmod -R 755 writable/
chmod -R 755 public/images/users/
```

### ❌ **Error de Composer**
```bash
# Reinstalar dependencias
composer install --no-dev --optimize-autoloader
```

### ❌ **Error de Virtual Host**
- **Laragon:** Reiniciar servicios
- **XAMPP:** Verificar configuración de Apache
- **Apache:** Verificar archivos de configuración

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
