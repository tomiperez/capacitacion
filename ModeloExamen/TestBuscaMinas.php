<?php

require_once('./vendor/autoload.php');
require('./CasiBuscaMinas.php');

use PHPUnit\Framework\TestCase;

final class TestBuscaMinas extends TestCase 
{
    public function crearTablero ()
    {
        $tablero= new BuscaMinas (8,8);
        $tablero->agregarMina (2,3);
        $tablero->agregarMina (1,7);
        $tablero->agregarMina (5,3);
        return $tablero;
    }
    public function testExistsBuscaMinas() {
        $this->assertTrue(class_exists("BuscaMinas"));
      }
    public function testJugar()
    {
        $tablero = $this->crearTablero();
        $tablero->jugar(1,3);
        $tablero->jugar(2,5);
        $tablero->jugar(7,7);
        $tablero->jugar(5,5);
        $tablero->jugar(4,2);
        $this->assertFalse($tablero->gano());

    }
    public function testPerdio()
    {
        $tablero = $this->crearTablero();
        $this->assertFalse($tablero->jugar(1,7));
    }
    public function testAgregarFuera()
    {
        $tablero = $this->crearTablero();
        $this->assertFalse ($tablero->agregarMina(9,9));
    }
    public function testAgregoMina()
    {
        $tablero = $this->crearTablero();
        //agrega mina en una posicion vacia
        $this->assertTrue($tablero->agregarMina (5,5));
        $this->assertTrue($tablero->agregarMina (7,7));
        //agrega una mina en una posicion ocupada
        $this->assertFalse ($tablero->agregarMina(2,3));
    }

    public function testGano()
    {
        $tablero = $this->crearTablero();   
        $tablero->sacarMina(2,3);
        $tablero->sacarMina(1,7);
        $tablero->sacarMina(5,3);
        $this->assertTrue($tablero->gano());
    }
    public function testSacarMina ()
    {
        $tablero = $this->crearTablero();
        //mina que existe
        $this->assertTrue($tablero->sacarMina (2,3));
        //mina que no existe
        $this->assertFalse($tablero->sacarMina (5,5));
    }
}