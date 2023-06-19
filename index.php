<?php
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json");

date_default_timezone_set("America/Sao_Paulo");

if(isset($_GET['path'])){
  $path = explode("/", $_GET['path']);
}
else{
  echo("Não encontrado");
  exit;
}


if(isset($path[0])) { $api = $path[0]; } else { echo("Não encontrado"); exit; }

if(isset($path[1])) { $acao = $path[1]; } else { $acao = ""; }

if(isset($path[2])) { $param = $path[2]; } else { $param = ""; }

$method = $_SERVER["REQUEST_METHOD"];

$GLOBALS['secretJWT'] = '123456';

//CLASSES
include_once "classes/db.class.php";
include_once "classes/jwt.class.php";
include_once "classes/usuario.class.php";

//API'S
include_once "api/clientes/usuarios.php";
include_once "api/clientes/clientes.php";