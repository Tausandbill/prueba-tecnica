<h2>Prueba Tecnica</h2>
<p><strong>Nombre: Andres Villamil</strong></p>
<p>La prueba fue desarrollada con Laravel 8.33.1, Bootstrap 4 y el Web Service JSONPlaceholder</p>
<p>Se inicio el desarrollo con una pantalla para poder ver un listado de los usuarios y cuantos ToDo´s estaban estado completado, esta se genera al hacer una <code>get</code> request a JSONPlaceholder. Se puede acceder a los ToDo´s de cada usuario dando click sobre el usuario. Esto lleva a una pantalla donde se muestran las actividades que le pertencen al usuario seleccionado. En esta pantalla hay 4 opciones.</p>

<p>La primera añadir un nuevo ToDo´dando click en "Añadir+" esto lleva a una pantalla donde se debe escribir el titulo el nuevo ToDo. Esto genera una <code>post</code> request a JSONPlaceholder que se ejecuta desde el <code>TodosController</code> en el metodo <code>store</code></p>

<p>La segunda es "Completar", esto genera una <code>put</code> request a JSONPlaceholder para actualizar el campo "completed" de false a true en el ToDo que se debe actualizar. Esta request se ejecuta desde el <code>TodosController</code> en el metodo <code>update</code>.</p>

<p>La tercera es "Editar", esto habre una pagina para cambiar el titulo de un ToDo. Esto genera una <code>put</code> request a JSONPlaceholder para actualizar el campo "title". Esta request se ejecuta desde el <code>TodosController</code> en el metodo <code>update</code>.</p>

<p>La ultima es "Eliminar", esto genera una <code>delete</code> request a JSONPlaceholder para eliminar el ToDo seleccionado. Esta request se ejecuta desde el <code>TodosController</code> en el metodo <code style="color:lightred">destroy</code>.</p>


