<?php

use PHPUnit\Framework\TestCase;
use unit_test_application\stage_01\Calculator;

final class CalculatorTest extends TestCase {
  private Calculator $calculator;
  protected function setUp():void {
    $this->calculator = new Calculator();
  }

  public static function dataForAddition() {
    return [
      [2, 1, 1],
      [3, 3, 0],
      [-2, -1, -1],
//      [PHP_INT_MAX+1, PHP_INT_MAX, 1]
    ];
  }

  public static function dataForSubtraction() {
    return [
      [0, 1, 1],
      [-2, -1, 1],
      [-1, -1, 0],
      [0, -1, -1],
      [PHP_INT_MAX, PHP_INT_MAX, 0],
      [PHP_INT_MAX-1, PHP_INT_MAX, 1],
    ];
  }

  public static function dataForMultiply() {
    return [
      [0, 0, 0],
      [1, -1, -1],
      [0, 1, 0],
      [PHP_INT_MAX, 1, PHP_INT_MAX],
    ];
  }

  public static function dataForDivsion() {
    return [
      [0.0, 0, 1],
      [2.0, 4, 2],
      [-20.0, -40, 2],
      [2.5, 5, 2],
    ];
  }

  /**
   * @dataProvider dataForAddition
   * @param $expected
   * @param $input1
   * @param $input2
   *
   * @return void
   */
  public function testAdd(int $expected, int $input1, int $input2) : void {

    $sum = $this->calculator->add($input1, $input2);
    $this->assertIsInt($sum);
    $this->assertEquals($sum, $expected);
  }

  /**
   * @dataProvider dataForSubtraction
   * @return void
   */
  public function testSubtract(int $expected, int $input1, int $input2) : void {
    $diff = $this->calculator->subtract($input1, $input2);
    $this->assertEquals($diff, $expected);
  }

  /**
   * @dataProvider dataForMultiply
   * @param int $expected
   * @param int $input1
   * @param int $input2
   *
   * @return void
   */
  public function testMultiply(int $expected, int $input1, int $input2) : void {
    $product = $this->calculator->multiply($input1, $input2);
    $this->assertEquals($product, $expected);
    $this->assertIsInt($product);
  }

  /**
   * @dataProvider dataForDivsion
   * @param int $expected
   * @param int $input1
   * @param int $input2
   *
   * @return void
   */
  public function testDivision(int|float $expected, int $input1, int $input2) : void {
    $quotient = $this->calculator->divide($input1, $input2);
    $this->assertIsFloat($quotient);
    $this->assertEquals($quotient, $expected);

    $this->expectException(InvalidArgumentException::class);
    $this->expectExceptionMessage('Cannot divide by zero.');
    $this->calculator->divide(0, 0);
    $this->calculator->divide(5, 0);
  }
}