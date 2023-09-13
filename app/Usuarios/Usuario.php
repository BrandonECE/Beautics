<?php

class Usuario extends ADBModel{

    public function __construct(
        private $id_usuario,
        public $tipo_usuario,
        public $direccion_usuario,
        public $nombre_usuario,
        public $telefono_usuario,
        public $email_usuario,
        private $contra_usuario
    ){}
        
    public function changePassword($last, $new){
        if(password_verify($last, $this->contra_usuario)){

            $this->contra_usuario = password_hash($new, PASSWORD_BCRYPT);
            return true;
        } else {
            return false;
        }
    }

    public function checkPassword($passw){

        return password_verify($passw, $this->contra_usuario);

    }

    public function insert()
    {
        DatabaseConn::getInstance()->runQuery(" INSERT INTO usuario (tipo_usuario, direccion_usuario, nombre_usuario, telefono_usuario, email_usuario, contra_usuario) VALUES (?, ?, ?, ?, ?, ?) ", [
            $this->tipo_usuario,
            $this->direccion_usuario,
            $this->nombre_usuario,
            $this->telefono_usuario,
            $this->email_usuario,
            password_hash($this->contra_usuario, PASSWORD_BCRYPT)
        ]);

    }

    public function save()
    {
        
    }

    public function delete()
    {
        
    }

    public function getId(){
        return $this->id_usuario;
    }

    public function getCarrito(){
        return Carrito::getActualCarrito($this->id_usuario);
    }

    static function getAll($atributes = "*", $conditions=""){
        $usersSQL = ADBModel::__getAllRows($atributes, $conditions, "usuario");
        $users = [];
        foreach($usersSQL as $user){
            $users[] = new Usuario($user->id_usuario, TipoUsuario::getType($user->tipo_usuario), $user->direccion_usuario, $user->nombre_usuario, $user->telefono_usuario, $user->email_usuario, $user->contra_usuario);
        }

        return $users;
    }

}