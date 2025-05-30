/* INSERTS DE TESTE */
use db2ads;

/* Insert de usuario para acesso ao sistema */

insert into Tb_usuario(Nome,Email,Senha) values
('admin','admin@admin','admin');

/* Inserts de produtos que comuns do dia a dia */

/* OBS: As imagens estão sendo guardadas de forma online, dessa forma é possivel utilizar o site sem que tenha um grande volume de imagens guardadas nas pastas dele */


INSERT INTO Tb_produto (Codigo_prod, NomeDoProduto, Descricao, Preco, Desconto, Quantidade, Img_path, BlackFriday) VALUES
(3001, 'Arroz Tipo 1', 'Pacote de arroz branco 5kg', '21.90', NULL, 50, 'https://www.camil.com.br/wp-content/uploads/sites/12/2020/06/arroz-branco-camil-t1-1kg-768x768.jpg', NULL),
(3002, 'Banana Nanica', 'Banana fresca por kg', '5.99', NULL, 100, 'https://img.odcdn.com.br/wp-content/uploads/2023/10/Bananas-1.jpg', NULL),
(3003, 'Tomate Italiano', 'Tomate fresco para saladas', '7.49', NULL, 80, 'https://zaffari.vtexassets.com/arquivos/ids/279182/1007601-00.jpg?v=638839654200700000', NULL),
(3004, 'Cenoura', 'Cenoura fresca por kg', '4.19', NULL, 90, 'https://www.infoescola.com/wp-content/uploads/2010/08/cenoura_250834906.jpg', NULL),
(3005, 'Feijão Carioca', 'Pacote de 1kg', '9.90', NULL, 70, 'https://www.davo.com.br/ccstore/v1/images/?source=/file/v6283960155564801681/products/prod_7896116900029.imagem1.jpg&height=940&width=940', NULL),
(3006, 'Macarrão Espaguete', 'Pacote de espaguete 500g', '3.89', NULL, 120, 'https://mercantilnovaera.vtexassets.com/arquivos/ids/218485/Macarrao-Espaguete-MONDO-Pasta-Embalagem-400g.jpg?v=638605525349870000', NULL),
(3007, 'Alface Crespa', 'Alface verde orgânica', '3.29', NULL, 60, 'https://organicosinbox.com.br/wp-content/uploads/2020/11/alface-crespa-organica.jpg', NULL),
(3008, 'Óleo de Soja', 'Garrafa de óleo 900ml', '6.59', NULL, 40, 'https://carrefourbrfood.vtexassets.com/arquivos/ids/211616/141836_1.jpg?v=637272514200130000', NULL),
(3009, 'Pimenta-do-Reino', 'Pimenta preta moída 50g', '4.99', NULL, 30, 'https://cdn.awsli.com.br/800x800/596/596528/produto/26320309/capture-7rnp8hg1fm.PNG', NULL),
(3010, 'Sal Refinado', 'Pacote de sal 1kg', '2.49', NULL, 100, 'https://www.extramercado.com.br/img/uploads/1/632/454632.jpg', NULL);

/* Insert dos produtos que alem de serem vendidos normalmente, eles na black friday eles iram aparecer com desconto */

INSERT INTO Tb_produto (Codigo_prod, NomeDoProduto, Descricao, Preco, Desconto, Quantidade, Img_path, BlackFriday) VALUES
(3011, 'Leite Integral', 'Caixa de leite integral 1L', '4.79', 30, 80, 'https://piracanjuba-institucional-prd.s3.sa-east-1.amazonaws.com/page_metas_translations/meta_image/leite-integral-piracanjuba-1l-864x810px-327.png', 1),
(3012, 'Ovos Brancos', 'Bandeja com 12 ovos', '9.49', 20, 60, 'https://phygital-files.mercafacil.com/jpavani/uploads/produto/ovos_branco_grande_filmado_30_unidades_7d70d8a1-8664-4e9e-aebb-b80a7e7c1aa2.png', 1),
(3013, 'Detergente Neutro', 'Frasco 500ml de detergente', '2.59', 50, 100, 'https://www.sorpack.com.br/storage/empresas/14012344000125/produtos/tWnqgRTGeTlERZG9vfHZc8X4LcQyJLDFqyHYm3Dy_principal.jpeg', 1),
(3014, 'Maçã Gala', 'Maçã fresca por kg', '6.90', 10, 75, 'https://muffatosupermercados.vtexassets.com/arquivos/ids/370729/4039-1.jpg?v=638319525064170000', 1),
(3015, 'Café em Pó', 'Pacote de café torrado e moído 500g', '14.99', 60, 50, 'https://bretas.vtexassets.com/arquivos/ids/219573-800-auto?v=638684818539300000&width=800&height=auto&aspect=true', 1);
