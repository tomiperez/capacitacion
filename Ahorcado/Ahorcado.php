<?php
 
require './vendor/autoload.php';
require 'Palabra.php';
class Ahorcado {
  private $palabra;
  private $intentos;
  private $letrasAcertadas;
 
  public function __construct($palabra, $intentos) {
    $this->palabra = $palabra;
    $this->intentos = $intentos;
    $this->letrasAcertadas = array();
  }
  public function damePalabra() {
    return $this->palabra;
  }
 
  public function dameIntentos() {
    return $this->intentos;
  }
 
  public function mostrarResultado() {
    $arrayPalabraTemp = [];
      foreach(str_split($this->palabra) as $k => $w){
        $arrayPalabraTemp[$k] = '_';
        foreach($this->letrasAcertadas as $v){
          if($v == $w){
            $arrayPalabraTemp[$k] = $v;
          }
        }
      }
      foreach($arrayPalabraTemp as $v){
        echo $v . ' ';
      }
    return implode(' ', $arrayPalabraTemp);
  }
  public function pasarLetra($letra)
  {
    foreach($this->letrasAcertadas as $v){
      if($letra == $v){
        $this->intentos--;
        return false;
      }
    }
    foreach(str_split($this->palabra) as $k => $v){
      if(str_split($this->palabra)[$k] == $letra){
        $this->letrasAcertadas[] = $letra;
        return true;
      }      
    }
    $this->intentos--;
    return false;
  }
  public function dameIntentosRestantes()
  {
    return $this->intentos;
  }
  public function perdio()
  {
    if($this->intentos == 0){
      return true;
    }
    return false;
  }
  public function gano()
  {
    $arrayTemp = array_diff(str_split($this->palabra), $this->letrasAcertadas);
    if(sizeof($arrayTemp) == 0){
      echo 'Ganó!' . "\n";
      return true;
    }else{
      return false;
    }
  }
}

 $ahor = new Ahorcado('chachara', 5);
 $ahor->mostrarResultado();
 echo "\n";
 $ahor->pasarLetra('h');
 $ahor->mostrarResultado();
 echo "\n";
 $ahor->gano();
 $ahor->pasarLetra('c');
 $ahor->mostrarResultado();
 echo "\n";
 $ahor->gano();
 $ahor->pasarLetra('a');
 $ahor->mostrarResultado();
 echo "\n";
 $ahor->pasarLetra('r');
 $ahor->mostrarResultado();
 echo "\n";
 $ahor->gano();