<?php
require_once '../../main.php';

if($user != null){

    if($user->tipo_usuario == TipoUsuario::Admin){

        if(
            isset($_GET['idproducto'])
        ) {
                
            $products = Producto::getAll("*", "WHERE id_producto = ".intval($_GET['idproducto']));
            if(count($products) > 0){

                $products[0]->delete();
                header("Location: ".URL."/invent.php?". ErrorMessage::getSuccessLabel("Producto eliminado!") );

            } else {
                header("Location: ".URL."/invent.php?". ErrorMessage::getErrorLabel("Producto no valido!") );
            }
        
        } else {
            header("Location: ".URL."/invent.php?". ErrorMessage::getErrorLabel("Producto no valido!") );
        }

    } else {
        header("Location: ".URL."/index.php");
    }

} else {
    header("Location: ".URL."/index.php");
}


