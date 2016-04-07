CREATE TABLE posts (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	user_id INT NOT NULL,
    title VARCHAR(256),
    body TEXT,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
	status TINYINT DEFAULT 1
);


CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(128),
    password VARCHAR(256),
	email VARCHAR(128),
    role ENUM('admin', 'author') NOT NULL,
	bio TEXT,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
	status TINYINT DEFAULT 1
);