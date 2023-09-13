<?php

class Venta extends ADBModel {

    public function __construct(
        private $id_venta,
        public $id_usuario,
        public $id_carrito,
        public $fecha_venta
    ){}

    public function insert()
    {
        DatabaseConn::getInstance()->runQuery("INSERT INTO venta (id_usuario, id_carrito) VALUES (?, ?) ", [
            $this->id_usuario,
            $this->id_carrito
        ]);
    }

    public function save()
    {
        
    }

    public function delete()
    {
        
    }

    public function getId(){
        return $this->id_venta;
    }

    public function getCarrito(){
        $carrito = Carrito::getAll("WHERE id_carrito = ". $this->id_carrito)[0];
        return $carrito;
    }

    static function getAll($conditions = ""){
        $ventasSQL = ADBModel::__getAllRows("*", $conditions, "venta");
        $ventas = [];
        foreach($ventasSQL as $venta){
            $ventas[] = new Venta($venta->id_venta, $venta->id_usuario, $venta->id_carrito, $venta->fecha_venta);
        }

        return $ventas;
    }
}