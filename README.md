## Actividdad 2 - Seguridad Web - Logeo y Registro

Este proyecto tiene como objetivo desarrollar una API basada en Laravel para la gestión de usuarios y autenticación, todo enfocado en garantizar medidas de seguridad adecuadas en el contexto a nivel de backend.

A continuación, describo los pasos necesarios para poner en marcha el proyecto, desde la instalación hasta la ejecución de peticiones mediante JSON.

# Instalación del Proyecto

## 1. Clonar el repositorio

El repositorio es público el cual podría acceder mediante la siguiente URL.

* https://github.com/JhonOrtiz0406/Actividad_2_Seguridad_Web.git

## 2. Instalar dependencias con Composer

Instalamos las dependencias necesarias ejecutando el siguiente comando:

> composer install 

**NOTA**: Es fundamental si no tiene configurado su CMD con consola BASH, le recomiendo inicializarla y ejecutarlo.

## 3. Configuración del archivo .env

Como al momento de subir el proyecto genera problemas con que cargue el .env, para ello, coloco una copia con nombre 

>**.env.example**

ese archivo, renombralo por **.env**

#### Se deja las variables de entorno usadas en la elaboracion del proyecto para que no genere inconvenientes al momento de realizar sus respectivas pruebas

## 4. Ejecutar las migraciones

Las migraciones son esenciales para crear las tablas necesarias en la base de datos. Ejecuta el siguiente comando para aplicar las migraciones:

>php artisan migrate

*NOTA: Nuevamente en consola bash*

## 5. Ejecutar Seeders

Para agregar datos de prueba, como el usuario de ejemplo, ejecuta el seeder que configuraste previamente 

>php artisan db:seed

Esto creará un usuario con las siguientes credenciales:

* **Email**: seguridadweb@campusviu.es
* **Contraseña**: S3gur1d4d?W3b

## 6. Iniciar el servidor de desarrollo

Ahora, podemos iniciar el servidor local de desarrollo con:
>php artisan serve

El proyecto estará disponible en http://localhost:8000.

#### **NOTA:** Lo anterior se usaria para ejecutarse en local y no contenerizado

## 7. Realizar Peticiones JSON a la API

Con el servidor corriendo, podemos hacer peticiones POST a las rutas **/api/register** y **/api/login** utilizando herramientas como Postman.

### Ejemplo de Petición POST para Registro

* URL: http://localhost:8000/api/register
* Metodo: POST
* Request **JSON** (Request con Datos de Prueba): 

>{"name": "Jhon","lastname": "Orti","dni": "10029000000","email": "seguridadweb@campusviu.es","password": "S3gur1d4d?W3b","password_confirmation": "S3gur1d4d?W3b","phone": "+3218433333","country": "Colombia","about": "Soy un desarrollador backend"}

### Ejemplo de Petición POST para Login

* URL: http://localhost:8000/api/login
* Metodo: POST
* Request **JSON** (Request con Datos de Prueba):

>{"email": "seguridadweb@campusviu.es","password": "S3gur1d4d?W3b"}

## Comandos Útiles (Local sin contenerizar)

### Limpiar Caché:
* >php artisan cache:clear
* >php artisan config:clear

### Refrescar Migraciones (Elimina y recrea las tablas):
* >php artisan migrate:fresh

### LEjecutar Seeders nuevamente:
* >php artisan db:seed
