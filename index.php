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
    <script src="jquery-3.2.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="saveOnList.js"></script>
    <script src="passLike.js"></script>

  </head>

  <body>

    <?php if (!$login): ?>
      <li><a href="login.php">Fazer Login</a></li>
      <?php exit(); ?>
    <?php endif; ?>
    <?php require_once "php/navBar.php"; ?> <!-- nessa linha estamos requisitando a barra de navegação superior -->

  <div class="container-fluid text-center">
    <div class="row content">
      <div class="col-sm-2 sidenav">
        <h2>Olá, <?php
                      if ($login) {
                        echo "$user_name!";
                      }
                      else {
                        echo "!";
                      }
                    ?></h2>
      </div>

      <div class="col-sm-8 text-left" id="<?php echo $user_id; ?>" name="<?php echo $_SESSION['idLista']; ?>"> <!-- div que compoe as ultimas questoes adicionadas(contem a id do usuario logado ) -->
        <?php require_once "php/showQ.php";?> <!-- requisitando a lista de questões do banco de dados -->
      </div>  <!-- fim da div com as ultimas questoes adicionadas -->

      <div class="col-sm-2 sidenav">
          <div class="well">
            <p><?php
                  echo "Lista atual: ";
                  echo $_SESSION['tituloLista'];
              ?>
            </p>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>
