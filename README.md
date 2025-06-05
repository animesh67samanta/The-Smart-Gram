# 🌾 The Smart Gram

**The Smart Gram** is a Laravel-based digital governance system designed to modernize and streamline rural administrative workflows at the Panchayat level. The application offers a role-based dashboard for Admins, Panchayats, and Government Officers to efficiently manage property taxes, certificates, and document verification.

---

## 🏗️ Project Workflow

### 🔐 Admin
- Create and manage **Panchayat** accounts
- Add and assign roles to **Officers**
- Control access and privileges for different users

### 🏡 Panchayat
- Add property details **manually** or via **bulk CSV upload**
- **Calculate property tax** automatically
- Generate and print:
  - **Tax Pay Slips**
  - **Demand Bills**
- Create and export PDF certificates for:
  - **Birth**
  - **Death**
  - **Marriage**

### 🧾 Officer
- Review and **approve certificates**
- Apply **digital signatures** for official document authentication

---

## ⚙️ Features

- ✅ Role-based user access (Admin / Panchayat / Officer)
- ✅ Bulk property data upload via CSV
- ✅ Auto property tax calculator
- ✅ PDF generation for official documents
- ✅ Officer digital signature approval system
- ✅ Clean and responsive UI for rural use

---

## 🛠️ Tech Stack

- **Backend:** Laravel (PHP Framework)
- **Frontend:** Blade, Bootstrap
- **Database:** MySQL
- **PDF Generation:** MPDF/DOMPDF
- **Authentication:** Laravel Breeze (or similar, if used)
- **Digital Signature Handling:** (Add method/tool if any)

---

## 📦 Installation

```bash
git clone https://github.com/animesh67samanta/The-Smart-Gram.git
cd The-Smart-Gram

# Install dependencies
composer install

php artisan key:generate

# Migrate and seed (if required)
php artisan migrate

# Start the server
php artisan serve
