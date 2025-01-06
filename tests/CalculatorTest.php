<?php

use PHPUnit\Framework\TestCase;
use unit_test_application\stage_01\Calculator;
use unit_test_application\DataProvider;

final class CalculatorTest extends TestCase {

  private Calculator $calculator;

  protected function setUp(): void {
    $this->calculator = $this->getMockBuilder(Calculator::class)
      ->onlyMethods([]) // don't stub any of the calculator methods
      ->getMock(); // get mocked up
  }

  /**
   * @dataProvider \unit_test_application\DataProvider::dataForAddition()
   *
   * @param $expected
   * @param $input1
   * @param $input2
   *
   * @return void
   */
  public function testAdd(int $expected, int $input1, int $input2): void {
    $sum = $this->calculator->add($input1, $input2);
    $this->assertIsInt($sum);
    $this->assertEquals($sum, $expected);
  }

  /**
   * @dataProvider \unit_test_application\DataProvider::dataForSubtraction()
   * @return void
   */
  public function testSubtract(int $expected, int $input1, int $input2): void {
    $diff = $this->calculator->subtract($input1, $input2);
    $this->assertEquals($diff, $expected);
  }

  /**
   * @dataProvider \unit_test_application\DataProvider::dataForMultiply()
   *
   * @param int $expected
   * @param int $input1
   * @param int $input2
   *
   * @return void
   */
  public function testMultiply(int $expected, int $input1, int $input2): void {
    $product = $this->calculator->multiply($input1, $input2);
    $this->assertEquals($product, $expected);
    $this->assertIsInt($product);
  }

  /**
   * @dataProvider \unit_test_application\DataProvider::dataForDivsion()
   *
   * @param int $expected
   * @param int $input1
   * @param int $input2
   *
   * @return void
   */
  public function testDivision(int|float $expected, int $input1, int $input2): void {
    $quotient = $this->calculator->divide($input1, $input2);
    $this->assertIsFloat($quotient);
    $this->assertEquals($quotient, $expected);

    $this->expectException(InvalidArgumentException::class);
    $this->expectExceptionMessage('Cannot divide by zero.');
    $this->calculator->divide(0, 0);
    $this->calculator->divide(5, 0);
  }

}