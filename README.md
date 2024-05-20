1. Clona el repositorio de SneakerHMO:

git clone https://github.com/A19311032/TiendaOnline.git
cd sneakerhmo

2. Instala las dependencias del proyecto utilizando Composer:

composer install

3. Copia el archivo de configuración .env.example y renómbralo a .env. Luego, configura tu base de datos y otras variables de entorno en este archivo.

4. Genera una clave de aplicación:

php artisan key:generate

5. Ejecuta las migraciones para crear las tablas de la base de datos:

php artisan migrate

6. php artisan migrate

php artisan serve



Una vez que el servidor esté en funcionamiento, visita http://localhost:8000 en tu navegador para 
acceder a SneakerHMO. Desde allí, podrás navegar por los productos, agregarlos al carrito de compras,
iniciar sesión para realizar una compra y má

.
├── app/                    # Código fuente de la aplicación Laravel
├── database/               # Migraciones y semillas de la base de datos
├── resources/              # Vistas, assets y traducciones
├── routes/                 # Definición de rutas de la aplicación
├── public/                 # Archivos públicos (CSS, JS, imágenes)
└── README.md               # Documentación del proyecto
