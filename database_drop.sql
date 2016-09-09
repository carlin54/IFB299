ALTER TABLE `Orders` DROP FOREIGN KEY `Orders_fk0`;

ALTER TABLE `Orders` DROP FOREIGN KEY `Orders_fk1`;

ALTER TABLE `Orders` DROP FOREIGN KEY `Orders_fk2`;

ALTER TABLE `Orders` DROP FOREIGN KEY `Orders_fk3`;

ALTER TABLE `Orders` DROP FOREIGN KEY `Orders_fk4`;

ALTER TABLE `Orders` DROP FOREIGN KEY `Orders_fk5`;

ALTER TABLE `Orders` DROP FOREIGN KEY `Orders_fk6`;

ALTER TABLE `Website Administrators` DROP FOREIGN KEY `Website Administrators_fk0`;

ALTER TABLE `Customers Pickup Addresses` DROP FOREIGN KEY `Customers Pickup Addresses_fk0`;

ALTER TABLE `Customers Pickup Addresses` DROP FOREIGN KEY `Customers Pickup Addresses_fk1`;

ALTER TABLE `Addresses` DROP FOREIGN KEY `Addresses_fk0`;

DROP TABLE IF EXISTS `Customers`;

DROP TABLE IF EXISTS `Orders`;

DROP TABLE IF EXISTS `Cost Weight`;

DROP TABLE IF EXISTS `Employee`;

DROP TABLE IF EXISTS `Status`;

DROP TABLE IF EXISTS `Website Administrators`;

DROP TABLE IF EXISTS `Customers Pickup Addresses`;

DROP TABLE IF EXISTS `Addresses`;

DROP TABLE IF EXISTS `Deliverable Postcodes`;

DROP TABLE IF EXISTS `Recipent`;
