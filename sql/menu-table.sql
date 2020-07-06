CREATE TABLE menu (
	item_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(100) NOT NULL UNIQUE,
    item_desc VARCHAR(255) NOT NULL,
    item_price DECIMAL(4,2) NOT NULL,
    item_img VARCHAR(255) NOT NULL,
    take_out CHAR(1) NOT NULL,
    item_category INT NOT NULL,
    FOREIGN KEY (item_category) REFERENCES categories(category_id)
);