CREATE TABLE events (
	event_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(100) NOT NULL,
    event_desc VARCHAR(255) NOT NULL,
    event_time TIME NOT NULL,
    event_start_date DATE NOT NULL,
    event_end_date DATE NOT NULL
);

INSERT INTO events (`event_name`, `event_desc`, `event_time`, `event_start_date`, `event_end_date`) VALUES ('Free dessert with RCMH ticket', 'Free dessert for anyone who presents a Radio City Music Hall ticket.', '00:00:00', '2020-12-1', '2020-12-31');
INSERT INTO events (`event_name`, `event_desc`, `event_time`, `event_start_date`, `event_end_date`) VALUES ('Free Hot Cider for a carol', 'One free hot apple cider for anyone who sings us a christmas carol.', '00:00:00', '2020-12-01', '2020-12-31');
INSERT INTO events (`event_name`, `event_desc`, `event_time`, `event_start_date`, `event_end_date`) VALUES ('Free Cocoa for Santa', 'One free hot cocoa for anyone wearing a Santa or Elf costume.', '00:00:00', '2020-12-01', '2020-12-01');
INSERT INTO events (`event_name`, `event_desc`, `event_time`, `event_start_date`, `event_end_date`) VALUES ('Cookie decorating', 'Anyone is welcome to come to the Bistro to decorate cookies witht he staff and others.', '16:00:00', '2020-12-18', '2020-12-18');
INSERT INTO events (`event_name`, `event_desc`, `event_time`, `event_start_date`, `event_end_date`) VALUES ('Summer Barbeque', 'Special summer menu for one day only. Not available for takeout.', '00:00:00', '2020-12-21', '2020-12-21');
INSERT INTO events (`event_name`, `event_desc`, `event_time`, `event_start_date`, `event_end_date`) VALUES ('Closed Early', 'Bistro Closes early at 2 PM.', '14:00:00', '2020-12-24', '2020-12-24');
INSERT INTO events (`event_name`, `event_desc`, `event_time`, `event_start_date`, `event_end_date`) VALUES ('Closed', 'Bistro will be closed all day for Christmas.', '00:00:00', '2020-12-25', '2020-12-25');
INSERT INTO events (`event_name`, `event_desc`, `event_time`, `event_start_date`, `event_end_date`) VALUES ('Open late', 'Bistro will stay open until 2 AM for New Years', '00:00:00', '2020-12-31', '2021-01-01');