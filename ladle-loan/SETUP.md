# Ladle Loan — installation guide
Student: Bheemisetty Venkata Naga Lakshmi Sanjeev | Enrollment: 25CS003708 | Branch: CSE (AI&ML) | Semester: III | University: Sir Padampat Singhania University
## Local XAMPP setup
1. Install XAMPP on a computer (Android alone cannot run the usual XAMPP desktop stack).
2. Copy the complete `ladle-loan` folder into `xampp/htdocs/`.
3. Start Apache and MySQL in XAMPP.
4. Open phpMyAdmin at `http://localhost/phpmyadmin`.
5. Import `database/schema.sql`.
6. Open `http://localhost/ladle-loan/`.
7. Register an account. To create the first admin, run this SQL in phpMyAdmin after registering: `UPDATE users SET role='admin' WHERE email='your-admin-email@example.com';` Replace the email with the account you registered. Log out and sign in again; the admin dashboard opens.
## Pages
- `index.html`: public website and EMI calculator
- `register.html`, `login.html`: account creation and login
- `applicant.html`: applicant applications and status
- `admin.html`: admin review and status update
- `api/index.php`: PHP API
- `database/schema.sql`: MySQL schema
## Hosting
GitHub Pages serves static HTML/CSS/JS only; it cannot execute PHP or MySQL. To use accounts and admin functions online, deploy the PHP folder and database to a PHP/MySQL host, set DB_HOST, DB_NAME, DB_USER and DB_PASS environment variables, enable HTTPS, and configure secure session cookies. Never upload database passwords or real applicant documents to GitHub.
## Security and scope
This is an academic prototype, not a real bank or lending service. Use fictional test data only. Before real-world use, add email verification, password reset, login rate limiting, audit logs, stricter CSRF protections on logout and all mutations, admin provisioning controls, privacy/consent flows, document security, backups, monitoring and a professional security review.