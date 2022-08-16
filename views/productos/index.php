<h1 class="nombre-pagina">Productos</h1>
<p class="descripcion-pagina">Administracion de Productos</p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
?>

<ul class="productos">
    <?php foreach($productos as $producto){ ?>
        <li>
            <p>Nombre: <span><?php echo $producto->nombre;?></span></p>
            <p>Precio: <span>$<?php echo $producto->precio; ?></span></p>

            <div class="acciones">
                <a class="boton" href="/productos/actualizar?id=<?php echo $producto->id;?>">Actualizar</a>

                <form action="/productos/eliminar" method="POST">
                    <input type="hidden" name="id" value="<?php echo $producto->id; ?>">

                    <input type="submit" value="Borrar" class="boton-eliminar">
                </form>
            </div>
        </li>
    <?php } ?>
</ul>