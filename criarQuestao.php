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
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">ProfessorHelper</a>
        </div>

        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Início</a></li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Criar<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="criarCurso.php">Curso</a></li>
              <li><a href="criarDisciplina.php">Disciplina</a></li>
              <li><a href="criarAssunto.php">Assunto</a></li>
              <li><a href="criarQuestao.php">Questão</a></li>
            </ul>
          </li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Lista<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Minhas Listas</a></li>
              <li><a href="#">Nova Lista</a></li>
            </ul>
          </li>

          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Filtrar por curso<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Análise de Sistemas</a></li>
              <li><a href="#">Engenharia Mecânica</a></li>
              <li><a href="#">Economia</a></li>
              <li><a href="#">Arquitetura</a></li>
            </ul>
          </li>

          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Filtrar por disciplina<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Análise de Sistemas</a></li>
              <li><a href="#">Engenharia Mecânica</a></li>
              <li><a href="#">Economia</a></li>
              <li><a href="#">Arquitetura</a></li>
            </ul>
          </li>

          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Filtrar por assunto<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Análise de Sistemas</a></li>
              <li><a href="#">Engenharia Mecânica</a></li>
              <li><a href="#">Economia</a></li>
              <li><a href="#">Arquitetura</a></li>
            </ul>
          </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
        </ul>

        <form class="navbar-form navbar-right">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Busca">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </div>
        </form>

      </div>
  </nav>

  <div class="container-fluid text-center">
    <div class="row content">
      <div class="col-sm-2 sidenav"></div>
      <div class="col-sm-8 text-left"> <!-- div que compoe o fundo cinza -->

      <!-- Inicio do formulário de criação de questao -->
        <div class="container">
            <h2>Criar Questão</h2>
            <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
              <!-- The htmlspecialchars() function converts special characters to HTML entities. It avoids exploits -->
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

                <!-- Inicio do menu dropdown com opcoes de cursos -->
                <div class="form-group">
                  <label class="control-label col-sm-2" for="nomeCurso">Curso:</label>
                    <select name="selectedOptionCurso" class="custom-select mb-2 mr-sm-2 mb-sm-0">
                      <option selected>Escolha...</option>
                      <?php
                        // Inicio do processo de obtenção dos cursos registrados no banco de dados
                        require_once 'db_credentials.php';
                        $conn = mysqli_connect($servername,$username,$password,$dbname);

                        if(!$conn){
                          die ('Erro ao conectar ao banco MySQL. Não foi possível gerar dropdown para cursos');
                        }

                        $sql = "SELECT * FROM Curso";
                        $result = mysqli_query($conn, $sql);
                        if(!$result){
                          die ('Erro ao consultar banco MySQL');
                        }

                        if($result){
                            while($stc = mysqli_fetch_array($result)){
                              $cursoNome= $stc['nomeCurso'];
                              $cursoDesc= $stc['descricao'];
                              $cursoid= $stc['idCurso'];
                              echo "<option value=\"{$cursoid}\">{$cursoNome} - {$cursoDesc}</option>";
                            }
                        }
                        else {
                            echo "<li><a href=\"#\">Sem cursos :( </a></li>";
                        }
                        mysqli_close($conn);
                        // Fim do processo de obtenção dos cursos registrados no banco de dados
                      ?>
                    </select>
                  </div>

            <!-- Inicio do menu dropdown com opcoes de disciplinas -->
            <div class="form-group">
            <label class="control-label col-sm-2" for="nomeCurso">Disciplina:</label>
              <select name="selectedOptionDisc" class="custom-select mb-2 mr-sm-2 mb-sm-0">
                <option selected>Escolha...</option>
                <?php
                  // Inicio do processo de obtenção dos cursos registrados no banco de dados
                  require_once 'db_credentials.php';
                  $conn = mysqli_connect($servername,$username,$password,$dbname);

                  if(!$conn){
                    die ('Erro ao conectar ao banco MySQL. Não foi possível gerar dropdown para cursos');
                  }

                  $sql = "SELECT * FROM Disciplina";
                  $result = mysqli_query($conn, $sql);
                  if(!$result){
                    die ('Erro ao consultar banco MySQL');
                  }

                  if($result){
                      while($stc = mysqli_fetch_array($result)){
                        $DiscNome= $stc['nomeDisciplina'];
                        $DiscDesc= $stc['descricao'];
                        $Discid= $stc['idDisciplina'];
                        echo "<option value=\"{$Discid}\">{$DiscNome} - {$DiscDesc}</option>";
                      }
                  }
                  else {
                      echo "<li><a href=\"#\">Sem cursos :( </a></li>";
                  }
                  mysqli_close($conn);
                  // Fim do processo de obtenção das disciplinas registrados no banco de dados
                ?>
              </select>
            </div>

            <!-- Inicio do menu dropdown com opcoes de assuntos -->
            <div class="form-group">
            <label class="control-label col-sm-2" for="nomeCurso">Assunto:</label>
              <select name="selectedOptionAssunto" class="custom-select mb-2 mr-sm-2 mb-sm-0">
                <option selected>Escolha...</option>
                <?php
                  // Inicio do processo de obtenção dos assuntos registrados no banco de dados
                  require_once 'db_credentials.php';
                  $conn = mysqli_connect($servername,$username,$password,$dbname);

                  if(!$conn){
                    die ('Erro ao conectar ao banco MySQL. Não foi possível gerar dropdown para cursos');
                  }

                  $sql = "SELECT * FROM Assunto";
                  $result = mysqli_query($conn, $sql);
                  if(!$result){
                    die ('Erro ao consultar banco MySQL');
                  }

                  if($result){
                      while($stc = mysqli_fetch_array($result)){
                        $assunto= $stc['tituloAssunto'];
                        $codAssunto = $stc['idAssunto'];
                        echo "<option value=\"{$codAssunto}\">{$assunto}</option>";
                      }
                  }
                  else {
                      echo "<li><a href=\"#\">Sem cursos :( </a></li>";
                  }
                  mysqli_close($conn);
                  // Fim do processo de obtenção dos cursos registrados no banco de dados
                ?>
              </select>
            </div>
            <!-- Inicio do botao para criar questao -->
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">Criar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</body>

<?php

    require_once 'db_credentials.php';
    $conn = mysqli_connect($servername,$username,$password,$dbname);

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

        $sql = "INSERT INTO Questao (tituloQuestao, enunciado, alternativaA, alternativaB, alternativaC, alternativaD, alternativaE, alternativaCorreta, curso, disciplina, assunto)
                VALUES ('$titulo', '$enunciado', '$altA', '$altB', '$altC', '$altD', '$altE', '$correta', '$codCurso', '$codDisc', '$codAssunto');";


        if (mysqli_query($conn, $sql)) {
            echo "<b>Questao criada com sucesso!</b>";
        } else {
            echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
  }


    mysqli_close($conn);
?>


</html>
