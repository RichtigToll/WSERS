drop database AnimalSelector;
create database AnimalSelector;

use AnimalSelector;

create Table Animals (
    AnimalID int not null AUTO_INCREMENT,
    AnimalName varchar(20) unique,
    Continent varchar(20),
    PRIMARY KEY (AnimalID)
);