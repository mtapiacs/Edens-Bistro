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

INSERT INTO menu(`item_name`, `item_desc`, `item_price`, `item_img`, `take_out`, `item_category`) VALUES ('Cheese Hamburger', 'Ingredients include: Cheese, beef, mayo, etc', 6.29, 'http://google.com', 'NO', 1)
INSERT INTO menu(`item_name`, `item_desc`, `item_price`, `item_img`, `take_out`, `item_category`) VALUES ('Loaded fries', 'Ingredients include: Cheese, potato', 2.29, 'http://google.com', 'NO', 1)