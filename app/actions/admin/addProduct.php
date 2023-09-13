<?php

require_once '../../main.php';

if(
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
        !empty($_POST['stock']) &&
        !empty($_POST['precio']) &&
        !empty($_POST['id_categoria']) &&
        !empty($_POST['imagen']) &&
        !empty($_POST['marca'])
    ) {

        $categoria = Categoria::getAll("*", "WHERE id_categoria = " . $_POST['id_categoria']);
        if(count($categoria) > 0){

            $newProduct = new Producto(NULL, $_POST['nombre'], $_POST['descripcion'], $_POST['stock'], $_POST['precio'], $_POST['id_categoria'], $_POST['imagen'], $_POST['marca']);
            $newProduct->insert();
            header("Location: ".URL."/admin/inventario.php?". ErrorMessage::getSuccessLabel("La categoria no existe!") );
        } else {
            header("Location: ".URL."/admin/inventario.php?". ErrorMessage::getErrorLabel("La categoria no existe!") );
        }

    } else {
        header("Location: ".URL."/admin/inventario.php?". ErrorMessage::getErrorLabel("Llena todos los campos!") );
    }

} else {
    header("Location: ".URL."/admin/inventario.php?". ErrorMessage::getErrorLabel("Llena todos los campos!") );
}