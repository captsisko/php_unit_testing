<?php

namespace unit_test_application;

use unit_test_application\stage_02\LoggerService;

class MessageProcessor {

  protected LoggerService $loggerService;

  public function __construct(LoggerService $loggerService) {
    $this->loggerService = $loggerService;
  }

}