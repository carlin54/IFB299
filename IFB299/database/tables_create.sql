CREATE TABLE `Help` (
	`REQUEST_ID` 			INT 			NOT NULL 	AUTO_INCREMENT 	UNIQUE	,
	`FIRST_NAME` 			VARCHAR(16) 	NOT NULL							,
	`LAST_NAME` 			VARCHAR(16) 	NOT NULL							,
	`EMAIL`					VARCHAR(16) 	NOT NULL 					 		,
	`PHONE_NUMBER` 			VARCHAR(8)	 	NOT NULL							,
	`ADDRESS_FIRST_LINE` 	TEXT(64)		NOT NULL							,
	`ADDRESS_POSTCODE` 		INT(4)			NOT NULL							,
	`ADDRESS_SUBURB` 		TEXT(64)		NOT NULL							,
	`ADDRESS_STATE` 		TEXT(64)		NOT NULL							,
	`ADDRESS_COUNTRY` 		TEXT(64)		NOT NULL							,
	`IS_RECIPIENT`			TINYINT(1)		NOT NULL							,
	`DESCRIPTION`			VARCHAR(1024)	NOT NULL							,
	
	PRIMARY KEY (`REQUEST_ID`)
);

CREATE TABLE `Customers` (
	`CUSTOMER_ID` 			INT 		NOT NULL 	AUTO_INCREMENT 	UNIQUE	,
	`CUSTOMER_FIRST_NAME` 	VARCHAR(16) NOT NULL							,
	`CUSTOMER_LAST_NAME` 	VARCHAR(16) NOT NULL							,
	`CUSTOMER_USERNAME`		VARCHAR(16) NOT NULL 					UNIQUE	,
	`CUSTOMER_PASSWORD` 	VARCHAR(16) NOT NULL							,
	`CUSTOMER_MOBILE` 		VARCHAR(8) 	NOT NULL							,
	`CUSTOMER_HOMEPHONE` 	VARCHAR(8) 	NOT NULL							,
	PRIMARY KEY (`CUSTOMER_USERNAME`)
);

CREATE TABLE `Orders` (
	`RECIPENT_ID` 			INT 			NOT NULL					,
	`ORDER_ID` 				INT 			NOT NULL	AUTO_INCREMENT	,
	`SIZE` 					DECIMAL 		NOT NULL					,
	`WEIGHT` 				DECIMAL 		NOT NULL					,
	`INSURANCE` 			DECIMAL 		NOT NULL					,
	`ORDER_PICKED_UP_BY` 	INT 			NOT NULL					,
	`ORDER_DROPPED_OFF_BY` 	INT 			NOT NULL					,
	`DATE_OF_ORDER` 		DATE 			NOT NULL					,
	`DATE_OF_PICKUP` 		DATE										,
	`DATE_OF_DELIVERY` 		DATE										,
	`COST` 					DECIMAL 		NOT NULL					,
	`CUSTOMER_ID` 			INT 			NOT NULL					,
	`DESCRIPTION` 			VARCHAR(128)								,
	`STATUS_ID`				INT				NOT NULL					,
	`PICKUP_LOCATION` 		INT 			NOT NULL					,
	`DROP_OFF_LOCATION` 	INT 			NOT NULL					,
	
	PRIMARY KEY (`ORDER_ID`)
);

CREATE TABLE `Cost Weight` (
	`SIZE_SCALER`		DOUBLE	NOT NULL	,
	`WEIGHT_SCALER`		DOUBLE	NOT NULL	,
	`INSURANCE_SCALER`	DOUBLE	NOT NULL	,
	`DATE_ADDED`		DATE 	NOT NULL	,
	
	PRIMARY KEY (`DATE_ADDED`)
);

CREATE TABLE `Employees` (
	`EMPLOYEE_ID` 			INT 			NOT NULL	AUTO_INCREMENT	UNIQUE	,
	`EMPLOYEE_FIRST_NAME`	VARCHAR(16)		NOT NULL							,
	`EMPLOYEE_LAST_NAME`	VARCHAR(16)		NOT NULL						  	,
	`EMPLOYEE_USERNAME`		VARCHAR(16)		NOT NULL 					UNIQUE	,
	`EMPLOYEE_PASSWORD`		VARCHAR(16)		NOT NULL						  	,
	`EMPLOYEE_MOBILE`		VARCHAR(8)		NOT NULL 					UNIQUE	,
	`EMPLOYEE_HOMEPHONE`	VARCHAR(8)		NOT NULL 					UNIQUE	,
	
	PRIMARY KEY (`EMPLOYEE_USERNAME`,`EMPLOYEE_PASSWORD`)
);

CREATE TABLE `Status` (
	`STATUS_ID` 			INT 			NOT NULL	AUTO_INCREMENT	UNIQUE	,
	`STATUS_DESCRIPTION` 	VARCHAR(128) 	NOT NULL					UNIQUE	,
	
	PRIMARY KEY (`STATUS_ID`)
);

CREATE TABLE `Website Administrators` (
	`EMPLOYEE_ID` INT NOT NULL AUTO_INCREMENT UNIQUE	,
	
	PRIMARY KEY (`EMPLOYEE_ID`)
);

CREATE TABLE `Customers Pickup Addresses` (
	`ADDRESS_ID`	INT NOT NULL	,
	`CUSTOMER_ID`	INT NOT NULL	,
	
	PRIMARY KEY (`ADDRESS_ID`,`CUSTOMER_ID`)
);

CREATE TABLE `Customers Dropoff Addresses` (
	`ADDRESS_ID`	INT NOT NULL	,
	`CUSTOMER_ID`	INT NOT NULL	,
	
	PRIMARY KEY (`ADDRESS_ID`,`CUSTOMER_ID`)
);

