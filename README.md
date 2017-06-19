#### Setor de Educação Profissional e Tecnológica - SEPT

#### Universidade Federal do Paraná - UFPR


## Sistema de gerenciamento de questões para professores

![alt text](/images/ProfHel_bkgnd2.png "ProfessorHelper!")

Este documento descreve o trabalho prático realizado nas disciplinas
**TI161 - Desenvolvimento de Aplicações Web 1** e
**TI142 - Implementaçao de Aplicação para Computador**.

## Descrição do sistema
O ProfessorHelper é um sistema que proporciona a criação e compartilhamento de questões de múltipla escolha bem como sua categorização por `Curso`, `Disciplina` e `Assunto`.
As questões produzidas são compartilhadas entre todos os usuários. É possível adicioná-las à listas que são convertidas em uma prova que pode ser compartilhada pelo uso de uma URL. Além disso os usuários podem avaliar as questões com um `like` ou um `dislike`.

## Funcionamento

O sistema requer o cadastro no banco de dados de um usuário que pode ser um administrador ou um usuário comum. O cadastro de usuários comuns é feito por um administrador por um link dentro da página principal. O cadastro de administradores só pode ser feito diretamente no banco de dados.
De posse de seu email e senha cadastrados, o usuário efetua o login e tem acesso às seguintes funcionalidades através da página principal.

1. **Criar Curso** - Cria um curso que possui um nome e uma descrição.
2. **Criar Disciplina** - Cria uma disciplina que pertencerá à um curso. As disciplinas têm nome e descrição.
3. **Criar Assunto** - Cria um assunto que pertencerá à uma disciplina. Os assuntos têm nome e descrição.
4. **Criar Questão** - Cria uma questão que pertencerá à um assunto. As questões têm título, enunciado e `cinco` alternativas. Durante a criação da questão é necessário informar qual será a alternativa correta.
5. **Criar Lista** - Cria uma lista de questões que terá um nome e uma descrição. A criação de listas é necessária selecionar questões e gerar `provas`.
6. **Exibir mais votados** - Exibe as questões mais votadas separadas por `assunto`.

### Utilizando o sistema

Quando o usuário está logado as questões mais recentes aparecem na página inicial.

Se houver questões disponíveis no banco de dados, basta clicar em **`Selecionar Lista`** e selecionar uma lista, ou criar uma. Tendo uma lista selecionada, é possível incluir questões à essa lista navegando pela página inicial e clicando em **`Adicionar à Lista`**.

Se não houver questões disponíveis deve-se, primeiramente, **Criar um curso, uma Disciplina e um Assunto**, para  em seguida iniciar a criação de questões.

Tendo criado e incluído questões suficientes à uma lista, gere uma **URL para uma _prova_** clicando em **`GERAR PROVA "Nome da lista"`** na página **Minhas Listas**.
Você será redirecionado para uma página com as questões disponibilizadas em forma de prova. É possível compartilhar essa página com usuários não cadastrados utilizando a URL. Após a resolução da prova, ao clicar em **`Enviar Respostas`**, você é redirecionado à uma página que mostrará suas respostas e a alternativa correta de cada questão, discriminada pelo seu título, e o número de erros e acertos.

Quando uma prova é resolvida, são registrados o número respostas certas ou erradas que cada questão recebeu.

### Ambiente de Desenvolvimento

O sistema foi desenvolvido utilizando HTML, PHP, JavaScript (JQuery), CSS e MySQL.

O *front-end* foi desenvolvido com o auxílio do *framework Bootstrap*.

### Instalação

Coloque os arquivos do repositório numa pasta no servidor, configure seu banco de dados e inclua as informações em `db_credentials.php` e execute os comandos SQL contidos no arquivo `scriptSQL.sql`. O primeiro usuário deve ser cadastrado diretamente no banco com o cuidado de criar uma senha utilizando `md5`.
