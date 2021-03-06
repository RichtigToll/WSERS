drop database MyProducts;
create database MyProducts;

use MyProducts;

create Table Users(
    UserId int not null AUTO_INCREMENT,
    UserName VARCHAR(30) UNIQUE,
    PRIMARY KEY (UserId)
);

INSERT INTO Users (UserName) VALUES ("Francesco");
INSERT INTO Users (UserName) VALUES ("Dan");

create Table Products (
    ProductID int not null AUTO_INCREMENT,
    ProductName varchar(30),
    ProductImage varchar(100),
    ProductLink varchar(1000),
    ProductDesc varchar(1000),
    Price int,
    PRIMARY KEY (ProductID)
);

create Table Languages (
    LanID int not null AUTO_INCREMENT,
    LangName varchar(25),
    PRIMARY KEY (LanID)
);

INSERT INTO Languages (LangName) VALUES("ENGLISH");
INSERT INTO Languages (LangName) VALUES("DEUTSCH");

INSERT INTO Products (ProductName, ProductImage, ProductLink, Price) VALUES("NINTENDO SWITCH", "./images/Nintendo.jpg", "https://www.amazon.de/-/en/dp/B098RJXBTY/ref=sr_1_4?keywords=nintendoswitch+oled&qid=1638262014&qsid=258-1765935-0075309&sr=8-4&sres=B098BYN3X3%2CB098RJXBTY%2CB09CPFMT8R%2CB09DVM2T6X%2CB07JBZ7PLQ%2CB09FLC4J73%2CB09KFYT6LD%2CB09F6JT3YD%2CB09BQ34PRK%2CB09B4MJ9H3%2CB09F2YR42P%2CB09FXYQRHH%2CB09MJLMX8Q%2CB09MCGRTLN%2CB09H4R2TL3%2CB09FJR7D6S", 369);
INSERT INTO Products (ProductName, ProductImage, ProductLink, Price) VALUES("PLAYSTATION 5", "./images/PS5.jpg", "https://www.amazon.de/Sony-Interactive-Entertainment-PlayStation-5/dp/B08H93ZRK9/ref=sr_1_1?__mk_de_DE=%C3%85M%C3%85%C5%BD%C3%95%C3%91&keywords=PS5&qid=1637834914&sr=8-1", 9999);
INSERT INTO Products (ProductName, ProductImage, ProductLink, Price) VALUES("VR HEADSET", "./images/VR.jpg", "https://www.amazon.de/-/en/Controller-Resolution-Adjustable-Subpixel-Bluetooth/dp/B08BFKQGN3/ref=sr_1_2?keywords=vr-brille&qid=1638262203&qsid=258-1765935-0075309&refinements=p_36%3A115014031&rnid=389294011&s=ce-de&sr=1-2&sres=B095M87PVJ%2CB08BFKQGN3%2CB0948FKB7H%2CB095MBMLK7%2CB095MC963Y%2CB085HY5BCM%2CB08N6TMSPW%2CB08PKSXR8K%2CB08BFQJ6YG%2CB08PK58KJD%2CB091YGQ23F%2CB09JC595BD%2CB087QDGR3W%2CB09JC2J228%2CB07XLN6WSX%2CB082GF351Q%2CB087QDVMHW%2CB07SSXVD1Q%2CB094C337Z5%2CB09H33X94Y&srpt=VIRTUAL_REALITY_HEADSET&th=1", 780);
INSERT INTO Products (ProductName, ProductImage, ProductLink, Price) VALUES("XBOX SERIES X", "./images/XBOX.jpg", "https://www.xbox.com/de-DE/consoles/xbox-series-x#purchase", 499);

INSERT INTO Products (ProductDesc) VALUES ("PLAY ALL THE HIGHLIGHT GAMES - IN HD - EVERYWHERE!");
INSERT INTO Products (ProductDesc) VALUES ("4K - 120Hz GAMES!");
INSERT INTO Products (ProductDesc) VALUES ("DISCOVER NEW WORLDS - IN VIRTUAL REALITY!");
INSERT INTO Products (ProductDesc) VALUES ("EXPLORE FORZA HORIZON IN HIGH RESOLUTION!");




