<?php
class Palabra
{
    private $palabra;
    public function get()
    {
        if (isset($_GET ['palabra'])){
        $this->palabra = $_GET['palabra'];
        return $this->palabra;}
    }
}