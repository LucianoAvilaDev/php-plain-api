<?php

class Clientes
{
  public function listarTodos()
  {
    $db = DB::connect();
    $rs = $db->prepare("SELECT * FROM clientes ORDER BY nome");
    $rs->execute();
    $obj = $rs->fetchAll(PDO::FETCH_ASSOC);

    if(isset($obj)){
      echo json_encode(["dados" => $obj]);
    }
    else{
      echo json_encode(["dados" => "Não existem dados para retornar"]);

    }
  }

  public function listarUnico($param)
  {
    $db = DB::connect();
    $rs = $db->prepare("SELECT * FROM clientes WHERE id={$param} ORDER BY nome");
    $rs->execute();
    $obj = $rs->fetchObject();

    if(isset($obj)){
      json_encode(["dados" => $obj]);
    }
    else{
      json_encode(["dados" => "Não existem dados para retornar"]);

    }
  } 

  public function adicionar()
  {
    $sql = "INSERT INTO clientes(";

    $contador = 1;

    foreach(array_keys($_POST) as $indice){
      if(count($_POST) > $contador){
        $sql .= "{$indice},";
      }
      else{
        $sql .= "{$indice}";
      }
      $contador ++;
    }

    $sql .= ") VALUES (";
    
    $contador = 1;

    foreach(array_values($_POST) as $valor){
      if(count($_POST) > $contador){
        $sql .= "'{$valor}',";
      }
      else{
        $sql .= "'{$valor}'";
      }
      $contador ++;

    }

    $sql .= ");";

    $db = DB::connect();
    $rs = $db->prepare($sql);
    $exec = $rs->execute();

    if(isset($exec)){
      json_encode(["dados" => "Dados inseridos com sucesso"]);
    }
    else{
      json_encode(["dados" => "Erro ao inserir dados"]);

    }
  } 

  public function atualizar($param)
  {
    array_shift($_POST); //elimina o campo _method

    $sql = "UPDATE clientes SET ";
  
    $contador = 1;
  
    foreach(array_keys($_POST) as $indice){
      if(count($_POST) > $contador){
        $sql .= "{$indice} = '{$_POST[$indice]}',";
      }
      else{
        $sql .= "{$indice} = '{$_POST[$indice]}'";
      }
      $contador ++;
    }
  
    $sql .= " WHERE id={$param};";
    
    $db = DB::connect();
    $rs = $db->prepare($sql);
    $exec = $rs->execute();
  
    if(isset($exec)){
      json_encode(["dados" => "Dados atualizados com sucesso"]);
    }
    else{
      json_encode(["dados" => "Erro ao artualizar dados"]);
  
    }
  } 

  public function excluir($param)
  {
    array_shift($_POST); //elimina o campo _method

    $db = DB::connect();
    $rs = $db->prepare("DELETE FROM clientes WHERE id={$param};");
    $exec = $rs->execute();

    if(isset($exec)){
      json_encode(["dados" => "Dados excluidos com sucesso"]);
    }
    else{
      json_encode(["dados" => "Erro ao excluir dados"]);

    }
  }
}