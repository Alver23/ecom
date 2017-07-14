# Documentacion sobre el proyecto

## Clase Julio 15 del 2017
* Instalamos un proyecto nuevo de laravel con el suguiente comando: 
	```
	composer create-project --prefer-dist laravel/laravel nombre_proyecto
	```

* Otorgamos los permisos a las carpeta bootstrap/cache y storage/, ejecutamos el siguiente comando:
	```
	chmod 775 bootstrap/cache -R && chmod 775 storage/ -R 
	```
	
* Configuramos nuestro archivo Homestead.yaml con el host y la ruta del directorio, ejemplo:
	```
	sites:
		- map: ecom-project.app
        to: /home/vagrant/Code/ecom/proyecto/public
	```
	
* Configuramos nuestro virtual host:
	```
	192.168.10.10 ecom-project.app
	```
	
* Reiniciamos la maquina de homestead para que tome los cambios, lo hacemos con el siguiente comando:
	```
	vagrant reload --provision
	```
* Comprobamos que podamos acceder a dicho host configurado, ingresando a [http://ecom-project.app](http://ecom-project.app) y nos debe aparecer algo así:
	![](https://github.com/Alver23/ecom/images/running.png "Servidor Corriendo")

* Configuramos el archivo .env con el driver a utilizar, base de datos y puerto, ejemplo:
	```
	APP_NAME=Laravel
	APP_ENV=local
	APP_KEY=base64:zTxfX/IPPp9+mzUj8AANXAtNxhypmDd32YzEdR5pA14=
	APP_DEBUG=true
	APP_LOG_LEVEL=debug
	APP_URL=http://localhost
	
	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=ecom-project-base
	DB_USERNAME=homestead
	DB_PASSWORD=secret
	
	BROADCAST_DRIVER=log
	CACHE_DRIVER=file
	SESSION_DRIVER=file
	QUEUE_DRIVER=sync
	
	REDIS_HOST=127.0.0.1
	REDIS_PASSWORD=null
	REDIS_PORT=6379
	
	MAIL_DRIVER=smtp
	MAIL_HOST=smtp.mailtrap.io
	MAIL_PORT=2525
	MAIL_USERNAME=null
	MAIL_PASSWORD=null
	MAIL_ENCRYPTION=null
	
	PUSHER_APP_ID=
	PUSHER_APP_KEY=
	PUSHER_APP_SECRET=
	```

* Creamos un seeder para crear un usuario de prueba, primero ejecutamos:
	```
	php artisan make:seeder UserTableSeeder
	```
* Ejecutamos las migraciones y los datos de prueba con el siguiente comando:
	```
	php artisan migrate --seed
	```