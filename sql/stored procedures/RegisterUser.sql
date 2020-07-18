DELIMITER //

CREATE PROCEDURE RegisterUser (
    IN address_one VARCHAR(255),
    IN address_two VARCHAR(255),
    IN city VARCHAR(100),
    IN state VARCHAR(100),
    IN zip VARCHAR(10),
    IN first_name VARCHAR(50),
    IN last_name VARCHAR(50),
    IN email VARCHAR(255),
    IN phone VARCHAR(10),
    IN password VARCHAR(255),
    IN username VARCHAR(255)
)

BEGIN
	
    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
    	BEGIN
        	ROLLBACK;
    	END;

    START TRANSACTION;
        -- Variables (Address Parameters)
        SET @aP1 = address_one;
        SET @aP2 = address_two;
        SET @aP3 = city;
        SET @aP4 = state;
        SET @aP5 = zip;

    	-- Insert Address
        PREPARE address_stmt FROM "INSERT INTO addresses (address_one, address_two, city, state, zip) VALUES (?, ?, ?, ?, ?)";
        EXECUTE address_stmt USING @aP1, @aP2, @aP3, @aP4, @aP5;
        DEALLOCATE PREPARE address_stmt;

		-- Variables (User Paramaters)
        SET @uP1 = first_name;
        SET @uP2 = last_name;
        SET @uP3 = email;
        SET @uP4 = phone;
        SET @uP5 = password;
        SET @uP6 = username;
		SET @uP7 = LAST_INSERT_ID(); -- Comes from previous insert query
        
        -- Insert User
        PREPARE users_stmt FROM "INSERT INTO users (first_name, last_name, email, phone, password, username, user_address) VALUES (?, ?, ?, ?, ?, ?, ?)";
        EXECUTE users_stmt USING @uP1, @uP2, @uP3, @uP4, @uP5, @uP6, @uP7;
        DEALLOCATE PREPARE users_stmt;
	
	COMMIT;
    
END //

DELIMITER ;