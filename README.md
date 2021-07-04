## Instalación
1. Selecciona un directorio en la pc para guardar el proyecto
2. Descarga el repositorio 
3. Descomprime la carpeta en el directorio
4. Accede a la carpeta descomprimida
5. Crea un nuevo archivo llamado .env en la raiz del proyecto y copia el contenido del archivo .env.example a .env archivo nuevo que creaste
6. Crea una base de datos para el proyecto
7. Modifica las siguientes variables de conexion en el archivo .env que creaste:
* DB_DATABASE=tubasededatos
* DB_USERNAME=tunombredeusuario
* DB_PASSWORD=tucontrasenia

8. Carga las dependencias del proyecto con el comando:  
```
composer install
```
```
npm install
```
9. Genera una llave para el proyecto: `php artisan key:generate`
11. Ejecuta las migraciones y seeders:  
```
php artisan migrate --seed
```

11. Ejecuta el servidor: `php artisan serve`
12. Acceder al sistema con el usuario y rol admin
```
Email:admin@admin.com
password:12345
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
