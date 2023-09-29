CREATE TABLE lutadores (
  id int AUTO_INCREMENT NOT NULL, 
  nome varchar(70) NOT NULL, 
  altura int NOT NULL,
  id_organizacao int NOT NULL,
  id_categoria int NOT NULL, 
  CONSTRAINT pk_lutadores PRIMARY KEY (id)
);

CREATE TABLE categorias ( 
  id int AUTO_INCREMENT NOT NULL, 
  nome varchar(70) NOT NULL,
  peso int NOT NULL,
  CONSTRAINT pk_categorias PRIMARY KEY (id) 
);

CREATE TABLE organizacoes ( 
  id int AUTO_INCREMENT NOT NULL, 
  nome varchar(70) NOT NULL,
  sigla varchar(10) NOT NULL,
  CONSTRAINT pk_categorias PRIMARY KEY (id) 
);

ALTER TABLE lutadores ADD CONSTRAINT fk_categoria FOREIGN KEY (id_categoria) REFERENCES categorias (id);
ALTER TABLE lutadores ADD CONSTRAINT fk_organizacao FOREIGN KEY (id_organizacao) REFERENCES organizacoes (id);


INSERT INTO categoria (nome, peso) VALUES ('Peso galo', '61');
INSERT INTO categoria (nome, peso) VALUES ('Peso pena', '66');
INSERT INTO categoria (nome, peso) VALUES ('Peso leve', '71');
INSERT INTO categoria (nome, peso) VALUES ('Peso meio-medio', '77');
INSERT INTO categoria (nome, peso) VALUES ('Peso medio', '84');
INSERT INTO categoria (nome, peso) VALUES ('Peso meio-pesado', '93');
INSERT INTO categoria (nome, peso) VALUES ('Peso pesado', '121');

INSERT INTO organizacoes (nome, sigla) VALUES ('Ultimate Fighting Championship', 'UFC');
INSERT INTO organizacoes (nome, sigla) VALUES ('Artes marciais mistas', 'MMA');

