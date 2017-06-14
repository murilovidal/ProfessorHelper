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
    <?php if (!$login): ?>
      <li><a href="login.php">Login</a></li>
      <?php exit(); ?>
    <?php endif; ?>
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

          <!-- Filtragem de conteudo mostrado na tela incial. Aqui o usuario tem a opcao de filtrar
               por curso, filtrar por disciplina, e filtrar por assunto. Vale lembrar que para filtrar por,
               por exemplo, disciplina, ele obrigatoriamente precisa ter filtrado por curso antes. Só assim
               o dropdown de Filtrar por Disciplina aparecerá. -->

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
        <h2>Olá, usuário</h2>
      </div>

      <div class="col-sm-8 text-left"> <!-- div que compoe as ultimas questoes adicionadas -->

        <?php
          require 'db_credentials.php';
          $conn = mysqli_connect($servername,$username,$password,$dbname);

          if(!$conn){
            die ('Erro ao conectar ao banco MySQL');
          }
          $sql = "SELECT * FROM Questao";
          $result = mysqli_query($conn, $sql);
          if(!$result){
            die ('Erro ao consultar banco MySQL');
          }

          if($result){
              while($stc = mysqli_fetch_array($result)){
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
                echo "<div class='radio'><label><input type='radio' name='optA'>a) {$altA}</label></div>";
                echo "<div class='radio'><label><input type='radio' name='optB'>b) {$altB}</label></div>";
                echo "<div class='radio'><label><input type='radio' name='optC'>c) {$altC}</label></div>";
                echo "<div class='radio'><label><input type='radio' name='optD'>d) {$altD}</label></div>";
                echo "<div class='radio'><label><input type='radio' name='optE'>e) {$altE}</label></div></br></br>";
              }
        }
        else {
            echo "<h3>Infelizmente não existem questões para serem mostradas :(</h3>";
        }
          mysqli_close($conn);

        ?>
      </div>  <!-- fim da div com as ultimas questoes adicionadas -->

      <div class="col-sm-2 sidenav">
          <div class="well">
            <p>ADS</p>
          </div>
          <div class="well">
            <p>ADS</p>
          </div>
      </div>
    </div>
    </div>

  <footer class="container-fluid">
      <ul class="nav navbar-nav navbar-fixed-bottom">
        <li><a href="#">Sobre</a></li>
        <li><a href="#">Contato</a></li>
      </ul>
  </footer>



    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>
