CREATE TABLE orders (
    order_id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    -- order_status CHAR(1) NOT NULL, -- Index (Phpmyadmin ask sabal)
    customer INT NOT NULL,
    transaction_id INT NULL, -- Used To Be Unique, Not Null (Would Have This In Place If Not Using Test Mode In Authorize.Net)
    FOREIGN KEY (customer) REFERENCES users(user_id)
);