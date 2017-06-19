<?php
  session_start();

  if (isset($_SESSION["user_id"]) && isset($_SESSION["user_name"]) && isset($_SESSION["user_email"])) {
    $login = true;
    $user_id = $_SESSION["user_id"];
    $user_name = $_SESSION["user_name"];
    $user_email = $_SESSION["user_email"];
    $user_type = $_SESSION["user_type"];
    $_SESSION["idList"] = $_POST["idList"];
    $idList = $_SESSION["idList"];
    echo $_POST["idList"];
  }
  else{
    $login = false;
  }

?>
