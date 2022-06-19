drop database dud;
create database dud;
use dud;

create table Products(
    ProductId int NOT NULL AUTO_INCREMENT,
    Name VARCHAR(20),
    primary key (ProductId)
);

create table languages(
  LanguageId int NOT NULL AUTO_INCREMENT,
  LanguageName VARCHAR(20),
  primary key (LanguageId)  
);

INSERT INTO Products(Name) VALUES("Ford");
INSERT INTO Products(Name) VALUES("Tesla");

INSERT INTO languages(LanguageName) VALUES("English");
INSERT INTO languages(LanguageName) VALUES("German");


create table descriptions(
    DescID int not NULL AUTO_INCREMENT,
    ProductId int NOT NULL,
    LID int not NULL,
    DescText VARCHAR(200),
    primary key (DescID),
    foreign key (ProductId) REFERENCES Products(ProductId),
    foreign key (LID) REFERENCES languages(LanguageId)
);

insert into descriptions (ProductId,LID,DescText) VALUES(1,1,"The best car in the world");
insert into descriptions (ProductId,LID,DescText) VALUES(1,2,"Das AUTO");

insert into descriptions (ProductId,LID,DescText) VALUES(2,1,"This is Elon Musk on wheels");
insert into descriptions (ProductId,LID,DescText) VALUES(2,2,"Das ist das fahrrad vu Elon Musk");

