<?php

namespace Model;

class PedidoProducto extends ActiveRecord{
    protected static $tabla = 'pedidosProductos';
    protected static $columnasDB = ['id', 'pedidoId', 'productoId'];

    public $id;
    public $pedidoId;
    public $productoId;

    public function __construct($args = [])
    {
        $this-> id = $args ['id'] ?? null;
        $this-> pedidoId = $args ['pedidoId'] ?? '';
        $this-> productoId = $args ['productoId'] ?? '';

        

    }

}