# Loan Management System — Ladle Loan
**Project/folder name:** Loan Management System  
**Website/brand name:** Ladle Loan

## Student details
- Student: Bheemisetty Venkata Naga Lakshmi Sanjeev
- Enrollment number: 25CS003708
- Branch: CSE (AI&ML)
- Semester: III
- University: Sir Padampat Singhania University

## Technology
Frontend: HTML5, CSS3, JavaScript. Backend: PHP 8+ (PDO). Database: MySQL 8+/MariaDB. Local server: XAMPP.

## Features
Applicant registration/login, loan application submission, reference-based tracking, applicant dashboard, EMI calculator, admin setup/login, admin application review and status updates.

## Run with XAMPP
1. Copy the entire `loan-management-system` folder into `C:\xampp\htdocs\` (Windows) or the XAMPP htdocs folder.
2. Start Apache and MySQL from XAMPP.
3. Open phpMyAdmin and import `database/schema.sql`.
4. Check database settings in `includes/config.php` (default XAMPP local values: root with blank password).
5. Open `http://localhost/loan-management-system/`.
6. Create an applicant account and submit a test application.
7. Open `http://localhost/loan-management-system/admin/setup.php` once to create your own admin username and strong password. Then log in at `/admin/login.php`.
8. After creating the admin, delete or rename `admin/setup.php` on your server.

## Important
This is an academic demonstration, not a bank, lender, credit approval service or loan offer. Use fictional test data only. Do not collect real Aadhaar, PAN, bank credentials or documents. Before public production use, arrange HTTPS, secure hosting, privacy/legal review, backups, rate limiting, email verification, stronger role/session controls and security testing. Never commit real secrets or production credentials.

GitHub Pages serves static files only and cannot execute PHP or MySQL. Run locally with XAMPP or deploy to a PHP/MySQL-capable host.