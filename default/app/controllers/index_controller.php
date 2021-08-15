<?php

/**
 * Controller por defecto si no se usa el routes
 *
 */
class IndexController extends AppController
{

    public function index()
    {
     $this->titulo = "HOME"; // TITULO DE LA PÁGINA   
    }
    
    // BORRAR DESDE ACA
    public function loginProcesar() {
       if(Input::hasPost("email")){
           $email = Input::request('email');
           $clave = Input::request('clave');
           $Usuario = (new Usuario)->find_first("conditions: email = '$email'");
           $this->validarLogin($email, $clave);
       } 
       else{
           Flash::error("h2", "ERROR; No se detectaron valores en el formulario, por favor volver a intentar");
           Redirect::to("comunicacion/login");
           exit();
       }
    }
    
    public function logout(){
        Auth::destroy_identity();        
        // rutear a LOGIN y mostrar cartel que salió del sistema
        Flash::exito("Estas, fuera del SISTEMA!");
        return Redirect::to('comunicacion/login');
    }
    
    // GENERICAS
    
    public function validarLogin($email, $clave) {        
        $clave = md5($clave.PASSWORD_SALT);
        $auth = new Auth("model", "class: usuario", "email: $email", "clave: $clave");
             if ($auth->authenticate()) {
                return Redirect::to();
            } else {
                Flash::error("h2", "ERROR: Email y/o clave inválida");
                Redirect::to("comunicacion/login");
                exit();
            }
    }
}
