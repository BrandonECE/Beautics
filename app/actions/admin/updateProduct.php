<?php
require_once '../../main.php';

if($user != null){

    if($user->tipo_usuario == TipoUsuario::Admin){

        if(
            isset($_POST['idproducto']) &&
            isset($_POST['nombre']) &&
            isset($_POST['descripcion']) &&
            isset($_POST['stock']) &&
            isset($_POST['precio']) &&
            isset($_POST['id_categoria']) &&
            isset($_POST['imagen']) &&
            isset($_POST['marca'])
        ) {
        
            if(
                !empty($_POST['nombre']) &&
                !empty($_POST['descripcion']) &&
                !empty($_POST['precio']) &&
                !empty($_POST['id_categoria']) &&
                !empty($_POST['imagen']) &&
                !empty($_POST['marca'])
            ) {
                
                $categoria = Categoria::getAll("*", "WHERE id_categoria = " . $_POST['id_categoria']);
                if(count($categoria) > 0){
                    
                    $products = Producto::getAll("*", "WHERE id_producto = ". intval($_POST['idproducto']));
                    if(count($products) > 0){
                        $product = new Producto($products[0]->getId(), $_POST['nombre'], $_POST['descripcion'], $_POST['stock'], $_POST['precio'], $_POST['id_categoria'], $_POST['imagen'], $_POST['marca']);
                        $product->save();
                        header("Location: ".URL."/inventoryedit.php?idproducto=".$products[0]->getId()."&". ErrorMessage::getSuccessLabel("Producto actualizado con exito!") );
                    } else {
                        $newProduct = new Producto(NULL, $_POST['nombre'], $_POST['descripcion'], $_POST['stock'], $_POST['precio'], $_POST['id_categoria'], $_POST['imagen'], $_POST['marca']);
                        $newProduct->insert();
                        header("Location: ".URL."/invent.php?". ErrorMessage::getSuccessLabel("Producto agregado con exito!") );
                    }

                    
                } else {
                    header("Location: ".URL."/invent.php?". ErrorMessage::getErrorLabel("La categoria no existe!") );
                }
        
            } else {
                header("Location: ".URL."/invent.php?". ErrorMessage::getErrorLabel("Llena todos los campos!") );
            }
        
        } else {
            header("Location: ".URL."/invent.php?". ErrorMessage::getErrorLabel("Llena todos los campos!") );
        }

    } else {
        header("Location: ".URL."/index.php");
    }

} else {
    header("Location: ".URL."/index.php");
}


