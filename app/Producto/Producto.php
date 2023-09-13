<?php

class Producto extends ADBModel {

    public function __construct(
        private $id_producto,
        public $nombre_producto,
        public $descripcion_producto,
        public $stock_producto,
        public $precio_producto,
        public $id_categoria,
        public $imagen,
        public $marca_producto
    ){}

    public function insert()
    {
        DatabaseConn::getInstance()->runQuery(" INSERT INTO productos (nombre_producto, descripcion_producto, stock_producto, precio_producto, id_categoria, imagen, marca_producto) VALUES ( ?, ?, ?, ?, ?, ?, ? ) ", [
            $this->nombre_producto,
            $this->descripcion_producto,
            $this->stock_producto,
            $this->precio_producto,
            $this->id_categoria,
            $this->imagen,
            $this->marca_producto
        ]);
    }

    public function save()
    {
        DatabaseConn::getInstance()->runQuery(" UPDATE productos SET nombre_producto = ?, descripcion_producto = ?, stock_producto = ?, precio_producto = ?, id_categoria = ?, imagen = ?, marca_producto = ? WHERE id_producto = ? ", [
            $this->nombre_producto,
            $this->descripcion_producto,
            $this->stock_producto,
            $this->precio_producto,
            $this->id_categoria,
            $this->imagen,
            $this->marca_producto,
            $this->getId()
        ]);
    }

    public function delete()
    {
        DatabaseConn::getInstance()->runQuery("DELETE FROM productos WHERE id_producto = ?", [$this->getId()]);
    }

    static function getAll($atributes = "*", $conditions=""){
        $productSQL = ADBModel::__getAllRows($atributes, $conditions, "productos");
        $products = [];
        foreach($productSQL as $product){
            $products[] = new Producto($product->id_producto, $product->nombre_producto, $product->descripcion_producto, $product->stock_producto, $product->precio_producto, $product->id_categoria, $product->imagen, $product->marca_producto);
        }

        return $products;
    }

    public function getId(){
        return $this->id_producto;
    }

}