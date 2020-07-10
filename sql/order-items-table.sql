CREATE TABLE order_items (
	order_item_id INT NOT NULL PRIMARY KEY,
    order_id INT NOT NULL,
	menu_item_id INT NOT NULL,
	FOREIGN KEY (menu_item_id) REFERENCES menu(item_id),
    FOREIGN KEY (order_item_id) REFERENCES order(order_id)
);