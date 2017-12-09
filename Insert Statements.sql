
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

# Wal-Mart
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (1, 'VIZIO 55" Class 4K (2160P) Smart Full Array LED Home Theater Display', 528.0, 1, 1);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (2, 'Shrek 4 Movie Collection', 19.96, 1, 1);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (3, 'Mainstays 4-Drawer Easy Glide Dresser, Multiple Finishes', 65.0, 1, NULL);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (4, 'Genuine Dickies Relaxed Fit Straight Leg Flat Front Flex Pant', 21.86, 1, NULL);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (5, 'Britax B-Safe 35 Infant Car Seat', 168.0, 1, NULL);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (6, 'Call of Duty WWII - PS4', 61.93, 1, 1);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (7, 'Purina ONE SmartBlend Lamb & Rice Formula Adult Premium Dog Food 40 lb. Bag', 38.76, 1, NULL);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (8, 'Oral-B Vitality Floss Action Rechargeable Electric Toothbrush 1 Count', 28.97, 1, 1);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (9, 'Ozark Trail Weatherbuster 9-Person Dome Tent', 129.0, 1, NULL);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (10, 'Chromacryl 16-Ounce Acrylic Paint, Cobalt', 8.66, 1, NULL);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (36, 'Philips Norelco Series 2000 Shaver 2100, S1560/81', 39.95, 1, 1);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (37, 'Timberland PRO Direct Attach Men\'s Waterproof 6-in. Work Boots', 129.95, 1, 1);

# Target
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (11, 'Men\'s Elf Boot Slippers', 10.0, 2, 2);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (12, 'VIZIO 55" Class 4K (2160P) Smart Full Array LED Home Theater Display', 569.99, 2, NULL);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (13, 'Ozark Trail Weatherbuster 9-Person Dome Tent', 159.99, 2, NULL);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (14, 'Purina ONE SmartBlend Lamb & Rice Formula Adult Premium Dog Food 40 lb. Bag', 38.99, 2, 2);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (15, 'Britax B-Safe 35 Infant Car Seat', 168.99, 2, 2);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (16, 'Chromacryl 16-Ounce Acrylic Paint, Cobalt', 8.99, 2, NULL);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (17, 'Mainstays 4-Drawer Easy Glide Dresser, Multiple Finishes', 139.99, 2, 2);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (18, 'Shrek 4 Movie Collection', 19.99, 2, 2);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (19, 'Oral-B Vitality Floss Action Rechargeable Electric Toothbrush 1 Count', 24.99, 2, NULL);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (20, 'Call of Duty WWII - PS4', 59.99, 2, 2);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (38, 'Women\'s Apt. 9 Wool Blend Double-Breasted Coat', 54.99, 2, NULL);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (39, 'SONOMA Sonya Women\'s Ankle Boots', 49.99, 2, NULL);

# Walgreens
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (21, 'Britax B-Safe 35 Infant Car Seat', 169.99, 3, NULL);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (22, 'Oral-B Vitality Floss Action Rechargeable Electric Toothbrush 1 Count', 39.99, 3, 3);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (23, 'Philips Norelco Series 2000 Shaver 2100, S1560/81', 59.99, 3, 3);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (24, 'Genuine Dickies Relaxed Fit Straight Leg Flat Front Flex Pant', 19.99, 3, NULL);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (25, 'Men\'s Elf Boot Slippers', 10.0, 3, NULL);

# Best Buy
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (26, 'Call of Duty WWII - PS4', 59.99, 4, NULL);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (27, 'Philips Norelco Series 2000 Shaver 2100, S1560/81', 49.99, 4, 4);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (28, 'Oral-B Vitality Floss Action Rechargeable Electric Toothbrush 1 Count', 29.99, 4, 4);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (29, 'Shrek 4 Movie Collection', 44.99, 4, 4);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (30, 'VIZIO 55" Class 4K (2160P) Smart Full Array LED Home Theater Display', 699.99, 4, NULL);

# Kohl's
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (31, 'Genuine Dickies Relaxed Fit Straight Leg Flat Front Flex Pant', 34.99, 5, 5);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (32, 'Men\'s Elf Boot Slippers', 12.99, 5, 5);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (33, 'Timberland PRO Direct Attach Men\'s Waterproof 6-in. Work Boots', 145.0, 5, NULL);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (34, 'Women\'s Apt. 9 Wool Blend Double-Breasted Coat', 71.99, 5, 5);
INSERT INTO Product (`product_id`, `product_name`, `product_price`, `vendor_id`, `discount_id`) VALUES (35, 'SONOMA Sonya Women\'s Ankle Boots', 79.99, 5, 5);
