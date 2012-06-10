SET storage_engine = INNODB;

CREATE TABLE User(
U_ID INT NOT NULL AUTO_INCREMENT,
Screen_Name CHAR( 32 ) NOT NULL ,
Join_Date DATE NOT NULL ,
Password CHAR(64) NOT NULL ,
PRIMARY KEY ( U_ID )
);
CREATE TABLE Post(
P_Number INT NOT NULL AUTO_INCREMENT,
T_ID INT NOT NULL ,
U_ID INT NOT NULL ,
Post_Time DATETIME NOT NULL ,
Last_Edit_Time DATETIME ,
Content TEXT NOT NULL ,
PRIMARY KEY ( P_Number, T_ID )
);
CREATE TABLE Thread(
T_ID INT NOT NULL AUTO_INCREMENT,
U_ID INT NOT NULL ,
Creation_Time DATETIME NOT NULL ,
Title CHAR( 40 ) NOT NULL ,
PRIMARY KEY ( T_ID )
);
#(Instantiate foreign key pointers)
ALTER TABLE Thread ADD FOREIGN KEY ( U_ID )REFERENCES User( U_ID );
ALTER TABLE Post ADD FOREIGN KEY ( T_ID ) REFERENCES Thread( T_ID );
ALTER TABLE Post ADD FOREIGN KEY ( U_ID ) REFERENCES User( U_ID );
#(Create the admin user with password "Password")
INSERT INTO User
VALUES ( null, 'Admin', '2012-06-10', '14684aa1886ab63c06f639a87daeb10db558f77e4288092c6ae6ea781c94ce15') ; 
INSERT INTO User
VALUES ( null, 'Username', '2012-06-10', '') ; #don't allow "username to be valid"