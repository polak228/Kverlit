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

  public function returnPage($params) {
    $pages = require(ROOT . "/modules/php/urls.php");
    $url = $_POST["params"]["url"];
    if( $pages[$url] ) {
      $temp = new Tplp(ROOT . "/templates/" . $pages[$url]);
      return array(
        "status" => "success",
        "success" => $temp -> render("", false)
      );
    } else return self::returnError();
  }

}