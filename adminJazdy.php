<?php
session_start();
require_once "connect.php";
if(!isset($_SESSION['logIn'])){
    header('Location: index.php');
    exit();
}else{
    if(!$_SESSION['admin']){
        header('Location: kalendarzTydzien.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - jazdy</title>
    <link rel="stylesheet" href="./css/main.css">
    <link href="https://fonts.googleapis.com/css2
    ?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2e3d9b3214.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navAdmin">
        <div class="logo">
            <img src="img/MotoLka.svg">
        </div>
        <ul class="list">
            <li><a href="adminJazdy.html">Jazdy</a></li>
            <li><a href="adminKursanci.html">Kursanci</a></li>
            <li><a href="adminUsers.html">Instruktorzy</a></li>
            <li><a href="adminRozliczenia.html">Rozliczenia</a></li>
            <li><a href="adminWpłaty.html">Wpłaty</a></li>
            <li><a href="adminWolne.html">Dni wolne</a></li>
            <li>
                <a href=" logout.php"><i class="fas fa-sign-out-alt"></i></a>
            </li>
        </ul>
        <div class="burger">
            <i class="fas fa-bars"></i>
            <i class="fas fa-times"></i>
        </div>
    </nav>

    <div class="adminH">
        <h1>Jazdy</h1>
        <select>
            <option>Od najnowszych</option>
            <option>Od najstarszych</option>
        </select>
    </div>
    <div class="adminContainer">
        <div class="adminContainer2">
            <div class="adminJazdyOptions">
                <h2>Kursant</h2>
                <h2>Instruktor</h2>
                <h2>Data</h2>
                <h2>Godzina</h2>
                <h2>Miejsce</h2>
                <h2>Pojazd</h2>
            </div>
            <form class="adminJazdyTable">
                <div>Siema</div>
                <div>Co tam</div>
                <div>Słychać</div>
                <div>Mordo</div>
                <div>Jebać</div>
                <div>Pis</div>
            </form>
            <form class="adminJazdyTable">
                <div>Siema</div>
                <div>Co tam</div>
                <div>Słychać</div>
                <div>Mordo</div>
                <div>Jebać</div>
                <div>Pis</div>
            </form>
        </div>
    </div>
    <script src="menu.js"></script>
</body>

</html>