# SKKInventory

SKKInventory is a comprehensive web-based Inventory Management System built using PHP and MySQL. It is designed to streamline the process of tracking stock, managing item releases, and monitoring inventory history with a user-friendly interface.

## 🚀 Features

- **Dashboard**: Real-time overview of inventory status and system statistics.
- **Inventory Management**: Full CRUD (Create, Read, Update, Delete) functionality for managing stock items.
- **Stock Movement**:
    - **IN Items**: Easily restock items and update inventory counts.
    - **OUT Items**: Track item releases and distributions.
    - **Request System**: Formalize item requests before release.
- **Advanced Reporting**:
    - Generates detailed statistics by category.
    - Exportable/Printable reports for restocked items and inventory status.
- **User Management**:
    - Role-based access control (Superadmin, Admin, and Handlers).
    - Secure login and session management.
- **Data Security**:
    - Built-in backup and recovery system for SQL databases.
    - Comprehensive history logs for auditing stock movements.

## 🛠️ Tech Stack

- **Frontend**: HTML5, CSS3, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **Typography**: Poppins (Google Fonts)

## 📂 Project Structure

```text
SKKI/
├── css/            # Stylesheets for different modules
├── js/             # Client-side logic
├── images/         # Logo and UI assets
├── sql/            # Database backup files (.sql)
├── dashboard.php   # System overview
├── inventory.php   # Stock management
├── add.php         # Item entry (IN)
├── out.php         # Item release (OUT)
├── statistics.php  # Data visualization and reports
├── history.php     # Transaction logs
├── connect.php     # Database connection configuration
└── index.php       # Login landing page
```

## ⚙️ Installation

1. **Prerequisites**:
   - Install a local server environment like [XAMPP](https://www.apachefriends.org/) or [WAMP](https://www.wampserver.com/).

2. **Database Setup**:
   - Open PHPMyAdmin.
   - Create a new database named `skki`.
   - Import the latest `.sql` file found in the `/sql` directory.

3. **Configuration**:
   - Open `connect.php`.
   - Update the database credentials (host, username, password, and database name) to match your local setup.

4. **Run the Project**:
   - Place the project folder in the `htdocs` directory (for XAMPP) or `www` directory (for WAMP).
   - Navigate to `http://localhost/SKKI` in your web browser.

## 👥 User Roles

- **Superadmin**: Full system access, including user management and database backups.
- **Admin**: Manage inventory, stock movements, and view statistics.
- **Handler/User**: Basic access for requesting and tracking items.

---
Developed with focus on efficiency and data integrity.
