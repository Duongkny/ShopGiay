-- CREATE DATABASE shop_giay;
USE shop_giay;

-- -- ================= USERS =================
-- CREATE TABLE Users (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     email VARCHAR(255) NOT NULL UNIQUE,
--     password VARCHAR(255) NOT NULL
-- );

-- -- ================= PRODUCTS =================
-- CREATE TABLE Products (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(255) NOT NULL,
--     price DECIMAL(10,2) NOT NULL,
--     size INT,
--     image VARCHAR(500)
-- );

-- -- ================= CART =================
-- CREATE TABLE Cart (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     user_id INT,
--     product_id INT,
--     quantity INT DEFAULT 1,

--     FOREIGN KEY (user_id) REFERENCES Users(id) ON DELETE CASCADE,
--     FOREIGN KEY (product_id) REFERENCES Products(id) ON DELETE CASCADE
-- );

-- -- ================= ORDERS =================
-- CREATE TABLE Orders (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     user_id INT,
--     address VARCHAR(255),
--     phone VARCHAR(20),
--     total_price DECIMAL(10,2),

--     FOREIGN KEY (user_id) REFERENCES Users(id) ON DELETE CASCADE
-- );

-- insert into Products values
-- (1, 'Giay Nike',30000,'39','GiayNike.jpg');

-- insert into Products values
-- (2, 'Giay Adidas',30000,'39','GiayAdidas.jpg');

insert into Users values
(2,'kaduong230@gmail.com','123');


ALTER TABLE products
MODIFY image VARCHAR(100);