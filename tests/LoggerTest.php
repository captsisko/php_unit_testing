<?php

use PHPUnit\Framework\TestCase;
use unit_test_application\stage_02\Logger;
use unit_test_application\stage_02\LoggerService;

final class LoggerTest extends TestCase {

  private LoggerService $loggerService;
  private Logger $logger;

  protected function setUp() : void {
    $this->loggerService = $this->getMockBuilder(LoggerService::class)->getMock();
    $this->logger = new Logger($this->loggerService);
  }

  public function testProcessMessageFail() {
    $this->expectException(InvalidArgumentException::class);
    $this->expectExceptionMessage('Message cannot be empty.');
    $this->logger->processMessage('');
  }

  public function testProcessMessageSuccess() {
    $response = $this->logger->processMessage('testing');
    $this->assertIsString($response);
  }

}