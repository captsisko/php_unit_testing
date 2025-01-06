<?php

namespace unit_test_application;

class DataProvider {

  public static function messages(): array {
    return [
      ['hello'],
      ['world'],
      ['moon'],
      ['mars'],
      ['universe'],
    ];
  }

  public static function specialCharacters(): array {
    return [
      ['@'],
      ['£%'],
      ['£%=-!!!&&'],
      ['!@#$%^&*()_+{}|:"<>?'],
      ['你好，世界 🌍'],
    ];
  }

  public static function dataForAddition(): array {
    return [
      [2, 1, 1],
      [3, 3, 0],
      [-2, -1, -1],
      //      [PHP_INT_MAX+1, PHP_INT_MAX, 1]
    ];
  }

  public static function dataForSubtraction(): array {
    return [
      [0, 1, 1],
      [-2, -1, 1],
      [-1, -1, 0],
      [0, -1, -1],
      [PHP_INT_MAX, PHP_INT_MAX, 0],
      [PHP_INT_MAX-1, PHP_INT_MAX, 1],
    ];
  }

  public static function dataForMultiply(): array {
    return [
      [0, 0, 0],
      [1, -1, -1],
      [0, 1, 0],
      [PHP_INT_MAX, 1, PHP_INT_MAX],
    ];
  }

  public static function dataForDivision(): array {
    return [
      [0.0, 0, 1],
      [2.0, 4, 2],
      [-20.0, -40, 2],
      [2.5, 5, 2],
    ];
  }#

  public static function spaceCounts(): array {
    return [
      [0],   // 1 space
      [1],   // 1 space
      [5],   // 5 spaces
      [10],  // 10 spaces
      [50],  // 50 spaces
    ];
  }


}
