DROP DATABASE Countries;
CREATE DATABASE Countries;
USE Countries;

CREATE TABLE MyCountries(
    CountryID int NOT NULL AUTO_INCREMENT,
    CountryName CHAR(25),
    PRIMARY KEY (CountryID)
);

INSERT INTO MyCountries (CountryName) VALUES("LUXEMBOURG");
INSERT INTO MyCountries (CountryName) VALUES("GERMANY");
INSERT INTO MyCountries (CountryName) VALUES("BELGIUM");
INSERT INTO MyCountries (CountryName) VALUES("ENGLAND");