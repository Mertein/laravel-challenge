# Guia para la instalacion, uso de la Api y Test.

## Instalación

-   Requerimientos
    Php version > 8.1.10
    Usar Laragon, Xampp o WampServer.

Para instalar y ejecutar esta aplicación, sigue estos pasos:

-   Clona este repositorio en tu máquina local:

```bash
git clone https://github.com/Mertein/laravel-challenge.git
```

Navega al directorio de la aplicación

```bash
cd laravel-challenge
```

-   Instala las dependencias de Composer:

```bash
composer install
```

-   Copia el archivo .env.example y renómbralo a .env:

```bash
cp .env.example .env
```

-   Genera una nueva clave de aplicación:

```bash
php artisan key:generate
```

## Environment Variables

To run this project, you will need to add the following environment variables to your .env file

```bash
DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=nombre_de_tu_base_de_datos

DB_USERNAME=usuario_de_tu_base_de_datos

DB_PASSWORD=contraseña_de_tu_base_de_datos
```

-   Ejecuta las migraciones para crear las tablas en la base de datos:

```bash
php artisan migrate
```

-   Llena las tablas con datos utilizando los seeders:

```bash
php artisan db:seed --class=CategorySeeder
php artisan db:seed --class=EntitySeeder
```

-   Una vez que la aplicación esté instalada, puedes ejecutarla utilizando el servidor web integrado de PHP:

```bash
php artisan serve
```

## API Reference

La aplicación proporciona una API para consultar las entidades con diferentes categorías. Aquí están las rutas disponibles:

#### Todas las entidades con todas las categorías:

```http
GET http://127.0.0.1:8000/api
```

#### Entidades filtradas por una categoría específica:

```http
GET http://127.0.0.1:8000/api/{categorieName}
```

| Parameter | Type     | Description           |
| :-------- | :------- | :-------------------- |
| `name`    | `string` | Name of item to fetch |

Si la categoría especificada existe en la base de datos, se mostrarán solo las entidades con esa categoría. Si la categoría no existe, se mostrarán todas las entidades y se incluirá un mensaje en el cuerpo de la respuesta indicando que se filtraron todas las entidades porque no se encontró la categoría.

## Running Tests

To run tests, run the following command

```bash
npm run test
```

### Postman Collection

In the file folder \_postman/Laravel-Challenge.postman_collection.json
you can test the api response with postman.
