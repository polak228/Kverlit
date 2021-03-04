<?php
session_start();

function redirect($location) {
  header("Location: $location");
}

$user = $_SESSION["user"]["id"];

if( empty($_GET) || $_GET["login"] === "" ) {
  if( $user ) redirect("/?home");
}

if( $_GET["home"] === "" ) {
  if( !$user ) redirect("/");
}