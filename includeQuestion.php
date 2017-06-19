<?php
      require 'db_credentials.php';
      $conn = mysqli_connect($servername,$username,$db_password,$dbname);
      $idQuestion = $_POST['include_id'];
      $idUser = $_POST['userid'];
      $idList = $_POST['idList'];
      $sqlverify = "SELECT codQuestao FROM ListaQuestao WHERE codLista = $idList;";
      $sql = "INSERT INTO ListaQuestao (codQuestao, codLista) VALUES ($idQuestion, $idList);";
      $alreadyonlist = FALSE;
      if(!$conn){
        die ('Erro ao conectar ao banco MySQL'.mysqli_connect_error());
      }

      $result = mysqli_query($conn, $sqlverify);
      if(!$result){
        echo "<button type='button' class='btn disabled btn-md'>Adicionar</button>";
      }

      if(mysqli_num_rows($result) > 0){ // retorna o numero de linhas da variavel result
          while($stc = mysqli_fetch_array($result)){
            if ($stc['codQuestao'] == $idQuestion) {
            $alreadyonlist = TRUE;
            }
          }
       }
      if ($alreadyonlist) {
          echo "<button type='button' class='btn disabled btn-md'>Essa Questão já está na sua lista.</button>";
      }else{
        if (mysqli_query($conn, $sql)) {
            echo $idList;
            echo $idQuestion;
            }
      }


    mysqli_close($conn);

    echo $id;
?>
