<?php
session_start();
if(!isset($_SESSION['logIn'])){
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendarz - tydzień</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2e3d9b3214.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/main.css">

</head>

<body>
    <nav>
        <div class="logo"></div>
        <ul class="list">
            <li><a href="kalendarzTydzien.php">Kalendarz</a></li>
            <li><a href="#">Panel jazd</a></li>
            <li><a href="#">Rozliczenie jazdy</a></li>
            <li><a href="#">Szukaj</a></li>
        </ul>
        <div class="burger">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
    </nav>

    <h1 class="name">Cześć, <?php echo $_SESSION['user_name'];?>   <a href="logout.php">[Wyloguj się]</a></h1>
    <a href="kalendarzDzien.php"><button class="dayWeek">Dzień</button></a>

    <div class="arrowBox">
        <div class="prev">
            <i class="fas fa-arrow-left"></i>
        </div>
        <p class="date3">20.10.2021</p>
        <div class="next">
            <i class="fas fa-arrow-right"></i>
        </div>
    </div>

    <div class="weekContainer">
        <div class="calendar">
            <div class="record">
                <p>Godzina</p>
            </div>
            <div class="record">
                <p>Pn</p>
            </div>
            <div class="record">
                <p>Wt</p>
            </div>
            <div class="record">
                <p>Śr</p>
            </div>
            <div class="record">
                <p>Czw</p>
            </div>
            <div class="record">
                <p>Pt</p>
            </div>
            <div class="record">
                <p>Sb</p>
            </div>
            <div class="record">
                <p>Nd</p>
            </div>

            <div class="record">
                <p>7:00</p>
            </div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>

            <div class="record">
                <p>8:00</p>
            </div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>

            <div class="record">
                <p>9:00</p>
            </div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"> </div>

            <div class="record">
                <p>10:00</p>
            </div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record">
                <p>11:00</p>
            </div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record">
                <p>12:00</p>
            </div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record">
                <p>13:00</p>
            </div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record">
                <p>14:00</p>
            </div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record">
                <p>15:00</p>
            </div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record">
                <p>16:00</p>
            </div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record">
                <p>17:00</p>
            </div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record">
                <p>18:00</p>
            </div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record">
                <p>19:00</p>
            </div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record">
                <p>20:00</p>
            </div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record">
                <p>21:00</p>
            </div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record">
                <p>22:00</p>
            </div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>
            <div class="record"></div>


        </div>
    </div>

    <div class="settle">Rozlicz</div>

</body>

</html>