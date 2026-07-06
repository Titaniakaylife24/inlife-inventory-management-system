# 📦 InLife Inventory Management System

<p align="center">

<img src="public/images/logo_inlife.png" width="130">

</p>

<p align="center">

Modern Inventory Management System built with Laravel 12, TailwindCSS and MySQL.

</p>

<p align="center">

![Laravel](https://img.shields.io/badge/Laravel-12-red?logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2-blue?logo=php)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-4.0-38BDF8?logo=tailwindcss)
![MySQL](https://img.shields.io/badge/MySQL-Database-blue?logo=mysql)
![License](https://img.shields.io/badge/License-MIT-green)

</p>

---

# 📖 About

InLife Inventory Management System (IMS) adalah aplikasi berbasis web yang digunakan untuk membantu perusahaan mengelola seluruh aset inventaris secara digital.

Sistem mendukung:

- Asset Management
- Borrowing Management
- Stock Monitoring
- Real-time Dashboard
- Role Management
- Reporting
- Authentication

Seluruh data ditampilkan secara **real-time** langsung dari database MySQL.

---

# ✨ Features

## 🌐 Landing Page

- Modern UI
- Hero Section
- Inventory Overview
- Roles Overview
- Reports Overview
- About Company

---

## 🔐 Authentication

- Login
- Register
- Forgot Password
- Remember Me

---

## 👤 Admin

- Dashboard
- Product Management
- Category Management
- Employee Management
- Borrowing Management
- User Management
- Reports

---

## 👨‍💼 Manager

- Dashboard Analytics
- Inventory Monitoring
- Borrowing Monitoring
- Reports
- Employee Monitoring

---

## 👨 Employee

- Dashboard
- Borrow Asset
- Borrow History
- Profile

---

# 📊 Dashboard

Dashboard menampilkan data secara realtime:

- Total Assets
- Available Assets
- Borrowed Assets
- Maintenance Assets
- Categories
- Employees
- Charts
- Recent Activities

---

# 🛠 Tech Stack

| Technology | Version |
|------------|---------|
| Laravel | 12 |
| PHP | 8.2 |
| TailwindCSS | 4 |
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

```
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
|-------|------------|
| Guest | View Landing Page |
| Employee | Borrow Assets |
| Manager | Monitoring & Reports |
| Admin | Full Access |

---

# 📂 Project Structure

```
app
 ├── Http
 │     ├── Controllers
 │     ├── Middleware
 │
 ├── Models
 │
resources
 ├── views
 │      ├── dashboard
 │      ├── products
 │      ├── borrowings
 │      ├── categories
 │      ├── employees
 │      ├── components
 │
routes
database
public
storage
```

---

# ⚙ Installation

## 1 Clone Repository

```bash
git clone https://github.com/username/inlife-ims.git
```
