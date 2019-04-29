<?php
require './vendor/autoload.php';
class Ahorcado {
  private $palabra;
  private $intentos;
  private $resultado;
  public function __construct($palabra, $intentos) {
    $this->palabra = $palabra;
    $this->intentos = $intentos;
  }
  public function armarTablero(){
    for ($i=0; $i< strlen($this->palabra); $i++){
      $this->resultado[$i] = "_ ";
      }
      
  }
  public function damePalabra() {
    return $this->palabra;
  }
  public function dameIntentos() {
    return $this->intentos;
  }
  public function mostrarResultado() {
    for ($i=0; $i< strlen($this->palabra); $i++){
      echo $this->resultado[$i] . '';
    }
  }
  public function pasarLetra($caracter)
  {
    if ($this->intentos>0){
      $fallos=0;
      $tempL=strlen ($this->palabra);
      for ($i=0; $i<$tempL; $i++){
        if ($this->palabra[$i]===$caracter && $this->resultado[$i] != $caracter){
          $this->resultado[$i]= $caracter;
        }else{
          $fallos++;
        }
      }
      if ($fallos===$tempL){
        $this->intentos--;
        return false;
      }
      return true;  
    }
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
  public function gano(){
    $arrayTemp = array_diff(str_split($this->palabra), $this->resultado);
    if(sizeof($arrayTemp) == 0){
      echo 'Ganó!!' . "\n";
      return true;
    }else{
      return false;
    }
  }
}
$ahor = new Ahorcado('chachara', 9);
$ahor->armarTablero();
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