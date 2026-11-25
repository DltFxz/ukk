<?php
// Koneksi ke database wajib adaaa
require "koneksi.php";

// id di dapat dari href edit.php?id=
$id = $_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE siswa_id=$id");
$data = mysqli_fetch_assoc($query);

//iniii kode untuk menyimpan perubahan data siswa
if (isset($_POST["simpan"])) {
    $nama = $_POST["nama"];
    $kelas = $_POST["kelas"];
    $jurusan = $_POST["jurusan"];

    $foto = $_FILES["foto"]["name"];
    $tmp = $_FILES["foto"]["tmp_name"];

    // Hapus foto lama jika filenya ada di folder uploads jikalau kalian mengupload foto baru browsqy
    if ($foto != "") {
        if (is_file("uploads/" . $data["foto"])) {
            unlink("uploads/" . $data["foto"]);
        }
        move_uploaded_file($tmp, "uploads/" . $foto);
    } else {
        $foto = $data["foto"];
    }

    // query untuk update data siswa header("Location: admin.php"); digunakan untuk mengarahkan ke halaman admin.php setelah data berhasil diupdate
    mysqli_query($koneksi, "UPDATE siswa SET nama='$nama', kelas='$kelas', jurusan='$jurusan', foto='$foto' WHERE siswa_id=$id");
    header("Location: admin.php");
    exit;
}
?>

<!-- gunakan value untuk mengisi input field datanya sesuai dari data yang kalian edit -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Edit Siswa</h1>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data["siswa_id"] ?>">

            <label class="block mb-1">Nama</label>
            <input class="w-full border p-2 mb-4" name="nama" value="<?= $data["nama"] ?>" required>

            <!--input bertipe dropdown agar lebih terstruktur samakan saja valuenya  -->
            <label class="block mb-1">Kelas</label>
            <select class="w-full border p-2 mb-4" name="kelas" required>
                <option value="X" <?= $data["kelas"] == "X" ? "selected" : "" ?>>X</option>
                <option value="XI" <?= $data["kelas"] == "XI" ? "selected" : "" ?>>XI</option>
                <option value="XII" <?= $data["kelas"] == "XII" ? "selected" : "" ?>>XII</option>
            </select>

            <label class="block mb-1">Jurusan</label>
            <select class="w-full border p-2 mb-4" name="jurusan" required>
                <option value="TKJ" <?= $data["jurusan"] == "TKJ" ? "selected" : "" ?>>TKJ - Teknik Komputer dan Jaringan</option>
                <option value="RPL" <?= $data["jurusan"] == "RPL" ? "selected" : "" ?>>RPL - Rekayasa Perangkat Lunak</option>
                <option value="AKL" <?= $data["jurusan"] == "AKL" ? "selected" : "" ?>>AKL - Akuntansi dan Keuangan Lembaga</option>
                <option value="MPLB" <?= $data["jurusan"] == "MPLB" ? "selected" : "" ?>>MPLB - Manajemen Perkantoran dan Layanan Bisnis</option>
                <option value="DKV" <?= $data["jurusan"] == "DKV" ? "selected" : "" ?>>DKV - Desain Komunikasi Visual</option>
                <option value="TKR" <?= $data["jurusan"] == "TKR" ? "selected" : "" ?>>TKR - Teknik Kendaraan Ringan</option>
                <option value="TBSM" <?= $data["jurusan"] == "TBSM" ? "selected" : "" ?>>TBSM - Teknik dan Bisnis Sepeda Motor</option>
                <option value="TITL" <?= $data["jurusan"] == "TITL" ? "selected" : "" ?>>TITL - Teknik Instalasi Tenaga Listrik</option>
            </select>

            <!-- menampilkan foto saat ini -->
            <label class="block mb-1">Foto sekarang</label>
            <img class="w-16 h-16 object-cover mb-4" src="uploads/<?= $data["foto"] ?>" alt="Foto siswa">

            <label class="block mb-1">Ganti Foto (boleh kosong)</label>
            <input class="w-full border p-2 mb-4" type="file" name="foto">

            <button class="bg-blue-600 text-white px-4 py-2 rounded" name="simpan">Simpan</button>
            <a class="ml-2 text-gray-600" href="admin.php">Batal</a>
        </form>
    </div>
</body>
</html>