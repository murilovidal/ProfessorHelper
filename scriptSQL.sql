CREATE TABLE Professor (
    idProfessor SMALLINT PRIMARY KEY AUTO_INCREMENT,
    tipo ENUM ('user', 'admin') DEFAULT 'user',
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(128) NOT NULL,
    created_at DATETIME,
    updated_at DATETIME,
    last_login_at DATETIME,
    last_logout_at DATETIME,
    UNIQUE (email)
) AUTO_INCREMENT = 1515;

CREATE TABLE Disciplina (
    idDisciplina SMALLINT PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(200),
    nomeDisciplina VARCHAR(100),
    codCurso SMALLINT,
    professorOwner SMALLINT
) AUTO_INCREMENT = 2525;

ALTER TABLE Disciplina ADD FOREIGN KEY (professorOwner) REFERENCES Professor (idProfessor);

CREATE TABLE Assunto (
    idAssunto SMALLINT PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(200),
    tituloAssunto VARCHAR(100),
    codDisc SMALLINT,
    professorOwner SMALLINT
) AUTO_INCREMENT = 3535;

ALTER TABLE Assunto ADD FOREIGN KEY (professorOwner) REFERENCES Professor (idProfessor);
ALTER TABLE Assunto ADD FOREIGN KEY (codDisc) REFERENCES Professor (idDisciplina);

CREATE TABLE Curso (
    idCurso SMALLINT PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(200),
    nomeCurso VARCHAR(100),
    professorOwner SMALLINT
) AUTO_INCREMENT = 4545;

ALTER TABLE Curso ADD FOREIGN KEY (professorOwner) REFERENCES Professor (idProfessor);
ALTER TABLE Disciplina ADD FOREIGN KEY (codCurso) REFERENCES Professor (idCurso);

CREATE TABLE Lista (
    idLista SMALLINT PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(200),
    tituloLista VARCHAR(100),
    professorOwner SMALLINT
) AUTO_INCREMENT = 5555;

ALTER TABLE Lista ADD FOREIGN KEY (professorOwner) REFERENCES Professor (idProfessor);

CREATE TABLE Questao (
    idQuestao SMALLINT PRIMARY KEY AUTO_INCREMENT,
    tituloQuestao VARCHAR(100),
    enunciado VARCHAR(800),
    alternativaA VARCHAR(500),
    alternativaB VARCHAR(500),
    alternativaC VARCHAR(500),
    alternativaD VARCHAR(500),
    alternativaE VARCHAR(500),
    erros SMALLINT(3),
    acertos SMALLINT(3),
    numeroLikes SMALLINT(3),
    alternativaCorreta ENUM ('A', 'B', 'C', 'D', 'E'),
    professorOwner SMALLINT,
    disciplina SMALLINT,
    assunto SMALLINT,
    curso SMALLINT
) AUTO_INCREMENT = 6565;

ALTER TABLE Questao ADD FOREIGN KEY (professorOwner) REFERENCES Professor (idProfessor);
ALTER TABLE Questao ADD FOREIGN KEY (disciplina) REFERENCES Disciplina (idDisciplina);
ALTER TABLE Questao ADD FOREIGN KEY (assunto) REFERENCES Assunto (idAssunto);
ALTER TABLE Questao ADD FOREIGN KEY (curso) REFERENCES Curso (idCurso);

CREATE TABLE ListaQuestao (
    codQuestao SMALLINT,
    codLista SMALLINT
);

ALTER TABLE ListaQuestao ADD FOREIGN KEY (codQuestao) REFERENCES Questao (idQuestao);
ALTER TABLE ListaQuestao ADD FOREIGN KEY (codLista) REFERENCES Lista (idLista);
