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


          <!-- Inicio do formulário de criação da disciplina -->
          <div class="container">
            <h2>Criar Disciplina</h2>
            <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
              <!-- The htmlspecialchars() function converts special characters to HTML entities. It avoids exploits -->
              <div class="form-group">
                <label class="control-label col-sm-2" for="nomeCurso">Nome da disciplina:</label>
                <div class="col-sm-8">
                  <input required type="text" class="form-control" id="nomeDisc" placeholder="Entre com um nome para a disciplina" name="nomeDisc">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Descrição:</label>
                <div class="col-sm-8">
                  <input required type="text" class="form-control" id="descricaoDisc" placeholder="Escreva uma descrição" name="descricaoDisc">
                </div>
              </div>

              <!-- Inicio do menu dropdown com opcoes de cursos -->
              <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label class="control-label col-sm-2" for="nomeCurso">Curso:</label>
                  <select name="selectedOption" class="custom-select mb-2 mr-sm-2 mb-sm-0">
                    <option selected>Escolha...</option>
                      <?php require_once "php/showC.php"; ?> <!-- nessa linha estamos requisitando os cursos escritos no bd -->
                  </select>
                  <input type="submit" value="Submit the form"/>
              </form>
            </form>
            <br>

      <!-- Fim do formulário de criação de disciplina e inicio da escrita no banco-->
      <?php
          require_once 'db_credentials.php';
          $conn = mysqli_connect($servername,$username,$db_password,$dbname);

          if(!$conn){
            die ('Erro ao conectar ao banco MySQL'.mysqli_connect_error());
          }

          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if((isset($_POST["nomeDisc"])) && (isset($_POST["descricaoDisc"]))) {

              $nomeDisc = $_POST['nomeDisc'];
              $descricaoDisc = $_POST['descricaoDisc'];
              $codCurso = $_POST['selectedOption'];
              $owner = $_SESSION['user_id'];

              $sql = "INSERT INTO Disciplina (nomeDisciplina, descricao, codCurso, professorOwner) VALUES ('$nomeDisc', '$descricaoDisc', '$codCurso', '$owner');";

              if (mysqli_query($conn, $sql)) {
                  echo "<b><br>Disciplina criada com sucesso!</b>";
              } else {
                  echo "Erro: " . $sql . "<br><br>" . mysqli_error($conn);
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
