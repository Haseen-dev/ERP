# Full Stack ERP System - PHP & MySQL

## Table of Contents
- [Project Description](#project-description)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation Guide](#installation-guide)
- [Usage](#usage)
- [Database Schema](#database-schema)
- [Report Generation](#report-generation)
- [Contributing](#contributing)
- [License](#license)

---

## Project Description
This is a simple ERP (Enterprise Resource Planning) system built using **PHP** for the backend and **MySQL** as the database. The system allows the user to perform CRUD operations (Create, Read, Update, Delete) on customer and item data and generates reports based on invoice data. It also includes a responsive frontend built with **HTML**, **CSS**, and **Bootstrap**.

## Features
- **Customer Registration:** Add new customers with details like title, name, contact number, and district.
- **Item Management:** Manage item details including category, price, and stock.
- **CRUD Operations:** Perform create, update, delete, and search functionalities on the customer and item databases.
- **Reports:**
  - Invoice report with details such as invoice number, date, customer info, and total invoice amount.
  - Invoice item report with item-specific details including item category, name, and unit price.
  - Item report with non-repetitive item names, their categories, and stock levels.
- **Responsive Design:** Fully responsive UI for desktop and mobile using Bootstrap.

## Technologies Used
- **Backend:** PHP
- **Database:** MySQL
- **Frontend:** HTML, CSS, JavaScript, Bootstrap
- **CSS Framework:** Bootsrap
- **Version Control:** Git/GitHub

## Installation Guide
1. Clone the repository to your local machine:
   ```bash
   git clone https://github.com/Haseen-dev/ERP.git
   ```
2. Navigate to the project folder:
   ```bash
   cd erp-system
   ```
3. Set up your database:
   - Import the provided SQL file (`database.sql`) into MySQL to create the required tables.
4. Update the database connection in `database.php` file:
   ```php
   $host = 'your_host';
   $dbname = 'your_database_name';
   $username = 'your_username';
   $password = 'your_password';
   $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
   ```
5. Start a local PHP server:
   ```bash
   php -S localhost:8000
   ```
6. Open your browser and go to `http://localhost:8000` to access the application.

## Usage
- **Customer Registration:** Navigate to the Customer Registration page and fill out the form to register new customers.
- **Item Management:** Use the Item Management page to add, update, or delete items in your inventory.
- **Generating Reports:**
  - Access invoice and item reports by selecting the required date range and other parameters.
  
## Database Schema
- **Customer Table:** `customer`  
  - `id`, `title`, `first_name`, `last_name`, `contact_no`, `district`
  
- **Item Table:** `item`  
  - `id`, `item_name`, `item_code`, `category`, `unit_price`, `quantity`
  
- **Invoice Table:** `invoice`  
  - `invoice_id`, `customer_id`, `invoice_date`, `total_amount`
  
- **Invoice Item Table:** `invoice_items`  
  - `invoice_id`, `item_id`, `quantity_sold`, `unit_price`

## Report Generation
The system generates the following reports:
- **Invoice Report:** Search by date range to view invoices, including customer details and total invoice amounts.
- **Invoice Item Report:** Search by date range to view details of each item sold, including item code, name, and price.
- **Item Report:** Displays items in the inventory along with their categories and available quantities.

## Contributing
1. Fork the repository
2. Create your feature branch (`git checkout -b feature/your-feature`)
3. Commit your changes (`git commit -m 'Add your feature'`)
4. Push to the branch (`git push origin feature/your-feature`)
5. Create a new Pull Request

## License
