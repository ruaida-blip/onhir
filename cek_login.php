<?php
session_start();
include "connection.php";

if (isset($_POST['id']) && isset($_POST['password'])) {

    $id = $_POST['id'];
    $password = $_POST['password'];

    // 1. Cek ke tabel lecturer
    $queryLecturer = mysqli_query($conn,
        "SELECT id, password FROM lecturer WHERE id='$id' AND password='$password'"
    );

    // 2. Cek ke tabel students
    $queryStudents = mysqli_query($conn,
        "SELECT id, password FROM students WHERE id='$id' AND password='$password'"
    );

    // 3. Langsung tentukan orang itu ada di mana
    if (mysqli_num_rows($queryLecturer) > 0) {
        // Jika data hanya ditemukan di tabel lecturer
        $data = mysqli_fetch_assoc($queryLecturer);

        $_SESSION['login'] = true;
        $_SESSION['id'] = $data['id'];
        $_SESSION['role'] = 'lecturer'; // Set manual role-nya disini

        header("Location: index.php");
        exit;
    } 
    
    if (mysqli_num_rows($queryStudents) > 0) {
        // Jika data hanya ditemukan di tabel students
        $data = mysqli_fetch_assoc($queryStudents);

        $_SESSION['login'] = true;
        $_SESSION['id'] = $data['id'];
        $_SESSION['role'] = 'student'; // Set manual role-nya disini

        header("Location: index.php");
        exit;
    }

    // 4. Jika tidak ditemukan di kedua tabel sama sekali
    echo "<script>
            alert('Login Gagal! ID atau Password tidak ditemukan.');
            window.location.href = 'login.php'; 
          </script>";

} else {
    header("Location: login.php");
    exit;
}
?>