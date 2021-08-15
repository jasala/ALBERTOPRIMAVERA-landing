<?php

/**
 * Controller por defecto si no se usa el routes
 *
 */
class ComunicacionController extends AppController
{
    public function consultaPorCampania() {
        View::select(null);
        if(Input::hasPost('campania_id')){
            $campania_id = Input::request('campania_id');
            $canal_id = Input::request('canal');
            $nombre = Input::request('nombre');
            $email = Input::request('email');
            $celular = Input::request('celular');
            $producto_id = Input::request('productoId');
            $consulta = Input::request('consulta');
            $Campania = (new CampaniaWeb)->find_first("conditions: id = '$campania_id'");
            $Producto = (new Producto)->find_first("conditions: id = '$producto_id'");
            $html = "<h2>CONSULTA POR CAMPAÑA: $Campania->nombre</h2>";
            // REGISTRAR EN BD
            $usuario_id = (new Usuario)->registrarPorCcnsultaCampania($email, $nombre, $celular, "");
            (new ConsultaPorCampania)->crear($campania_id, $canal_id, $producto_id, $usuario_id, date('Y-m-d'), $consulta);
            // ENVIAR MAIL
            $html = $html."NOMBRE/S: $nombre<br>EMAIL: $email<br>CELULAR: $celular<br>PRODUCTO: $Producto->nombre<br><br>CONSULTA: $consulta";
            $asunto = "CONSULTA por: ".$Campania->nombre;
            Email::enviar("cristina@albertoprimavera.com.ar", $email, $asunto, $html);
            Email::enviar("santiago@albertoprimavera.com.ar", $email, $asunto, $html);
            Flash::exito("h2", "Consulta ENVIADA EXITOSAMENTE!.");
            Redirect::to("landing/consulta/$campania_id/$canal_id");
        }
        else{
            Flash::error("h2", "ERROR: No se detectaron datos en el formulario, por favor volver a realizar la consulta");
            Redirect::to("index");
            exit();
        }
    }
    
    
    public function suscripcion() {
        $this->titulo = "Suscripción a NEWSLETTER";
    }
    
    public function suscripcionProcesar() {
        if(Input::hasPost('email')){
            $email = Input::request('email');
            $html = "<h2>SUSCRIPCION A NEWSLETTER</h2>";
            $html = $html."EMAIL: $email<br>";
            Email::enviar("salajavier@gmail.com", "seguros@albertoprimavera.com.ar", "SUSCRIPCION A NEWSLETTER", $html);
            Flash::exito("h2", "Suscripción ENVIADA EXITOSAMENTE!.");
            Redirect::to("index");
        }
        else{
            Flash::error("h2", "ERROR: No se detectaron datos en el formulario, por favor volver a realizar la suscripción");
            Redirect::to("index");
            exit();
        }
    }
    
    
    
}