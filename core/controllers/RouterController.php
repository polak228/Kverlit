<?php
namespace core\controllers;

use core\models\RouterModel;

/**
 * Контроллер основного маршрутизатора приложения.
 *
 * @package default
 * @author `_polak228_`
 */

interface RouterControllerInterface {

  public function control($method);

}


class RouterController extends RouterModel implements RouterControllerInterface {

  static $methods = array(
    "returnPage" => "returnPage"
  );

  public function control($method) {
    return self::$methods[$method] ? [$this, self::$methods[$method]]($_POST["params"]) : self::returnError();
  }

}