# Sistema de administracion Refaccionaria Costa Rica
Este fue un proyecto realizado para la materia de desarrollo de aplicaciones web, en el cual se desarrollo un sistema para gestion y administracion de una refaccionaria.

# Instalacion de programas necesarios

Para la ejecucion del proyecto vamos a necesitar instalar algunos programa para montar el servidor y ejecutarlo.

## Laragon
Entrar al siguiente link para descargar laragon [Descargar laragon](https://laragon.org/download/) al momento de estar en la pagina descargar la version FULL y proceder a instalarlo.

## Composer
Composer es un manejador de paquetes para PHP, por lo cual lo utilizaremos para realizar la instalacion de laravel y sus dependencias de desarrollo, para descargar composer dirigirse al siguiente enlace [Descargar composer](https://getcomposer.org/Composer-Setup.exe), una vez descargado realizar la instalacion respectiva.

## Node.js
Debido a que nuestro proyecto utiliza dependencias como puede ser React y laravel mix entonces vamos a necesitar tener instalado node en nuestro equipo, para descargar dirigirse al siguiente enlace [Descargar Node.js](https://nodejs.org/es/) y seleccionar la opcion que cuenta con LTS, luego de descargar proceder a instalar node.js.

## Configuracion de variables de entorno
Una vez instalado estos programas vamos a configurar algunas variables de entorno para eso vamos a necesitar que tengas la siguiente ruta.

#### Ruta php
C:\laragon\bin\php\php-7.4.19-Win32-vc15-x64

### IMPORTANTE
Verifica que esas dos rutas sean funcionales en tu explorardor ya que son necesarias para las variables de entorno.

Una vez verificado realiar los siguientes pasos en windows 10.

1. Abrir la barra de busquedas y escribir variables
2. Seleccionar "Editar las variables de entorno del sistema".
3. Se abrira una ventana, seleccionar la opcion ultima que dice variables de entorno.
4. Seleccionar la segunda opcion del primer recuadro que dice path y presionar el boton editar.
5. Se abrira una nueva ventana, agregar los rutas indicadas anteriormente la de composer y la de php.
6. Guardar todos los cambios.

## Ejecucion del proyecto
Una vez logrado la instalacion de los programas anteriores procederemos a realizar la clonacion del proyecto desde el repositorio, para eso abrir la terminal (cmd) y escribir los siguientes comandos.
```
cd C:/laragon/www
git clone https://github.com/memo24813/SistemaRefaccionaria
cd SistemaRefaccionaria
```

Una vez utilizado estos comandos notaremos que en la direccion **C:/laragon/www** se creo una nueva carpeta llamada ***SistemaRefaccionaria*** por lo cual abriremos ese proyecto con nuestro editor de texto (recomiendo utilizar visual studio code).
Una vez abierto el proyecto, vamos a buscar un archivo llamado ***.env.example*** el cual lo vamos a copiar y pegar y lo vamos a renombrar como .env, una vez realizado eso vamos a abrir el archivo y vamos a buscar la siguientes variables y declararlas de esta manera.
```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=refaccionaria
DB_USERNAME=root
DB_PASSWORD=
```

Una vez realizado esto vamos abrir laragon y vamos a ejecutar el servidor, seleccionando la opcion que dice ***iniciar todo***, una vez se inicie el apache y el MySQL vamos abrir la terminal que nos ofrece laragon a bajo a lado del boton que dice root con una carpeta.
```
mysql -u root -p
pedira contraseña dejar en blanco y <presionar enter>
create database refaccionaria;
```
Una vez realizado esto ahora volveremos a la terminal donde tenemos la direccion abierta del proyecto y vamos a escribir los siguientes comandos.
```
composer install
php artisan key:generate
php artisan migrate
php artisan storage:link
```

Una vez realizado todos esos comando nos deberia aparecer ningun error, ahora procederemos a ejecutar los siguientes comandos para las dependencias de node.

```
npm install
```

Una vez realizado esto ahora procedemos a ejecutar laravel mix de webpack.
```
npm run dev
```


Una vez terminado todos estos puntos ya podremos visualizar y utilizar el proyecto, debido a que estamos utilizando laragon desde el navegador podemos escribir [SistemaRefaccionaria.test](http://SistemaRefaccionaria.test/) y automaticamente nos mostrara el proyecto, en caso de que no lo muestre, favor de reiniciar el apache.
