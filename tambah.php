<?php
// Memulai session
session_start();

// Koneksi ke database wajib adaa yaa bebass pake include atau require atau bla bla bla
require "koneksi.php";

if (isset($_POST["simpan"])) {
    $nama = $_POST["nama"];
    $kelas = $_POST["kelas"];
    $jurusan = $_POST["jurusan"];

// untuk mengupload foto ke folder uploads
    $foto = $_FILES["foto"]["name"];
    $tmp = $_FILES["foto"]["tmp_name"];

    if ($foto != "") {
        move_uploaded_file($tmp, "uploads/" . $foto);
    }

    // query untuk menambahkan data baru ke tabel siswa
    mysqli_query($koneksi, "INSERT INTO siswa (nama, kelas, jurusan, foto) VALUES ('$nama', '$kelas', '$jurusan', '$foto')");
    header("Location: admin.php");
    exit;
}
?>

<!-- pastikan method POST dan name sama dengan isi variabel dan di setiap option pastikan value sesuai  -->
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Tambah Siswa</h1>
        <form method="post" enctype="multipart/form-data">
            <label class="block mb-1">Nama</label>
            <input class="w-full border p-2 mb-4" name="nama" required>
            <label class="block mb-1">Kelas</label>
            <select class="w-full border p-2 mb-4" name="kelas" required>
                <option value="">Pilih Kelas</option>
                <option value="X">X</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
            </select>
            <label class="block mb-1">Jurusan</label>
            <select class="w-full border p-2 mb-4" name="jurusan" required>
                <option value="">Pilih Jurusan</option>
                <option value="TKJ">TKJ - Teknik Komputer dan Jaringan</option>
                <option value="RPL">RPL - Rekayasa Perangkat Lunak</option>
                <option value="AKL">AKL - Akuntansi dan Keuangan Lembaga</option>
                <option value="MPLB">MPLB - Manajemen Perkantoran dan Layanan Bisnis</option>
                <option value="DKV">DKV - Desain Komunikasi Visual</option>
                <option value="TKR">TKR - Teknik Kendaraan Ringan</option>
                <option value="TBSM">TBSM - Teknik dan Bisnis Sepeda Motor</option>
                <option value="TITL">TITL - Teknik Instalasi Tenaga Listrik</option>
            </select>
            <label class="block mb-1">Foto (boleh kosong)</label>
            <input class="w-full border p-2 mb-4" type="file" name="foto">
            <button class="bg-blue-600 text-white px-4 py-2 rounded" name="simpan">Simpan</button>
            <a class="ml-2 text-gray-600" href="admin.php">Batal</a>
        </form>
    </div>
</body>
</html>
