<?php

require_once '../../main.php';

if($user != null){

    if(isset($_GET['idproducto'])){

        $cartProducts = CarritoItem::getAll("WHERE id_carrito_carritoitem = ". $carrito->getId() ." AND id_producto_carritoitem = ".intval($_GET['idproducto']));
        if(count($cartProducts) > 0){
            $item = $cartProducts[0];
            $item->delete();
            header("Location: ".URL."/shopping.php?". ErrorMessage::getSuccessLabel("Producto eliminado!"));
        } else {
            header("Location: ".URL."/shopping.php?". ErrorMessage::getErrorLabel("El producto no esta en el carrito!"));
        }


    } else {
        header("Location: ".URL."/market.php?". ErrorMessage::getErrorLabel("Producto invalido!"));
    }

} else {
    header("Location: ".URL."/login.php?". ErrorMessage::getErrorLabel("Inicia sesión antes de agregar elementos al carrito!"));
}