<?php
// Koneksi ke database wajib adaaaaaa
    require 'koneksi.php';

// id di dapat dari href hapus.php?id= yang nantinya muncul di url browser
    $id = $_GET['id'];

// query untuk menghapus data siswa berdasarkan id yang didapat dari url atau sesuai id data yang kalian edit
    $query = mysqli_query($koneksi, "DELETE FROM siswa WHERE siswa_id = $id");

// jika query berhasil maka akan diarahkan ke halaman admin.php jika gagal maka akan menampilkan error
    if ($query) {
        header('Location: admin.php');
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
?>