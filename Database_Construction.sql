CREATE TABLE IF NOT EXISTS `Customer` (
    `customer_id` INT(10) NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(255),
    `last_name` VARCHAR(255),
    `customer_username` VARCHAR(255) UNIQUE,
    `customer_password` VARCHAR(255),
    `customer_address` VARCHAR(255),
    PRIMARY KEY (`customer_id`)
);

CREATE TABLE IF NOT EXISTS `Vendors` (
    `vendor_id` INT(10) NOT NULL AUTO_INCREMENT,
    `vendor_name` VARCHAR(255),
    `vendor_url` VARCHAR(255),
    PRIMARY KEY (`vendor_id`)
);

CREATE TABLE IF NOT EXISTS `Discounts` (
    `discount_id` INT(10) NOT NULL AUTO_INCREMENT,
    `percent_off` NUMERIC(9 , 2 ),
    `start_date` DATE,
    `end_date` DATE,
    `vendor_id` INT(10),
    PRIMARY KEY (`discount_id`),
    FOREIGN KEY (vendor_id)
        REFERENCES Vendors (vendor_id)
);

CREATE TABLE IF NOT EXISTS `Product` (
    `product_id` INT(10) NOT NULL AUTO_INCREMENT,
    `product_name` VARCHAR(255),
    `product_price` VARCHAR(255),
    `vendor_id` INT(10),
    `discount_id` INT(10),
    `order_id` INT(10),
    PRIMARY KEY (`product_id`),
    FOREIGN KEY (order_id)
        REFERENCES Orders (order_id),
    FOREIGN KEY (vendor_id)
        REFERENCES Vendors (vendor_id),
    FOREIGN KEY (discount_id)
        REFERENCES Discounts (discount_id)
);

CREATE TABLE IF NOT EXISTS `Orders` (
    `order_id` INT(10) NOT NULL AUTO_INCREMENT,
    `order_date` DATE,
    `order_time` TIME,
    `customer_id` INT(10),
    PRIMARY KEY (`order_id`),
    FOREIGN KEY (customer_id)
        REFERENCES Customer (customer_id),
);

CREATE TABLE IF NOT EXISTS `Payment` (
    `account_id` INT(10) NOT NULL AUTO_INCREMENT,
    `account_name` VARCHAR(255),
    `customer_id` INT(10),
    PRIMARY KEY (`account_id`),
    FOREIGN KEY (customer_id)
        REFERENCES Customer (customer_id)
);

CREATE TABLE IF NOT EXISTS `Bank` (
    `bank_id` INT(10) NOT NULL AUTO_INCREMENT,
    `account_num` INT(10) UNIQUE,
    `routing_num` INT(10),
    `account_id` INT(10),
    PRIMARY KEY (`bank_id`),
    FOREIGN KEY (account_id)
        REFERENCES Payment (account_id)
);

CREATE TABLE IF NOT EXISTS `Card` (
    `card_id` INT(10) NOT NULL AUTO_INCREMENT,
    `card_num` INT(10) UNIQUE,
    `expiration_date` INT(4),
    `cvv` INT(3),
    `account_id` INT(10),
    PRIMARY KEY (`card_id`),
    FOREIGN KEY (account_id)
        REFERENCES Payment (account_id)
);

ALTER TABLE Payment
ADD `bank_id` INT(10);

ALTER TABLE Payment
add `card_id` INT(10);

ALTER TABLE Payment
ADD CONSTRAINT foreign key (`bank_id`)
references Bank(`bank_id`);

ALTER TABLE Payment
ADD CONSTRAINT foreign key (`card_id`)
references Card(`card_id`);
