<?php

if($acao == '' && $param == '' 
  || $acao == 'update' && $param == ''
) { echo json_encode(['ERRO' => 'Caminho não encontrado']); exit;}

//UPDATE
if($acao == 'update' && $param != '') {

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