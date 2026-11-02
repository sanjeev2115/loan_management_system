CREATE DATABASE IF NOT EXISTS ladle_loan_db;
USE ladle_loan_db;

CREATE TABLE IF NOT EXISTS applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ref_number VARCHAR(20) UNIQUE NOT NULL,
    applicant_name VARCHAR(100) NOT NULL,
    applicant_email VARCHAR(100) NOT NULL,
    loan_type VARCHAR(50) NOT NULL,
    loan_amount DECIMAL(10, 2) NOT NULL,
    status VARCHAR(30) DEFAULT 'Under Review',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);