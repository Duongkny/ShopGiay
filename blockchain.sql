CREATE DATABASE blockchain_web;
USE blockchain_web;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    balance FLOAT DEFAULT 100
);

CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sender VARCHAR(100),
    receiver VARCHAR(100),
    amount FLOAT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE blocks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    previous_hash TEXT,
    current_hash TEXT,
    nonce INT,
    data TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);