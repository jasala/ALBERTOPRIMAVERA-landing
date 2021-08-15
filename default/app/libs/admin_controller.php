<?php
/**
 * @see Controller nuevo controller
 */
require_once CORE_PATH . 'kumbia/controller.php';

/**
 * Controlador para proteger los controladores que heredan
 * Para empezar a crear una convención de seguridad y módulos
 *
 * Todas las controladores heredan de esta clase en un nivel superior
 * por lo tanto los metodos aqui definidos estan disponibles para
 * cualquier controlador.
 *
 * @category Kumbia
 * @package Controller
 */
class AdminController extends Controller
{

    final protected function initialize()
    {
        //Código de auth y permisos
        //Será libre, pero añadiremos uno por defecto en breve
        //Posiblemente se cree una clase abstracta con lo que debe tener por defecto
        if(Auth::is_valid()){
            //$this-> nombre = Auth::get('nombre');
            View::template('panel');
        }else{
            //View::select(null, 'login');
            View::template('login'); // Muestra "app/views/_shared/templates/panel.phtml" que es la template del panel de administración
                                 // para que se exhiba en todas las pantallas del sistema (ver si se puede setear desde el "config"
            //return false;
        }
    }

    final protected function finalize()
    {
        
    }

}
