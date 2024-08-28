CREATE TABLE atores (
    id				INT             AUTO_INCREMENT PRIMARY KEY,
    nome			VARCHAR(255)    NOT NULL,
    data_nascimento DATE            NOT NULL,
    nacionalidade	VARCHAR(255)    NOT NULL,
    sexo			CHAR            NOT NULL,
    foto			VARCHAR(255)
);

CREATE TABLE filmes (
    id				INT             AUTO_INCREMENT PRIMARY KEY,
    titulo			VARCHAR(255)    NOT NULL,
    data_lancamento DATE            NOT NULL,
    duracao			INT,
    class_ind		INT,
    sinopse			TEXT,
    imagem			VARCHAR(255),
    slug			VARCHAR(255)	NOT NULL UNIQUE
);

CREATE TABLE tags (
    id		    INT             AUTO_INCREMENT PRIMARY KEY,
    descricao   VARCHAR(50)     NOT NULL UNIQUE
);

CREATE TABLE usuarios (
    id			    INT             AUTO_INCREMENT PRIMARY KEY,
    nome			VARCHAR(255)    NOT NULL,
    email 		    VARCHAR(255)    NOT NULL UNIQUE,
    senha 		    VARCHAR(255)    NOT NULL,
    foto		    VARCHAR(255),
    admin           BOOLEAN         DEFAULT FALSE
);

CREATE TABLE papeis (
    id          INT             AUTO_INCREMENT PRIMARY KEY,
    personagem  VARCHAR(255)    NOT NULL,
    id_filme    INT             NOT NULL,
    id_ator     INT             NOT NULL,
    FOREIGN KEY (id_filme)      REFERENCES filmes (id),
    FOREIGN KEY (id_ator)       REFERENCES atores (id)
);

CREATE TABLE filme_tags (
    id          INT         AUTO_INCREMENT PRIMARY KEY,
    id_filme    INT         NOT NULL,
    id_tag      INT         NOT NULL,
    FOREIGN KEY (id_filme)  REFERENCES filmes (id),
    FOREIGN KEY (id_tag)    REFERENCES tags (id)
);

CREATE TABLE avaliacoes (
    id              INT         AUTO_INCREMENT PRIMARY KEY,
    comentario      TEXT,
    nota            INT         NOT NULL,
    data_avaliacao  DATETIME    NOT NULL,
    id_filme        INT         NOT NULL,
    id_usuario      INT         NOT NULL,
    FOREIGN KEY (id_filme)      REFERENCES filmes (id),
    FOREIGN KEY (id_usuario)    REFERENCES usuarios (id)
);