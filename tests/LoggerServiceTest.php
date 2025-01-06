<?php

use PHPUnit\Framework\TestCase;
use unit_test_application\stage_02\LoggerService;

class LoggerServiceTest extends TestCase {

  private LoggerService $loggerService;

  protected function setUp() : void {
    $this->loggerService = $this->getMockBuilder(LoggerService::class)
      ->onlyMethods([])
      ->getMock();
  }

  /**
   * @dataProvider \unit_test_application\DataProvider::messages()
   * @return void
   */
  function testLoggerService_Directly($data) {
    $this->expectOutputString('Log: ' . $data . PHP_EOL);
    $this->loggerService->log($data);
  }

  public function testLoggerService_Long_Strings(): void {
    $longMessage = str_repeat('A', 10000);
    $this->expectOutputString('Log: ' . $longMessage . PHP_EOL);
    $this->loggerService->log($longMessage);
  }

/*  public function testLoggerService_High_Volume(): void {
    for ($i = 0; $i < 1000; $i++) {
      $this->loggerService->log("Message $i");
    }
    $this->expectNotToPerformAssertions(); // Just ensure no exceptions are thrown
  }*/

}