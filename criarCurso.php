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
      <div class="col-sm-2 sidenav">
      </div>
      <div class="col-sm-8 text-left"> <!-- div que compoe as ultimas questoes adicionadas -->


      <!-- Inicio do formulário de criação de curso -->

        <div class="container">
            <h2>Criar Curso</h2>
            <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
              <!-- The htmlspecialchars() function converts special characters to HTML entities. It avoids exploits -->
              <div class="form-group">
                <label class="control-label col-sm-2" for="nomeCurso">Nome do Curso:</label>
                <div class="col-sm-8">
                  <input required type="text" class="form-control" id="nomeCurso" placeholder="Entre com um nome para o curso" name="nomeCurso">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Descrição:</label>
                <div class="col-sm-8">
                  <input required type="text" class="form-control" id="descricaoCurso" placeholder="Escreva uma descrição" name="descricaoCurso">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submitCurso" class="btn btn-default">Criar</button>
                </div>
              </div>
            </form>
      </div>
    </body>

      <!-- Fim do formulário de criação de curso -->

      <?php
          require 'db_credentials.php';
          $conn = mysqli_connect($servername,$username,$password,$dbname);

          if(!$conn){
            die ('Erro ao conectar ao banco MySQL'.mysqli_connect_error());
          }

          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if((isset($_POST["nomeCurso"])) && (isset($_POST["descricaoCurso"]))) {
              $nomeCurso = $_POST['nomeCurso'];
              $descricao = $_POST['descricaoCurso'];

              $sql = "INSERT INTO Curso (nomeCurso, descricao) VALUES ('$nomeCurso', '$descricao');";

              if (mysqli_query($conn, $sql)) {
                  echo "<b>Curso criado com sucesso!</b>";
              } else {
                  echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
              }
            }
          }

          mysqli_close($conn);
      ?>

</html>
