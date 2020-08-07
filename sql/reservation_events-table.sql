--creating the table
--from the jquery fullcalendar guide found at https://www.webslesson.info/2017/12/jquery-fullcalandar-integration-with-php-and-mysql.html
CREATE TABLE IF NOT EXISTS `reservation_events` (
  `res_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--primary key

ALTER TABLE `reservation_events` ADD PRIMARY KEY(`res_id`);

ALTER TABLE `reservation_events`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT;
