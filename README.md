# 📦 InLife Inventory Management System

<p align="center">
  <img src="public/images/logo_inlife.png" width="130" alt="InLife Logo">
</p>

<p align="center">
Modern Inventory Management System built with Laravel 12, Tailwind CSS, and MySQL.
</p>

<p align="center">

![Laravel](https://img.shields.io/badge/Laravel-12-red?logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2-blue?logo=php)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-4.0-38BDF8?logo=tailwindcss)
![MySQL](https://img.shields.io/badge/MySQL-Database-blue?logo=mysql)
![License](https://img.shields.io/badge/License-MIT-green)

</p>

<p align="center">
🚀 <b>Live Demo</b><br>
https://inlife-inventory-management-system-production.up.railway.app/
</p>

---

# 📖 About

InLife Inventory Management System (IMS) is a web-based inventory management application developed to help organizations manage their inventory assets digitally and efficiently.

The system provides role-based access for Employees, Staff, Managers, and Administrators to manage inventory, monitor stock, process borrowing requests, generate reports, and visualize data through an interactive dashboard.

Built using **Laravel 12**, **Tailwind CSS**, **MySQL**, and **Chart.js**, the application delivers a modern, responsive, and user-friendly experience.

---

# ✨ Features

## 🌐 Landing Page

- Modern responsive UI
- Hero Section
- Inventory Overview
- Role Overview
- Report Overview
- About Company

---

## 🔐 Authentication

- Login
- Register
- Forgot Password
- Remember Me
- Role-based Authentication

---

## 👤 Admin

- Dashboard
- Asset Management
- Category Management
- Employee Management
- User Management
- Borrowing Management
- Reports
- Stock Monitoring

---

## 👨‍💼 Manager

- Dashboard Analytics
- Inventory Monitoring
- Borrowing Monitoring
- Employee Monitoring
- Reports

---

## 👨‍💻 Staff

- Dashboard
- Borrowing Management
- Asset Monitoring

---

## 👨 Employee

- Dashboard
- Borrow Asset
- Borrow History
- Profile Management

---

# 📊 Dashboard

The dashboard provides real-time information including:

- Total Assets
- Available Assets
- Borrowed Assets
- Maintenance Assets
- Categories
- Employees
- Charts & Analytics
- Recent Activities

---

# 🔑 Demo Accounts

| Role | Email | Password |
|------|-------|----------|
| Employee | employee@inlife.id | employee123 |
| Staff | staff@inlife.id | staff123 |
| Admin | admin@inlife.id | admin123 |
| Manager | manager@inlife.id | manager123 |

> **Note**
>
> All newly registered users are automatically assigned the **Employee** role.

---

# 🛠 Tech Stack

| Technology | Version |
|------------|---------|
| Laravel | 12 |
| PHP | 8.2 |
| Tailwind CSS | 4 |
| Blade | Latest |
| MySQL | 8 |
| Chart.js | Latest |
| Vite | Latest |

---

# 🗄 Database

## Main Tables

- users
- roles
- products
- categories
- borrowings

---

## Relationships

```text
Role
 │
 └── hasMany
        User
           │
           ├── hasMany Products
           └── hasMany Borrowings

Category
     │
     └── hasMany Products

Product
     │
     └── belongsTo Category

Borrowing
     │
     ├── belongsTo User
     └── belongsTo Product
```

---

# 👥 User Roles

| Role | Permissions |
|------|-------------|
| Guest | View Landing Page |
| Employee | Borrow Assets |
| Staff | Manage Borrowings |
| Manager | Monitor Inventory & Reports |
| Admin | Full System Access |

---

# 📂 Project Structure

```text
app
 ├── Http
 │    ├── Controllers
 │    ├── Middleware
 │
 ├── Models
 │
resources
 ├── views
 │    ├── dashboard
 │    ├── products
 │    ├── borrowings
 │    ├── categories
 │    ├── employees
 │    ├── components
 │
routes
database
public
storage
```

---

# ⚙ Installation

## 1. Clone Repository

```bash
git clone https://github.com/YOUR_USERNAME/YOUR_REPOSITORY.git
```

## 2. Enter Project Directory

```bash
cd YOUR_REPOSITORY
```

## 3. Install Dependencies

```bash
composer install
npm install
```

## 4. Copy Environment File

```bash
cp .env.example .env
```

## 5. Generate Application Key

```bash
php artisan key:generate
```

## 6. Configure Database

Edit your `.env` file.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inlife_ims
DB_USERNAME=root
DB_PASSWORD=
```

## 7. Run Migration & Seeder

```bash
php artisan migrate --seed
```

## 8. Build Frontend Assets

```bash
npm run build
```

or during development

```bash
npm run dev
```

## 9. Run Application

```bash
php artisan serve
```

---

# 🚀 Deployment

The application is deployed on **Railway**.

**Live Website**

https://inlife-inventory-management-system-production.up.railway.app/

---

# 👨‍💻 Developer

Developed by **Titania Kaylife Putri**

Information Systems Student  
UPN "Veteran" Jawa Timur

---

# 📄 License

This project is licensed under the MIT License.
