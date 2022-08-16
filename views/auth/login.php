<h1 class="nombre-pagina">Login</h1>
<p class="descripcion-pagina">Inicia sesion con tus datos! :)</p>

<?php 
include_once __DIR__ . "/../templates/alertas.php"
?> 

<form class="formulario" method="POST" action="/">
    <div class="campo">
        <label for="email">Email:</label>
        <input
        type="email"
        id="email"
        placeholder="Coloque su email!"
        name="email"
        />
    </div>

    <div class="campo">
        <label for="password">Password:</label>
        <input
        type="password"
        id="password"
        placeholder="Coloque su contraseña!"
        name="password"
        />
    </div>

    <input type="submit" class="boton" value="Iniciar Sesion">
</form>

<div class="acciones">
    <a href='/registrar'>¿Aún no tienes  una cuenta? Unete a nosotros!, crea una cuenta.</a>
    <a href="/forgot">¿Olvidaste tu password?</a>
</div>