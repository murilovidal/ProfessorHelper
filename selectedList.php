<?php
    session_start();
    $_SESSION['idLista'] = $_POST['idList'];
    echo $_SESSION['idLista'];
    echo "?????";
    echo $_POST['idList'];
    require 'db_credentials.php';
    $conn = mysqli_connect($servername,$username,$db_password,$dbname);
    $idQuestion = $_POST['include_id'];
    $idUser = $_POST['userid'];
    $idList = $_POST['idList'];
    $sql = "SELECT tituloLista FROM Lista WHERE idLista = $idList;";
    $result = mysqli_query($conn, $sql);
    if(!$conn){
      die ('Erro ao conectar ao banco MySQL'.mysqli_connect_error());
    }
    if(mysqli_num_rows($result) > 0){ // retorna o numero de linhas da variavel result
        while($stc = mysqli_fetch_array($result)){
          $_SESSION['tituloLista'] = $stc['tituloLista'];
        }
    }
    else {
        $_SESSION['tituloLista'] = "Nenhuma selecionada";
        echo "nao achou lista";
    }
    mysqli_close($conn);


?>
