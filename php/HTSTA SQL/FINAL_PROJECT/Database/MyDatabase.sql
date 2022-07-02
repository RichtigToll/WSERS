drop database MyProducts;
create database MyProducts;

use MyProducts;

create Table Products (
    ProductID int not null AUTO_INCREMENT,
    ProductName varchar(30),
    ProductImage varchar(100),
    ProductLink varchar(1000),
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
    OrderNumber VARCHAR(255),
    UserId INT,
    ListNumber VARCHAR(255),
    PRIMARY KEY(OrderNumber),
    FOREIGN KEY(UserId) REFERENCES Users(UserId)
);


create Table OrderList(
    ListNumber INT NOT NULL AUTO_INCREMENT,
    OrderNumber VARCHAR(255),
    ProductID INT,
    ProductQuantity INT,
    PRIMARY KEY(ListNumber),
    FOREIGN KEY(OrderNumber) REFERENCES Orders(OrderNumber),
    FOREIGN KEY(ProductID) REFERENCES Products(ProductID)
);

INSERT INTO Languages (LanID, LanName) VALUES(1, "EN");
INSERT INTO Languages (LanID, LanName) VALUES(2, "DE");

INSERT INTO Products (ProductName, ProductImage, ProductLink, Price) VALUES("NINTENDO SWITCH", "Nintendo.jpg", "https://www.amazon.de/-/en/dp/B098RJXBTY/ref=sr_1_4?keywords=nintendoswitch+oled&qid=1638262014&qsid=258-1765935-0075309&sr=8-4&sres=B098BYN3X3%2CB098RJXBTY%2CB09CPFMT8R%2CB09DVM2T6X%2CB07JBZ7PLQ%2CB09FLC4J73%2CB09KFYT6LD%2CB09F6JT3YD%2CB09BQ34PRK%2CB09B4MJ9H3%2CB09F2YR42P%2CB09FXYQRHH%2CB09MJLMX8Q%2CB09MCGRTLN%2CB09H4R2TL3%2CB09FJR7D6S", 369);
INSERT INTO Products (ProductName, ProductImage, ProductLink, Price) VALUES("PLAYSTATION 5", "PS5.jpg", "https://www.amazon.de/Sony-Interactive-Entertainment-PlayStation-5/dp/B08H93ZRK9/ref=sr_1_1?__mk_de_DE=%C3%85M%C3%85%C5%BD%C3%95%C3%91&keywords=PS5&qid=1637834914&sr=8-1", 499);
INSERT INTO Products (ProductName, ProductImage, ProductLink, Price) VALUES("VR HEADSET", "VR.jpg", "https://www.amazon.de/-/en/Controller-Resolution-Adjustable-Subpixel-Bluetooth/dp/B08BFKQGN3/ref=sr_1_2?keywords=vr-brille&qid=1638262203&qsid=258-1765935-0075309&refinements=p_36%3A115014031&rnid=389294011&s=ce-de&sr=1-2&sres=B095M87PVJ%2CB08BFKQGN3%2CB0948FKB7H%2CB095MBMLK7%2CB095MC963Y%2CB085HY5BCM%2CB08N6TMSPW%2CB08PKSXR8K%2CB08BFQJ6YG%2CB08PK58KJD%2CB091YGQ23F%2CB09JC595BD%2CB087QDGR3W%2CB09JC2J228%2CB07XLN6WSX%2CB082GF351Q%2CB087QDVMHW%2CB07SSXVD1Q%2CB094C337Z5%2CB09H33X94Y&srpt=VIRTUAL_REALITY_HEADSET&th=1", 780);
INSERT INTO Products (ProductName, ProductImage, ProductLink, Price) VALUES("XBOX SERIES X", "XBOX.jpg", "https://www.xbox.com/de-DE/consoles/xbox-series-x#purchase", 499);


INSERT INTO Descriptions (DescText, ProductID, LanID, DescText2) VALUES ("PLAY ALL THE HIGHLIGHT GAMES - IN HD - EVERYWHERE!", 1, 1, "With the new OLED display and the higher battery capacity, you can enjoy the breathtaking Nintendo games again BUT DIFFERENT! Funny multiplayer games EVERYWHERE you want!");
INSERT INTO Descriptions (DescText, ProductID, LanID, DescText2) VALUES ("4K - 120Hz GAMES!", 2, 1, "You want to buy a PS5? Guess what, it's not available");
INSERT INTO Descriptions (DescText, ProductID, LanID, DescText2) VALUES ("DISCOVER NEW WORLDS - IN VIRTUAL REALITY!", 3, 1, "You are feeling depressed of the real world? HIDE YOURSELF IN A DIFFERENT WORLD!");
INSERT INTO Descriptions (DescText, ProductID, LanID, DescText2) VALUES ("EXPLORE FORZA HORIZON IN HIGH RESOLUTION!", 4, 1, "PLAY THE HYPED GAMES LIKE FORZA HORIZON IN QHD/120FPS - XBOX GAME PASS 3 months trial included!");


INSERT INTO Descriptions (DescText, ProductID, LanID, DescText2) VALUES ("SPIELE ALL DIE HIGHLIGHT SPIELE - IN HD - ÜBERALL!", 1, 2, "Mit dem neuen OLED Display Technologie und der höheren Akku Kapazität, kannst du die atemberaubende Nintendo Spiele spielen aber in ANDERS! Du kannst auf dieser Switch Mehrspieler Spiele spielen. EGAL WO!");
INSERT INTO Descriptions (DescText, ProductID, LanID, DescText2) VALUES ("4K - 120Hz SPIELE!", 2, 2, "Du willst eine PS5 kaufen? Tja pech, gibt es nicht");
INSERT INTO Descriptions (DescText, ProductID, LanID, DescText2) VALUES ("BESICHTIGE NEUE WELTEN - IN VIRTUAL REALITY!", 3, 2, "Fühlst du dich von der realen Welt depressiv? VERSTECK DICH IN EINER ANDEREN WELT!");
INSERT INTO Descriptions (DescText, ProductID, LanID, DescText2) VALUES ("ENTDECKE DIE FORZA HORIZON WELT IN ULTRA HD!", 4, 2, "SPIELE DIE BELIEBTESTEN SPIELE WIE FORZA HORIZON 5 IN QHD/120 BILDER PRO SEKUNDE - DAZU NOCH XBOX GAME PASS für 3 MONATE!");


INSERT INTO Users (UserName, UserPsw, UserType) VALUES ("LinFr140", "$2y$10$rUYDJofyGuxEVB0pKi4w6e3UpD3nSZNBksBFBRS.A24c6E8VkkQ0.", "Admin");