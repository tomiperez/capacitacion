<?php
require_once 'Palabra.php';
class Letra implements ControllerInterface
{
    public function get()
    {
        $_SESSION['letras'] [] = $_GET['letra'];
        $nuevoJuego= new Ahorcado($_SESSION['palabra'],5);

        foreach ($_SESSION['letras'] as $valor){
            $nuevoJuego->pasarLetra($valor);
        }
           echo $nuevoJuego->mostrar();
    }
}