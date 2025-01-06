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
   * @dataProvider \unit_test_application\DataProvider::messagesDataSource()
   * @return void
   */
  function testLoggerService_Directly($data) {
    $this->expectOutputString('Log: ' . $data . PHP_EOL);
    $this->loggerService->log($data);
  }

}