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
Quantidade int,
Img_path varchar(300),
primary key(Id)
);
insert into Tb_usuario(Nome,Email,Senha) values
('admin','admin@admin','admin');

SET SQL_SAFE_UPDATES = 0;
update Tb_produto set NomeDoProduto='3' ,Descricao='3' ,Preco='3' ,Quantidade=3 ,Img_path='3' where Codigo_prod=1;
SET SQL_SAFE_UPDATES = 1;


select * from Tb_usuario;
select * from Tb_produto;