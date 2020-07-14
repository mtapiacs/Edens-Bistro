CREATE TABLE categories (
	category_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(50) NOT NULL UNIQUE,
    category_desc VARCHAR(255) NOT NULL
);

INSERT INTO `categories` (`category_name`, `category_desc`) VALUES ('Lunch', 'Food served through 3pm')