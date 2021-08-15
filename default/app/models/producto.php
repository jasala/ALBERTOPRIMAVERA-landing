<?php

class Producto extends ActiveRecord{
    
    public function crear($nombre) {
        $this->nombre = $nombre;
        $this->estado = "1";
        
        if($this->save()){
            return $this->id;
        }
        else{
            return 0;
        }       
        
    }
    
    public function getVectorParaSelect() {
       // VECTOR SELECT DEL FORM
        $Prod = $this->find();
        $prodVector = array();
        $prodVector[0] = "SELECCIONAR";
        foreach ($Prod as $Item):
            //$id = $Item->id;
            //$mostrar = $Item->nombre;
            $prodVector[$Item->id] = $Item->nombre;
        endforeach;
       return $prodVector;
   }
    
}
?>
