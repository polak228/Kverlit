#!/bin/bash

flag=$1
host=$2; user=$3;
password=$4; db=$5;

# DB
if [[ "$flag" -eq "-db" ]]; then
  if ! [ -d config/php/ ]; then
    cd config; mkdir php;
  else
    cd config;
  fi
  echo "<?php \$connect = mysqli_connect('$host', '$user', '$password', '$db');" > php/connect.php;
  echo "~~ "'$connect'" - /config/php/connect.php ~~";
fi