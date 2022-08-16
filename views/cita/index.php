<h1 class="nombre-pagina">Bienvenido a Folck Clothes</h1>
<p class="descripcion-pagina">Elige los productos que deseas adquirir de nuestra nueva seleccion</p>

<?php
include_once __DIR__ . '/../templates/barra.php';
?>

<div id="app">
    <nav class="tabs">
        <button class="actual" type="button" data-paso="1">Productos</button>
        <button type="button" data-paso="2">Informacion pedido</button>
        <button type="button" data-paso="3">Resumen</button>
    </nav>

    <div id="paso-1" class="seccion">
        <h2>Productos</h2>
        <p class="text-center">Selecciona los productos que deseas adquirir</p>
        <div id="productos" class="listado-productos"></div>
    </div>
    <div id="paso-2" class="seccion">
        <h2>Coloca tus datos para la entrega de tu procuto</h2>
        <p class="text-center">Coloca tus datos y fecha de la entrega de tu producto</p>

        <form class="formulario">
            <div class="campo">
                <label for="nombre">Nombre:</label>
                <input id="nombre" type="text" placeholder="Aqui va tu nombre" value="<?php echo $nombre; ?>" disabled />
            </div>

            <div class="campo">
                <label for="fecha">Fecha:</label>
                <input id="fecha" type="date" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" />
            </div>

            <div class="campo">
                <label for="hora">Hora:</label>
                <input id="hora" type="time" />
            </div>
            <input type="hidden" id="id" value="<?php echo $id; ?>">
        </form>
    </div>
    <div id="paso-3" class="seccion contenido-resumen">
        <h2>Resumen de tu pedido</h2>
        <p class="text-center">Verifica la informacion que proporcionaste para tu pedido</p>
    </div>

    <div class="paginacion">
        <button id="anterior" class="boton">&laquo; Anterior</button>

        <button id="siguiente" class="boton">Siguiente &raquo;</button>
    </div>
</div>

<?php
    $script = "
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script src='build/js/app.js'></script>
    ";
?>