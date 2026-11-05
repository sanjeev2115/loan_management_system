# Ladle Loan — Pro

A responsive academic loan-planning and application-interface project.

## Current version
This folder is a separate new version. The existing files at the repository root have not been changed or deleted.

### Features
- Responsive blue-and-white banking-style landing page
- Personal, home and education loan information cards
- Interactive EMI calculator
- Demo application form with generated reference number
- Demo status lookup using browser localStorage
- Mobile navigation

## Preview
Open `index.html` in a browser, or publish this folder as a static site using a GitHub Pages workflow.

## Important limitations
This version is a frontend demonstration. Demo applications are stored only in the visitor's browser using localStorage. They are not sent to a server, shared with an administrator, or stored in MySQL. It is not a real lender, bank, credit service or loan offer. Do not enter real identity, banking or financial information.

## Production backend still required
To turn this into a multi-user applicant/admin application, connect a PHP backend and MySQL database on a PHP-capable host. GitHub Pages cannot execute PHP or host MySQL. Before real deployment, add server-side validation, password hashing, CSRF protection, authorization checks, secure document storage, rate limiting, HTTPS, privacy notices and audit logs. Never commit database passwords, API keys, or real applicant documents.

## Local development
- Static preview: open `index.html` in a browser.
- PHP/MySQL integration: use a PHP server and import a separately maintained SQL schema.
- The root-level original project remains preserved.
