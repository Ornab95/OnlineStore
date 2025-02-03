# Inventory Management System

This is a web-based **Inventory Management System** designed to handle product purchases, sales, and generate detailed reports for both activities. The project uses **PHP**, **MySQL**, **Tailwind CSS**, and **JavaScript** for a responsive and user-friendly interface.

## 🚀 Features

- **Product Management:** Add, update, and manage product details.
- **Sales Module:** Record sales transactions with real-time stock updates.
- **Purchase Module:** Log product purchases with date-time tracking.
- **Sales & Purchase Reports:** Generate reports based on custom date and time ranges.
- **Validation:** Ensures no reports are generated without selecting valid date-time ranges.
- **Responsive Design:** Tailwind CSS for a mobile-friendly layout.

## 🗂️ Project Structure

```
├── index.php              # Main Dashboard
├── sales.php              # Sales Module
├── purchase.php           # Purchase Module
├── sales_report.php       # Sales Report
├── purchase_report.php    # Purchase Report
├── connection.php         # Database Connection
├── header.php             # Navigation Bar
└── README.md              # Project Documentation
```

## 🛠️ Setup Instructions

1. **Clone the repository:**

   ```bash
   git clone https://github.com/Ornab95/OnlineStore.git
   cd OnlineStore
   ```

2. **Database Setup:**

   - Import the provided SQL file (`database.sql`) into your MySQL database.
   - Update `connection.php` with your database credentials:
     ```php
     $conn = new mysqli('localhost', 'root', '', 'inventory_db');
     ```

3. **Run the Project:**

   - Place the project folder in your local server (e.g., `htdocs` for XAMPP).
   - Start Apache and MySQL via XAMPP.
   - Open `http://localhost/inventory-management/index.php` in your browser.

## 📊 Reports

- **Sales Report:** Filter sales data between specific date-time ranges.
- **Purchase Report:** Generate purchase reports with total cost calculations.

## ✅ Validation Features

- Users cannot generate reports without selecting valid **Start Date-Time** and **End Date-Time**.
- Input fields are required to prevent submission with empty data.

## 🤝 Contributing

Feel free to fork this project, make improvements, and create pull requests.

## 📜 License

This project is licensed under the [MIT License](LICENSE).

---

**Developed by Ornab Biswass**
