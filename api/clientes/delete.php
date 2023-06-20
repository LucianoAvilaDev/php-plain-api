<?php

if($acao == '' && $param == '' 
  || $acao == 'delete' && $param == ''
) { echo json_encode(['ERRO' => 'Caminho não encontrado']); exit;}

//DELETE
if($acao == 'delete' && $param != '') {

  
}