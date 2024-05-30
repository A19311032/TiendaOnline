--table users
INSERT INTO users (id, name, email, password, phone, brand, social, level, status)
VALUES
    (1, 'Emily Wilson', 'emily.wilson@example.com', 'password21', '1111111111', 'Brand21', 'social21', '1', 1),
    (2, 'Michael Brown', 'michael.brown@example.com', 'password22', '2222222222', 'Brand22', 'social22', '2', 1),
    (3, 'Olivia Davis', 'olivia.davis@example.com', 'password23', '3333333333', 'Brand23', 'social23', '3', 1),
    (4, 'William Taylor', 'william.taylor@example.com', 'password24', '4444444444', 'Brand24', 'social24', '4', 1),
    (5, 'Sophia Martinez', 'sophia.martinez@example.com', 'password25', '5555555555', 'Brand25', 'social25', '5', 1),
    (6, 'Jacob Anderson', 'jacob.anderson@example.com', 'password26', '6666666666', 'Brand26', 'social26', '6', 1),
    (7, 'Isabella Rodriguez', 'isabella.rodriguez@example.com', 'password27', '7777777777', 'Brand27', 'social27', '7', 1),
    (8, 'Ethan Wilson', 'ethan.wilson@example.com', 'password28', '8888888888', 'Brand28', 'social28', '8', 1),
    (9, 'Ava Davis', 'ava.davis@example.com', 'password29', '9999999999', 'Brand29', 'social29', '9', 1),
    (10, 'Mia Johnson', 'mia.johnson@example.com', 'password30', '1010101010', 'Brand30', 'social30', '1', 1),
    (11, 'Liam Thompson', 'liam.thompson@example.com', 'password31', '6623514999', 'Brand31', 'social31', '1', 1),
    (12, 'Emma Clark', 'emma.clark@example.com', 'password32', '6623514998', 'Brand32', 'social32', '2', 1),
    (13, 'Noah Lewis', 'noah.lewis@example.com', 'password33', '6623514997', 'Brand33', 'social33', '3', 1),
    (14, 'Ava Walker', 'ava.walker@example.com', 'password34', '6623514996', 'Brand34', 'social34', '4', 1),
    (15, 'Liam Allen', 'liam.allen@example.com', 'password35', '6623514995', 'Brand35', 'social35', '5', 1),
    (16, 'Olivia Scott', 'olivia.scott@example.com', 'password36', '6623514994', 'Brand36', 'social36', '6', 1),
    (17, 'Elijah Rodriguez', 'elijah.rodriguez@example.com', 'password37', '6623514993', 'Brand37', 'social37', '7', 1),
    (18, 'Charlotte Turner', 'charlotte.turner@example.com', 'password38', '6623514992', 'Brand38', 'social38', '8', 1),
    (19, 'Mason Hill', 'mason.hill@example.com', 'password39', '6623514988', 'Brand39', 'social39', '9', 1),
    (20, 'Sophia Adams', 'sophia.adams@example.com', 'password40', '6623514969', 'Brand40', 'social40', '1', 1);




--table products
INSERT INTO products (id, name, description, picture, stock, category_id, user_id, price, status)
VALUES
    (1, 'Product 1', 'Description 1', 'picture1.jpg', 10, 1, 1, 9.99, 1),
    (2, 'Product 2', 'Description 2', 'picture2.jpg', 5, 1, 1, 19.99, 1),
    (3, 'Product 3', 'Description 3', 'picture3.jpg', 2, 2, 2, 14.99, 0),
    (4, 'Product 4', 'Description 4', 'picture4.jpg', 15, 2, 3, 12.99, 1),
    (5, 'Product 5', 'Description 5', 'picture5.jpg', 20, 3, 2, 8.99, 1),
    (6, 'Product 6', 'Description 6', 'picture6.jpg', 7, 1, 3, 11.99, 0),
    (7, 'Product 7', 'Description 7', 'picture7.jpg', 3, 3, 1, 17.99, 1),
    (8, 'Product 8', 'Description 8', 'picture8.jpg', 12, 2, 2, 9.99, 1),
    (9, 'Product 9', 'Description 9', 'picture9.jpg', 6, 1, 3, 16.99, 0),
    (10, 'Product 10', 'Description 10', 'picture10.jpg', 4, 3, 1, 13.99, 1),
    (11, 'Product 11', 'Description 11', 'picture11.jpg', 8, 2, 2, 7.99, 1),
    (12, 'Product 12', 'Description 12', 'picture12.jpg', 11, 1, 3, 15.99, 0),
    (13, 'Product 13', 'Description 13', 'picture13.jpg', 9, 2, 1, 18.99, 1),
    (14, 'Product 14', 'Description 14', 'picture14.jpg', 3, 1, 2, 10.99, 1),
    (15, 'Product 15', 'Description 15', 'picture15.jpg', 6, 3, 3, 14.99, 0),
    (16, 'Product 16', 'Description 16', 'picture16.jpg', 13, 2, 1, 8.99, 1),
    (17, 'Product 17', 'Description 17', 'picture17.jpg', 7, 1, 2, 12.99, 1),
    (18, 'Product 18', 'Description 18', 'picture18.jpg', 5, 2, 3, 19.99, 0),
    (19, 'Product 19', 'Description 19', 'picture19.jpg', 10, 3, 1, 9.99, 1),
    (20, 'Product 20', 'Description 20', 'picture20.jpg', 8, 3, 3, 7.99, 1);

--table sales
INSERT INTO sales (id, customer_id)
VALUES
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 5),
    (6, 6),
    (7, 7),
    (8, 8),
    (9, 9),
    (10, 10),
    (11, 11),
    (12, 12),
    (13, 13),
    (14, 14),
    (15, 15),
    (16, 16),
    (17, 17),
    (18, 18),
    (19, 19),
    (20, 20);

--table sales_details
--TODO Corregir datos
INSERT INTO sales_details (id, sale_id, product_id)
VALUES
    (1, 1001, 5001),
    (2, 1002, 5002),
    (3, 1003, 5003),
    (4, 1004, 5004),
    (5, 1005, 5005),
    (6, 1006, 5006),
    (7, 1007, 5007),
    (8, 1008, 5008),
    (9, 1009, 5009),
    (10, 1010, 5010),
    (11, 1011, 5011),
    (12, 1012, 5012),
    (13, 1013, 5013),
    (14, 1014, 5014),
    (15, 1015, 5015),
    (16, 1016, 5016),
    (17, 1017, 5017),
    (18, 1018, 5018),
    (19, 1019, 5019),
    (20, 1020, 5020);

--table layaways
INSERT INTO layaways (id, product_id, customer_id, downpayment)
VALUES
    (1, 5001, 1001, 50.00),
    (2, 5002, 1002, 75.00),
    (3, 5003, 1003, 100.00),
    (4, 5004, 1004, 150.00),
    (5, 5005, 1005, 200.00),
    (6, 5006, 1006, 50.00),
    (7, 5007, 1007, 75.00),
    (8, 5008, 1008, 100.00),
    (9, 5009, 1009, 150.00),
    (10, 5010, 1010, 200.00),
    (11, 5011, 1011, 50.00),
    (12, 5012, 1012, 75.00),
    (13, 5013, 1013, 100.00),
    (14, 5014, 1014, 150.00),
    (15, 5015, 1015, 200.00),
    (16, 5016, 1016, 50.00),
    (17, 5017, 1017, 75.00),
    (18, 5018, 1018, 100.00),
    (19, 5019, 1019, 150.00),
    (20, 5020, 1020, 200.00);

