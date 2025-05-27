# Proyecto de Farmacia

Este proyecto es un sistema de gestión de pedidos para una farmacia. A continuación se describen los componentes principales del módulo de pedidos.

## Estructura del Proyecto

- **app/Http/Controllers/PedidoController.php**: Controlador que maneja las solicitudes relacionadas con los pedidos. Incluye métodos para realizar operaciones CRUD (Crear, Leer, Actualizar, Eliminar).

- **app/Models/Pedido.php**: Modelo que representa los datos de un pedido. Contiene propiedades como `id`, `nombre`, `cantidad`, `precio`, y define las relaciones con otros modelos.

- **database/factories/PedidoFactory.php**: Fábrica que permite crear instancias de `Pedido` con datos de prueba. Facilita la generación de datos para pruebas y desarrollo.

- **database/migrations/2023_10_01_000000_create_pedidos_table.php**: Migración que crea la tabla `pedidos` en la base de datos. Define las columnas y sus tipos de datos, así como las restricciones necesarias.

- **database/seeders/PedidoSeeder.php**: Seeder que pobla la tabla `pedidos` con datos iniciales. Utiliza la fábrica para crear varios registros de pedidos.

- **routes/api.php**: Archivo que define las rutas de la API para el módulo de pedidos. Asocia las rutas a los métodos del `PedidoController` para manejar las operaciones CRUD.

- **tests/Feature/PedidoTest.php**: Contiene pruebas automatizadas para el módulo de pedidos. Verifica la creación, actualización, eliminación y recuperación de pedidos, asegurando que las respuestas y el estado de la base de datos sean correctos.

## Instalación

1. Clona el repositorio en tu máquina local.
2. Ejecuta `composer install` para instalar las dependencias del proyecto.
3. Configura tu archivo `.env` con los detalles de la base de datos.
4. Ejecuta las migraciones con `php artisan migrate`.
5. (Opcional) Ejecuta el seeder con `php artisan db:seed` para poblar la base de datos con datos iniciales.

## Uso

Puedes interactuar con el módulo de pedidos a través de la API. Las rutas están definidas en `routes/api.php`. Asegúrate de utilizar herramientas como Postman o cURL para realizar las solicitudes adecuadas.

## Pruebas

Las pruebas automatizadas se encuentran en `tests/Feature/PedidoTest.php`. Puedes ejecutarlas utilizando el comando `php artisan test` para asegurarte de que todas las funcionalidades del módulo de pedidos funcionan correctamente.