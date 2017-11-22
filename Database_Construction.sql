create table customers (
	customer_id number(10,0),
    customer_first_name varchar2(30 byte),
    customer_last_name varchar2(30 byte),
    customer_username varchar2(25 byte) not null,
	customer_password varchar2(100 byte) not null,
	customer_street_address varchar2(200 byte),
	customer_city varchar2(50 byte),
	customer_state char(2),
	customer_zip char(5),
	primary key(customer_id)
);

create table vendors (
	vendor_id number(10,0),
	vendor_name varchar2(50 byte) not null,
	vendor_url varchar2(100 byte),
	primary key(vendor_id)
);

create table discounts (
	discount_id number(10,0),
	discount_percent_off number(3,2) not null,
	discount_start_date date not null,
	discount_end_date date not null,
	discount_vendor number(10,0) not null,
	primary key(discount_id),
	foreign key(discount_vendor) references vendors
);

create table products (
    product_id number(10,0),
    product_name varchar2(100 byte) not null,
    product_price number(9,2) not null,
    product_brand varchar2(50 byte),
	product_vendor number(10,0) not null,
	product_discount number(10,0),
    primary key(product_number),
    foreign key(product_vendor) references vendors,
	foreign key(product_discount) references discounts
);

create table orders (
	order_id number(10,0),
	order_date_time date,
	order_price number(9,2),
	order_completed boolean not null,
	order_customer number(10,0) not null,
	primary key(order_id),
	foreign key(order_customer) references customers
);

create table payment_accounts (
	payment_account_id number(10,0),
	payment_account_name varchar2(50),
	payment_account_customer number(10,0),
	primary key(payment_account_id),
	foreign key(payment_account_customer) references customers
);

create table bank_accounts (
	bank_account_id number(10,0),
	bank_account_number varchar2(20 byte) not null,
	bank_account_routing_number char(9) not null,
	primary key(bank_account_id),
	foreign key(bank_account_id) references payment_accounts
);

create table credit_cards (
	credit_card_id number(10,0),
	credit_card_number char(16) not null,
	credit_card_expiration_date date not null,
	credit_card_ccv varchar2(4 byte) not null,
	primary key(credit_card_id),
	foreign key(credit_card_id) references payment_accounts
)