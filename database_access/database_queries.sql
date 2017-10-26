CREATE DATABASE myDiaryDB;

CREATE TABLE myDiaryDB.user_logIn_info_tb(
		user_mail VARCHAR(32)  PRIMARY KEY,
    Full_name VARCHAR(32),
		password VARCHAR(32) NOT NULL,
		birth_date date,
		reg_date date,
		activity VARCHAR(5)
);






CREATE TABLE myDiaryDB.user_information_tbl(
		user_product_id VARCHAR(16) PRIMARY KEY,
		user_mail VARCHAR(32),
        address VARCHAR(32),
        city  VARCHAR(20),
        zip  VARCHAR(8),
        division VARCHAR(14), 
        blood_group VARCHAR(4),
        gender VARCHAR(7),
        religion VARCHAR(10),
        occupation VARCHAR(16),
        phone VARCHAR(11),
        FOREIGN KEY (user_mail) REFERENCES myDiaryDB.user_logIn_info_tb(user_mail)
        ON DELETE CASCADE
);


CREATE TABLE myDiaryDB.user_pro_pic_schema(
      user_product_id VARCHAR(16) PRIMARY KEY,
      user_img longblob,
    FOREIGN KEY (user_product_id) REFERENCES myDiaryDB.user_information_tbl(user_product_id)
    ON DELETE CASCADE
);





CREATE TABLE myDiaryDB.contactTbl(
  user_pro_id VARCHAR(16),
  friend_pro_id VARCHAR(16),

   PRIMARY KEY (user_pro_id, friend_pro_id),

   FOREIGN KEY (user_pro_id) REFERENCES myDiaryDB.user_information_tbl(user_product_id)
    ON DELETE CASCADE,
   FOREIGN KEY (friend_pro_id) REFERENCES myDiaryDB.user_information_tbl(user_product_id)
    ON DELETE CASCADE
  
);



CREATE TABLE myDiaryDB.whatsToday(
   eventDate date,
   headings VARCHAR(50),
   description VARCHAR(200),
   colorChoice VARCHAR(10)
);

insert into myDiaryDB.whatsToday VALUES('2017-10-21','heading 1 ','today is bang bang','red');
insert into myDiaryDB.whatsToday VALUES('2017-10-21','heading 2 ','today is bang bang','blue');
insert into myDiaryDB.whatsToday VALUES('2017-10-21','heading 3 ','today is bang bang','green');
insert into myDiaryDB.whatsToday VALUES('2017-10-22','heading 4 ','today is bang bang','grey');
insert into myDiaryDB.whatsToday VALUES('2017-10-22','heading 5 ','today is bang bang','red');
insert into myDiaryDB.whatsToday VALUES('2017-10-23','heading 1 ','today is bang bang','red');
insert into myDiaryDB.whatsToday VALUES('2017-10-23','heading 2 ','today is bang bang','blue');
insert into myDiaryDB.whatsToday VALUES('2017-10-24','heading 3 ','today is bang bang','green');
insert into myDiaryDB.whatsToday VALUES('2017-10-25','heading 4 ','today is bang bang','grey');
insert into myDiaryDB.whatsToday VALUES('2017-10-25','heading 5 ','today is bang bang','red'); 


CREATE TABLE myDiaryDB.lastpass(
   user_P_id VARCHAR(16), 
   lpId VARCHAR(17),
   websiteName VARCHAR(20),
   userNameOrg VARCHAR(32),
   urlOrg VARCHAR(32),
   passwordOrg VARCHAR(32),
   commitMsg VARCHAR(32),
   updateDate date,

    PRIMARY KEY (lpId),
    FOREIGN KEY (user_P_id) REFERENCES myDiaryDB.user_information_tbl(user_product_id)
    ON DELETE CASCADE
);

CREATE TABLE myDiaryDB.DiaryPostSchema(
   user_P_id VARCHAR(16), 
   diaryPostId VARCHAR(17),
   heading VARCHAR(50),
   description VARCHAR(500),
   emotion VARCHAR(20),
   postDate date,
   postTime time,

    PRIMARY KEY (diaryPostId),
    FOREIGN KEY (user_P_id) REFERENCES myDiaryDB.user_information_tbl(user_product_id)
    ON DELETE CASCADE
);



CREATE TABLE myDiaryDB.eventSchema(
   user_P_id VARCHAR(16), 
   eventId VARCHAR(17),
   description VARCHAR(200),
    venue VARCHAR(50),
   eventType VARCHAR(20),
   eventTime time,
   eventDate date,
   eventPostTime time,
   eventPostDate date,

    PRIMARY KEY (eventId),
    FOREIGN KEY (user_P_id) REFERENCES myDiaryDB.user_information_tbl(user_product_id)
    ON DELETE CASCADE
);

