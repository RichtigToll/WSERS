drop database FORUMS;

create database FORUMS;
use FORUMS;

CREATE TABLE MyMessages(
    TextsID INT NOT NULL AUTO_INCREMENT,
    Names VARCHAR(25),
    Texts VARCHAR(200),
    PRIMARY KEY (TextsID)
);