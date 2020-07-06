-- 1
CREATE TABLE addresses(	
	address_id INT PRIMARY KEY AUTO_INCREMENT,
    address_one VARCHAR(255) NOT NULL,
    address_two VARCHAR(255),
    city VARCHAR(100) NOT NULL,
    state VARCHAR(100) NOT NULL,
    zip VARCHAR(10) NOT NULL
);