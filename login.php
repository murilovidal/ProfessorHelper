<!DOCTYPE html>
<html>

  <head>
    <title>ProfessorHelper</title>
    <meta charset="utf-8">

    <!-- Bootstrap Stuff -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>

  <body>
        <div class="titulo">
          ProfessorHelper
        </div>

        <div class="login-page">
          <div class="form">
            <form class="login-form">
              <input type="text" placeholder="Nome"/>
              <input type="password" placeholder="Senha"/>
              <button>login</button>
              <p class="message">Esqueceu a senha? <a href="#">Clique aqui</a></p>
            </form>
        </div>
    </div>
  </body>
</html>
<script>
$('.message a').clic  k(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
