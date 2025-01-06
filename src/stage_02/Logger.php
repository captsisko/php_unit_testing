<?php

namespace unit_test_application\stage_02;

class Logger {

  private LoggerService $logger;

  public function __construct(LoggerService $logger) {
    $this->logger = $logger;
  }

  public function processMessage(string $message): string {
    if (empty($message)) {
      $this->logger->log('Failed to process message: Empty message');
      throw new \InvalidArgumentException('Message cannot be empty.');
    }

    $processedMessage = strtoupper($message);
    $this->logger->log('Message processed: ' . $processedMessage);

    return $processedMessage;
  }

}
