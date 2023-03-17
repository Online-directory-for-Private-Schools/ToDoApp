CREATE TABLE users(
    user_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username VARCHAR(200),
    email TEXT,
    password VARCHAR(200)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE INDEX ix_users ON users (
    user_id,
    EMAIL(10)
);
