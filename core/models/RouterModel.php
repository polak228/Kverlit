<?php
namespace core\models;

/**
 * Модель основного маршрутизатора приложения.
 *
 * @package default
 * @author `_polak228_`
 */

interface RouterModelInterface {

  // functions

}


class RouterModel implements RouterModelInterface {

  public function __construct($url) {
    $this -> url = $url;
  }

}