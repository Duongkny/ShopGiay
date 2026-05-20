-- USERS
create database ShopGiayTest;
use ShopGiayTest;

CREATE TABLE users (
    email VARCHAR(255) PRIMARY KEY,
    password VARCHAR(255) NOT NULL,
    address VARCHAR(255),
    phone VARCHAR(20),
    Hoten VARCHAR(100)
);

-- PRODUCTS
CREATE TABLE products (
    MaSP INT AUTO_INCREMENT PRIMARY KEY,
    TenSP VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    mota VARCHAR(255),
    soluong INT DEFAULT 0,
    image VARCHAR(255),
    loai VARCHAR(50),
    status INT DEFAULT 1
);

-- CART
CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255),
    MaSP INT,
    soluong INT,
    ThanhTien FLOAT,
    size INT,

    FOREIGN KEY (email) REFERENCES users(email)
    ON DELETE CASCADE,

    FOREIGN KEY (MaSP) REFERENCES products(MaSP)
    ON DELETE CASCADE
);

-- ORDERS
CREATE TABLE orders (
    id VARCHAR(50) PRIMARY KEY,
    email VARCHAR(255),
    address VARCHAR(255),
    phone VARCHAR(20),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(50),

    FOREIGN KEY (email) REFERENCES users(email)
    ON DELETE CASCADE
);

-- ORDER DETAILS
CREATE TABLE order_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id VARCHAR(50),
    MaSP INT,
    soluong INT,
    price FLOAT,
    size INT,

    FOREIGN KEY (order_id) REFERENCES orders(id)
    ON DELETE CASCADE,

    FOREIGN KEY (MaSP) REFERENCES products(MaSP)
    ON DELETE CASCADE
);

-- SAMPLE PRODUCTS
INSERT INTO products(TenSP, price, mota, soluong, image, loai, status)
VALUES
('Adidas Ultra Boost', 2500000, 'Giày thể thao Adidas', 10, 'GiayAdidas.jpg', 'thethao', 1),

('Nike Air Force 1', 3200000, 'Giày Nike thời trang', 15, 'GiayNike.jpg', 'thoitrang', 1),

('Puma RS-X', 2100000, 'Giày Puma phong cách', 8, 'GiayPuma.jpg', 'thethao', 1);