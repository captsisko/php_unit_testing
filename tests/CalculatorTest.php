<?php

use PHPUnit\Framework\TestCase;
use unit_test_application\stage_01\Calculator;

final class CalculatorTest extends TestCase {
  private Calculator $calculator;
  protected function setUp():void {
    $this->calculator = new Calculator();
  }

  public function testAdd() : void {

    $sum = $this->calculator->add(1, 1);
    $this->assertIsInt($sum);
    $this->assertEquals($sum, 2);

    $sum = $this->calculator->add(3, 0);
    $this->assertIsInt($sum);
    $this->assertEquals($sum, 3);

    $sum = $this->calculator->add(-1, -1);
    $this->assertIsInt($sum);
    $this->assertEquals($sum, -2);
  }

  public function testSubtract() : void {
    $diff = $this->calculator->subtract(1, 1);
    $this->assertEquals($diff, 0);

    $diff = $this->calculator->subtract(-1, 1);
    $this->assertEquals($diff, -2);

    $diff = $this->calculator->subtract(-1, 0);
    $this->assertEquals($diff, -1);

    $diff = $this->calculator->subtract(-1, -1);
    $this->assertEquals($diff, 0);
  }

  public function testMultiply() : void {
    $product = $this->calculator->multiply(0, 0);
    $this->assertEquals($product, 0);
    $this->assertIsInt($product, 0);

    $product = $this->calculator->multiply(-1, -1);
    $this->assertEquals($product, 1);
    $this->assertIsInt($product, 1);

    $product = $this->calculator->multiply(1, 0);
    $this->assertEquals($product, 0);
    $this->assertIsInt($product, 0);
  }

//  public function testDivision() : void {
//    $quotient = $this->calculator->divide(0, 0);
//    $this->assertEquals($quotient, 'undefined');
//    $this->assertIsNotInt($quotient);
//  }
}