<?php

use PHPUnit\Framework\TestCase;
use unit_test_application\MessageProcessor;
use unit_test_application\stage_02\LoggerService;

class MessageProcessorTest extends TestCase {

  protected LoggerService $loggerService;

  protected MessageProcessor $messageProcessor;

  protected $messageProcessorLoggerService;

  function setUp(): void {
    $this->loggerService = $this->getMockBuilder(LoggerService::class) //initiate mock of the specified class
    ->onlyMethods([]) // specify the methods to stub. The empty array means no method/s are stubbed and actual code is executed
    ->getMock(); // get the mocked object

    // setup messageProcessor with loggerService Dependency-Interjection for integration tests below
    $this->messageProcessor = $this->getMockBuilder(MessageProcessor::class)
      ->setConstructorArgs([$this->loggerService])
      ->getMock();

    // get a reflection object of the loggerService messageProcessorLoggerService from the MessageProcessor mock object
    $reflection = new ReflectionClass($this->messageProcessor);
    $this->messageProcessorLoggerService = $reflection->getProperty('loggerService');
    $this->messageProcessorLoggerService->setAccessible(TRUE);
  }


  /**
   * @dataProvider \unit_test_application\DataProvider::messages()
   * @return void
   */
  function testLoggingViaMessageProcessor($data): void {
    $loggerServiceFromMessageProcessor = $this->messageProcessorLoggerService->getValue($this->messageProcessor); // retrieves the value of the loggerService property from the MessageProcessor object.
    $this->expectOutputString('Log: ' . $data . PHP_EOL);
    $loggerServiceFromMessageProcessor->log($data);
  }

  /**
   * @dataProvider \unit_test_application\DataProvider::messages()
   * @return void
   */
  function testLoggingViaMessageProcessorCapitalized($data): void {
    $loggerServiceFromMessageProcessor = $this->messageProcessorLoggerService->getValue($this->messageProcessor); // retrieves the value of the loggerService property from the MessageProcessor object.
    $this->expectOutputString('Log: ' . strtoupper($data) . PHP_EOL);
    $loggerServiceFromMessageProcessor->log(strtoupper($data));
  }

  // tests null as input
  function testLoggingNullViaMessageProcessor(): void {
    $loggerServiceFromMessageProcessor = $this->messageProcessorLoggerService->getValue($this->messageProcessor); // retrieves the value of the loggerService property from the MessageProcessor object.
    try {
      $loggerServiceFromMessageProcessor->log(NULL);
    }
    catch (TypeError $typeError) {
      $this->assertStringContainsString('null given', $typeError->getMessage());
      var_dump($typeError->getMessage());
    }
  }

  /**
   * @dataProvider \unit_test_application\DataProvider::spaceCounts()
   *
   * test empty string(s)
   */
  public function testLoggingWhiteSpaceViaMessageProcessor($spaceCount): void {
    // Generate a string with the given number of spaces
    $spaces = str_repeat(' ', $spaceCount);

    // Retrieve the loggerService instance from MessageProcessor
    $loggerServiceFromMessageProcessor = $this->messageProcessorLoggerService->getValue($this->messageProcessor);

    // Log the spaces
    $loggerServiceFromMessageProcessor->log($spaces);

    // Expect the exact output
    $this->expectOutputString('Log: ' . $spaces . PHP_EOL);
  }

  /**
   * @dataProvider \unit_test_application\DataProvider::specialCharacters()
   * @return void
   *
   * test special characters
   */
  function testLoggingSpecialCharactersViaMessageProcessor($data): void {
    $loggerServiceFromMessageProcessor = $this->messageProcessorLoggerService->getValue($this->messageProcessor); // retrieves the value of the loggerService property from the MessageProcessor object.
    $loggerServiceFromMessageProcessor->log($data);
    $this->expectOutputString('Log: ' . $data . PHP_EOL);
  }

  // test logging with no arguments
  function testLoggingEmpty(): void {
    $loggerServiceFromMessageProcessor = $this->messageProcessorLoggerService->getValue($this->messageProcessor); // retrieves the value of the loggerService property from the MessageProcessor object.
    try {
      $loggerServiceFromMessageProcessor->log();
    }
    catch (ArgumentCountError $countError) {
      $this->assertStringContainsString('Too few arguments', $countError->getMessage());
      var_dump($countError->getMessage());
    }
  }

}