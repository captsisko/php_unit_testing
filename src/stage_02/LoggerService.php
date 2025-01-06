<?php

namespace unit_test_application\stage_02;

class LoggerService {

  public function log(string $message): void {
    // In a real application, this might write to a file or a logging system.
    echo 'Log: ' . $message . PHP_EOL;
  }

}
