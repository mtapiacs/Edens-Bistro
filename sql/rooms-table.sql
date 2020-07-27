CREATE TABLE rooms(
	room_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    room_name VARCHAR(100) NOT NULL,
    room_desc VARCHAR(255) NOT NULL,
    room_capacity TINYINT NOT NULL
);
/*INSERT INTO `rooms`(`room_name`, `room_desc`, `room_capacity`) VALUES ('40 seat','Our largest party room that can fit 40 people','40');*/
-- INSERT INTO `rooms`(`room_name`, `room_desc`, `room_capacity`) VALUES ('Newly Wed','Special room for newly weds and other friends and family','6');
-- INSERT INTO `rooms`(`room_name`, `room_desc`, `room_capacity`) VALUES ('15 seat','Smaller room that can hold 15 people',15);