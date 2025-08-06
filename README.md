# Web-Form-with-Database
This project is a simple web application that allows users to submit their name and age using a form, then displays the data in a table with a toggle button to update the status.

## Technologies Used:
- HTML
- CSS
- PHP
- MySQL (using XAMPP)
- phpMyAdmin

##  Features:
- Form with input fields: name and age.
- Data is inserted into a MySQL database.
- All users are displayed in a dynamic table.
- A toggle button to change the user's `status` between `0` and `1`.
- Page auto-updates the status without full reload.


 How to Run:

1. Make sure XAMPP is installed and running (Apache + MySQL).
2. Place the project folder inside `C:\xampp\htdocs\`.
3. Open phpMyAdmin and create a database called: `smart_methods`.
4. Run the following SQL to create the table:

```sql
CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  age INT NOT NULL,
  status TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
);