CREATE TABLE `Addresses` (
	`ADDRESS_ID`			INT			NOT NULL	AUTO_INCREMENT	,
	`ADDRESS_FIRST_LINE` 	TEXT(64)	NOT NULL					,
	`ADDRESS_SECOND_LINE` 	TEXT(64)	NOT NULL					,
	`ADDRESS_POSTCODE` 		INT(4)		NOT NULL					,
	`ADDRESS_SUBURB` 		TEXT(64)	NOT NULL					,
	`ADDRESS_STATE` 		TEXT(64)	NOT NULL					,
	`ADDRESS_COUNTRY` 		TEXT(64)	NOT NULL					,
	
	PRIMARY KEY (`ADDRESS_ID`)
);

CREATE TABLE `Deliverable Postcodes` (
	`POSTCODE`	INT(4)	NOT NULL	,
	/*A UNIQUE REFERENCE ID*/
	/*A FK TO SUBURB*/
	PRIMARY KEY (`POSTCODE`)
);

/*CREATE TABLE `Deliverable Suburbs` (
	`SUBURB`	VARCHAR(24)	NOT NULL	,
	A UNIQUE REFERENCE ID*/
	/*A FK TO STATE
	PRIMARY KEY (`POSTCODE`)
);*/

/*CREATE TABLE `Deliverable States` (
	`STATE`	VARCHAR(3)	NOT NULL	,
	A UNIQUE REFERENCE ID*/
	/*A FK TO COUNTRY
	PRIMARY KEY (`STATE`)
);*/

/*CREATE TABLE `Deliverable Countries` (
	`COUNTRY`	VARCHAR(24)	NOT NULL	,
	
	PRIMARY KEY (`COUNTRY`)
);*/

CREATE TABLE `Recipents` (
	`RECIPENT_ID`			INT			NOT NULL 	AUTO_INCREMENT	UNIQUE	,
	`RECIPENT_FIRST_NAME`	VARCHAR(16) NOT NULL							,
	`RECIPENT_LAST_NAME`	VARCHAR(16) NOT NULL							,
	
	PRIMARY KEY (`RECIPENT_FIRST_NAME`,`RECIPENT_LAST_NAME`)
);

ALTER TABLE `Orders` ADD CONSTRAINT `Orders_fk_RECIPENT_ID` 			
	FOREIGN KEY (`RECIPENT_ID`) 
	REFERENCES `Recipents`(`RECIPENT_ID`);
ALTER TABLE `Orders` ADD CONSTRAINT `Orders_fk_ORDER_PICKED_UP_BY` 		
	FOREIGN KEY (`ORDER_PICKED_UP_BY`) 	
	REFERENCES `Employees`(`EMPLOYEE_ID`);
ALTER TABLE `Orders` ADD CONSTRAINT `Orders_fk_ORDER_DROPPED_OFF_BY` 	
	FOREIGN KEY (`ORDER_DROPPED_OFF_BY`)
	REFERENCES `Employees`(`EMPLOYEE_ID`);
ALTER TABLE `Orders` ADD CONSTRAINT `Orders_fk_CUSTOMER_ID` 			
	FOREIGN KEY (`CUSTOMER_ID`)
	REFERENCES `Customers`(`CUSTOMER_ID`);
ALTER TABLE `Orders` ADD CONSTRAINT `Orders_fk_STATUS_ID` 
	FOREIGN KEY (`STATUS_ID`)
	REFERENCES `Status`(`STATUS_ID`);
ALTER TABLE `Orders` ADD CONSTRAINT `Orders_fk_PICKUP_LOCATION`
	FOREIGN KEY (`PICKUP_LOCATION`) 
	REFERENCES `Addresses`(`ADDRESS_ID`);
ALTER TABLE `Orders` ADD CONSTRAINT `Orders_fk_DROP_OFF_LOCATION` 
	FOREIGN KEY (`DROP_OFF_LOCATION`) 
	REFERENCES `Addresses`(`ADDRESS_ID`);
ALTER TABLE `Website Administrators` ADD CONSTRAINT `Website_Administrators_fk_EMPLOYEE_ID` 
	FOREIGN KEY (`EMPLOYEE_ID`) 
	REFERENCES `Employees`(`EMPLOYEE_ID`);	
ALTER TABLE `Customers Pickup Addresses` ADD CONSTRAINT `Customers_Pickup_Addresses_fk_ADDRESS_ID` 
	FOREIGN KEY (`ADDRESS_ID`) 
	REFERENCES `Addresses`(`ADDRESS_ID`);
ALTER TABLE `Customers Pickup Addresses` ADD CONSTRAINT `Customers_Pickup_Addresses_fk_CUSTOMER_ID` 
	FOREIGN KEY (`CUSTOMER_ID`) 
	REFERENCES `Customers`(`CUSTOMER_ID`);
ALTER TABLE `Customers Dropoff Addresses` ADD CONSTRAINT `Customers_Dropoff_Addresses_fk_ADDRESS_ID` 
	FOREIGN KEY (`ADDRESS_ID`) 
	REFERENCES `Addresses`(`ADDRESS_ID`);
ALTER TABLE `Customers Dropoff Addresses` ADD CONSTRAINT `Customers_Dropoff_Addresses_fk_CUSTOMER_ID` 
	FOREIGN KEY (`CUSTOMER_ID`) 
	REFERENCES `Customers`(`CUSTOMER_ID`);
ALTER TABLE `Addresses` ADD CONSTRAINT `Addresses_fk_ADDRESS_POSTCODE` 
	FOREIGN KEY (`ADDRESS_POSTCODE`) 
	REFERENCES `Deliverable Postcodes`(`POSTCODE`);
