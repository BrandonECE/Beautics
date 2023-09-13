<?php

$user = null;
$carrito = null;
if(isset($_SESSION['iduser'])){

    if(!empty($_SESSION['iduser'])){

        $users = Usuario::getAll("*", "WHERE id_usuario = " . $_SESSION['iduser']);
        if(count($users) > 0){
            $user = $users[0];
            $carrito = Carrito::getActualCarrito($user->getId());
        }

    }

}