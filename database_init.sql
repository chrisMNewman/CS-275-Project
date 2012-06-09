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
#(Create a few users)
INSERT INTO User
VALUES ( null, 'Admin', '2006-12-25', '14684aa1886ab63c06f639a87daeb10db558f77e4288092c6ae6ea781c94ce15') ;# Affected rows: 1
INSERT INTO User
VALUES ( null, 'TRexRawr', '2007-02-14', '14684aa1886ab63c06f639a87daeb10db558f77e4288092c6ae6ea781c94ce15') ;# Affected rows: 1
INSERT INTO User
VALUES ( null, 'Turtle4', '2010-11-29', '14684aa1886ab63c06f639a87daeb10db558f77e4288092c6ae6ea781c94ce15') ;# Affected rows: 1
INSERT INTO User
VALUES ( null, 'MikeWozowski', '1990-07-15', '14684aa1886ab63c06f639a87daeb10db558f77e4288092c6ae6ea781c94ce15') ;# Affected rows: 1
#(Create a few threads)
INSERT INTO Thread
VALUES ( null, 1 , '2012-05-05 02:49:41', 'General/FAQ');
INSERT INTO Thread
VALUES ( null, 1 , '2012-05-06 01:29:48', 'Off Topic');
INSERT INTO Thread
VALUES ( null, 2 , '2012-05-06 01:31:07', 'Troubleshooting') ;# Affected rows: 1
INSERT INTO Thread
VALUES ( null, 3 , '2012-05-06 01:33:30', 'Software Development') ;# Affected rows: 1
#(Create a few posts)
INSERT INTO Post
VALUES ( null, 1, 1, '2012-05-06 01:37:13', '2012-05-06 01:37:13', 'This is the general and FAQ page! Feel free to talk about general things and ask questions!') ;# Affected rows: 1
INSERT INTO Post
VALUES ( null, 1, 1, '2012-05-06 01:39:25','2012-05-06 01:39:25', 'This is the off-topic page. Here you can talk about anything you want, so long as it has little to do with computers or software!') ;# Affected rows: 1
INSERT INTO Post
VALUES ( null, 2, 1, '2012-05-06 01:40:38', '2012-05-06 01:40:38', 'Here you can discuss any problems with you computer, whether they be problems related to hardware or software.') ;# Affected rows: 1
INSERT INTO Post
VALUES ( null, 2, 3, '2012-05-06 01:37:13', '2012-05-06 01:37:13', 'How do I do the thing?') ;# Affected rows: 1
INSERT INTO Post
VALUES ( null, 3, 2, '2012-05-06 01:42:01','2012-05-06 01:42:01','Anything to do with programming and software development is discussed here. You can talk about you favorite languages, or share code to impress you friends and frighten your enemies!') ;# Affected rows: 1


#To update any of the entities, make sure that any foreign keys point to existing primary keys of other entities. 
#All posts should point to a unique user ID and thread ID, and all threads should point to a unique user ID.
#When posts are deleted, the next post that is created will have the same post number as the most recently deleted post. 
#(For example, if post with post number 5 is deleted, the next post that is created will have post number 5). 
#If threads are to be deleted, all posts with foreign keys pointing to those respective threads should also be deleted.

#Because threads must be owned by users, users should not be deleted at this time. The forum can hold one million users, so this shouldn’t be a problem.
