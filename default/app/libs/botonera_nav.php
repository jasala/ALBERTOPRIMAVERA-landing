<?php
class BotoneraNav {
    /**
	 * muestra todos los botones para listar los cursos por pilar de la botonera principal
	 *
	 * view ->_shared -> partial -> web -> ...
	 */
    
    public static function cursos(){
        $Pilares = (new PilarCurso)->find("conditions: estado = '1' ORDER BY posicion ASC");
        foreach ($Pilares as $Pilar):
            $nombre = strtoupper($Pilar->nombre);
            echo Html::link("cursos/listarCursosDelPilar/$Pilar->id", $nombre, "class='dropdown-item'");
        endforeach;
    }
       
}
?>