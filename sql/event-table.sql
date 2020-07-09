CREATE TABLE events (
	event_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(100) NOT NULL,
    event_desc VARCHAR(255) NOT NULL,
    event_time TIME NOT NULL,
    event_date DATE NOT NULL
);