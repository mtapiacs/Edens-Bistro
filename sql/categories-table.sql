CREATE TABLE categories (
	category_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(50) NOT NULL UNIQUE,
    category_desc VARCHAR(255) NOT NULL
);