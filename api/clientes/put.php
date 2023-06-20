<?php

if($acao == '' && $param == '' 
  || $acao == 'update' && $param == ''
) { echo json_encode(['ERRO' => 'Caminho não encontrado']); exit;}

//UPDATE
if($acao == 'update' && $param != '') {

  
}