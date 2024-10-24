# Expense Tracker

Expense Tracker is a PHP and MySQL web application that allows users to track their expenses with a user-friendly interface.

## Features
- User registration and login
- Add, view, and delete expenses
- Admin dashboard to manage users
- Expense summary for users
- Secure authentication and password hashing

## Technologies Used

- **Backend**: PHP (Procedural)
- **Frontend**: HTML, CSS, JavaScript
- **Database**: MySQL
- **Server**: Apache (XAMPP or similar)

## Prerequisites

- [XAMPP](https://www.apachefriends.org/index.html) (or any other local PHP server)
- MySQL
- PHP version 7.x or higher

## Installation of project
- Download zip file of project.
- Create new folder in htdocs of xampp.
- Unzip the file in newly created folder.
- Configure the Database
- Access the project's first webpage through localhost.
- Please note that register.php in the first web page of this project.
  
##Configure the Database
- Download the `expense_tracker.sql` file from this repository.
- Import the file into your MySQL database:
  - Using phpMyAdmin:
    - Open phpMyAdmin, create a new database named `expense_tracker`, and import the `finance_tracker.sql` file.
  - Using MySQL CLI:
    ```bash
    mysql -u root -p expense_tracker < path/to/finance_tracker.sql
    ```
- Update the database credentials in `includes/config.php` with your own MySQL credentials.
