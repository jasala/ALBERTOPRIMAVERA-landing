<?php
/**
 * KumbiaPHP web & app Framework
 *
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
 * Flash Es la clase standard para enviar advertencias,
 * informacion y errores a la pantalla
 *
 * @category   Kumbia
 * @package    Flash
 * @copyright  Copyright (c) 2005 - 2017 Kumbia Team (http://www.kumbiaphp.com)
 * @license    http://wiki.kumbiaphp.com/Licencia     New BSD License
 */

/**
 * Clase para enviar mensajes a la vista
 *
 * Envio de mensajes de advertencia, éxito, información
 * y errores a la vista.
 * Tambien envia mensajes en la consola, si se usa desde consola.
 *
 * @category   Kumbia
 * @package    Flash
 */
class Flash
{

    /**
     * Visualiza un mensaje flash
     *
     * @param string $name  Para tipo de mensaje y para CSS class='$name'.
     * @param string $text  Mensaje a mostrar
     */
    public static function show($header, $text, $tipo)
    {
        if (isset($_SERVER['SERVER_SOFTWARE'])) {
            echo '<div class="alert alert-'.$tipo.' alert-dismissable" <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><'.$header.'>', $text, '</'.$header.'></div>', PHP_EOL;
        } else {
            echo $name, ': ', strip_tags($text), PHP_EOL;
        }
    }

    /**
     * Visualiza un mensaje de error
     *
     * @param string $text
     */
    public static function error($header, $text)
    {
        return self::show($header, $text, 'danger'); // COLOR ROJO
    }

    /**
     * Visualiza un mensaje de advertencia en pantalla
     *
     * @param string $text
     */
    public static function warning($header, $text)
    {
        return self::show($header, $text, 'warning'); // COLOR AMARILLO
    }

    /**
     * Visualiza informacion en pantalla
     *
     * @param string $text
     */
    public static function info($header, $text)
    {
        return self::show($header, $text, 'info'); // COLOR CELESTE
    }

    /**
     * Visualiza informacion de suceso correcto en pantalla
     *
     * @param string $text
     */
    public static function exito($header, $text)
    {
        return self::show($header, $text, 'success'); // COLOR VERDE DE EXITO
    }

}
