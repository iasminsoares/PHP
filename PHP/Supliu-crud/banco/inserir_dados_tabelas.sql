-- inserindo os dados nas tabelas
insert into album
    (album, ano)
VALUES
    ('Rei do Gado', 1961),
    ('Linha de Frente', 1964);

insert into faixa
    (numero, nome, duracao, album_id)
VALUES
    (1, 'Alma de Boêmio', '3:15', 1 ),
    (2, 'Borboleta de Asfalto', '3:00', 1 ),
    (3, 'Punhal da Falsidade (Mulher Sem Nome)', '3:07', 1 );
    (4, 'Amigo Sincero', '3:30', 1 ),
    (5, 'Teus Beijos', '2:48', 1 ),
    (6, 'Despedida', '2:45', 1 ),
    (7, 'Tormento', '3:09', 1),
    (8, 'Nove e Nove', '3:18', 1),
    (9, 'Rei do Gado', '2:57', 1),
    (10, 'Urutu Cruzeiro', '3:14', 1),
    (11, 'Minas Gerais', '3:47', 1),
    (12, 'Carteiro', '3:16', 1),
    (13, 'Pagode em Brasília', '2:58', 1),
    (14, 'Maria Ciumenta', '2:19', 1);
    (1,	'O Mineiro e o Italiano', '3:21', 2),
    (2, 'Porta Fechada', '2:54', 2),
    (3, 'Quem Ama Não Esquece', '2:51', 2),
    (4, 'Linha de Frente', '2:18', 2),
    (5, 'Cantar da Siriema', '2:10', 2),
    (6, 'Ana Rosa', '3:36', 2),
    (7, 'Jerimu', '2:01', 2),
    (8, 'Minha Prece', '2:42', 2),
    (9, 'Geada do Paraná', '2:54', 2),
    (10, 'Catimbau', '3:46', 2),
    (11, 'Punhal da Falsidade', '3:20', 2),
    (12, 'Prece de Amor', '2:47', 2),
    (13, 'Ondas de Amor', '2:21', 2),
    (14, 'Fujo de Ti', '3:04', 2);


