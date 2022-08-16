<h1 class="nombre-pagina">Crea una cuenta</h1>
<p class="descripcion-pagina">Llena el siguiente formulario para crear una cuenta!</p>


<?php 
include_once __DIR__ . "/../templates/alertas.php"
 ?> 

<form class="formulario" method="POST" action='/registrar'>
    <div class="campo">
        <label for="nombre">Nombre(s):</label>
        <input type="text" 
        id="nombre" 
        name="nombre" 
        placeholder="Tus nombre(s)" 
        value="<?php echo s ($usuario->nombre); ?>"
        />
    </div>

    <div class="campo">
        <label for="apellido">Apellido(s):</label>
        <input type="text" 
        id="apellido" 
        name="apellido" 
        placeholder="Tus apellido(s)" 
        value="<?php echo s ($usuario->apellido); ?>"
        />
    </div>

    <div class="campo">
        <label for="telefono">Telefono:</label>
        <input type="tel" 
        id="telefono" 
        name="telefono" 
        placeholder="Coloque su numero celular" 
        value="<?php echo s ($usuario->telefono); ?>"
        />
    </div>

    <div class="campo">
        <label for="email">Tu email:</label>
        <input type="email" 
        id="email" 
        name="email" 
        placeholder="Coloca un email (Tuyo de preferencia)"
        value="<?php echo s ($usuario->email); ?>" 
        />
    </div>

    <div class="campo">
        <label for="apellido">Tu password:</label>
        <input type="password" 
        id="password" 
        name="password" 
        placeholder="Coloca un password" 
        />
    </div>

    <input type="submit" value="Crear cuenta" class="boton">

</form>

<div class="acciones">
    <a href='/'>¿Ya tienes una cuenta?, Inicia sesion </a>
    <a href="/forgot">¿Olvidaste tu password?</a>
</div>