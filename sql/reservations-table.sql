CREATE TABLE reservations(
    reservation_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    room INT NOT NULL,
    num_people TINYINT NOT NULL,
    reservation_time TIME NOT NULL,
    reservation_date DATE NOT NULL,
    phone_number VARCHAR(10) NOT NULL,
    comments_questions VARCHAR(255)    
);

ALTER TABLE reservations
ADD FOREIGN KEY (room) REFERENCES rooms(room_id)

-- SELECT * FROM `reservations` INNER JOIN rooms ON reservations.room = rooms.room_id;
ALTER TABLE `cis431`.`reservations` DROP INDEX `email`, ADD INDEX `email` (`email`) USING BTREE; 

--foreign key for reservation_events table 

