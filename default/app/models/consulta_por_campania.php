<?php

class ConsultaPorCampania extends ActiveRecord{
    
    public function crear($campania_id, $canal_id, $producto_id, $usuario_id, $fecha, $consulta) {
        $this->campania_web_id = $campania_id;
        $this->canal_campania_id = $canal_id;
        $this->producto_id = $producto_id;
        $this->usuario_id = $usuario_id;
        $this->fecha = $fecha;
        $this->consulta = $consulta;
        $this->estado = "1";
        
        if($this->save()){
            return $this->id;
        }
        else{
            return 0;
        }
    }
    
}
?>
