<?php
// Koneksi ke database wajib ada, bebas pakai require atau include maupun require_once atau include_once serah lu
    require "koneksi.php";

// query untuk menampilkan semua data siswa dari tabel siswa
    $query = mysqli_query($koneksi,"SELECT * FROM siswa");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Panel Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100 p-4 sm:p-6 flex justify-center items-start">
    <div class="w-full max-w-6xl mx-auto bg-white p-4 sm:p-6 rounded shadow">
        <div class="flex flex-col gap-4 sm:flex-row sm:justify-between sm:items-center mb-5">
            <h1 class="text-2xl font-bold">Data Siswa</h1>
            <div class="flex items-center gap-4">
                <a class="bg-blue-600 text-white px-4 py-2 rounded" href="tambah.php">Tambah Data</a>
                <a class="text-red-600" href="logout.php">logout</a>
            </div>
        </div>

        <div class="w-full overflow-x-auto">
        <table class="w-full min-w-[700px] border-collapse border">
            <tr class="bg-gray-200">
                <th class="border p-2">No</th>
                <th class="border p-2">Nama</th>
                <th class="border p-2">Kelas</th>
                <th class="border p-2">Jurusan</th>
                <th class="border p-2">Foto</th>
                <th class="border p-2">Aksi</th>
            </tr>
            <?php

            // variabel no yang bernilai 1 digunakan untuk menampilkan nomor urut data siswa agar di hitung dari 1 bukan dari 0
             $no = 1;
             
            // perulangan while untuk menampilkan data siswa dari database
             while ($data = mysqli_fetch_assoc($query)): ?>
            <tr>
                <td class="border p-2"><?= $no++; ?></td>
                <td class="border p-2"><?= $data['nama']; ?></td>
                <td class="border p-2"><?= $data['kelas']; ?></td>
                <td class="border p-2"><?= $data['jurusan']; ?></td>
                <td class="border p-2 "><img src="uploads/<?= $data['foto']; ?>" alt="Foto" class="w-16 h-16 object-cover"></td>
                <td class="border p-2">
                    <a class="text-blue-600 hover:underline" href="edit.php?id=<?= $data['siswa_id']; ?>">Edit</a>
                    <a class="text-red-600 hover:underline ml-2" href="hapus.php?id=<?= $data['siswa_id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
        </div>
    </div>
</body>
</html>
