<?php

class Categoria extends ADBModel{
    
    public function __construct(
        private $id_categoria,
        public $nombre_categoria,
        public $descripcion_categoria
    ){}

    public function insert()
    {
        
    }

    public function save()
    {
        
    }

    public function delete()
    {
        
    }

    static function getAll($atributes = "*", $conditions=""){
        $categoriasSQL = ADBModel::__getAllRows($atributes, $conditions, "categoria");
        $categorias = [];
        foreach($categoriasSQL as $categoria){
            $categorias[] = new Categoria($categoria->id_categoria, $categoria->nombre_categoria, $categoria->descripcion_categoria);
        }

        return $categorias;
    }

    public function getId(){
        return $this->id_categoria;
    }

}