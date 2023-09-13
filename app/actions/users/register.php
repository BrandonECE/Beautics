<?php
require_once '../../main.php';

if(
    isset($_POST['nombre']) &&
    isset($_POST['email']) &&
    isset($_POST['passw']) &&
    isset($_POST['r_passw']) &&
    isset($_POST['telefono']) &&
    isset($_POST['direccion'])
) {

    if(
        !empty($_POST['nombre']) &&
        !empty($_POST['email']) &&
        !empty($_POST['passw']) &&
        !empty($_POST['r_passw']) &&
        !empty($_POST['telefono']) &&
        !empty($_POST['direccion'])
    ) {

        if($_POST['passw'] == $_POST['r_passw']){

            $users = Usuario::getAll("*", "WHERE email_usuario = '" . $_POST['email']."'");

            if(count($users) == 0){
    
                $newUser = new Usuario(NULL, TipoUsuario::Cliente->value, $_POST['direccion'], $_POST['nombre'], $_POST['telefono'], $_POST['email'], $_POST['passw']);
                $newUser->insert();
                $newUser = Usuario::getAll("*", "WHERE email_usuario = '" . $_POST['email']."'")[0];
                if($newUser != null){
                    $_SESSION['iduser'] = $userID;
                    header("Location: ".URL."/index.php");
                } else {
                    header("Location: ".URL."/register.php?". ErrorMessage::getErrorLabel("Hubo un error en el registro! Intenta mas tarde") );
                }
            } else {
                header("Location: ".URL."/register.php?". ErrorMessage::getErrorLabel("El email que intentas registrar ya existe!") );
            }

        } else {
            header("Location: ".URL."/register.php?". ErrorMessage::getErrorLabel("Las contraseñas no coinciden!") );
        }

    } else {
        header("Location: ".URL."/register.php?". ErrorMessage::getErrorLabel("Llena todos los campos!") );
    }

} else {
    header("Location: ".URL."/register.php?". ErrorMessage::getErrorLabel("Llena todos los campos!") );
}