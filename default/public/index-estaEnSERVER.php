<?php
/**
 * KumbiaPHP web & app Framework
 * VER GUIA -> http://wiki.kumbiaphp.com/Pasar_a_produccion
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://wiki.kumbiaphp.com/Licencia
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@kumbiaphp.com so we can send you a copy immediately.
 *
 * @copyright  Copyright (c) 2005 - 2017 Kumbia Team (http://www.kumbiaphp.com)
 * @license    http://wiki.kumbiaphp.com/Licencia     New BSD License
 */

/**
 * Esta sección prepara el entorno
 * Todo esto se puede hacer desde la configuracion del
 * Servidor/PHP, en caso de no poder usarlo desde ahí
 * Puedes descomentar  estas lineas
 */

//*Locale*
//setlocale(LC_ALL, 'es_ES');

//*Timezone*
//ini_set('date.timezone', 'America/New_York');

/**
 * @TODO
 * REVISAR ESTA SECCIÓN
 *
 */
define('APP_CHARSET', 'UTF-8');
/**
 * Indicar si la aplicacion se encuentra en produccion
 * directamente desde el index.php
 */
define('PRODUCTION', TRUE); // pasar a FALSE para trabajar en modo DESARROLLO // pasar a TRUE para trabajar en modo PRODUCCION - antes en FALSE

/**
 * Descomentar para mostrar los errores
 */
//error_reporting(E_ALL ^ E_STRICT);ini_set('display_errors', 'On');
ini_set('display_errors', 'on'); // OJO!! DESHABILITAR ESTA LINEA EN MODO DESARROLLO Y HABILITAR PARA PRODUCCION on/off - antes en off

/**
 * Define el APP_PATH
 *
 * APP_PATH:
 * - Ruta al directorio de la aplicación (por defecto la ruta al directorio app)
 * - Esta ruta se utiliza para cargar los archivos de la aplicacion
 * - En producción, es recomendable ponerla manual
 */
//define('APP_PATH', dirname(__DIR__) . '/app/');// OJO! HABILITAR ESTA LINEA EN MODO DESARROLLO Y DESHABILITAR PARA MODO DESARROLLO
define('APP_PATH', '/home/alberto/defaultlanding/app/'); // OJO!! DESHABILITAR ESTA LINEA EN MODO DESARROLLO Y HABILITAR PARA PRODUCCIÓN

/**
 * Define el CORE_PATH
 *
 * CORE_PATH:
 * - Ruta al directorio que contiene el núcleo de Kumbia (por defecto la ruta al directorio core)
 */
//define('CORE_PATH', dirname(dirname(APP_PATH)) . '/core/'); // OJO!! HABILITAR PARA DESARROLLO - DESHABILITAR PARA PRODUCCION
define('CORE_PATH', '/home/alberto/core/'); // OJO! HABILITAR PARA PRODUCCION - DESHABILITAR PARA DESARROLLO

define('PASSWORD_SALT', 'aHkBg53N23Lw89javierSala'); // variable global para claves de usuarios

/**
 * Define el PUBLIC_PATH
 *
 * PUBLIC_PATH:
 * - Path para genera la Url en los links a acciones y controladores
 * - Esta ruta la utiliza Kumbia como base para generar las Urls para acceder de lado de
 *   cliente (con el navegador web) y es relativa al DOCUMENT_ROOT del servidor web
 *
 *  EN PRODUCCION ESTA CONSTANTE DEBERÍA SER ESTABLECIDA MANUALMENTE
 */
$number = isset($_SERVER['PATH_INFO']) ? strlen(urldecode($_SERVER['PATH_INFO'])) - 1 : 0;
$number += empty($_SERVER['QUERY_STRING']) ? 0 : strlen(urldecode($_SERVER['QUERY_STRING'])) + 1;
// define('PUBLIC_PATH', substr(urldecode($_SERVER['REQUEST_URI']), 0, -$number)); // HABILITAR PARA DESARROLLO - DESHABILITAR PARA PRODUCCION
define ('PUBLIC_PATH', 'https://landing.albertoprimavera.com.ar/'); // DESHABILITAR PARA DESARROLLO - HABILITAR PARA PRODUCCION


/**
 * Obtiene la url
 */
//$url = empty($_SERVER['PATH_INFO']) ? '/' : $_SERVER['PATH_INFO']; // HABILITAR PARA DESARROLLO - DESHABILITAR PARA PRODUCCION
$url = empty($_SERVER['ORIG_PATH_INFO']) ? '/' : $_SERVER['ORIG_PATH_INFO']; // HABILITAR PARA PRODUCCION - DESHABILITAR PARA DESARROLLO

/**
 * Carga el gestor de arranque
 * Por defecto el bootstrap del core
 *
 * @see Bootstrap
 */
//require APP_PATH . 'libs/bootstrap.php'; //bootstrap de app
require CORE_PATH . 'kumbia/bootstrap.php'; //bootstrap del core
