##Password Reset

* Configuramos *mailtrap.io* para nuestro entorno de desarrollo y poder enviar e-mails desde nuestra aplicacion, lo que debemos hacer es registrarnos en [mailtrap.io](https://mailtrap.io).

	La cuenta gratuita nos ofrece una bandeja de entrada y con un máximo de 50 mensajes, que pueden ser suficiente para poder probar el envío de notificaciones de nuestra aplicación.
	
	Al ingresar al Demo inbox podemos ver las credenciales SMTP con las cuales integraremos la bandeja con nuestra aplicación, igualmente podemos usar la opción Integrations buscando Laravel, donde nos mostrará algo parecido a esto:
	![](https://github.com/Alver23/ecom/blob/master/images/mailtrap.png "Mailtrap.io")
	
	Estos datos dados por Mailtrap son los que debemos agregar en el archivo .env de la aplicación, ya que el archivo de configuración de correos de Laravel */config/mail.php* está estructurado para que las credenciales no queden expuestas en el repositorio del código sino que se guarden el archivo .env, además, permitiendo así que se pueda cambiar fácilmente de un servicio a otro, pues es común que tengamos servicios diferentes en el entorno de desarrollo y el entorno de producción.
    
    Por tanto, en el archivo *.env* de la aplicación sustituimos lo que tiene por las credenciales de la bandeja de Mailtrap
    
    ```
    MAIL_HOST=mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=username
    MAIL_PASSWORD=password
    MAIL_ENCRYPTION=tls
    ```
    
    ya con esto configuramos la aplicación de Laravel con Mailtrap.
    
    ##Cómo personalizar el correo de recuperación de contraseñas en Laravel 5.3 y 5.4
    
    Laravel trae por defecto un sistema de autenticación de usuarios que puedes agregar a tu aplicación con el  comando
    ``` php artisan make:auth ```.  Este sistema incluye la funcionalidad para la recuperación de contraseña de un usuario, que envía un email con el mensaje y el enlace para que el usuario pueda recuperarla, sin embargo, este correo es genérico y en inglés, por lo que si tu aplicación está en español o quieres un mensaje más descriptivo necesitarás personalizar esta funcionalidad.  Con este tutorial aprenderás cómo crear un mensaje para el correo de recuperación de contraseñas adaptado al contexto de tu aplicación:
    
    Cuando un usuario de nuestro sistema hace clic en la opción “¿Olvide mi contraseña?” o “Forgot Your Password?” y escribe en su dirección de correo, a su bandeja de entrada llega de manera predeterminada algo como lo siguiente:
    
    ![](https://github.com/Alver23/ecom/blob/master/images/password-reset.png "Password Reset")
    
    ##Sobrescribe el envío del email
    
    Lo primero que debes saber es que el email para recuperar la contraseña se envía como una notificación por medio del sistema de notificaciones de Laravel.  Esto está configurado a través del trait *Illuminate\Auth\Passwords\CanResetPassword en el* modelo User, el cual contiene dos métodos:
    * *getEmailForPasswordReset* que recupera el email del usuario a donde se enviará la notificación.  Necesitarás modificar este método si el atributo de tu modelo User donde se encuentra la dirección de correo del usuario no se llama email.
     * *sendPasswordResetNotification* con el cual se envía la notificación, usando la clase encargada de construir el email a enviar. Debes cambiar la notificación por la personalizada por ti.
     
     Por tanto, para personalizar el email debemos sobrescribir este trait, pero no lo podemos hacer directamente pues es un archivo que se encuentra en el directorio vendor. Para ello, tenemos dos opciones: crear en nuestro directorio app un nuevo trait que use el modelo User o agregar directamente el o los métodos en dicho modelo. ¿Cuál opción escoger? Depende de ti.
     
     Tomando la segunda opción puedes entonces agregar el método sendPasswordResetNotification a tu modelo User y usar una notificación creada por ti, en vez de la predeterminada de Laravel:
     
     ```php
     <?php

     public function sendPasswordResetNotification($token)
	 {
		$this->notify(new MyResetPassword($token));
	 }
     ```
    
	##Crea la nueva notificación
	
	En Laravel, una notificación está representada por una clase que se encuentra en *App\Notifications* que sirven para notificar al usuario acerca de algo que ocurre en la aplicación, en nuestro caso, notificar al usuario por email de la solicitud de recuperación de contraseña. Para crearla ejecutamos:
	```	
	php artisan make:notification MyResetPassword
	```
	
	De esta clase creada en el directorio *App\Notificacions* ahora la extendemos de la clase *Illuminate\Auth\Notifications\ResetPassword* y como nos interesa modificar solo el método toMail, eliminamos los demás, pues quedarían igual como en la clase padre, por tanto, nuestra clase notificación estará de la siguiente manera:
	
	```php
	<?php
    
    namespace App\Notifications;
    
    use Illuminate\Auth\Notifications\ResetPassword;
    use Illuminate\Notifications\Messages\MailMessage;
    
    class MyResetPassword extends ResetPassword
    {
        public function toMail($notifiable)
        {
            return (new MailMessage)
                ->line('You are receiving this  because we received a password reset request for your account.')
                ->action('Reset Password', route('password.reset', $this->token))
                ->line('If you did not request a password reset, no further action is required.');
        }
    }
    ```
    
    #Personaliza la notificación vía Mail para Laravel 5.4
    
    En Laravel 5.4 tu método toMail puede usar los métodos disponibles como subject, greeting, line, action, salutation para escribir el mensaje de la siguiente manera:
    
    ```php
    <?php
    
		public function toMail($notifiable)
		{
			return (new MailMessage)
				->subject('Recuperar contraseña')
				->greeting('Hola')
				->line('Estás recibiendo este correo porque hiciste una solicitud de recuperación de contraseña para tu cuenta.')
				->action('Recuperar contraseña', route('password.reset', $this->token))
				->line('Si no realizaste esta solicitud, no se requiere realizar ninguna otra acción.')
				->salutation('Saludos, '. config('app.name'));
		}
    ?>
    ```
    
    Con esto ya tendríamos el email de recuperación de contraseña traducido, manteniendo la estructura del email que viene por defecto, pero si necesitas personalizar la plantilla del mensaje tendrás que publicarla ejecutando:
    
    ```
    php artisan vendor:publish --tag=laravel-notifications
    ```
    
    Con esto se publica la plantilla *email.blade.php* en el directorio */resources/views/vendor/notifications* que permitirá modificarse según las necesidades. Esta plantilla usa  el nuevo componente Markdown de Mailable en Laravel 5.4 para crear el mensaje, solo recuerda que ésta es la plantilla usada para todas notificaciones enviadas vía email.
    
    