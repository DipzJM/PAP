USE pap;
--Chaves primárias
ALTER TABLE noticias ADD PRIMARY KEY(id);
ALTER TABLE tipo_noticias ADD PRIMARY KEY(id);
ALTER TABLE alertas ADD PRIMARY KEY(id);
ALTER TABLE user_details ADD PRIMARY KEY(id);
ALTER TABLE comentarios ADD PRIMARY KEY(id);
ALTER TABLE veiculos ADD PRIMARY KEY(id);
ALTER TABLE utilizadores_veiculos ADD PRIMARY KEY(id);
ALTER TABLE jogos ADD PRIMARY KEY(id);
ALTER TABLE mapas ADD PRIMARY KEY(id);
--Chaves estrangeiras
ALTER TABLE noticias CHANGE id id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE tipo_noticias CHANGE id id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE alertas CHANGE id id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE user_details CHANGE id id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE comentarios CHANGE id id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE veiculos CHANGE id id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE utilizadores_veiculos CHANGE id id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE jogos CHANGE id id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE mapas CHANGE id id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE noticias
 ADD CONSTRAINT `noticias_tipo_noticias_fk` 
 FOREIGN KEY (id_tipo) 
 REFERENCES tipo_noticias(id);

ALTER TABLE utilizadores_veiculos
 ADD CONSTRAINT `utilizadores_veiculos_user_details_fk` 
 FOREIGN KEY (id_utilizador) 
 REFERENCES user_details(id);

ALTER TABLE utilizadores_veiculos
 ADD CONSTRAINT `utilizadores_veiculos_veiculos_fk` 
 FOREIGN KEY (id_veiculo) 
 REFERENCES veiculos(id);

ALTER TABLE jogos
 ADD CONSTRAINT `jogos_mapas_fk` 
 FOREIGN KEY (id_mapa) 
 REFERENCES mapas(id);
 
ALTER TABLE jogos
 ADD CONSTRAINT `jogos_utilizadores_veiculos_fk` 
 FOREIGN KEY (id_utilizador_veiculo) 
 REFERENCES utilizadores_veiculos(id);

ALTER TABLE comentarios
 ADD CONSTRAINT `comentarios_user_details_fk` 
 FOREIGN KEY (id_utilizador) 
 REFERENCES user_details(id);


