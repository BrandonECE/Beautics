<?php

require_once '../../main.php';

if($user != null){

    if($carrito->totalProducts() > 0){

        $products = $carrito->getProducts();
        $stockSuficiente = true;
        foreach($products as $product){
            if($product->cantidad > $product->stock_producto){
                $stockSuficiente = false;
                header("Location: ".URL."/shopping.php?". ErrorMessage::getErrorLabel("El producto \"". $product->nombre_producto ."\" solo tiene ". $product->stock_producto ." unidades disponibles!"));
            }
        }

        if($stockSuficiente){

            foreach($products as $productSQL){
                $product = Producto::getAll("*", "WHERE id_producto = ".$productSQL->id_producto)[0];
                $product->stock_producto -= $productSQL->cantidad;
                $product->save();
            }
            $venta = new Venta(NULL, $user->getId(), $carrito->getId(), NULL);
            $carrito->estado = EstadoCarrito::Pagado;
            $carrito->save();
            $venta->insert();

            $ventas = Venta::getAll("WHERE id_carrito = " . $carrito->getId());
            if(count($ventas) > 0){

                $ventaID = $ventas[0]->getId();
                header("Location: ".URL."/ticket.php?id_venta=".$ventaID."&id_producto=".$products[0]->id_producto);

            } else {
                header("Location: ".URL."/shopping.php?". ErrorMessage::getErrorLabel("Ocurrio un error extraño!"));
            }

            
        }

    } else {
        header("Location: ".URL."/shopping.php?". ErrorMessage::getErrorLabel("No tienes nada para comprar!"));
    }

} else {
    header("Location: ".URL."/login.php?". ErrorMessage::getErrorLabel("Inicia sesión antes de realizar una compra!"));
}