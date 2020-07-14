CREATE TABLE orders (
    order_id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    order_status CHAR(1) NOT NULL, -- Index (Phpmyadmin ask sabal)
    customer INT NOT NULL,
    transaction_id INT NOT NULL UNIQUE,
    FOREIGN KEY (customer) REFERENCES user(user_id)
);