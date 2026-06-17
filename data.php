<?php

session_start();

if(!isset($_SESSION['login'])){
    echo json_encode([
        "status" => "error",
        "message" => "Silakan login terlebih dahulu"
    ]);
    exit();
}

include "connection.php";

header("Content-Type: application/json");

$lecturer = mysqli_query($conn,"SELECT * FROM lecturer");
$students = mysqli_query($conn,"SELECT * FROM students");

$dataLecturer = [];
$dataStudents = [];

while($row = mysqli_fetch_assoc($lecturer)){
    $dataLecturer[] = $row;
}

while($row = mysqli_fetch_assoc($students)){
    $dataStudents[] = $row;
}

echo json_encode([
    "lecturers" => $dataLecturer,
    "students" => $dataStudents
]);

?>