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

    if(!$conn){
      die ('Erro ao conectar ao banco MySQL'.mysqli_connect_error());
    }
    else {
      $codLista = $_POST['VisualizarLista'];
      $sql = "SELECT * FROM ListaQuestao WHERE codLista=$codLista;";
      $result = mysqli_query($conn, $sql);

      if(!$result){
        die ('Erro ao consultar banco de listas');
      }



      if(mysqli_num_rows($result) > 0){
          while($stc = mysqli_fetch_array($result)){
            $codQuestao = $stc['codQuestao'];
            $sql = "SELECT * FROM Questao WHERE idQuestao=$codQuestao;";
            $resultQuestao = mysqli_query($conn, $sql);

            if(!$resultQuestao){
              die ('Erro ao consultar banco de questões');
            }
            while($res = mysqli_fetch_array($resultQuestao)){
              $titulo = $res['tituloQuestao'];
              $enunciado = $res['enunciado'];
              $altA = $res['alternativaA'];
              $altB = $res['alternativaB'];
              $altC = $res['alternativaC'];
              $altD = $res['alternativaD'];
              $altE = $res['alternativaE'];

              echo "<h3>{$titulo}</h3></br>";
              echo "<h4>{$enunciado}</h4></br>";
              echo "<div class='container'>";
              echo "<p>a) {$altA}<p><br>";
              echo "<p>b) {$altB}<p><br>";
              echo "<p>c) {$altC}<p><br>";
              echo "<p>d) {$altD}<p><br>";
              echo "<p>e) {$altE}<br><br>";
              echo "</div>";
            }
          }
      }
      else {
          echo "<h3>Sem questões nessa lista :( </h3>";
      }
    }

    mysqli_close($conn);
?>
</div>  <!-- fim da div com as ultimas questoes adicionadas -->
</body>
</html>
