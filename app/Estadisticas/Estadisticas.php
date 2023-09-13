<?php

class Estadisticas {

    static function getTotalSales($group = EstadisticaGroup::Year){
        $groupby = $group->value;

        return DatabaseConn::getInstance()->runQuery("SELECT SUM(precio_producto) AS total, fecha FROM (SELECT id_carrito, fecha_venta AS fecha FROM venta) ventas, carrito_item WHERE ventas.id_carrito = carrito_item.id_carrito_carritoitem ". $groupby)[0]->total;

    }

    static function getTotalUsers($group = EstadisticaGroup::Year){
        $groupby = $group->value;

        return DatabaseConn::getInstance()->runQuery("SELECT * FROM (SELECT COUNT(*) AS total, fecha_registro AS fecha FROM usuario) usuarios ". $groupby)[0]->total;
    }

    static function getTotalProducts(){
        return DatabaseConn::getInstance()->runQuery("SELECT COUNT(*) AS total FROM productos")[0]->total;
    }

    static function getTopCategories(){
        return DatabaseConn::getInstance()->runQuery("SELECT COUNT(*) AS total_productos, nombre_categoria FROM productos, categoria WHERE productos.id_categoria = categoria.id_categoria GROUP BY productos.id_categoria ORDER BY COUNT(*) DESC LIMIT 3");
    }

}