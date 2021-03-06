<?php
session_start();
require_once "connect.php";
if(!isset($_SESSION['logIn'])){
    header('Location: index.php');
    exit();
}else{
    if($_SESSION['admin']){
        header('Location: adminKursanci.php');
        exit();
    }
}

if(isset($_GET['id'])){
    $idj = $_GET['id'];
    $_SESSION['rid']=$idj;
}
$idu=$_SESSION['id'];
$imie;
$nazwisko;

$czydane=true;
if(isset($_POST['tankowanie'])){
    $tank = $_POST['tankowanie'];
}else{
    $czydane=false;
}
if(isset($_POST['zrealizowano'])){
    $zrea = $_POST['zrealizowano'];
}else{
    $czydane=false;
}
if(isset($_POST['rodzaj'])){
    $rodz = $_POST['rodzaj'];
}else{
    $czydane=false;
}
if(isset($_POST['wplata'])){
    $wplata = $_POST['wplata'];
}else{
    $czydane=false;
}
if(isset($_POST['wydatki'])){
    $wydatki = $_POST['wydatki'];
}else{
    $czydane=false;
}
$conn = @new mysqli($host, $db_user, $db_pass, $db_name);
$conn->query("SET NAMES 'utf8'");
if($conn->connect_errno!=0){
    $con=false;
}else{
    $con=true;
}

if($con){
    $id=$_SESSION['id'];
    $zap = 'SELECT * FROM jazdy WHERE id="'.$idj.'" and id_instruktora='.$idu.'';
    $rezu=$conn->query($zap);
    if(!$rezu){
    }else{
        $ile = $rezu->num_rows;
        if($ile>0){
            $row = $rezu->fetch_assoc();
            $ido = $row['id_kursanta'];
            $data = $row['data_jazdy'];
            $zap = 'SELECT * FROM kursanci WHERE id="'.$ido.'"';
            $osoba=$conn->query($zap);
            if(!$osoba){
            }else{
                $ileo = $osoba->num_rows;
                if($ileo>0){
                    $osobarow=$osoba->fetch_assoc();
                    $imie = $osobarow['imie'];
                    $nazwisko = $osobarow['surname'];
                }
            }
        }
    }
    if($czydane){
        if($conn->connect_errno!=0){
            header('Location: rozliczDzien.php');
            exit();
        }else{
            $zap = 'INSERT INTO rozliczeniaJazd VALUES(NULL, \''.$idu.'\', \''.$ido.'\', \''.$idj.'\', \''.$tank.'\', '.$zrea.', NULL, "'.$data.'")';
            if($conn->query($zap)){}
            if($tank==2){
                $zap = 'SELECT * FROM jazdy WHERE id="'.$idj.'';
                $rezu=$conn->query($zap);
                if(!$rezu){
                }else{
                    $ile = $rezu->num_rows;
                    if($ile>0){
                        $row = $rezu->fetch_assoc();
                        $idpoj = $row['id_pojazdu'];
                        $datatank = $row['data_jazdy'];
                        $zap = 'INSERT INTO tankowanie VALUES(NULL, \''.$idpoj.'\', \''.$idu.'\', \''.$idj.'\', '.$datatank.')';
                        if($conn->query($zap)){                   
                        }else{
                        } 
                    }
                }      
            }
            $zap = 'SELECT * FROM rozliczeniaJazd WHERE id_uzytkownika="'.$idu.'" and id_jazdy='.$idj.'';
            $rezu=$conn->query($zap);
            if(!$rezu){
            }else{
                $ile = $rezu->num_rows;
                if($ile>0){
                    $row = $rezu->fetch_assoc();
                    $idroz = $row['id'];
                }
            }
            if($wplata>0){
                $zap = 'INSERT INTO wplaty VALUES(NULL, '.$idu.', '.$ido.', '.$idroz.', '.$wplata.', NULL)';
                if($conn->query($zap)){                   
                }else{
                }
            }
            if($wydatki>0){
                
                $zap = 'INSERT INTO wydatki VALUES(NULL, \''.$idu.'\', \''.$idroz.'\', \''.$rodz.'\', \''.$wydatki.'\', NULL)';
                if($conn->query($zap)){                   
                }
            }
        }

    }    
}





?>




<!DOCTYPE html>
<html lang="en">

<head>
<?php if($czydane){
    echo '<meta http-equiv="refresh" content="0; url=rozliczDzien.php">';
    }?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel rozliczania jazd</title>
    <link href="https://fonts.googleapis.com/css2
    ?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2e3d9b3214.js"></script>
    <link rel="stylesheet" href="./css/main.css">
</head>

<body>
<nav class="topbar">
        <a href="kalendarzTydzien.php" class="logo">
            <img src="css/MotoLka.png" alt="motoelka logo">
        </a>
        <ul class="menu">
            <li>
                <a href="kalendarzTydzien.php">
                    <i class="fas fa-calendar-day"></i>
                </a>
            </li>
            <li>
                <a href="szukaj.php">
                    <i class="fas fa-search"></i>
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>
    </nav>

    <form method="post" class="containerR">
        
            <h1 class="headingR">Panel rozliczania jazd</h1>
            <input type="text" placeholder="Imi??..." class="nameR" name="imie"<?php if(isset($imie)){ echo 'value="'.$imie.'" disabled';}?>>
            <input type="text" placeholder="Nazwisko..." class="surnameR" name="nazwisko"<?php if(isset($nazwisko)){ echo 'value="'.$nazwisko.'" disabled';}?>>
            <input type="text" placeholder="Dzie??..." class="dayR" name="day"<?php if(isset($data)){ echo 'value="'.$data.'" disabled';}?>>
            <div class="fuel">
                <p class="text">Tankowanie</p>
                <select class="custom-select" name="tankowanie">
                    <option value="1" >Nie</option>
                    <option value="2">Tak</option>
                </select>
            </div>
            <div class="rideRealized">
                <p class="text">Jazda zrealizowana</p>
                <select class="custom-select" name="zrealizowano">
                    <option value="1">Tak</option>
                    <option value="2">Nie</option>
                </select>
            </div>
            <div class="kind">
                <p class="text">Rodzaj wydatku</p>
                <select class="custom-select" name="rodzaj">
                    <option value="1" select="selected">Brak</option>
                    <option value="2">Paliwo</option>
                    <option value="3">Myjnia</option>
                    <option value="4">Inne</option>
                </select>
            </div>
            <input type="text" placeholder="Wydatek..." class="expenses"name="wydatki" >
            <input type="text" placeholder="Wp??ata..." class="payment" name="wplata" >
            <div class="traningForm">
                <p class="text">Formularz szkoleniowy</p>
                <select class="custom-select">
                </select>
            </div>
            <textarea placeholder="Napisz co??..."class="additionalInfo2"></textarea>
            <button type="submit" class="settleRide">
                <p>Rozlicz jazd??</p>
            </button>
    </form>
    <!-- <a href="kalendarzTydzien.php" class="backToCalendar">
        <i class="fas fa-calendar-day"></i>
    </a> -->
</body>
<?php
$conn -> close();
?>
</html>