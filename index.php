<?php
// Memulai session
session_start();

// Koneksi ke database wajib adaa
require "koneksi.php";

// cek apakah tombol login ditekan
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

// query untuk mengecek apakah username dan password sesuai dengan data admin di database
    $query = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM admin WHERE username='$username' AND password='$password'"));

//cek apakah query berhasil dan data admin ditemukan
    if($query){
        $_SESSION["admin_id"] = $query["admin_id"];
        header("Location: admin.php");
        exit;
    } else {
        echo "Username atau password salah";
    }
}

?>

<!-- pastikan method POST dan name sama dengan isi variabel -->
<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-sm mx-auto mt-16 bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Login Admin</h1>
        <form method="post">
            <label class="block mb-1">Username</label>
            <input class="w-full border p-2 mb-4" name="username" required>
            <label class="block mb-1">Password</label>
            <input class="w-full border p-2 mb-4" type="password" name="password" required>
            <button class="w-full bg-blue-600 text-white p-2 rounded" name="login">Login</button>
        </form>
        <a class="block mt-4 text-blue-600" href="register.php">Daftar admin</a>
    </div>
</body>
</html>
