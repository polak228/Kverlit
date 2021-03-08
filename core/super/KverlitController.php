<?php
/**
 * Главный контроллер приложения.
 *
 * @package default
 * @author `_polak228_`
 */

session_start();

define("ROOT", $_SERVER["DOCUMENT_ROOT"]);

spl_autoload_register(function($className) {
  $classPath = ROOT . "/" . str_replace("\\", "/", $className) . ".php";
  if( file_exists($classPath) ) require_once $classPath;
});


use core\controllers\EngineController;
use core\controllers\RouterController;


interface KverlitControllerInterface {

  public function control($call);

}


class KverlitController implements KverlitControllerInterface {

  public function control($call) {
    $method = $_POST["params"]["method"];
    require_once ROOT . "/config/php/connect.php"; // $connect
    switch($call) {
      case "engine": 
        $Controller = new EngineController($connect); break;
      case "router":
        $Controller = new RouterController($_POST["params"]["url"]); break;
    } return $Controller -> control($method);
  }

}


// только если это ajax:
if( $_SERVER["HTTP_X_REQUESTED_WITH"] !== "XMLHttpRequest" ) header("Location: /");
else {
  $KverlitController = new KverlitController;
  echo json_encode($KverlitController -> control($_POST["params"]["call"]));
}