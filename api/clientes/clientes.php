<?php

if($api == 'clientes'){

  if($method == "GET"){
    include_once "get.php";
  }

  if($method == "POST"){
    include_once "post.php";
  }

  //no insomnia, inserir campo _method com o valor PUT
  if($method == "POST" && $_POST['_method'] == "PUT"){
    include_once "put.php";
  }


  //no insomnia, inserir campo _method com o valor DELETE
  if($method == "POST" && $_POST['_method'] == "DELETE"){
    include_once "delete.php";
  }

}