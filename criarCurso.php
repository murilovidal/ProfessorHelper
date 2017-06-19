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

    <!-- Fim do formulário de criação de curso e inicio do processo de escrita do novo curso no bd-->
      <?php
          require 'db_credentials.php';
          $conn = mysqli_connect($servername,$username,$db_password,$dbname);

          if(!$conn){
            die ('Erro ao conectar ao banco MySQL'.mysqli_connect_error());
          }

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

          mysqli_close($conn);
      ?>
</div>
</div>
</div>
</div>
</body>
</html>
