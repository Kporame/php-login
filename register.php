<?php
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u = trim($_POST['username']);
    $p = $_POST['password'];
    $p2 = $_POST['password2'];

    if (strlen($u) < 3 || strlen($p) < 3) {
        $error = "❌ Username และ Password ต้องยาวอย่างน้อย 3 ตัวอักษร";
    } elseif ($p !== $p2) {
        $error = "⚠️ รหัสผ่านทั้งสองช่องไม่ตรงกัน";
    } else {
        // ตรวจสอบว่ามี user นี้อยู่แล้วหรือยัง
        $stmt = $conn->prepare("SELECT id FROM users WHERE username=?");
        $stmt->bind_param("s", $u);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "⚠️ Username นี้มีคนใช้แล้ว";
        } else {
            // เข้ารหัส password
            $hash = password_hash($p, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $u, $hash);

            if ($stmt->execute()) {
                $_SESSION['user'] = $u;
                header("Location: dashboard.php");
                exit;
            } else {
                $error = "❌ เกิดข้อผิดพลาดในการสมัครสมาชิก";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-pink-500 to-yellow-500">

  <div class="bg-white/90 backdrop-blur-md p-8 rounded-2xl shadow-xl w-full max-w-md">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">📝 Register</h2>

    <?php if (isset($error)): ?>
      <div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-center">
        <?php echo $error; ?>
      </div>
    <?php endif; ?>

    <form method="post" class="space-y-4">
      <div>
        <label class="block text-gray-700 mb-1">Username</label>
        <input type="text" name="username" required
          class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-pink-400 focus:outline-none">
      </div>

      <div>
        <label class="block text-gray-700 mb-1">Password</label>
        <input type="password" name="password" required
          class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-pink-400 focus:outline-none">
      </div>

      <div>
        <label class="block text-gray-700 mb-1">Confirm Password</label>
        <input type="password" name="password2" required
          class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-pink-400 focus:outline-none">
      </div>

      <button type="submit"
        class="w-full py-2 bg-pink-600 text-white rounded-lg font-semibold hover:bg-pink-700 transition duration-300">
        สมัครสมาชิก
      </button>
    </form>

    <p class="text-center text-sm text-gray-500 mt-6">
      มีบัญชีแล้ว? 
      <a href="index.php" class="text-pink-600 font-semibold hover:underline">Login</a>
    </p>
  </div>

</body>
</html>
