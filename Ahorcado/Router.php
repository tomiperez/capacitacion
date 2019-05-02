<?php

class Router
{
    
    private $controllers = array ();


    public function agregarController ($url, ControllerInterface $controller)
    {
        if (!isset($this->controllers[$url])){
        $this->controllers[$url]=$controller;
        return true;
        }else{
            return false;
        }
    }
    public function dispatch ($url) //devuelve un controller
    {
        foreach ($this->controllers as $key => $value){
            if ($url==$key){
                return $value;   
            }
        }
        return false;

    }
}