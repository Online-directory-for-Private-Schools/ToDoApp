CREATE TABLE ITEMS (
  ITEM_ID INT(11) NOT NULL,
  TITLE VARCHAR(250) COLLATE UTF8MB4_UNICODE_CI NOT NULL,
  CREATE_TIME BIGINT(20) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_UNICODE_CI;

ALTER TABLE ITEMS ADD PRIMARY KEY (ITEM_ID), ADD KEY TITLE (TITLE);

ALTER TABLE ITEMS MODIFY ITEM_ID INT(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE ITEMS ADD COLUMN USER_ID INT(11);

ALTER TABLE ITEMS ADD FOREIGN KEY(USER_ID) REFERENCES USERS(USER_ID);

COMMIT;