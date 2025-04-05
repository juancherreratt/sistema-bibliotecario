
# 📚 Gestión de Inventario de Bibliotecas - UNIMINUTO

Este es un sistema de gestión de inventario de materiales educativos para bibliotecas desarrollado con **Laravel 12**, **Livewire**, y componentes modernos. Permite a los bibliotecarios registrar, actualizar, visualizar y eliminar materiales como libros, revistas o artículos, con una interfaz dinámica sin recargar la página.

---

## ✅ Requisitos Previos

Asegúrate de tener los siguientes requisitos instalados en tu equipo:

### 🔧 Requisitos

- [PHP 8.2+](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org/download/)
- [MySQL](https://dev.mysql.com/downloads/mysql/) o [XAMPP](https://www.apachefriends.org/es/index.html) como alternativa
- [Node.js y NPM](https://nodejs.org/) (solo si deseas compilar los assets)

---

## 🚀 Instalación Paso a Paso

### 1️⃣ Clonar el repositorio

```bash
git clone https://github.com/juancherreratt/sistema-bibliotecario.git
cd sistema-bibliotecario
```

### 2️⃣ Instalar dependencias PHP con Composer, Instalar node & Compilar assets

```bash
composer install
```

```bash
npm install && npm run build
```

### 3️⃣ Crear y configurar el archivo `.env`

```bash
cp .env.example .env
```

Edita el archivo `.env` con tus credenciales de base de datos:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_bd
DB_USERNAME=usuario
DB_PASSWORD=contraseña
```

> 💡 Puedes usar herramientas como **phpMyAdmin** (incluida en XAMPP) para crear la base de datos fácilmente.

### 4️⃣ Generar la clave de la app

```bash
php artisan key:generate
```

---

## 🗃️ Migraciones y Seeders

### 5️⃣ Ejecutar migraciones

```bash
php artisan migrate
```

### 6️⃣ Cargar datos iniciales con Seeders

```bash
php artisan db:seed
```

Esto creará usuarios y bibliotecas de prueba.

---

## 🖥️ Ejecutar el servidor local

### 7️⃣ Iniciar el servidor de desarrollo

```bash
composer run dev
```

Luego abre en tu navegador:

```
http://127.0.0.1:8000
```

---

## 🔐 Acceso al sistema

Usuarios creados con el seeder:

| Email                   | Contraseña  | Rol                                 |
|-------------------------|-------------|-------------------------------------|
| rafael@uniminuto.edu.co | password    | Bibliotecario Rafael García Herreros|
| diego@uniminuto.edu.co  | password    | Bibliotecario Diego Jaramillo       |

---

## ✨ Tecnologías utilizadas

- Laravel 12
- Livewire
- Blade Components
- TailwindCSS
- Alpine.js
