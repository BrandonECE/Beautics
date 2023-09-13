<?php

enum TipoUsuario: String {
    case Cliente = "Cliente";
    case Admin = "Admin";

    static function getType($name){

        $name = strtolower($name);

        switch($name){
            case "cliente":
                return TipoUsuario::Cliente;
            case "admin":
                return TipoUsuario::Admin;
            default:
                return null;
        }

    }

}