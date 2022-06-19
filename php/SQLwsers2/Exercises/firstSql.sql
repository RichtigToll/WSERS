drop database firstDatabase;

create database firstDatabase;
use firstDatabase;

create Table Countries (
    CountryID int not null AUTO_INCREMENT,
    CountryName varchar(30),
    PRIMARY KEY (CountryID)
);

INSERT INTO Countries (CountryName) VALUES("Luxembourg");
INSERT INTO Countries (CountryName) VALUES("Portugal");
INSERT INTO Countries (CountryName) VALUES("France");
INSERT INTO Countries (CountryName) VALUES("Russia");
INSERT INTO Countries (CountryName) VALUES("Ukraine");
INSERT INTO Countries (CountryName) VALUES("Belgium");
INSERT INTO Countries (CountryName) VALUES("Greece");
INSERT INTO Countries (CountryName) VALUES("Germany");

create Table People (
    PersonID int not null AUTO_INCREMENT,
    PersonName varchar(50),
    CountryOfPerson int,
    PRIMARY KEY (PersonID),
    FOREIGN KEY (CountryOfPerson) REFERENCES Countries(CountryID)
);

INSERT INTO People (PersonName, CountryOfPerson) VALUES("Francesco LINSTER", 1);
INSERT INTO People (PersonName, CountryOfPerson) VALUES("Vlad KUSHNIRYNA", 4);
INSERT INTO People (PersonName, CountryOfPerson) VALUES("Fanourios MINIATIS", 5);
