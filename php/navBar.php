<?php
require "authenticate.php";

echo "<nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <a class='navbar-brand' href='index.php'>ProfessorHelper</a>
    </div>
    <ul class='nav navbar-nav'>
      <li class='button'><a href='index.php'>Início</a></li>
      <li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' href='#'>Criar<span class='caret'></span></a>
        <ul class='dropdown-menu'>
          <li><a href='criarCurso.php'>Curso</a></li>
          <li><a href='criarDisciplina.php'>Disciplina</a></li>
          <li><a href='criarAssunto.php'>Assunto</a></li>
          <li><a href='criarQuestao.php'>Questão</a></li>
        </ul>
      </li>
      <li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' href='#'>Lista<span class='caret'></span></a>
        <ul class='dropdown-menu'>
          <li><a href='minhasListas.php'>Minhas Listas</a></li>
          <li><a href='novaLista.php'>Nova Lista</a></li>
        </ul>
      </li>
      <li class='button'><a href='top.php'>Exibir mais votados</a></li>";
    if ($user_type == "admin") {
      echo "<li class='button'><a href='register.php'>Registrar Usuário</a></li>";
    }
    echo  "
    </ul>

    <ul class='nav navbar-nav navbar-right'>
      <li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Sair</a></li>
    </ul>

    <form class='navbar-form navbar-right' method='POST' action='busca.php'>
      <div class='input-group'>
        <input type='text' name='busca' class='form-control' placeholder='Busca'>
        <div class='input-group-btn'>
          <button class='btn btn-default' type='submit'>
            <i class='glyphicon glyphicon-search'></i>
          </button>
        </div>
      </div>
    </form>
  </div>
</nav>";

?>
