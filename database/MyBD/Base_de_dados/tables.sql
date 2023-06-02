DROP DATABASE IF EXISTS pap;
CREATE DATABASE pap CHARACTER SET utf8 COLLATE utf8_general_ci;
USE pap;

CREATE TABLE tipo_noticias(
    id INT(11) UNSIGNED NOT NULL,
    descricao VARCHAR(100) NOT NULL
)engine = InnoDB;

CREATE TABLE noticias(
    id INT(11) UNSIGNED NOT NULL,
    id_tipo INT(11) UNSIGNED NOT NULL,
    titulo VARCHAR(50) NOT NULL,
    texto VARCHAR(100) NOT NULL,
    deleted_at TIMESTAMP NULL
)engine = InnoDB;

CREATE TABLE alertas(
    id INT(11) UNSIGNED NOT NULL,
    texto VARCHAR(100) NOT NULL,
    ativo TINYINT(1),
    created_at TIMESTAMP NOT NULL
)engine = InnoDB;

CREATE TABLE user_details(
    id INT(11) UNSIGNED NOT NULL,
    user_id BIGINT(20) UNSIGNED NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    nivel INT(11) NOT NULL,
    voltas_realizadas INT(11) NOT NULL,
    corridas_realizadas INT(11) NOT NULL,
    num_moedas INT(15) NOT NULL,
    numero_telemovel INT(10) NULL,
    imagem VARCHAR(100) NOT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
)engine = InnoDB;   


CREATE TABLE utilizadores_veiculos(
    id INT(11) UNSIGNED NOT NULL,
    id_utilizador INT(11) UNSIGNED NOT NULL,
    id_veiculo INT(11) UNSIGNED NOT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
)engine = InnoDB;

CREATE TABLE comentarios(
    id INT(11) UNSIGNED NOT NULL,
    id_utilizador INT(11) UNSIGNED NOT NULL,
    texto_comentario VARCHAR(100) NOT NULL,
    created_at TIMESTAMP NOT NULL
)engine = InnoDB;

CREATE TABLE veiculos(
    id INT(11) UNSIGNED NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    preco DECIMAL(10) NOT NULL,
    descricao VARCHAR(100) NOT NULL
)engine = InnoDB;

CREATE TABLE jogos(
    id INT(11) UNSIGNED NOT NULL,
    id_mapa INT(11) UNSIGNED NOT NULL,
    id_utilizador_veiculo INT(11) UNSIGNED NOT NULL,
    descricao VARCHAR(100) NOT NULL,
    num_voltas INT(11) NOT NULL,
    experiencia INT(11) NOT NULL, 
    num_moedas INT(11) NOT NULL,
    volta_mais_rapida TIME(3) NOT NULL DEFAULT '00:00:00',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)engine = InnoDB;

CREATE TABLE mapas(
    id INT(11) UNSIGNED NOT NULL,
    nome VARCHAR(100) NOT NULL,
    created_at TIMESTAMP NOT NULL
)engine = InnoDB;