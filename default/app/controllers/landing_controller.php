<?php

/**
 * Controller por defecto si no se usa el routes
 *
 */
class LandingController extends AppController
{
    public function consulta($campania_id = "", $canal_id = "") {        
        $this->Campania = $Campania = (new CampaniaWeb)->find_first("conditions: id = '$campania_id'");
        $this->titulo = $Campania->nombre;
        $this->canal = $canal_id;
        // PONER IF DE campania_id = "" -> para que muestre imagen institucional
        $this->img_campania = "landing/$campania_id.jpg";
        $this->vectorProductos = (new Producto)->getVectorParaSelect();
        (new CampaniaWeb)->insertarVisita($campania_id);
    }
    
    // BORRAR DESDE ACA
    
}