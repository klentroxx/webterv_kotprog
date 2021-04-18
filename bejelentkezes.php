<?php
include_once "tartalom.php";
include_once "reg_session.php";

if(isset($_POST["login"])){
    if(isset($_POST["unamelogin"]) && isset($_POST["pwlogin"])){
        $loggedin=false;
        foreach ($_SESSION["registeredUsers"] as $userobj){
            if($userobj->getUsername()==$_POST["unamelogin"] && $userobj->getPassword() == $_POST["pwlogin"]){
                $loggedin=true;
                $_SESSION["user"]=$userobj;
                break;
            }
        }
        if(!$loggedin){
            die("<strong>Hiba: </strong> Hibás adat. <a href='bejelentkezes.php'>Vissza a bejeletkezeshez</a>");
        }
   }

}

if(isset($_POST["logout"])){
        session_unset();
        session_destroy();
}


?>

<!DOCTYPE html>
<html lang="hu" >
<head>
    <meta charset="UTF-8">
    <title>Bevásárló lista</title>
    <link rel="stlyesheet" href="style.css"/>
</head>
<body>
<header>
    <h1>Bevásárló Lista</h1>
    <nav>
        <ul>
            <li><a href="index.php">Főoldal</a></li>
            <li><a href="bevasarlas_cikk.php">Újságikk</a></li>
            <li><a href="bevasarlo_lista.php">Bevásárló Lista</a></li>
            <li><a href="terkep.php">Üzletek</a></li>
            <li><a href="regisztracio.php">Regisztráció</a></li>
        </ul>
    </nav>
</header>

<main>
<div id="profil">
    <h1>Saját profil</h1>
    <?php
        if(!isset($_SESSION["user"])){
            echo '
            <p>Jelentkezzen be!</p>
                <form id="login" action="bejelentkezes.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Bejelentkezés</legend>
                        <label for="unamelogin">Felhasználónév:</label>
                        <br/>
                        <input required type="text" id="unamelogin" name="unamelogin" tabindex="1"/>
                        <br/>
                        <br/>
                        <label for="pwlogin">Felhasználónév:</label>
                        <br/>
                        <input required type="password" id="pwlogin" name="pwlogin" tabindex="2" placeholder="********"/>
                        <br/>
                        <br/>
                        <input type="submit" value="Login" name="login"/>
                    </fieldset>
                </form>

            ';
        }else {
            echo '
                    //user kepe
                    <p>Név: ' . $_SESSION["user"]->getName();
            '</p>
                    <p>Felhasználónév: ' . $_SESSION["user"]->getUsername();
            '</p>
                    <form id="logout" action="index.php" method="post" enctype="multipart/form-data">
                    <input type="submit" value="Kijelentkezés" name="logout"/>
                    <br/>
                    <br/>
                    </form>
                ';

        }
    ?>
</div>
</main>
</body>
</html>



