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
    <script src="saveOnList.js"></script>
  </head>

  <body>
  <?php require_once "php/navBar.php"; ?>

  <div class="col-sm-2 sidenav"></div>
  <div class="col-sm-8 text-left"> <!-- div que compoe o background cinza -->
    <?php
      require_once 'db_credentials.php';
      $conn = mysqli_connect($servername,$username,$db_password,$dbname);
      $busca = $_POST['busca'];

      if(!$conn){
        die ('Erro ao conectar ao banco MySQL. Não foi possível realizar busca');
      }

      $sql = "SELECT * FROM Questao WHERE tituloQuestao LIKE '%$busca%';";
      $result = mysqli_query($conn, $sql);

      if(!$result){
        die ('Erro ao consultar banco MySQL');
      }

      if(mysqli_num_rows($result) > 0){
          while($stc = mysqli_fetch_array($result)){
            $idQuestao = $stc['idQuestao'];
            $titulo = $stc['tituloQuestao'];
            $enunciado = $stc['enunciado'];
            $altA = $stc['alternativaA'];
            $altB = $stc['alternativaB'];
            $altC = $stc['alternativaC'];
            $altD = $stc['alternativaD'];
            $altE = $stc['alternativaE'];
            $erros = $stc['erros'];
            $acertos = $stc['acertos'];
            $nLikes = $stc['numLikes'];
            $correct = $stc['alternativaCorreta'];

            echo "<h3>{$titulo}</h3></br>";
            echo "<p>{$enunciado}</p></br>";

            echo "<p>a) {$altA}<p>";
            echo "<p>b) {$altB}<p>";
            echo "<p>c) {$altC}<p>";
            echo "<p>d) {$altD}<p>";
            echo "<p>e) {$altE}<br><br>";
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
      else {
          echo "<h3>Nada encontrado :(</h3>";
      }
      mysqli_close($conn);
    ?>
</div>  <!-- fim da div com as ultimas questoes adicionadas -->
</body>
</html>
