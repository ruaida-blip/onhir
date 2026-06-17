<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit();
}

// Ambil ID user yang login
$id_kamu = $_SESSION['id'];

?>

<!DOCTYPE html>
<html>
<head>
<title>Campus Data</title>

<style>

body{
    font-family: Arial, sans-serif;
    background: #f4f6f9;
    padding: 20px;
}

.container{
    max-width: 900px;
    margin: auto;
}

.card{
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,.1);
}

.menu{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.left-menu button{
    margin-right: 5px;
}

button{
    padding: 10px 15px;
    border: none;
    background: #2563eb;
    color: white;
    cursor: pointer;
    border-radius: 5px;
}

button:hover{
    background: #1d4ed8;
}

.logout-btn{
    background: #ef4444;
}

.logout-btn:hover{
    background: #dc2626;
}

table{
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}

th{
    background: #2563eb;
    color: white;
    padding: 10px;
}

td{
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}

.highlight-kamu{
    background-color: #ffffcc !important;
    font-weight: bold;
}

.badge-kamu{
    background-color: #ef4444;
    color: white;
    padding: 2px 6px;
    border-radius: 4px;
    font-size: 11px;
    margin-left: 5px;
}

.hidden{
    display: none;
}

</style>

</head>

<body>

<div class="container">

<div class="card">

<h2>Campus Data</h2>

<div class="menu">

    <div class="left-menu">
        <button onclick="showLecturer()">Lecturer</button>
        <button onclick="showStudents()">Students</button>
    </div>

    <div>
        <a href="logout.php">
            <button class="logout-btn">Logout</button>
        </a>
    </div>

</div>

<div id="lecturerBox"></div>
<div id="studentBox" class="hidden"></div>

</div>

</div>

<script>

// Ambil ID user login dari PHP
const idKamu = "<?php echo $id_kamu; ?>";

let dataGlobal = null;

fetch("data.php")
.then(response => response.json())
.then(data => {

    dataGlobal = data;

    renderLecturer();
    renderStudents();

});

function renderLecturer(){

    let html = `
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Major</th>
        </tr>
    `;

    dataGlobal.lecturers.forEach(l => {

        let kelasKhusus = "";
        let penandaNama = "";

        if(l.id == idKamu){
            kelasKhusus = "class='highlight-kamu'";
            penandaNama = "<span class='badge-kamu'>Anda</span>";
        }

        html += `
        <tr ${kelasKhusus}>
            <td>${l.id}</td>
            <td>${l.name} ${penandaNama}</td>
            <td>${l.major}</td>
        </tr>
        `;
    });

    html += "</table>";

    document.getElementById("lecturerBox").innerHTML = html;
}

function renderStudents(){

    let html = `
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Major</th>
        </tr>
    `;

    dataGlobal.students.forEach(s => {

        let kelasKhusus = "";
        let penandaNama = "";

        if(s.id == idKamu){
            kelasKhusus = "class='highlight-kamu'";
            penandaNama = "<span class='badge-kamu'>Anda</span>";
        }

        html += `
        <tr ${kelasKhusus}>
            <td>${s.id}</td>
            <td>${s.name} ${penandaNama}</td>
            <td>${s.major}</td>
        </tr>
        `;
    });

    html += "</table>";

    document.getElementById("studentBox").innerHTML = html;
}

function showLecturer(){

    document.getElementById("lecturerBox").classList.remove("hidden");
    document.getElementById("studentBox").classList.add("hidden");

}

function showStudents(){

    document.getElementById("lecturerBox").classList.add("hidden");
    document.getElementById("studentBox").classList.remove("hidden");

}

</script>

</body>
</html>