<?php

class Carrito extends ADBModel {

    public function __construct(
        private $id_carrito,
        public $id_usuario,
        public $estado
    )
    {
        
    }

    public function insert(){
        DatabaseConn::getInstance()->runQuery("INSERT INTO carrito (id_usuario) VALUES (?) ", [
            $this->id_usuario
        ]);
    }

    public function save(){
        DatabaseConn::getInstance()->runQuery("UPDATE carrito SET estado = '" . $this->estado->value . "' WHERE id_carrito = ".$this->getId());
    }

    public function delete()
    {
        
    }

    public function getProducts(){
        $products = DatabaseConn::getInstance()->runQuery("SELECT COUNT(*) AS cantidad, carrito_item.precio_producto, id_producto, nombre_producto, descripcion_producto, stock_producto, imagen FROM carrito_item, productos WHERE carrito_item.id_carrito_carritoitem = ". $this->getId() ." AND carrito_item.id_producto_carritoitem = productos.id_producto GROUP BY id_producto,precio_producto;");
        return $products;
    }

    public function totalProducts(){
        $counterSQL = DatabaseConn::getInstance()->runQuery("SELECT COUNT(*) as total FROM carrito_item WHERE id_carrito_carritoitem = ".$this->getId());
        return $counterSQL[0]->total;
    }

    public function getTotal(){
        $totalSQL = DatabaseConn::getInstance()->runQuery("SELECT SUM(carrito_item.precio_producto) AS total FROM carrito_item, productos WHERE carrito_item.id_carrito_carritoitem = ". $this->getId() ." AND carrito_item.id_producto_carritoitem = productos.id_producto");
        return $totalSQL[0]->total;
    }

    public function getId(){
        return $this->id_carrito;
    }

    static function getAll($conditions=""){
        $carritosSQL = ADBModel::__getAllRows("*", $conditions, "carrito");
        $carritos = [];
        foreach($carritosSQL as $carrito){
            $carritos[] = new Carrito($carrito->id_carrito, $carrito->id_usuario, EstadoCarrito::getType($carrito->estado));
        }

        return $carritos;
    }

    static function getCarritos($userid){
        $carritos = Self::getAll("WHERE id_usuario = ". intval($userid));
        return $carritos;
    }

    static function getActualCarrito($userid){
        $carritos = Self::getAll("WHERE id_usuario = ". intval($userid) . " AND estado = '". EstadoCarrito::Actual->value ."'");
        if(count($carritos) > 0){
            return $carritos[0];
        } else {
            // check if user exists
            $users = Usuario::getAll("*", "WHERE id_usuario=".intval($userid));
            if(count($users) > 0){
                $carrito = new Carrito(NULL, intval($userid), EstadoCarrito::Actual);
                $carrito->insert();
                return Self::getActualCarrito($userid);
            } else {
                return null;
            }
            
        }
    }

}