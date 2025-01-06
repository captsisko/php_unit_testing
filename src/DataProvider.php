<?php

namespace unit_test_application;

class DataProvider {

  public static function messagesDataSource(): array {
    return [
      ['hello'],
      ['world'],
      ['moon'],
      ['mars'],
      ['universe'],
    ];
  }

  public static function specialCharacterDataSource() {
    return [
      ['@'],
      ['£%'],
      ['£%=-!!!&&'],
      ['!@#$%^&*()_+{}|:"<>?'],
      ['你好，世界 🌍'],
    ];
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

}
