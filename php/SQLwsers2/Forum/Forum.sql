drop database Forum;
create Database Forum;
use Forum;

create Table Text(
    TextID int not null auto_increment,
    UserName Varchar(15) not null,
    UserText  Text not null,
    Primary Key(TextID)
)