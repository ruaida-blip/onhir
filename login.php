<?php

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Campus</title>

    <style>

    body{
        font-family: Arial, sans-serif;
        background: #f4f6f9;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .login-box{
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,.1);
        width: 300px;
    }

    h2{
        text-align: center;
        color: #2563eb;
    }

    input{
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        box-sizing: border-box;
    }

    button{
        width: 100%;
        padding: 10px;
        border: none;
        background: #2563eb;
        color: white;
        cursor: pointer;
    }

    button:hover{
        background: #1d4ed8;
    }

    </style>

</head>

<body>

<div class="login-box">

    <h2>Login Campus</h2>

    <form action="cek_login.php" method="POST" autocomplete="off">

        <input
            type="number"
            name="id"
            placeholder="Enter ID"
            autocomplete="off"
            required>

        <input
            type="password"
            name="password"
            placeholder="Enter Password"
            autocomplete="new-password"
            required>

        <button type="submit">
            Login
        </button>

    </form>

</div>

</body>
</html>