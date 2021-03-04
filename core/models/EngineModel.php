<?php
namespace core\models;

/**
 * Модель основных функций приложения.
 *
 * @package default
 * @author `_polak228_`
 */

interface EngineModelInterface {

  static function returnError($error = "");
  static function clearData($data);
  public function login($params);

}


class EngineModel implements EngineModelInterface {

  public function __construct($connect) {
    $this -> connect = $connect;
  }

  static function returnError($error = "") {
    return array(
      "status" => "error",
      "error" => $error
    );
  }

  static function clearData($data) {
    return trim(addslashes($data));
  }

  public function login($params) {
    $login = self::clearData($params["login"]); $password = self::clearData($params["password"]);
    if( !$login || !$password ) self::returnError();
    if( !(strlen($login) > 1) && !(strlen($password) > 6) ) return self::returnError();
    $query = "SELECT `user_id`, `user_login`, `user_password` FROM `users` WHERE `user_login` = '$login' LIMIT 1;";
    $user = mysqli_fetch_assoc(mysqli_query($this -> connect, $query));
    if( !$user["user_id"] || !password_verify($password, $user["user_password"]) ) return self::returnError();
    $_SESSION["user"] = array(
      "id" => $user["user_id"],
      "login" => $user["user_login"]
    ); return array("status" => "success");
  }

}