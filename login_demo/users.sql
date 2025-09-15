-- สร้างฐานข้อมูล
CREATE DATABASE IF NOT EXISTS login_demo CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- เลือกใช้ฐานข้อมูล
USE login_demo;

-- สร้างตาราง users
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- เพิ่มผู้ใช้เริ่มต้น (admin / 1234)
INSERT INTO users (username, password)
VALUES ('admin', '$2y$10$K3B4iHpsZyT4Jr6eq5IDne6L4qY7k3gXb9jcFjUN.3cl9Sbz5kLPa');
