<h1 class="nombre-pagina">Panel de administracion</h1>

<?php
include_once __DIR__ . '/../templates/barra.php';
?>


<h2>Buscar Pedidos</h2>
<div class="busqueda">
    <form class="formulario">
        <div class="campo">
            <label for="fecha">Fecha: </label>
            <input type="date"
             id="fecha" 
             name="fecha"
             value="<?php echo $fecha; ?>" 
             />
        </div>
    </form>
</div>

<?php
    if(count($pedidos)===0){
        echo "<h2>No hay pedidos para esta fecha</h2>";
    }
?>

<div class="pedidos-admin">
    <ul class="pedidos">
        <?php
        $idPedido = 0;
        foreach ($pedidos as $key => $pedido) {
            if($idPedido !== $pedido->id){
                $total = 0;

       
                ?>
                <li>
                <p>ID: <span><?php echo $pedido->id;?></span></p>
                <p>Hora: <span><?php echo $pedido->hora;?></span></p>
                <p>Cliente: <span><?php echo $pedido->cliente;?></span></p>
                <p>Email: <span><?php echo $pedido->email;?></span></p>
                <p>Telefono: <span><?php echo $pedido->telefono;?></span></p>

                <h3>Pedidos</h3>

                <?php 
                $idPedido = $pedido->id;
            }//Fin de if 
            $total += $pedido->precio;
            ?>   
                <p class="pedido"><?php echo $pedido->producto . " " . $pedido->precio; ?></p>
                <?php 
                $actual = $pedido-> id;
                $proximo = $pedidos[$key + 1]->id ?? 0;

                if (esUltimo($actual, $proximo)) { ?>
                    <p class="total">Total:<span>$ <?php echo $total; ?></span></p>


                    <form action="/api/eliminar" method="POST">
                        <input type="hidden" name="id" value="<?php echo $pedido->id; ?>">
                        <input type="submit" class="boton-eliminar" value="Eliminar">
                    </form>


                    <?php }
         } //Fin de for each?>
    </ul>
</div>

<?php
$script = "<script src='build/js/buscador.js'></script>"
?>