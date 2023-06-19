# API em PHP

- Cria arquivo **.htaccess** na raiz do projeto com o código abaixo:

  ```
  RewriteEngine On
  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteCond %{REQUEST_FILENAME} !-d
  RewriteRule ^(.*) index.php?path=$1 [QSA,L]

  ```

- Cria o **index.php** na raiz e insere:

  ```php
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
  ```
  
- Cria o **db.class.php** na pasta *classes* para configurar a conexão com o DB e insere:

  ```php
  <?php
  class DB {
    public static function connect(){
      $host = "localhost";
      $user = "admin";
      $pass = "admin";
      $base = "php-api";

      return new PDO("mysql:host={$host};dbname={$base};charset=UTF8;", $user, $pass);
    }
  }
  ```