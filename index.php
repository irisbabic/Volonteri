<?php
include_once ("conn.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kor_ime = test_input($_POST['kor_ime']);
    $zaporka = test_input($_POST['zaporka']);
    $sql = "SELECT * FROM ck_volonteri.administratori WHERE zaporka='$zaporka'";

    $result = $conn->query($sql);
    while($row = mysqli_fetch_array($result)){
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $kor_ime;
        header("Location: admin.php");
    }
    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
  mysqli_free_result($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Početna</title>
    <?php include_once ("head.php");?>
</head>
<body>
<div class="w3-bar w3-black w3-opacity-min">
    <a href="#" class="w3-bar-item w3-button w3-mobile w3-left w3-large"><img src="img/logo.png" alt="logo" width="40px" height="40px"></a>
    <a href="#" class="w3-bar-item w3-button w3-mobile w3-right w3-large">Prijava</a>
    <a href="#" class="w3-bar-item w3-button w3-mobile w3-right w3-large">Kontakt</a>
</div>
<header class="w3-display-container w3-content w3-wide" style="max-width: 1500px;" id="home">
    <img class="w3-image banner" src="img/volimo.png" alt="volontiranje">
    <div class="w3-display-topleft w3-margin-top w3-center">
        <h1 class="w3-text-white w3-right-align"><span class="w3-padding-small w3-black w3-opacity-min"><b>Volonteri</b></span><span
                    class="w3-hide-small" style="color: black;">  Gradskog društva<br>Crvenog križa Opatija</span></h1>
    </div>
</header>
<div class="w3-display-container">
    <div class="w3-row-padding">
        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-display-container">

            </div>
        </div>
        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-display-container">
                <div class="w3-card w3-container w3-center" style="min-height:360px; background-color: #f4f5f7">
                    <h3><strong>Događanja</strong></h3><br>
                    <i class="far fa-calendar-check fa-5x w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
                    <p>Pregled svih volonterskih događanja</p>
                    <p>u organizacijii <strong>Gradskog društva</p>
                    <p>Crvenog križa Opatija </strong> i događanja</p>
                    <p>u kojima sudjeluju naši volonteri!</p>
                </div>
            </div>
        </div>
        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-card w3-container w3-center" style="min-height:360px; background-color: #f4f5f7">
                <h3><strong>Galerija</strong></h3><br>
                <i class="far fa-image fa-5x w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
                <p>Galerija slika sa događanja</p>
                <p>u kojima su sudjelovali volonteri</p>
                <p><strong>Gradskog društva Crvenog križa Opatija.</strong></p>
            </div>
        </div>
        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-display-container">

            </div>
        </div>
    </div>

</div>
<hr>
<br>
<div class="w3-display-container w3-padding-16">
    <div class="w3-display-middle" style="max-width: 50%">
        <button onclick="document.getElementById('id02').style.display='block'"
                class="w3-button w3-green w3-xlarge w3-round-large w3-hover-blue">Prijava
        </button>
    </div>
</div>
<br>
<div id="id02" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-bottom  w3-center" style="max-width: 50%; margin: auto;">
        <header class="w3-container w3-black w3-opacity-min">
      <span onclick="document.getElementById('id02').style.display='none'"
            class="w3-button w3-display-topright">&times;</span>
            <h2>Prijava</h2>
        </header>
        <div class="w3-container">
            <br>
            <form action="index.php" method="POST">
                <div class="w3-section">
                    <input class="w3-input" type="text" name="kor_ime" required>
                    <label>Korisničko ime</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input" type="password" name="zaporka" required>
                    <label>Zaporka</label>
                </div>
                <button class="w3-button w3-white w3-xlarge w3-round-large w3-hover-green" type="submit" name="submit">
                    <i class="fas fa-check fa-5x" style="font-size:50px"></i></button>
            </form>
        </div>
        <footer class="w3-container w3-black w3-opacity-min">
            <p></p>
        </footer>
    </div>
</div>
<div class="w3-display-container w3-center w3-black w3-opacity-min" id="footer">

    <a href="#" class="w3-bar-item w3-mobile w3-large"><img src="img/logo.png" alt="logo" width="40px"
                                                            height="40px"></a>
    <a href="#" class="w3-bar-item w3-mobile w3-large">Gradsko društvo Crvenog križa Opatija</a>
</div>
</body>
</html>

