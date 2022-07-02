drop database MyProducts;
create database MyProducts;

use MyProducts;

create Table Products (
    ProductID int not null AUTO_INCREMENT,
    ProductName varchar(100),
    ProductImage varchar(100),
    Price int,
    PRIMARY KEY (ProductID)
);

create Table Languages (
    LanID int not null,
    LanName varchar(25),
    PRIMARY KEY (LanID)
);

create Table Users(
    UserId int not NULL AUTO_INCREMENT,
    UserName varchar(255) UNIQUE,
    UserPsw varchar(255),
    UserType VARCHAR(25),
    PRIMARY KEY (UserId)
);

create Table Descriptions (
    DescID int not null AUTO_INCREMENT,
    ProductID int not null,
    DescText varchar(500),
    DescText2 varchar(500),
    LanID int not null,
    PRIMARY KEY (DescID),
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID),
    FOREIGN KEY (LanID) REFERENCES Languages(LanID)
);

create Table Orders(
    OrderNumber varchar(255),
    UserId INT NOT NULL,
    PRIMARY KEY(OrderNumber),
    FOREIGN KEY(UserId) REFERENCES Users(UserId)
);


create Table OrderList(
    ListNumber INT NOT NULL AUTO_INCREMENT,
    OrderNumber varchar(255),
    ProductID INT,
    ProductQuantity INT,
    PRIMARY KEY(ListNumber),
    FOREIGN KEY(OrderNumber) REFERENCES Orders(OrderNumber)
);

INSERT INTO Languages (LanID, LanName) VALUES(1, "EN");
INSERT INTO Languages (LanID, LanName) VALUES(2, "DE");

INSERT INTO Products (ProductName, ProductImage, Price) VALUES("NINTENDO SWITCH", "Nintendo.jpg", 369);
INSERT INTO Products (ProductName, ProductImage, Price) VALUES("PLAYSTATION 5", "PS5.jpg", 499);
INSERT INTO Products (ProductName, ProductImage, Price) VALUES("VR HEADSET", "VR.jpg", 780);
INSERT INTO Products (ProductName, ProductImage, Price) VALUES("XBOX ONE S", "XBOX.jpg", 499);

INSERT INTO Descriptions (DescText, ProductID, LanID, DescText2) VALUES ("PLAY ALL THE HIGHLIGHT GAMES - IN HD - EVERYWHERE!", 1, 1, "With the new OLED display and the higher battery capacity, you can enjoy the breathtaking Nintendo games again BUT DIFFERENT! Funny multiplayer games EVERYWHERE you want!");
INSERT INTO Descriptions (DescText, ProductID, LanID, DescText2) VALUES ("4K - 120Hz GAMES!", 2, 1, "You want to buy a PS5? It's not available");
INSERT INTO Descriptions (DescText, ProductID, LanID, DescText2) VALUES ("DISCOVER NEW WORLDS - IN VIRTUAL REALITY!", 3, 1, "You are feeling depressed of the real world? HIDE YOURSELF IN A DIFFERENT WORLD!");
INSERT INTO Descriptions (DescText, ProductID, LanID, DescText2) VALUES ("EXPLORE FORZA HORIZON IN HIGH RESOLUTION!", 4, 1, "PLAY THE HYPED GAMES LIKE FORZA HORIZON IN QHD/60FPS - XBOX GAME PASS 3 months trial included!");

INSERT INTO Descriptions (DescText, ProductID, LanID, DescText2) VALUES ("SPIELE ALL DIE HIGHLIGHT SPIELE - IN HD - ÜBERALL!", 1, 2, "Mit dem neuen OLED Display Technologie und der höheren Akku Kapazität, kannst du die atemberaubende Nintendo Spiele spielen aber in ANDERS! Du kannst auf dieser Switch Mehrspieler Spiele spielen. EGAL WO!");
INSERT INTO Descriptions (DescText, ProductID, LanID, DescText2) VALUES ("4K - 120Hz SPIELE!", 2, 2, "Du willst eine PS5 kaufen? Tja pech, gibt es nicht");
INSERT INTO Descriptions (DescText, ProductID, LanID, DescText2) VALUES ("BESICHTIGE NEUE WELTEN - IN VIRTUAL REALITY!", 3, 2, "Fühlst du dich von der realen Welt depressiv? VERSTECK DICH IN EINER ANDEREN WELT!");
INSERT INTO Descriptions (DescText, ProductID, LanID, DescText2) VALUES ("ENTDECKE DIE FORZA HORIZON WELT IN ULTRA HD!", 4, 2, "SPIELE DIE BELIEBTESTEN SPIELE WIE FORZA HORIZON 5 IN QHD/60 BILDER PRO SEKUNDE - DAZU NOCH XBOX GAME PASS für 3 MONATE!");

INSERT INTO Users (UserName, UserPsw, UserType) VALUES ("LinFr140", "$2y$10$rUYDJofyGuxEVB0pKi4w6e3UpD3nSZNBksBFBRS.A24c6E8VkkQ0.", "Admin");