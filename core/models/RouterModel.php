<?php
namespace core\models;

require ROOT . "/lib/php/tplp/autoload.php";
use Tplp;

/**
 * Модель основного маршрутизатора приложения.
 *
 * @package default
 * @author `_polak228_`
 */

interface RouterModelInterface {

  static function returnError($error = "");
  public function returnPage($params);

}


class RouterModel implements RouterModelInterface {

  public function __construct($url) {
    $this -> url = $url;
  }

  static function returnError($error = "") {
    return array(
      "status" => "error",
      "error" => $error
    );
  }

  static $pages = array(
    "tpl" => array(
      "home" => "tpl/home.tpl"
    )
  );

  public function returnPage($params) {
    $type = $_POST["params"]["type"]; $url = $_POST["params"]["url"];
    if( self::$pages[$type][$url] ) {
      $temp = new Tplp(ROOT . "/templates/" . self::$pages[$type][$url]);
      return array(
        "status" => "success",
        "success" => $temp -> render("", false)
      );
    } else return self::returnError();
  }

}