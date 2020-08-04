CREATE TABLE events (
	event_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(100) NOT NULL,
    event_desc VARCHAR(255) NOT NULL,
    event_time TIME NOT NULL,
    event_start_date DATE NOT NULL,
    event_end_date DATE NOT NULL
);

--INSERT INTO events ('event_name', 'event_desc', 'event_time', 'event_date') VALUES ('Free dessert with RCMH ticket', 'Free dessert for anyone who presents a Radio City Music Hall ticket', '00:00:00', '')