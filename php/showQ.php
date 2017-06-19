<?php
require 'db_credentials.php';

$conn = mysqli_connect($servername,$username,$db_password,$dbname);

if(!$conn){
  die ('Erro ao conectar ao banco MySQL');
}
$sql = "SELECT * FROM Questao ORDER BY idQuestao DESC;"; // esse order by em ordem decrescente serve para mostrar as questões mais recentes primeiro
$result = mysqli_query($conn, $sql);
if(!$result){
  die ('Erro ao consultar banco MySQL');
}

if(mysqli_num_rows($result) > 0){ // retorna o numero de linhas da variavel result
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
      $nLikes = $stc['numeroLikes'];
      $correct = $stc['alternativaCorreta'];

      echo "<h3>{$titulo}</h3></br>";
      echo "<h4>{$enunciado}</h4></br>";
      echo "<div class='container'>";
      echo "<p>a) {$altA}<p><br>";
      echo "<p>b) {$altB}<p><br>";
      echo "<p>c) {$altC}<p><br>";
      echo "<p>d) {$altD}<p><br>";
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
else {
  echo "<h3>Infelizmente não existem questões para serem mostradas :(</h3>";
}

/* adicionando questao a lista

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if((isset($_POST["nomeCurso"])) && (isset($_POST["descricaoCurso"]))) {
    $nomeCurso = $_POST['nomeCurso'];
    $descricao = $_POST['descricaoCurso'];
    $owner = $_SESSION['user_id'];

    $sql = "INSERT INTO Curso (nomeCurso, descricao, professorOwner) VALUES ('$nomeCurso', '$descricao','$owner');";

    if (mysqli_query($conn, $sql)) {
        echo "<b>Curso criado com sucesso!</b>";
    } else {
        echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
}

*/

mysqli_close($conn);
?>
