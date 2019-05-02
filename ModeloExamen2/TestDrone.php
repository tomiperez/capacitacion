<?php
require_once './vendor/autoload.php';
require_once 'Drone.php';
use PHPUnit\Framework\TestCase;
final class DroneTest extends TestCase
{
  public function setUp():void
  {
    $this->drone = new Drone(10);
  }
  public function testClassExists()
  {
    $this->assertTrue(class_exists('Drone'));
  }
  public function testBateriaInicial()
  {
    $this->assertEquals(10, $this->drone->cantidadDeBateria());
  }
  public function testMoverSinBateria()
  {
    $this->assertTrue($this->drone->mover(5,5));
    $this->assertFalse($this->drone->mover(1,1));
  }
  public function testRecargarBateria()
  {
    $this->assertTrue($this->drone->mover(2,3));
    $this->assertEquals(5, $this->drone->cantidadDeBateria());
    $this->assertTrue($this->drone->mover(0,0));
    $this->assertEquals(10, $this->drone->cantidadDeBateria());
    $this->assertTrue($this->drone->mover(0,1));
    $this->assertEquals(9, $this->drone->cantidadDeBateria());
  }
  public function testMovimientoDrone()
  {
    $this->assertTrue($this->drone->mover(3,3));
    $this->assertEquals(4, $this->drone->cantidadDeBateria());
  }

  public function testHistorial()
  {
    $this->assertTrue($this->drone->mover(1,1));
    $this->assertEquals(array(0 => array('x' => 1, 'y' => 1)), $this->drone->historial());
  }
  public function testHistorialVariosMovimientos()
  {
    $this->assertTrue($this->drone->mover(0,1));
    $this->assertTrue($this->drone->mover(0,2));
    $this->assertEquals(2, count($this->drone->historial()));
    $this->assertTrue($this->drone->mover(0,3));
    $this->assertTrue($this->drone->mover(1,3));
    $this->assertTrue($this->drone->mover(2,3));
    $this->assertEquals(5, count($this->drone->historial()));
  }
}