-- Criando tabela Album
CREATE TABLE album (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    album VARCHAR(50) NOT NULL,
    ano INT NOT NULL,
    PRIMARY KEY (id)
);

-- Criando tabela faixa
CREATE TABLE faixa (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    numero INT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    duracao VARCHAR(8) NOT NULL,
    album_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
   FOREIGN KEY (album_id) REFERENCES album (id)
);

