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
    <script src="saveOnList.js"></script>
  </head>

  <body>
    <?php require_once "php/navBar.php"; ?> <!-- nessa linha estamos requisitando a barra de navegação superior -->

  <div class="col-sm-2 sidenav"></div>
  <div class="col-sm-9 text-left" id="divMinhasListas"> <!-- div que compoe o background cinza, um pouco diferenciado para essa pagina -->
    <?php
      require_once 'db_credentials.php';
      $conn = mysqli_connect($servername,$username,$db_password,$dbname);
      $busca = $_POST['busca'];
      $owner = $_SESSION['user_id'];

      if(!$conn){
        die ('Erro ao conectar ao banco MySQL. Não foi possível gerar dropdown para cursos');
      }

      $sql = "SELECT * FROM Lista WHERE professorOwner=$owner;";
      $result = mysqli_query($conn, $sql);

      if(!$result){
        die ('Erro ao consultar banco MySQL');
      }

      if(mysqli_num_rows($result) > 0){
          echo "<ul class='list-group'>";
          while($stc = mysqli_fetch_array($result)){
            $descricao = $stc['descricao'];
            $tituloLista = $stc['tituloLista'];
            $idLista = $stc['idLista'];

            echo "<li class='list-group-item'><a href='VisualizarLista.php'>{$tituloLista} - {$descricao} </a>";
            //botão selecionar lista
            echo "<a href='index.php' class='btn btn-info' role='button' name='list' id='{$idLista}'>Selecionar</a></li><br>";
            echo "<div class='col-sm-0 sidenav'><form class='form-horizontal' action='prova.php' method='GET'>
                  <input type='hidden' name='idlista' value='{$idLista}' />
                  <button type='submit' class='btn btn-danger'>GERAR PROVA {$tituloLista}</button></form></div><br>";

            echo "<div class='col-sm-0 sidenav'><form class='form-horizontal' action='VisualizarLista.php' method='POST'><button type='submit' class='btn btn-danger' name='VisualizarLista' value='{$idLista}'>Visualizar questões da lista {$tituloLista}</button></form></div><br>";
          }
          echo "</ul>";
          echo  "<button type='button' class='btn btn-warning btn-md' name='list' value='selista' id='0'>Sair da lista atual</button><br></li>";

      }
      else {
          echo "<h3>Você ainda não tem nenhuma lista :(</h3>";
          echo "<a href='novaLista.php' class='btn btn-primary' role='button'>Criar Lista</a><br></li>";

      }
      mysqli_close($conn);
    ?>
</div> <!--  fim da div com o fundo cinza -->
</body>
</html>
