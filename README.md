# TP3-Laravel-Blog
Un blog de instrumentos donde se pueden subir y visualizar posts. También cuenta con un sistema de resgistro y logueo de usuarios.

### Grupo N°21
* Scalia Damaris Lucia [FAI-4235]
* Carrasco Nadia Rocio [FAI-4236]
* Beroiza Santiago [FAI-2594]

### Herramientas necesarias

* Laravel
* Xampp (Apache y MySQL)
* Composer
* PHP (v8.2 o mayor)

### Cómo usar la App

1- Clonar el repositorio 
```
git clone https://github.com/BeroizaSantiago/Tp3-Laravel-Blog.git
```

2- Correr el siguiente comando en consola para moverse a la carpeta correcta
```
cd myblog
```

3- Correr el siguiente comando en consola
```
npm install
```

4- Correr el siguiente comando en consola
```
composer install
```

5- Cambiar el nombre del archivo '.env.example' a '.env'

6- Generar una APP_KEY de Laravel con el siguiente comando
```
php artisan key:generate
```
* Una vez generada la APP_KEY, esta se mostrará en el archivo '.env'.

7- Correr el siguiente comando en consola para crear las tablas en la base de datos
```
php artisan:migrate
```

8- Crear el archivo donde se guardarán las imágenes que se suban al proyecto
```
php artisan storage:link
```
* En caso de no contar con los permisos necesarios, correr el siguiente comando en consola

    PowerShell --> Ejecutar como administrador, moverse a la carpeta del proyecyo y generar el link
    ```
    cd C:\path\to\your\project
    php artisan storage:link
    ```

    Linux
    ```
    sudo chmod -R 775 storage
    sudo chmod -R 775 bootstrap/cache
    php artisan storage:link
    ```

9- Abrir Xampp e iniciar Apache y MySQL

10- Iniciar el servidor
```
composer run dev
```

11- Abrir el siguiente enlace para visualizar la página
```
http://127.0.0.1:8000
