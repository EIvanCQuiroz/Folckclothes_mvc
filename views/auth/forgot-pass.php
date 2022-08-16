<h1 class="nombre-pagina">Olvide mi password</h1>
<p class="descripcion-pagina">Restablece tu password escribiendo tu email a continuación</p>

<?php 
include_once __DIR__ . "/../templates/alertas.php"
?> 

<form class="formulario" action="/forgot" method="POST">
    <div class="campo">
        <label for="email">Email:</label>
        <input
        type="email"
        id="email"
        name="email"
        placeholder="Coloca tu email"
        />
    </div>

    <input type="submit" class="boton" value="Enviar Intrucciones">
</form>

<div class="acciones">
    <a href='/'>¿Te acordaste de tu password?, Inicia sesion </a>
    <a href="/registrar">¿Aún no tienes una cuenta?, Unete con nosotros!</a>
</div>