<?php
  require "authenticate.php";
?>
<!DOCTYPE html>
<html>

  <head>
    <title>ProfessorHelper</title>
    <meta charset="utf-8">

    <!-- Bootstrap Stuffs -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>

    <body>
      <?php require_once "php/navBar.php"; ?>
      <div class="col-sm-2 sidenav"></div>
      <div class="col-sm-8 text-left"> <!-- div que compoe o background cinza -->
      <?php

      require_once 'db_credentials.php';
      $conn = mysqli_connect($servername,$username,$db_password,$dbname);

      if(!$conn){
        die ('Erro ao conectar ao banco MySQL. Não foi mostrar os exercícios mais votados');
      }

      $sql = "SELECT assunto FROM Questao GROUP BY assunto;";
      //$sql = "SELECT * FROM Questao ORDER BY numeroLikes ASC;";
      $result = mysqli_query($conn, $sql);

      if(!$result){
        die ('Erro ao consultar banco MySQL');
      }

      if(mysqli_num_rows($result) > 0){
          while($stc = mysqli_fetch_array($result)){
            $assunto = $stc['assunto'];
            $sqlAssunto = "SELECT tituloAssunto FROM Assunto WHERE idAssunto = $assunto;";
            $resultA = mysqli_query($conn, $sqlAssunto);
            $resA = mysqli_fetch_array($resultA);
            $tituloAssunto = $resA['tituloAssunto'];
            echo "<h2>As mais votadas com o assunto '$tituloAssunto'</h2>";

            $sql = "SELECT * FROM Questao WHERE assunto = $assunto ORDER BY numeroLikes DESC LIMIT 3;"; // selecionando as 3 questões mais votadas de um determinado assunto
            $resultQ = mysqli_query($conn, $sql);

            if(mysqli_num_rows($resultQ) > 0){
              while($res = mysqli_fetch_array($resultQ)){
                $idQuestao = $res['idQuestao'];
                $titulo = $res['tituloQuestao'];
                $enunciado = $res['enunciado'];
                $altA = $res['alternativaA'];
                $altB = $res['alternativaB'];
                $altC = $res['alternativaC'];
                $altD = $res['alternativaD'];
                $altE = $res['alternativaE'];
                $erros = $res['erros'];
                $acertos = $res['acertos'];
                $nLikes = $res['numeroLikes'];
                $correct = $res['alternativaCorreta'];


                if($nLikes > 0){ // mostrando apenas questões que receberam pelo menos 1 voto
                  echo "<h3>{$titulo}</h3></br>";
                  echo "<h4>{$enunciado}</h4></br>";
                  echo "<div class='container'>";
                  echo "<p>a) {$altA}<p>";
                  echo "<p>b) {$altB}<p>";
                  echo "<p>c) {$altC}<p>";
                  echo "<p>d) {$altD}<p>";
                  echo "<p>e) {$altE}<br><br>";
                  echo "<p>Correta: <b>{$correct}</b><p>";
                  echo "<p>Total de likes: {$nLikes}<p>";
                  echo "<p>Acertos: {$acertos}<p>";
                  echo "<p>Erros: {$erros}<p><br>";
                  //botão adicionar à lista
                  if ($_SESSION['idLista']!=0) {
                    echo "<button type='button' class='btn btn-success btn-md' name='include' value='Adicionar à lista' id='{$idQuestao}'>Adicionar à lista</button><br>";
                  }
                  else {
                    echo " <a href='minhasListas.php' class='btn btn-info' role='button'>Selecione uma Lista</a><br>";
                  }
                  echo "<button type='button' id='{$idQuestao}' name='likeSubmit' class='btn btn-primary glyphicon glyphicon-thumbs-up' id='{$idQuestao}'> Curti</button>";
                  echo "<button type='button' id='{$idQuestao}' name='dislikeSubmit' class='btn btn-danger glyphicon glyphicon-thumbs-down' id='{$idQuestao}'> Não curti</button>";
                  echo "</div><br>";
                }
              }
            }
          }
      }
      else {
          echo "<h3>Ops, nenhuma questão foi criada :(</h3>";
      }

      mysqli_close($conn);
      ?>
      </div>  <!-- fim da div com as ultimas questoes adicionadas -->
    </body>
  </html>
