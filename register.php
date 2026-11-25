<?php
// Memulai session
session_start();

// Koneksi ke database wajib adaaaaaaaaaa
require "koneksi.php";


if (isset($_POST["daftar"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

// query untuk menambahkan data baru ke database sesuai tabel yang di inginkan
    $query = mysqli_query($koneksi, "INSERT INTO admin (username, password) VALUES ('$username', '$password')");
    header('location: index.php');
}

?>

<!-- pastikan method POST dan name sama dengan isi variabel -->
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-sm mx-auto mt-16 bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Daftar Admin</h1>
        <form method="POST">
            <label class="block mb-1">Username</label>
            <input class="w-full border p-2 mb-4" name="username" required>
            <label class="block mb-1">Password</label>
            <input class="w-full border p-2 mb-4" type="password" name="password" required>
            <button class="w-full bg-green-600 text-white p-2 rounded" name="daftar">Daftar</button>
        </form>
        <a class="block mt-4 text-blue-600" href="index.php">Kembali ke login</a>
    </div>
</body>
</html>
