<?php
namespace core\controllers;

use core\models\EngineModel;

/**
 * Контроллер модели основных функций приложения.
 *
 * @package default
 * @author `_polak228_`
 */

interface EngineControllerInterface {

  public function control($method);

}


class EngineController extends EngineModel implements EngineControllerInterface {

  static $methods = array(
    "login" => "login"
  );

  public function control($method) {
    return self::$methods[$method] ? [$this, self::$methods[$method]]($_POST["params"]) : self::returnError();
  }

}