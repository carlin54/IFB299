$query = "
	SELECT * FROM orders

	INNER JOIN customers
	ON orders.CUSTOMER_ID=customers.CUSTOMER_ID
	
	INNER JOIN recipents
	ON orders.RECIPENT_ID=recipents.RECIPENT_ID

	INNER JOIN status
	ON orders.STATUS_ID=status.STATUS_ID

	INNER JOIN addresses
	ON orders.DROP_OFF_LOCATION=addresses.ADDRESS_ID
	
	WHERE orders.ORDER_ID = " . $_GET["package_id"] . ";";