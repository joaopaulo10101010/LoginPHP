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
NomeDoProduto varchar(100),
Descricao varchar(100),
Preco varchar(100),
Quantidade int,
primary key(Id)
)

select * from Tb_usuario;
select * from Tb_produto;