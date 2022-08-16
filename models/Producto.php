<?php

namespace Model;

class Producto extends ActiveRecord{
    //Conexion Bd
    protected static $tabla = 'productos';
    protected static $columnasDB = ['id', 'nombre', 'precio'];

    public $id;
    public $nombre;
    public $precio;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->precio = $args['precio'] ?? '';
    }

    public function validar()
    {
        if(!$this->nombre){
            self::$alertas['error'][]='El nombre del producto es obligarotio';
        }

        if(!$this->precio){
            self::$alertas['error'][]='El precio del producto es obligarotio';
        }

        if(is_numeric(!$this->precio)){
            self::$alertas['error'][]='El precio no es valido';
        }

        return self::$alertas;
    }

}

?>