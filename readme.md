**To-Do List**

Lista de Tareas desarrollada en Laravel 5 y Vue

**Requisitos**

- Composer
- Npm
- Base de Datos

**Instalación:**

- composer install
- npm install
- Crear una base de datos
- Configurar los datos de conexión en el fichero config/database.php
- php artisan migrate para crear las tablas en la base de datos


**Uso:**

Es necesario registrarse para empezar a utilizar la aplicación, ya que cada tarea va asociado a un usuario, lo que permite el uso de la aplicación a múltiples usuarios.

Una vez logrados ya podemos empezar a crear tareas, para ello debemos escribir la tarea en el cuadro de texto del formulario y pulsar sobre Enviar o presionar la tecla Enter. Podemos añadir múltiples tareas y observar cómo van apareciendo en la parte superior de la lista sin que se recargue la página.

Con cada tarea podemos hacer las siguientes opciones:

- Marcar como terminada: Para ello habrá que marcar el checkbox y se marcará y tachará la descripción de la tarea.
- Editar: Pulsando sobre el botón editar, podremos modificar el texto de la descripción, guardándola pulsando sobre el botón guardar o pulsando la tecla Enter.
- Eliminar: Eliminaremos la tarea pulsando sobre el botón de eliminar.


Además, si tenemos más de una tarea, dispondremos de los botones Terminar Todo y Eliminar Todo para poder actuar sobre todas las tareas de una sola vez.


**Mejoras:**

- He añadido la autenticación de usuario.
- No es necesario recargar la página para actualizar la información.
- He añadido el botón de Terminar Todo.



NOTA: He añadido la carpeta ./capturas con varios .png mostrando la funcionalidad.
