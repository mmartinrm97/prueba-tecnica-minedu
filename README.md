# Prueba Técnica MINEDU: Laravel, Vue, TailwindCSS y Vite

Este repositorio contiene una aplicación desarrollada como parte de la prueba técnica para el Ministerio de Educación (MINEDU). La aplicación está construida utilizando las tecnologías de Laravel, Vue.js, TailwindCSS y Vite.

## Requisitos

Asegúrate de tener las siguientes herramientas instaladas en tu sistema:

- PHP 8.1 y Laravel 10
- Node.js v18+
- Composer 2.5.4

## Instalación

1. Clona el repositorio a tu máquina local:

```bash
git clone https://github.com/TuUsuario/prueba-tecnica-minedu.git
```

2. Crea una base de datos MySQL o PostgreSQL para el proyecto.

3. Instala las dependencias del proyecto Laravel y Vue.js:

```bash
cd prueba-tecnica-minedu
composer install
npm install
```

4. Copia el archivo `.env.example` a `.env` y configura las variables de entorno:

```bash
cp .env.example .env
```
5. Genera una nueva clave de aplicación:
```bash
php artisan key:generate
```

6. Ejecuta las migraciones para crear las tablas de la base de datos:

```bash
php artisan migrate
```

## Ejecución
1. Ejecuta el servidor de desarrollo para el frontend:
```bash
npm run dev
```
2. Ejecuta el servidor de desarrollo de Laravel:
```bash
php artisan serve
3. ```
Nota: Los comandos pueden variar según tu sistema operativo y entorno.
