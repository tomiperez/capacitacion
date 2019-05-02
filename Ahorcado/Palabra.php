<?php
class Palabra implements ControllerInterface
{
    public function get()
    {
            $_SESSION ['palabra'] = $_GET['palabra'];
            $_SESSION ['letras'] =array();
            $ahorcado = new Ahorcado ($_SESSION['palabra'],5);
    
            echo $ahorcado->mostrar() ;
            
    }
}
