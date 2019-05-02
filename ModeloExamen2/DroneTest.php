<?php

include './vendor/autoload.php';
include 'Drone.php';

use PHPUnit\Framework\TestCase;

final class DroneTest extends TestCase
{
    public function testDroneArrancaConBateriaLlena() {
        $drone = new Drone(10);
        $this->assertEquals(10, $drone->cantidadDeBateria());
      }
    public function testSiElRobotSeMueveGastaBateria(){
        $drone = new Drone(10);
        $drone->mover(2,3);
        $this->assertEquals(5, $drone->cantidadDeBateria() );
    }
    public function testBateriaDespuesDeMasDeUnMovimiento(){
        $drone = new Drone(10);
        $drone->mover(1,1);
        $drone->mover(3,2);
        $this->assertEquals(5, $drone->cantidadDeBateria());
    }
    public function testCargaBateria(){
        $drone = new Drone(10);
        $drone->mover(2,2);
        $drone->mover(0,0);
        $this->assertEquals(10, $drone->cantidadDeBateria());
    }
    public function testHistorial(){
        $drone = new Drone (10);
        $drone->mover(1,2);
        $this->assertEquals(1, count($drone->historial()));
    }
    public function testHistorialVariosMov(){
        $drone = new Drone (10);
        $drone->mover(1,1);
        $drone->mover (2,2);
        $this->assertEquals(2, count($drone->historial()));
    }
    public function testHistorialEspecifico(){
        $drone = new Drone (10);
        $drone->mover(1,1);
        $drone->mover (2,2);
        $this->assertEquals(array(0 => array('x' => 1, 'y' => 1) ,1 => array('x' => 2, 'y' => 2)), $drone->historial()); 
    }
    public function testMoverSinBateria(){
        $drone = new Drone (10);
        $drone->mover(1,1);
        $this->assertFalse($drone->mover(7,7));
    }
}