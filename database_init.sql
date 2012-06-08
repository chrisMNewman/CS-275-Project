SET storage_engine = INNODB;

CREATE TABLE User(
U_ID INT( 1 ) NOT NULL ,
Screen_Name CHAR( 30 ) NOT NULL ,
Join_Date DATE NOT NULL ,
Password CHAR(32) NOT NULL ,
PRIMARY KEY ( U_ID )
);
CREATE TABLE Post(
P_Number INT NOT NULL ,
T_ID INT NOT NULL ,
Post_Time DATETIME NOT NULL ,
Content TEXT NOT NULL ,
Last_Edit_Time DATETIME ,
U_ID INT NOT NULL ,
PRIMARY KEY ( P_Number, T_ID )
);
CREATE TABLE Thread(
T_ID INT NOT NULL ,
Creation_Time DATETIME NOT NULL ,
Title CHAR( 40 ) NOT NULL ,
U_ID INT NOT NULL ,
PRIMARY KEY ( T_ID )
);
#(Instantiate foreign key pointers)
ALTER TABLE Thread ADD FOREIGN KEY ( U_ID )REFERENCES User( U_ID );
ALTER TABLE Post ADD FOREIGN KEY ( T_ID ) REFERENCES Thread( T_ID );
ALTER TABLE Post ADD FOREIGN KEY ( U_ID ) REFERENCES User( U_ID );
#(Create a few users)
INSERT INTO User
VALUES ( 0, 'Admin', '2006-12-25', 'abc') ;# Affected rows: 1
INSERT INTO User
VALUES ( 1, 'TRexRawr', '2007-02-14', 'abc') ;# Affected rows: 1
INSERT INTO User
VALUES ( 2, 'Turtle4', '2010-11-29', 'abc') ;# Affected rows: 1
INSERT INTO User
VALUES ( 3, 'MikeWozowski', '1990-07-15', 'abc') ;# Affected rows: 1
#(Create a few threads)
INSERT INTO Thread
VALUES ( 0, '2012-05-05 02:49:41', 'General/FAQ', 0 );
INSERT INTO Thread
VALUES ( 1, '2012-05-06 01:29:48', 'Off Topic', 0 );
INSERT INTO Thread
VALUES ( 2, '2012-05-06 01:31:07', 'Troubleshooting', 2 ) ;# Affected rows: 1
INSERT INTO Thread
VALUES ( 3, '2012-05-06 01:33:30', 'Software Development', 3 ) ;# Affected rows: 1
#(Create a few posts)
INSERT INTO Post
VALUES ( 0, 0, '2012-05-06 01:37:13', 'This is the general and FAQ page! Feel free to talk about general things and ask questions!', '2012-05-06 01:37:13', 0 ) ;# Affected rows: 1
INSERT INTO Post
VALUES ( 0, 1, '2012-05-06 01:39:25', 'This is the off-topic page. Here you can talk about anything you want, so long as it has little to do with computers or software!','2012-05-06 01:39:25', 0 ) ;# Affected rows: 1
INSERT INTO Post
VALUES ( 0, 2, '2012-05-06 01:40:38', 'Here you can discuss any problems with you computer, whether they be problems related to hardware or software.', '2012-05-06 01:40:38',0 ) ;# Affected rows: 1
INSERT INTO Post
VALUES ( 1, 2, '2012-05-06 01:37:13', 'How do I do the thing?', '2012-05-06 01:37:13', 2 ) ;# Affected rows: 1
INSERT INTO Post
VALUES ( 0, 3, '2012-05-06 01:42:01','Anything to do with programming and software development is discussed here. You can talk about you favorite languages, or share code to impress you friends and frighten your enemies!','2012-05-06 01:42:01', 1 ) ;# Affected rows: 1


#To update any of the entities, make sure that any foreign keys point to existing primary keys of other entities. 
#All posts should point to a unique user ID and thread ID, and all threads should point to a unique user ID.
#When posts are deleted, the next post that is created will have the same post number as the most recently deleted post. 
#(For example, if post with post number 5 is deleted, the next post that is created will have post number 5). 
#If threads are to be deleted, all posts with foreign keys pointing to those respective threads should also be deleted.
<<<<<<< HEAD
#Because threads must be owned by users, users should not be deleted at this time. The forum can hold one million users, so this shouldn’t be a problem.
=======
#Because threads must be owned by users, users should not be deleted at this time. The forum can hold one million users, so this shouldn’t be a problem.
>>>>>>> work on register.php and newuser.php,
