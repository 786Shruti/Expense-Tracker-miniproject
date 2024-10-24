-- Create database
CREATE DATABASE finance_tracker;

-- Use the created database
USE finance_tracker;

-- Create users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user'
);

-- Create expenses table
CREATE TABLE expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    description VARCHAR(255) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    expense_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Insert an admin user (password is 'admin', hashed using bcrypt)
INSERT INTO users (username, password, role) 
VALUES ('admin', '$2y$10$CwTycUXWue0Thq9StjUM0uJ8oBDuZABQfBgb/q0O.AeOg5FiDZC6e', 'admin');
