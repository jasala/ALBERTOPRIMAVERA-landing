<?php

class Usuario extends ActiveRecord{
    
    public function crear($nombre, $email, $celular, $telefono) {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->celular = $celular;
        $this->telefono = $telefono;
        $this->estado = "1";
        
        if($this->save()){
            return $this->id;
        }
        else{
            return 0;
        }
    }
    
    public function registrarPorCcnsultaCampania($email, $nombre, $celular, $telefono) {
        if($this->exists("email = '$email'") == 0){
            $usuario_id = $this->crear($nombre, $email, $celular, $telefono); // me tiene que devolver el ID de usuario
            return $usuario_id;
            exit();
        }
        else{ // existe el user, entonces devolver la ID
            $Usuario = $this->find_first("conditions: email = '$email'");
            return $Usuario->id;
            exit();
        }
    }
    
}
?>
