<?php

class DB 
{
  public static function connect(){
    $host = "localhost";
    $user = "admin";
    $pass = "admin";
    $base = "php-api";

    return new PDO("mysql:host={$host};dbname={$base};charset=UTF8;", $user, $pass);
  }
}