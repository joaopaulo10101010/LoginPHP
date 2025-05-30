create database db2ads;
use db2ads;
drop database db2ads;

create table Tb_usuario(
Id int auto_increment,
Nome varchar(100),
Email varchar(100),
Senha varchar(100),
Ativo bool default 1,
primary key(Id)
);

create table Tb_produto(
Id int auto_increment,
Codigo_prod int unique,
NomeDoProduto varchar(100),
Descricao varchar(100),
Preco varchar(100),
Desconto decimal(10,2) default 0,
Quantidade int,
Img_path varchar(300),
BlackFriday bool default 0,
primary key(Id)
);

select * from Tb_produto;

create table Tb_blackfriday(
Id_promo int auto_increment primary key,
ano varchar(50),
inicio datetime,
fim datetime
);

select sysdate() as 'datatime' from dual;
delete from Tb_blackfriday where Id_promo=2;
select * from Tb_blackfriday t1 where sysdate() between t1.inicio and t1.fim;

select * from Tb_blackfriday;
INSERT INTO Tb_blackfriday(ano, inicio, fim) VALUES
('2025', '2025-05-29 20:00:00', '2025-05-29 22:00:00');

select fim-inicio from Tb_promocoes;


insert into Tb_usuario(Nome,Email,Senha) values
('admin','admin@admin','admin');

SET SQL_SAFE_UPDATES = 0;
SET SQL_SAFE_UPDATES = 1;

select * from tb_produto;
update tb_produto set BlackFriday=1 where Id=1

select * from Tb_usuario;
select * from Tb_produto;

