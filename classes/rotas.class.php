<?php

class Rotas {

  private $listaRotas = [];
  private $listaCallback = [];
  private $listaProtecao = [];

  public function add($metodo, $rota, $callback, $protecao)
  {
    $this->listaRotas[] = strtoupper($metodo).":".$rota;
    $this->listaCallback[] = $callback;
    $this->listaProtecao[] = $protecao;

    return $this;
  }

  public function ir($rota)
  {
    $param = '';
    $callback = '';
    $protecao = '';
    $methodServer = $_SERVER["REQUEST_METHOD"];
    $methodServer = isset($_POST["_method"]) ? $_POST["_method"] :  $methodServer;
    $rota = $methodServer.":/".$rota;

    $indice = array_search($rota, $this->listaRotas);
    if($indice > 0)
    {
      $callback = explode("::", $this->listaCallback[$indice]);
      $protecao = $this->listaProtecao[$indice];
    }

    $class = isset($callback[0]) ? $callback[0] : '';
    $method = $callback[1];

    if(class_exists($class))
    {
      if(method_exists($class, $method))
      {
        $instanciaClasse = new $class();
        return call_user_func_array(
          array($instanciaClasse, $method),
          array($param)
        );
      }  
    }



    print_r($rota);
  }
}