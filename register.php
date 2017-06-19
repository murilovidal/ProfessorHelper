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
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">ProfessorHelper</a>
        </div>

        <ul class="nav navbar-nav">
          <li class="button"><a href="index.php">Início</a></li>
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
          <li class="button"><a href="filtrar.php">Filtrar</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
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
      <div class="col-sm-8 text-left"> <!-- div que compoe o background cinza -->

        <h2>Dados para registro de novo usuário</h2>

        <?php if ($success): ?>
          <h3 style="color:lightgreen;">Usuário criado com sucesso!</h3>
          <p>
            Seguir para <a href="login.php">login</a>.
          </p>
        <?php endif; ?>

        <?php if ($error): ?>
          <h3 style="color:red;"><?php echo $error_msg; ?></h3>
        <?php endif; ?>

        <form action="register.php" method="post">
          <label for="name">Nome: </label>
          <input type="text" name="name" value="<?php echo $name; ?>" required><br><br>

          <label for="email">Email: </label>
          <input type="text" name="email" value="<?php echo $email; ?>" required><br><br>

          <label for="password">Senha: </label>
          <input type="password" name="password" value="" required><br><br>

          <label for="confirm_password">Confirmação da Senha: </label>
          <input type="password" name="confirm_password" value="" required><br><br><br>

          <input type="submit" name="submit" value="Criar usuário">
          <br><br>
        </form>
      </div>
    </body>
</html>














      <?php
      require "db_functions.php";

      $error = false;
      $success = false;
      $name = $email = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm_password"])) {

          $conn = connect_db();

          $name = mysqli_real_escape_string($conn,$_POST["name"]);
          $email = mysqli_real_escape_string($conn,$_POST["email"]);
          $password = mysqli_real_escape_string($conn,$_POST["password"]);
          $confirm_password = mysqli_real_escape_string($conn,$_POST["confirm_password"]);

          if ($password == $confirm_password) {
            $password = md5($password);

            $sql = "INSERT INTO Professor
                    (name, email, password) VALUES
                    ('$name', '$email', '$password');";

            if(mysqli_query($conn, $sql)){
              $success = true;
            }
            else {
              $error_msg = mysqli_error($conn);
              $error = true;
            }
          }
          else {
            $error_msg = "Senha não confere com a confirmação.";
            $error = true;
          }
        }
        else {
          $error_msg = "Por favor, preencha todos os dados.";
          $error = true;
        }
      }
      ?>
