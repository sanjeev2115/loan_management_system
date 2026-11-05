# LOAN MANAGEMENT SYSTEM — LADLE LOAN
## Academic Project Report

**Submitted by:** Bheemisetty Venkata Naga Lakshmi Sanjeev  
**Enrollment Number:** 25CS003708  
**Branch:** CSE (AI&ML)  
**Semester:** III  
**University:** Sir Padampat Singhania University

### 1. Introduction
Ladle Loan is an academic Loan Management System web application. It demonstrates how applicants can create accounts, submit loan requests and track application status, while an administrator can review applications and update their status.

### 2. Objectives
- Provide a simple online interface for loan application demonstrations.
- Organize applicant and application information in a relational database.
- Provide reference numbers for tracking.
- Demonstrate role-based applicant and administrator workflows.
- Estimate monthly instalments using an EMI calculator.

### 3. Technology Stack
Frontend: HTML5, CSS3 and JavaScript. Backend: PHP 8+ using PDO. Database: MySQL/MariaDB. Development environment: XAMPP.

### 4. System Modules
**Public module:** Home page, loan categories and EMI calculator.  
**Applicant module:** Registration, login, application submission, dashboard and status tracking.  
**Administrator module:** One-time admin setup, secure login, application listing, review notes and status updates.  
**Database module:** Users, administrators and applications tables linked through primary and foreign keys.

### 5. Database Design
The users table stores applicant name, email, phone and password hash. The admins table stores administrator usernames and password hashes. The applications table stores a unique reference number, applicant relationship, loan type, requested amount, tenure, purpose, status and timestamps.

### 6. Workflow
An applicant registers and logs in, completes the loan form and receives a reference number. The application is stored in MySQL. The administrator logs in, reviews the record and changes its status. The applicant can view the status from the dashboard or use the tracking page.

### 7. Security Measures in This Demonstration
Passwords are stored using PHP password_hash and checked using password_verify. Database access uses PDO prepared statements. Forms use session-based CSRF tokens and output is HTML-escaped. A real public deployment needs additional security testing and operational controls.

### 8. Testing
Test registration with a new email, applicant login, valid and invalid loan amounts, application submission, reference tracking, administrator setup, admin login and status updates. Use fictional test data only.

### 9. Limitations and Future Scope
This academic build does not connect to banks, credit bureaus, payment gateways or identity verification services. Future improvements may include email notifications, document upload with secure scanning, audit logs, pagination, analytics, password reset and deployment on hardened PHP/MySQL hosting.

### 10. Conclusion
Ladle Loan demonstrates a complete educational workflow for a basic loan management portal, connecting a responsive interface, PHP application logic and a relational MySQL database.

**Project title:** Loan Management System  
**Website name:** Ladle Loan