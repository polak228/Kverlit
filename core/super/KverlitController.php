<?php
/**
 * Главный контроллер приложения.
 *
 * @package default
 * @author `_polak228_`
 */

session_start();

define("ROOT", $_SERVER["DOCUMENT_ROOT"]);

spl_autoload_register(function($class_name) {
  require_once ROOT . "/" . str_replace("\\", "/", $class_name) . ".php";
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
        $EngineController = new EngineController($connect);
        return $EngineController -> control($method);
    }
  }

}


// только если это ajax
if( $_SERVER["HTTP_X_REQUESTED_WITH"] !== "XMLHttpRequest" ) header("Location: /");
else {
  $KverlitController = new KverlitController;
  echo json_encode($KverlitController -> control($_POST["params"]["call"]));
}