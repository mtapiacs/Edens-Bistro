CREATE TABLE orders (
	order_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	customer INT NOT NULL,
    order_items INT NOT NULL,
    transaction_id INT NOT NULL UNIQUE,
	FOREIGN KEY (customer) REFERENCES users(user_id),
    FOREIGN KEY (order_items) REFERENCES order_items(order_item_id)
);