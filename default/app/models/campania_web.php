<?php

class CampaniaWeb extends ActiveRecord{
    
    public function crear($producto_id, $nombre, $fecha, $fecha_vencimiento, $visitas, $texto) {
        $this->producto_id = $producto_id;
        $this->nombre = $nombre;
        $this->fecha = $fecha;
        $this->vencimiento = $fecha_vencimiento;
        $this->visitas = $visitas;
        $this->texto = $texto;
        $this->estado = "1";
        
        if($this->save()){
            return $this->id;
        }
        else{
            return 0;
        }
    }
    
    public function insertarVisita($campania_id) {
        $Camp = $this->find_first("conditions: id = '$campania_id'");
        $Camp->visitas = $Camp->visitas + 1;
        $Camp->update();
    }
    
}
?>
