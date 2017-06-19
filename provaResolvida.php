<!DOCTYPE html>
<html>
  <head>
    <title>ProfessorHelper</title>
    <meta charset="utf-8">

    <!-- Bootstrap Stuffs -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="jquery-3.2.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>

  <body>
    <div class="container">
  <h2>Resultado</h2>
  <table class="table table-striped">
        <thead>
          <tr>
            <th>Questão</th>
            <th>Sua Resposta</th>
            <th>Resposta Correta</th>
          </tr>
        </thead>
        <thead>
<?php
      require 'db_credentials.php';
      $conn = mysqli_connect($servername,$username,$db_password,$dbname);
      $corretas=0;
      $incorretas=0;
      foreach ($_REQUEST as $key => $value) {
          if(!$conn){
            die ('Erro ao conectar ao banco MySQL'.mysqli_connect_error());
          }

            $sql = "SELECT alternativaCorreta, tituloQuestao FROM Questao WHERE idQuestao=$key;";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){ // retorna o numero de linhas da variavel result
                while($stc = mysqli_fetch_array($result)){
                  $alternativaCorreta = $stc['alternativaCorreta'];
                  $titulo = $stc['tituloQuestao'];
                }
            }
            if ($alternativaCorreta==$value) {
                $corretas+=1;
                $sql2 = "UPDATE Questao SET acertos = acertos + 1 WHERE idQuestao = $key;";
                mysqli_query($conn, $sql2);
            }else {
                $incorretas+=1;
                $sql2 = "UPDATE Questao SET erros = erros + 1 WHERE idQuestao = $key;";
                mysqli_query($conn, $sql2);
            }
            echo "<tr>";
            echo "<td>";
            echo $titulo  ;
            echo "</td>";
            echo "<td>";
            echo $value;
            echo "</td>";
            echo "<td>";
            echo $alternativaCorreta;
            echo "</td>";
            echo "</tr>";
        }
        echo  " </tbody>
              </table>
                <h4>Total de acertos:$corretas Total de erros:$incorretas</h4>
              </div>";

      mysqli_close($conn);


?>
    </tbody>
</table>
</div>
