<?php
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u = trim($_POST['username']);
    $p = $_POST['password'];

    // ดึงข้อมูลผู้ใช้จาก DB
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? LIMIT 1");
    $stmt->bind_param("s", $u);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // ตรวจสอบรหัสผ่าน
    if ($user && password_verify($p, $user['password'])) {
        $_SESSION['user'] = $user['username'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "❌ Username หรือ Password ไม่ถูกต้อง";
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">

  <div class="bg-white/90 backdrop-blur-md p-8 rounded-2xl shadow-xl w-full max-w-md">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">🔐 Login</h2>

    <?php if (isset($error)): ?>
      <div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-center">
        <?php echo $error; ?>
      </div>
    <?php endif; ?>

    <form method="post" class="space-y-4">
      <div>
        <label class="block text-gray-700 mb-1">Username</label>
        <input type="text" name="username" required
          class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
      </div>

      <div>
        <label class="block text-gray-700 mb-1">Password</label>
        <input type="password" name="password" required
          class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
      </div>

      <button type="submit"
        class="w-full py-2 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition duration-300">
        Login
      </button>
    </form>

    <p class="text-center text-sm text-gray-500 mt-6">
      ยังไม่มีบัญชี? 
      <a href="register.php" class="text-indigo-600 font-semibold hover:underline">สมัครสมาชิก</a>
    </p>
  </div>

</body>
</html>
