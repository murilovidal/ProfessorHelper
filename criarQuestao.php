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
    <?php require_once "php/navBar.php"; ?> <!-- nessa linha estamos requisitando a barra de navegação superior -->

    <div class="container-fluid text-center">
      <div class="row content">
        <div class="col-sm-2 sidenav"></div> <!-- esse trecho de codigo só existe pra manter a posicao correta dos elementos na pagina -->
          <div class="col-sm-8 text-left"> <!-- div que compoe o fundo cinza -->

          <!-- Inicio do formulário de criação de questao -->
          <div class="container">
            <h2>Criar Questão</h2>
            <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
              <!-- The htmlspecialchars() function converts special characters to HTML entities. It avoids exploits -->
              <!-- Inicio do menu dropdown com opcoes de cursos -->
              <div class="form-group">
                <label class="control-label col-sm-2" for="nomeCurso">Curso:</label>
                  <select name="selectedOptionCurso" class="custom-select mb-2 mr-sm-2 mb-sm-0">
                    <option selected>Escolha...</option>
                      <?php require_once "php/showC.php"; ?> <!-- nessa linha estamos requisitando a barra de navegação superior -->
                  </select>
              </div>

              <!-- Inicio do menu dropdown com opcoes de disciplinas -->
              <div class="form-group">
                <label class="control-label col-sm-2" for="nomeCurso">Disciplina:</label>
                <select name="selectedOptionDisc" class="custom-select mb-2 mr-sm-2 mb-sm-0">
                  <option selected>Escolha...</option>
                    <?php require_once "php/showD.php"; ?> <!-- nessa linha estamos requisitando a barra de navegação superior -->
                </select>
              </div>

              <!-- Inicio do menu dropdown com opcoes de assuntos -->
              <div class="form-group">
              <label class="control-label col-sm-2" for="nomeCurso">Assunto:</label>
                <select name="selectedOptionAssunto" class="custom-select mb-2 mr-sm-2 mb-sm-0">
                  <option selected>Escolha...</option>
                  <?php require_once "php/showA.php"; ?> <!-- nessa linha estamos requisitando a barra de navegação superior -->
                </select>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="tituloQuestao">Titulo:</label>
                <div class="col-sm-8">
                  <input required type="text" class="form-control" id="tituloQuestao" placeholder="Entre com o título da questão" name="tituloQuestao">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Enunciado:</label>
                <div class="col-sm-8">
                  <textarea class="form-control" id="enunciadoQuestao" placeholder="Escreva aqui o enunciado da questão" name="enunciadoQuestao" rows="10" cols="30"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Alternativa a):</label>
                <div class="col-sm-8">
                  <textarea id="alternativaA" name="alternativaA" rows="9" cols="40"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Alternativa b):</label>
                <div class="col-sm-8">
                  <textarea id="alternativaB" name="alternativaB" rows="9" cols="40"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Alternativa c):</label>
                <div class="col-sm-8">
                  <textarea id="alternativaC" name="alternativaC" rows="9" cols="40"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Alternativa d):</label>
                <div class="col-sm-8">
                  <textarea id="alternativaD" name="alternativaD" rows="9" cols="40"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Alternativa e):</label>
                <div class="col-sm-8">
                  <textarea id="alternativaE" name="alternativaE" rows="9" cols="40"></textarea>
                </div>
              </div>
              <!--Inicio do menu dropdown com opcoes para marcar alternativa correta -->
              <div class="form-group">
                <label class="control-label col-sm-2" for="nomeCurso">Alternativa correta:</label>
                <select name="selectedOptionAlternativa" class="custom-select mb-2 mr-sm-2 mb-sm-0">
                  <option selected>Escolha...</option>
                  <option value=1>A</option>
                  <option value=2>B</option>
                  <option value=3>C</option>
                  <option value=4>D</option>
                  <option value=5>E</option>
                </select>
              </div>

                <!-- Inicio do botao para criar questao -->
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Criar</button>
                    </div>
                  </div>
                </form>

                <?php
                    require_once 'db_credentials.php';
                    $conn = mysqli_connect($servername,$username,$db_password,$dbname);

                    if(!$conn){
                      die ('Erro ao conectar ao banco MySQL'.mysqli_connect_error());
                    }

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                      if((isset($_POST["tituloQuestao"])) && (isset($_POST["enunciadoQuestao"]))) {

                        $titulo = $_POST['tituloQuestao'];
                        $enunciado = $_POST['enunciadoQuestao'];
                        $altA = $_POST['alternativaA'];
                        $altB = $_POST['alternativaB'];
                        $altC = $_POST['alternativaC'];
                        $altD = $_POST['alternativaD'];
                        $altE = $_POST['alternativaE'];
                        $correta = $_POST['selectedOptionAlternativa'];
                        $codCurso = $_POST['selectedOptionCurso'];
                        $codDisc = $_POST['selectedOptionDisc'];
                        $codAssunto = $_POST['selectedOptionAssunto'];
                        $owner = $_SESSION['user_id'];


                        $sql = "INSERT INTO Questao (tituloQuestao, enunciado, alternativaA, alternativaB, alternativaC, alternativaD, alternativaE, alternativaCorreta, curso, disciplina, assunto, professorOwner)
                                VALUES ('$titulo', '$enunciado', '$altA', '$altB', '$altC', '$altD', '$altE', '$correta', '$codCurso', '$codDisc', '$codAssunto', '$owner');";


                        if (mysqli_query($conn, $sql)) {
                            echo "<b>Questao criada com sucesso!</b>";
                        } else {
                            echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
                        }
                    }
                  }

                    mysqli_close($conn);
                ?>
</div>
</div>
</div>
</div>
</body>
</html>
