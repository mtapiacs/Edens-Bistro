CREATE TABLE order_items (
    order_item_id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    quantity INT UNSIGNED NOT NULL,
    order_id INT UNSIGNED NOT NULL,
    menu_item_id INT NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (menu_item_id) REFERENCES menu(item_id)
)