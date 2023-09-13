<?php
require_once '../../main.php';

if(
    isset($_POST['email']) &&
    isset($_POST['passw'])
) {

    if(
        !empty($_POST['email']) &&
        !empty($_POST['passw'])
    ) {

        $users = Usuario::getAll("*", "WHERE email_usuario = '" . $_POST['email']."'");

        if(count($users) > 0){

            $possibleUser = $users[0];
            if($possibleUser->checkPassword($_POST['passw'])){

                $_SESSION['iduser'] = $possibleUser->getId();

                header("Location: ".URL."/index.php?". ErrorMessage::getSuccessLabel("Bienvenido, ". $possibleUser->getId() ."!") );

            } else {
                header("Location: ".URL."/login.php?". ErrorMessage::getErrorLabel("Usuario o contraseña incorrectos!") );
            }

        } else {
            header("Location: ".URL."/login.php?". ErrorMessage::getErrorLabel("Usuario o contraseña incorrectos!") );
        }

    } else {
        header("Location: ".URL."/login.php?". ErrorMessage::getErrorLabel("Llena todos los campos!") );
    }

} else {
    header("Location: ".URL."/login.php?". ErrorMessage::getErrorLabel("Llena todos los campos!") );
}