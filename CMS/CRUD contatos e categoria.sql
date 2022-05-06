create database dbcoffeeshop; 

use dbcoffeeshop; 

show tables; 

show databases; 

drop database dbcoffeshop; 

create table tblcontatos ( 

idcontato int not null auto_increment primary key, 

    nome varchar(80) not null,     

    email varchar(320) not null, 

    mensagem text not null    

); 

  

create table tblcategoria ( 

idcategoria int not null auto_increment primary key, 

    nome varchar(80) not null     

       

); 

  

insert into tblcategoria (nome) 

values ('Macchiato'), 

   ('Macchiato Gelado'), 

   ('Café Gelado') ; 

  

select * from tblcategoria; 

  

drop table tblcategoria; 

  

drop table tblcontatos; 

insert into tblcontatos (nome, email, mensagem) 

values ('Luiz', 'luiz@gmail.com', 'testando o mysql 3'), 

   ('Maria', 'maria@gmail.com', 'testando o mysql 1'), 

   ('Joao', 'joao@gmail.com', 'testando o mysql 2') ; 

      

  

delete from tblcontatos where idcontato = 3; 

  

select * from tblcontatos; 

  

select * from tblcontatos order by idcontato desc; 

  

desc tblcontatos 