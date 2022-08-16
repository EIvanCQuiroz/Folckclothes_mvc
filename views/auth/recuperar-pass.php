<h1 class="nombre-pagina">Recuperar PASSWORD</h1>
<p class="descripcion-pagina">Coloca tu nuevo password a continuacìon</p>

<?php 
include_once __DIR__ . "/../templates/alertas.php"
?> 

<?php if ("$error") return;?>
<form class="formulario" method="POST">
    <div class="campo">
        <label for="password">Password:</label>
        <input
        type="password"
        id="password"
        name="password"
        placeholder="Coloca aqui tu nuevo password"
        />
    </div>
    <input type="submit" class="boton" value="Guardar el nuevo password">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes cuenta?, Inicia sesion</a>
    <a href="/registrar">¿Aun no tienes cuenta?, No esperes mas y unete a nosotros</a>
</div>