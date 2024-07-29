drop database loja;
create database loja;
use loja;

create table Loja(
id int not null auto_increment primary key,
produto varchar(150) not null,
fornecedor varchar(150) not null,
cor varchar(150) not null,
tamanho varchar(30) not null,
marca varchar(150) not null
);

insert into Loja values
(default,'Blusa','Magazine','verde','M','Samyra');

select* from loja;
