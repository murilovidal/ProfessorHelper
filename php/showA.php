<?php
  // Inicio do processo de obtenção do assuntos registrados no banco de dados
  require_once 'db_credentials.php';
  $conn = mysqli_connect($servername,$username,$db_password,$dbname);

  if(!$conn){
    die ('Erro ao conectar ao banco MySQL. Não foi possível gerar dropdown para cursos');
  }

  $sql = "SELECT * FROM Assunto";
  $result = mysqli_query($conn, $sql);

  if(!$result){
    die ('Erro ao consultar banco MySQL');
  }

  if(mysqli_num_rows($result) > 0){ // retorna o numero de linhas da variavel result
      while($stc = mysqli_fetch_array($result)){
        $tA= $stc['tituloAssunto'];
        $idA= $stc['idAssunto'];
        echo "<option value=\"{$idA}\">{$tA}</option>";
      }
  }
  else {
      echo "<li><a href=\"#\">Sem cursos :( </a></li>";
  }
  mysqli_close($conn);
  // Fim do processo de obtenção das disciplinas registrados no banco de dados
?>
