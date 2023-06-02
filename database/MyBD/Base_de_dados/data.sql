USE pap;


INSERT INTO veiculos (modelo,preco,descricao)
    VALUES
    ("Desportivo",0,"Carro inicial");


INSERT INTO tipo_noticias (descricao)
    VALUES
    ("Informativo");

INSERT INTO alertas (texto,ativo)
    VALUES
    ("Racing Mania in development...",1);

INSERT INTO noticias (id_tipo,titulo,texto)
    VALUES
    (1,"TituloNoticia","Noticia1"),
    (1,"TituloNoticia","Noticia2"),
    (1,"TituloNoticia","Noticia3");