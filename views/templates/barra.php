<div class="barra">
    <p>Hola: <?php echo $nombre ?? ''; ?>

    <a class="boton" href="/logout">Cerrar Sesion</a>
</div>

<?php if(isset($_SESSION['admin'])){ ?>
    <div class="barra-productos">
        <a class="boton" href="/admin">Ver citas</a>
        <a class="boton" href="/productos">Ver productos</a>
        <a class="boton" href="/productos/crear">Nuevos productos</a>
    </div>

<?php } ?>