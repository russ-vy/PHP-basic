DROP DATABASE test;
CREATE DATABASE IF NOT EXISTS test;

USE test;

CREATE TABLE IF NOT EXISTS products (
	id				serial PRIMARY KEY
	,product_name	text
	,price			float
);

CREATE TABLE IF NOT EXISTS images (
	id			serial PRIMARY KEY
	,full_name	text
	,views		int
	,id_product	int
);

CREATE TABLE IF NOT EXISTS cart (
	id			serial PRIMARY KEY
	,id_user	text
	,id_product	int
	,quantity	int
	,add_time	timestamp DEFAULT current_timestamp()
);

CREATE TABLE IF NOT EXISTS `role` (
	id		serial PRIMARY KEY
	,naming	varchar(50)
);

INSERT INTO `role` (id, naming)
VALUES
	(1, 'admin')
	,(2, 'customer');

CREATE TABLE IF NOT EXISTS user (
	id			serial PRIMARY KEY
	,login		varchar(50)
	,passwd		varchar(100)
	,id_role	int
);

CREATE TABLE IF NOT EXISTS status (
	id		serial PRIMARY KEY
	,title	varchar(50)
);

INSERT INTO status (title)
VALUES
	('ordered')
	,('processed')
	,('sent')
	,('canceled');

CREATE TABLE IF NOT EXISTS ordered (
	id			serial PRIMARY KEY
	,fio		varchar(50)
	,phone		varchar(50)
	,address	varchar(50)
	,id_user	int
	,add_time	timestamp DEFAULT current_timestamp()
	,num_order	varchar(50)
	,id_status	int DEFAULT 1
);

CREATE TABLE IF NOT EXISTS	order_item (
	id			serial PRIMARY KEY
	,id_ordered	int
	,id_product	int
	,price		float
	,quantity	int
);