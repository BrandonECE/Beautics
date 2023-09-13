<?php

enum EstadoCarrito: String {
    case Pagado = "Pagado";
    case Actual = "Actual";

    static function getType($name){

        $name = strtolower($name);

        switch($name){
            case "pagado":
                return EstadoCarrito::Pagado;
            case "actual":
                return EstadoCarrito::Actual;
            default:
                return null;
        }

    }

}