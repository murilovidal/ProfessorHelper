<?php
  echo "<!DOCTYPE html>
  <html>

    <head>
      <title>ProfessorHelper</title>
      <meta charset='utf-8'>

      <!-- Bootstrap Stuffs -->
      <meta name='viewport' content='width=device-width, initial-scale=1'>
      <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
      <link rel='stylesheet' type='text/css' href='css/style.css'>
      <script src='jquery-3.2.1.js'></script>
      <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
      <script src='prova.js'></script>


    </head>

    <body>
<div class='col-sm-2 sidenav'>
Boa Prova.
</div>
     <div class='col-sm-8 text-left'>";
echo "<form id='form' action='provaResolvida.php' method='GET'>";
  require   "db_credentials.php";

  $idLista = $_GET['idlista'];

  $conn = mysqli_connect($servername,$username,$db_password,$dbname);

  if(!$conn){
    die ('Erro ao conectar ao banco MySQL');
  }
  $sql = "SELECT codQuestao FROM ListaQuestao WHERE codLista = $idLista;"; // seleciona o id das questoes da lista

  $result = mysqli_query($conn, $sql);
  if(!$result){
    die ('Erro ao consultar banco MySQL');
  }
  if(mysqli_num_rows($result) > 0){ // retorna o numero de linhas da variavel result
      while($stc = mysqli_fetch_array($result)){
        $codQuestao = $stc['codQuestao'];
        $sqlQuestoes = "SELECT * FROM Questao WHERE idQuestao = $codQuestao;"; // seleciona as questoes do banco
        $resultQ = mysqli_query($conn, $sqlQuestoes);
        if(mysqli_num_rows($resultQ) > 0){ // retorna o numero de linhas da variavel result
            while($stcQ = mysqli_fetch_array($resultQ)){
              $idQuestao = $stcQ['idQuestao'];
              $titulo = $stcQ['tituloQuestao'];
              $enunciado = $stcQ['enunciado'];
              $altA = $stcQ['alternativaA'];
              $altB = $stcQ['alternativaB'];
              $altC = $stcQ['alternativaC'];
              $altD = $stcQ['alternativaD'];
              $altE = $stcQ['alternativaE'];
              $erros = $stcQ['erros'];
              $acertos = $stcQ['acertos'];
              $nLikes = $stcQ['numeroLikes'];
              $correct = $stcQ['alternativaCorreta'];


              echo "<h3>{$titulo}</h3></br>";
              echo "<h4>{$enunciado}</h4></br>";
              echo "<div class='container'><fieldset>";
              echo "<input class='questao' type='radio' name={$idQuestao} value='A' required>a) {$altA}<br>";
              echo "<input class='questao' type='radio' name={$idQuestao} value='B' required>b) {$altB}<br>";
              echo "<input class='questao' type='radio' name={$idQuestao} value='C' required>c) {$altC}<br>";
              echo "<input class='questao' type='radio' name={$idQuestao} value='D' required>d) {$altD}<br>";
              echo "<input class='questao' type='radio' name={$idQuestao} value='E' required>e) {$altE}<br>";
              echo "</fieldset></div><br>";
            }
        }
        else {
          echo "<h3>Infelizmente não existem questões para serem mostradas :(</h3>";
        }
  }

}
  mysqli_close($conn);
?>
<button type='submit' class='btn btn-danger'>Enviar Respostas</button><br>
</form>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>
