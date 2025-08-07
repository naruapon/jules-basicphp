# PHP Mobile Shop CRUD Application

This is a simple web application built with PHP and MySQL for managing a mobile phone product inventory. It provides full CRUD (Create, Read, Update, Delete) functionality.

## Features

*   **View Products:** Displays a list of all mobile phones in the inventory.
*   **Add New Product:** A form to add a new phone to the database.
*   **Edit Product:** Update the information of an existing product.
*   **Delete Product:** Remove a product from the list.
*   **Secure:** Uses prepared statements to prevent SQL injection.
*   **Simple UI:** Clean and simple user interface styled with basic CSS.

## Requirements

*   A web server with PHP support (e.g., Apache, Nginx)
*   MySQL or MariaDB database server
*   A web browser

## Installation and Setup

Follow these steps to get the application running on your local server:

### 1. Database Setup

1.  Access your database management tool (e.g., phpMyAdmin, Adminer, or the MySQL command line).
2.  Create a new database named `mobileshop`.
3.  Import the `mobileshop.sql` file provided in this project into the `mobileshop` database. This will create the `product` table and populate it with some sample data.

### 2. Configure Database Connection

1.  Open the `db.php` file in a text editor.
2.  Update the following variables with your actual database credentials:
    ```php
    $servername = "localhost"; // Your database server (usually 'localhost')
    $username = "root";      // Your database username
    $password = "";          // Your database password
    $dbname = "mobileshop";
    ```

### 3. Deploy Files

1.  Copy all the PHP files (`index.php`, `edit.php`, `delete.php`, `db.php`) and the `README.md` into your web server's document root directory (e.g., `htdocs` for XAMPP, `www` for WAMP).

### 4. Run the Application

1.  Open your web browser and navigate to the project directory. For example: `http://localhost/your-project-folder/` or simply `http://localhost/` if you placed the files in the root.
2.  You should see the main page (`index.php`) displaying the product list and a form to add new products.

## File Structure

*   `index.php`: The main page for creating and reading products.
*   `edit.php`: The page for updating product details.
*   `delete.php`: The script that handles product deletion.
*   `db.php`: Handles the connection to the MySQL database.
*   `mobileshop.sql`: The SQL dump file for creating the database and table.
*   `README.md`: This instruction file.

---
<br>

# (ภาษาไทย) แอปพลิเคชันจัดการสต็อกสินค้าโทรศัพท์มือถือ

นี่คือเว็บแอปพลิเคชันอย่างง่ายที่สร้างด้วย PHP และ MySQL สำหรับจัดการสต็อกสินค้าโทรศัพท์มือถือ โดยมีฟังก์ชันการทำงานครบถ้วนทั้ง CRUD (Create, Read, Update, Delete)

## คุณสมบัติ

*   **ดูรายการสินค้า:** แสดงรายการโทรศัพท์มือถือทั้งหมดที่มีในสต็อก
*   **เพิ่มสินค้าใหม่:** ฟอร์มสำหรับเพิ่มโทรศัพท์เครื่องใหม่ลงในฐานข้อมูล
*   **แก้ไขข้อมูลสินค้า:** อัปเดตข้อมูลของสินค้าที่มีอยู่
*   **ลบสินค้า:** ลบสินค้าออกจากรายการ
*   **ปลอดภัย:** ใช้ Prepared Statements เพื่อป้องกัน SQL Injection
*   **UI เรียบง่าย:** หน้าตาโปรแกรมสะอาดและเรียบง่ายด้วย CSS พื้นฐาน

## สิ่งที่ต้องมี

*   เว็บเซิร์ฟเวอร์ที่รองรับ PHP (เช่น Apache, Nginx)
*   เซิร์ฟเวอร์ฐานข้อมูล MySQL หรือ MariaDB
*   เว็บเบราว์เซอร์

## การติดตั้งและตั้งค่า

ทำตามขั้นตอนต่อไปนี้เพื่อรันแอปพลิเคชันบนเซิร์ฟเวอร์ของคุณ:

### 1. ตั้งค่าฐานข้อมูล

1.  เข้าสู่ระบบเครื่องมือจัดการฐานข้อมูลของคุณ (เช่น phpMyAdmin, Adminer, หรือ MySQL command line)
2.  สร้างฐานข้อมูลใหม่ชื่อ `mobileshop`
3.  นำเข้าไฟล์ `mobileshop.sql` ที่อยู่ในโปรเจกต์นี้ไปยังฐานข้อมูล `mobileshop` ที่เพิ่งสร้างขึ้น ไฟล์นี้จะสร้างตาราง `product` และเพิ่มข้อมูลตัวอย่างให้

### 2. ตั้งค่าการเชื่อมต่อฐานข้อมูล

1.  เปิดไฟล์ `db.php` ด้วยโปรแกรมแก้ไขข้อความ
2.  แก้ไขค่าของตัวแปรต่อไปนี้ให้ตรงกับข้อมูลการเข้าสู่ระบบฐานข้อมูลของคุณ:
    ```php
    $servername = "localhost"; // เซิร์ฟเวอร์ฐานข้อมูล (ปกติคือ 'localhost')
    $username = "root";      // ชื่อผู้ใช้ฐานข้อมูล
    $password = "";          // รหัสผ่านฐานข้อมูล
    $dbname = "mobileshop";
    ```

### 3. นำไฟล์ไปวางบนเซิร์ฟเวอร์

1.  คัดลอกไฟล์ PHP ทั้งหมด (`index.php`, `edit.php`, `delete.php`, `db.php`) และไฟล์ `README.md` ไปยังไดเรกทอรีเอกสารหลักของเว็บเซิร์ฟเวอร์ (เช่น `htdocs` สำหรับ XAMPP, `www` สำหรับ WAMP)

### 4. เปิดใช้งานแอปพลิเคชัน

1.  เปิดเว็บเบราว์เซอร์แล้วเข้าไปยังไดเรกทอรีของโปรเจกต์ ตัวอย่างเช่น: `http://localhost/your-project-folder/` หรือ `http://localhost/` หากคุณวางไฟล์ไว้ที่ไดเรกทอรีราก
2.  คุณจะเห็นหน้าหลัก (`index.php`) แสดงรายการสินค้าและฟอร์มสำหรับเพิ่มสินค้าใหม่

## โครงสร้างไฟล์

*   `index.php`: หน้าหลักสำหรับสร้างและอ่านข้อมูลสินค้า
*   `edit.php`: หน้าสำหรับแก้ไขรายละเอียดสินค้า
*   `delete.php`: สคริปต์สำหรับจัดการการลบสินค้า
*   `db.php`: จัดการการเชื่อมต่อกับฐานข้อมูล MySQL
*   `mobileshop.sql`: ไฟล์ SQL สำหรับสร้างฐานข้อมูลและตาราง
*   `README.md`: ไฟล์คำแนะนำนี้
