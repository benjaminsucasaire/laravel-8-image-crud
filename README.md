#resolver el problema del paginador
#entrar al archivo
#ctrl+p
#y buscar
AppServiceProvider.php

#añadir esa linea en la parte superior debajo del primer use
use Illuminate\Pagination\Paginator;

#añadir a la funcion boot
Paginator::useBootstrap();

https://www.youtube.com/watch?v=XOdT5j94jBk&ab_channel=LearnToCode-%D8%A7%D9%84%D8%AF%D8%A7%D8%B1%D8%AC%D8%A9%D8%A7%D9%84%D9%85%D8%BA%D8%B1%D8%A8%D9%8A%D8%A9


#iniciar en servidor el servidor
php artisan serve

----------------
si tengo problemas con la ruta de imagenes 
elimino la carpeta storage, la cual guarda la ruta relativa

C:\xampp\htdocs\laravel-8-image-crud\public\storage


---- y despues ejecuto en el terminal el comando siguiente, el cual creara los enlaces simbolicos
php artisan storage:link



--------------------
#iniciar en servidor el servidor

#eliminamos la key que biene por defecto "APP_KEY=base64:xHs1g18ZxhT9vt1JMNti7dX81vPIS0A4VIXuW1o+5/I="
creamos nueva keys

php artisan key:generate


#lee todas las dependencias
composer install

#migra la base de datos, que ya tiene que estar creada
php artisan migrate

#actualizamos los links sibolicos
php artisan storage:link

#ejecutamos el servidor 
php artisan serve