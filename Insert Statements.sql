
INSERT INTO Vendors (`vendor_id`, `vendor_name`, `vendor_url`) VALUES (1, 'Wal-Mart', 'walmart.com');
INSERT INTO Vendors (`vendor_id`, `vendor_name`, `vendor_url`) VALUES (2, 'Target', 'target.com');
INSERT INTO Vendors (`vendor_id`, `vendor_name`, `vendor_url`) VALUES (3, 'Walgreens', 'walgreens.com');
INSERT INTO Vendors (`vendor_id`, `vendor_name`, `vendor_url`) VALUES (4, 'Best Buy', 'bestbuy.com');
INSERT INTO Vendors (`vendor_id`, `vendor_name`, `vendor_url`) VALUES (5, 'Khol\'s', 'khols.com');

INSERT INTO Discounts (`discount_id`, `percent_off`, `start_date`, `end_date`, `vendor_id`) VALUES (1, '0.95', '2017-12-01', '2018-01-01', 1);
INSERT INTO Discounts (`discount_id`, `percent_off`, `start_date`, `end_date`, `vendor_id`) VALUES (2, '0.80', '2017-12-01', '2018-01-01', 2);
INSERT INTO Discounts (`discount_id`, `percent_off`, `start_date`, `end_date`, `vendor_id`) VALUES (3, '0.50', '2017-12-01', '2018-01-01', 3);
INSERT INTO Discounts (`discount_id`, `percent_off`, `start_date`, `end_date`, `vendor_id`) VALUES (4, '0.85', '2017-12-01', '2018-01-01', 4);
INSERT INTO Discounts (`discount_id`, `percent_off`, `start_date`, `end_date`, `vendor_id`) VALUES (5, '0.90', '2017-12-01', '2018-01-01', 5);
