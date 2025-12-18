<?php
require_once 'auth.php';
if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}
// Koneksi dan fungsi lainnya tetap sama seperti yang Anda kirimkan
// Fungsi untuk membuka koneksi ke database SQLite3, select, update, delete, dan add
// function connectDB() {
    // Membuka koneksi ke database SQLite
    include 'app.php';
    $students=selectStudents();
    
// }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Manajemen Siswa</h1>
            <p>Tambah, Update, Hapus dan Lihat Daftar Siswa</p>
        </header>

        <!-- Form untuk menambahkan siswa -->
        <section class="form-section">
            <h2>Tambah Siswa Baru</h2>
            <form action="index.php" method="POST">
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" required>

                <label for="age">Usia:</label>
                <input type="number" id="age" name="age" required>

                <label for="grade">Kelas:</label>
                <input type="text" id="grade" name="grade" required>

                <button type="submit" name="add">Tambah Siswa</button>
            </form>
        </section>

        <!-- Tabel untuk menampilkan daftar siswa -->
        <section class="students-list">
            <h2>Daftar Siswa</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Usia</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Ambil data siswa dari database
                        // $students = selectStudents();
                        if ($students) {
                            foreach ($students as $student) {
                                echo "<tr>
                                    <td>" . htmlspecialchars($student['id']) . "</td>
                                    <td>" . htmlspecialchars($student['name']) . "</td>
                                    <td>" . htmlspecialchars($student['age']) . "</td>
                                    <td>" . htmlspecialchars($student['grade']) . "</td>
                                    <td>
                                        <a href='edit.php?id=" . htmlspecialchars($student['id']) . "' class='btn btn-update'>Edit</a>
                                        <a href='delete.php?id=" . htmlspecialchars($student['id']) . "' class='btn btn-delete' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                                    </td>
                                </tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </section>

        <footer>
            <p>&copy; 2024 Manajemen Siswa - ALH</p>
        </footer>
    </div>

    <div>
        <a href="logout.php" class="btn btn-info">Logout</a> 
    </div>
</body>
</html>
