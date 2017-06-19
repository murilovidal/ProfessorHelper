<?php
      require 'db_credentials.php';
      $conn = mysqli_connect($servername,$username,$db_password,$dbname);
      $idQuestion = $_POST['include_id'];
      $idUser = $_POST['userid'];
      $likeordis = $_POST['likeordis'];
      if ($likeordis === 'likeSubmit') {
        $sql = "UPDATE Questao SET numeroLikes = IFNULL(numeroLikes,0) + 1 WHERE idQuestao = $idQuestion";
      }else {
        $sql = "UPDATE Questao SET numeroLikes = IFNULL(numeroLikes,0) - 1 WHERE idQuestao = $idQuestion";
      }
      echo $likeordis;
    if(!$conn){
      die ('Erro ao conectar ao banco MySQL'.mysqli_connect_error());
    }

        if (mysqli_query($conn, $sql)) {
            echo $idUser;
            echo $idQuestion;
        } else {
            echo "Erro: " . $sql . "<br><br>" . mysqli_error($conn);
        }


    mysqli_close($conn);

    echo $id;
?>
