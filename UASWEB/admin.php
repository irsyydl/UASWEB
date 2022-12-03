<?php
    session_start();
    if(!isset($_SESSION['login'])){
        echo "<script>
                alert('Akses Ditolak, Silahkan Login');
                document.location.href='login.php';
            </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheets/style.css">
    <title>Posttest2</title>
</head>
<body>
    <div class="banner">
        <div class="navbar">
            <div class="logo">
                <img src="assets/logo-removebg-preview.png" alt="">
            </div>
            <ul>
                <li><a href="#section1">Home</a></li>
                <li><a href="about.php">About Me</a></li>
                <li><a href="logout.php">Log Out</a></li>
                <li><img src="assets/moon.png" id="icon"></li>
            </ul>
        </div>
        <div class="content">
            <h1 id="teks">Admin Page</h1>
            <div>
                <button type="button"><a href="outputdata.php">Lihat Data</a></button>
            </div>
        </div>
    </div>
    <footer id="footer">
        Designed By
        M. Irsyadul A. H
    </footer>
    <script src="script.js"></script>
</body>
</html>