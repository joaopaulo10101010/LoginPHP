create database db2ads;
use db2ads;

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

create table Tb_blackfriday(
Id_promo int auto_increment primary key,
ano varchar(50),
inicio datetime,
fim datetime
);