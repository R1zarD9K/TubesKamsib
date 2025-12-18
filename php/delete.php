<?php
    require_once 'auth.php';
    if (!isLoggedIn()) {
        header("Location: login.php");
        exit();
    }
    include 'app.php'; 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        deleteStudent($id);
    }
    if (!$students) {
        echo "Siswa tidak ditemukan.";
        exit();
    } else {
        echo "ID siswa tidak valid.";
        exit();
    }
?>