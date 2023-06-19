<?php

if($acao == '' && $param == '' 
  || $acao == 'delete' && $param == ''
) { echo json_encode(['ERRO' => 'Caminho não encontrado']); exit;}

//DELETE
if($acao == 'delete' && $param != '') {

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