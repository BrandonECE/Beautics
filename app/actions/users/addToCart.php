<?php

require_once '../../main.php';

if($user != null){

    if(isset($_GET['idproducto'])){

        $productos = Producto::getAll("*", "WHERE id_producto = ".intval($_GET['idproducto']));

        if(count($productos) > 0){

            $carritoitem = new CarritoItem(NULL, $carrito->getId(), $productos[0]->getId(), $productos[0]->precio_producto);
            $carritoitem->insert();
            header("Location: ".URL."/product.php?id=".$productos[0]->getId());

        } else {
            header("Location: ".URL."/market.php?". ErrorMessage::getErrorLabel("Producto no existe!"));
        }

    } else {
        header("Location: ".URL."/market.php?". ErrorMessage::getErrorLabel("Producto invalido!"));
    }

} else {
    header("Location: ".URL."/login.php?". ErrorMessage::getErrorLabel("Inicia sesión antes de agregar elementos al carrito!"));
}