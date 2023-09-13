<?php

class CarritoItem extends ADBModel {

    public function __construct(
        private $id_carritoitem,
        public $id_carrito,
        public $id_producto,
        public $precio_producto
    ){}

    public function insert()
    {
        DatabaseConn::getInstance()->runQuery("INSERT INTO carrito_item (id_carrito_carritoitem, id_producto_carritoitem, precio_producto) VALUES (?, ?, ?) ", [
            $this->id_carrito,
            $this->id_producto,
            $this->precio_producto
        ]);
    }

    public function save(){}

    public function delete()
    {
        DatabaseConn::getInstance()->runQuery("DELETE FROM carrito_item WHERE id_carritoitem = ".$this->getId());
    }

    public function getId()
    {
        return $this->id_carritoitem;
    }

    static function getAll($conditions=""){
        $itemsSQL = ADBModel::__getAllRows("*", $conditions, "carrito_item");
        $items = [];
        foreach($itemsSQL as $item){
            $items[] = new CarritoItem($item->id_carritoitem, $item->id_carrito_carritoitem, $item->id_producto_carritoitem, $item->precio_producto);
        }

        return $items;
    }

}