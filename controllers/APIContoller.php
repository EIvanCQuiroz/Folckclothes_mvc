<?php 


namespace Controllers;

use Model\Pedido;
use Model\Producto;
use Model\PedidoProducto;

class APIController{
    public static function index(){
        $productos = Producto::all();
        echo json_encode($productos);
    }

    public function guardar()
    {
        //almacena el pedido y devuelve el id
        $pedido = new Pedido($_POST);
        $resultado = $pedido->guardar();

        $id = $resultado['id'];

        //almacena el pedido y el producto

        $idProductos = explode(",", $_POST['productos'] );

        foreach ($idProductos as $idProducto) {
            $args = [
                'pedidoId' => $id,
                'productoId' => $idProducto 
            ];
            $pedidoProducto = new PedidoProducto($args);
            $pedidoProducto-> guardar();
        }

        // //retorna una respuesta
        // $respuesta  = [
        //     'resultado' => $resultado
        // ];
        echo json_encode(['resultado' => $resultado]);
    }

    public static function eliminar(){
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];

            $pedido = Pedido::find($id);
            $pedido->eliminar();
            header ('Location:' . $_SERVER['HTTP_REFERER']);
            
        }
    }
}



?>