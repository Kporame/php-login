<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-green-400 to-blue-500">
  <div class="bg-white/90 backdrop-blur-md p-10 rounded-2xl shadow-xl text-center max-w-md w-full">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">🎉 Welcome</h2>
    <p class="text-gray-600 mb-6">สวัสดี <b><?php echo $_SESSION['user']; ?></b> คุณล็อกอินสำเร็จแล้ว</p>
    <a href="logout.php" class="px-6 py-2 bg-red-500 text-white rounded-lg font-semibold hover:bg-red-600 transition duration-300">
      Logout
    </a>
  </div>
</body>
</html>
