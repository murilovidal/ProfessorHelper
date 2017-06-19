<?php
  // Inicio do processo de obtenção dos cursos registrados no banco de dados
  require_once 'db_credentials.php';
  $conn = mysqli_connect($servername,$username,$db_password,$dbname);

  if(!$conn){
    die ('Erro ao conectar ao banco MySQL. Não foi possível gerar dropdown para cursos');
  }

  $sql = "SELECT * FROM Curso";
  $result = mysqli_query($conn, $sql);
  if(!$result){
    die ('Erro ao consultar banco MySQL');
  }

  if(mysqli_num_rows($result) > 0){
      while($stc = mysqli_fetch_array($result)){
        $cursoNome= $stc['nomeCurso'];
        $cursoDesc= $stc['descricao'];
        $cursoid= $stc['idCurso'];

        //$ref = $_SERVER["PHP_SELF"] . "?id=" . $stc["idCurso"] . "&" . "acao=cursoSelecionado";
        //echo "<li><a href=\"{$ref}\">{$cursoNome} - {$cursoDesc}</a></li>";
        echo "<option value=\"{$cursoid}\">{$cursoNome} - {$cursoDesc}</option>";
      }
  }
  else {
      echo "<li><a href=\"#\">Sem cursos :( </a></li>";
  }
  mysqli_close($conn);
  // Fim do processo de obtenção dos cursos registrados no banco de dados
?>
