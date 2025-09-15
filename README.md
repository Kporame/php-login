<h1 align="center">
  🔐 Simple PHP Login + Register System  
</h1>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-Login-blue?style=for-the-badge&logo=php">
  <img src="https://img.shields.io/badge/MySQL-Database-orange?style=for-the-badge&logo=mysql">
  <img src="https://img.shields.io/badge/TailwindCSS-UI-06B6D4?style=for-the-badge&logo=tailwindcss">
</p>

<p align="center">
  ระบบล็อกอิน + สมัครสมาชิก แบบง่าย ๆ  
  เขียนด้วย <b>PHP + MySQL + Tailwind CSS</b>  
</p>

---

## 🚀 Features
- ✅ Login ด้วย **username / password**
- ✅ Register สมัครสมาชิกใหม่ (hash password อัตโนมัติ)
- ✅ ใช้ **bcrypt (`password_hash`)** ปลอดภัย
- ✅ UI สวยงามด้วย **Tailwind CSS**
- ✅ มี Dashboard และ Logout

---

## 📂 Project Structure
```bash
login-db-demo/
 ├── config.php       # การเชื่อมต่อฐานข้อมูล
 ├── index.php        # ฟอร์ม Login
 ├── register.php     # ฟอร์ม Register
 ├── dashboard.php    # หน้า Dashboard หลัง Login
 ├── logout.php       # ออกจากระบบ
 └── users.sql        # สร้างฐานข้อมูลและตาราง users
