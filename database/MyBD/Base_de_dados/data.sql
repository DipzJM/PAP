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
    (1,"Racing Mania chega às pistas no dia 13/06!","Os fãs de jogos de corrida podem comemorar, pois o tão esperado lançamento do jogo Racing Mania está marcado para o dia 13 de junho. Desenvolvido por Luis Costa e João Maia, o jogo promete revolucionar o mundo dos jogos com gráficos incríveis, jogabilidade envolvente e uma série de recursos inovadores."),
    (1,"Racing Mania conquista críticos e jogadores com sua jogabilidade viciante","Após o lançamento no dia 13 de junho, Racing Mania tem sido aclamado por críticos e jogadores em todo o mundo. O jogo de corrida recebeu avaliações extremamente positivas, elogiando a sua jogabilidade viciante e seus visuais impressionantes"),
    (1,"Racing Mania apresenta emocionante atualização com lançamento de novos modelos de carros","Os entusiastas de carros e jogos de corrida têm um motivo a mais para comemorar, pois Racing Mania, desenvolvedora de jogos de corrida, acaba de lançar uma atualização empolgante que traz uma variedade de novos modelos de carros para os jogadores.");