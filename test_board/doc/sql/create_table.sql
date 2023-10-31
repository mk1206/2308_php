CREATE DATABASE test_board;

USE test_board;

CREATE TABLE boards (
	id INT PRIMARY KEY AUTO_INCREMENT
	, title VARCHAR(100) NOT NULL
	, content VARCHAR(1000) NOT NULL
	, create_at DATETIME NOT NULL
	, update_at DATETIME DEFAULT NULL
	, delete_at DATETIME DEFAULT NULL
	, weather INT NOT NULL
	, mood INT NOT NULL
);