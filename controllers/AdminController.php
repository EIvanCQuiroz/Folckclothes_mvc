<?php

namespace Controllers;

use Model\AdminPedido;
use MVC\Router;

class AdminController{
    public static function index ( Router $router){
        session_start();

        isAdmin();

        $fecha = $_GET['fecha'] ?? date('Y-m-d');;
        $fechas = explode('-', $fecha);

        if (!checkdate ($fechas[1], $fechas[2], $fechas[0])){
            header ('Location: /404');
        }
        //consulta de bd
        $consulta = "SELECT pedidos.id, pedidos.hora, CONCAT( usuarios.nombre, ' ', usuarios.apellido) as cliente, ";
        $consulta .= " usuarios.email, usuarios.telefono, productos.nombre as producto, productos.precio  ";
        $consulta .= " FROM pedidos  ";
        $consulta .= " LEFT OUTER JOIN usuarios ";
        $consulta .= " ON pedidos.usuarioId=usuarios.id  ";
        $consulta .= " LEFT OUTER JOIN pedidosProductos ";
        $consulta .= " ON pedidosProductos.pedidoId=pedidos.id ";
        $consulta .= " LEFT OUTER JOIN productos ";
        $consulta .= " ON productos.id=pedidosProductos.pedidoId ";
        $consulta .= " WHERE fecha =  '${fecha}' ";

        $pedidos = AdminPedido::SQL($consulta);

        $router->render('admin/index', [
            'nombre' => $_SESSION['nombre'],
            'pedidos' => $pedidos,
            'fecha' => $fecha
        ]);
    }
}