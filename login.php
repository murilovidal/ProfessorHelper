<?php
require "db_functions.php";
require "authenticate.php";

$error = false;
$password = $email = "";

if (!$login && $_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["email"]) && isset($_POST["password"])) {

    $conn = connect_db();

    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $password = mysqli_real_escape_string($conn,$_POST["password"]);
    $password = md5($password);

    $sql = "SELECT idProfessor,name,email,password FROM $table_users
            WHERE email = '$email';";

    $result = mysqli_query($conn, $sql);
    if($result){
      if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if ($user["password"] == $password) {

          $_SESSION["user_id"] = $user["idProfessor"];
          $_SESSION["user_name"] = $user["name"];
          $_SESSION["user_email"] = $user["email"];

          //header("Location: " . dirname($_SERVER['SCRIPT_NAME']) . "/index.php");
          header("Location: " . "/index.php");
          exit();
        }
        else {
          $error_msg = "Senha incorreta!";
          $error = true;
        }
      }
      else{
        $error_msg = "Usuário não encontrado!";
        $error = true;
      }
    }
    else {
      $error_msg = mysqli_error($conn);
      $error = true;
    }
  }
  else {
    $error_msg = "Por favor, preencha todos os dados.";
    $error = true;
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>ProfessorHelper - Login</title>
</head>
<body>
  <div class="img-logo">
        <img src="/images/ProfHel.png" class="img-logo">
  </div>

<?php if ($login): ?>
  <div class="form">
    <form action="index.php" method="post">
      <b>Você já está logado!</b>
      <input type="submit" name="submit" value="Voltar">
    </form>
    <form action="logout.php" method="post">
      <input type="submit" name="submit" value="Sair">
    </form>
  </div>
  </body>
  </html>
  <?php exit(); ?>
<?php endif; ?>


<div class="login-page">
  <div class="form">
    <form action="login.php" method="post">
      <input type="text" name="email" value="<?php echo $email; ?>" required placeholder="email"><br>

      <input type="password" name="password" value="" required placeholder="senha"><br>

      <input type="submit" name="submit" value="Entrar">
      <?php if ($error): ?>
        <p class="message"><a><?php echo $error_msg; ?></a></p>
      <?php endif; ?>
    </form>
  </div>
</div>
</body>
</html>
