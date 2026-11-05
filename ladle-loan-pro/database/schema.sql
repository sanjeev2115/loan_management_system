-- Ladle Loan Pro academic prototype schema
-- Import into MySQL. Configure a dedicated database user in the hosting control panel.
CREATE DATABASE IF NOT EXISTS ladle_loan_pro CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE ladle_loan_pro;

CREATE TABLE IF NOT EXISTS users (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(190) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  role ENUM('applicant','admin') NOT NULL DEFAULT 'applicant',
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS loan_applications (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  reference_code VARCHAR(24) NOT NULL UNIQUE,
  user_id BIGINT UNSIGNED NOT NULL,
  loan_type ENUM('Personal Loan','Home Loan','Education Loan') NOT NULL,
  requested_amount DECIMAL(12,2) NOT NULL,
  status ENUM('Received','Under Review','Approved','Rejected') NOT NULL DEFAULT 'Received',
  admin_note VARCHAR(1000) NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_application_user FOREIGN KEY (user_id) REFERENCES users(id),
  INDEX idx_application_status(status),
  INDEX idx_application_user(user_id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS audit_logs (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  actor_user_id BIGINT UNSIGNED NULL,
  action VARCHAR(100) NOT NULL,
  entity_type VARCHAR(60) NOT NULL,
  entity_id BIGINT UNSIGNED NULL,
  details JSON NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_audit_actor FOREIGN KEY (actor_user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB;
