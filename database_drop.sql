ALTER TABLE `Orders` 
	DROP FOREIGN KEY `Orders_fk_RECIPENT_ID`;
ALTER TABLE `Orders` 
	DROP FOREIGN KEY `Orders_fk_ORDER_PICKED_UP_BY`;
ALTER TABLE `Orders` 
	DROP FOREIGN KEY `Orders_fk_ORDER_DROPPED_OFF_BY`;
ALTER TABLE `Orders` 
	DROP FOREIGN KEY `Orders_fk_CUSTOMER_ID`;
ALTER TABLE `Orders` 
	DROP FOREIGN KEY `Orders_fk_STATUS_DESCRIPTION`;
ALTER TABLE `Orders` 
	DROP FOREIGN KEY `Orders_fk_PICKUP_LOCATION`;
ALTER TABLE `Orders` 
	DROP FOREIGN KEY `Orders_fk_DROP_OFF_LOCATION`;
ALTER TABLE `Website Administrators` 
	DROP FOREIGN KEY `Website Website_Administrators_fk_EMPLOYEE_ID`;
ALTER TABLE `Customers Pickup Addresses` 
	DROP FOREIGN KEY `Customers_Pickup_Addresses_ADDRESS_ID`;
ALTER TABLE `Customers Pickup Addresses` 
	DROP FOREIGN KEY `Customers_Pickup_Addresses_fk_CUSTOMER_ID`;
ALTER TABLE `Addresses` 
	DROP FOREIGN KEY `Addresses_fk_ADDRESS_POSTCODE`;
	
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
