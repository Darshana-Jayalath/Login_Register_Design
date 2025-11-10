Login_Register_Design

This is a simple Login and Registration System built with PHP, MySQL, HTML, and CSS. It includes a modern UI design with a login page, registration page, and a dashboard with a surprise box animation. 

Features
- User Registration with email validation
- Password hashing for security
- Login authentication
- Session-based dashboard
- Logout functionality
- Responsive design
- Interactive surprise box on the dashboard

Technologies Used
- Frontend: HTML, CSS, Boxicons
- Backend: PHP
- Database: MySQL

Database Setup
1. Create a MySQL database (e.g., `login_db`).
2. Create a `users` table using the following SQL:

```sql
CREATE TABLE users (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
