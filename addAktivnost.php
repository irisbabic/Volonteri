<?php
include_once ("check.php");
include_once ("conn.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dodavanje</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once ("head.php");?>
</head>
<body>
<?php include_once ("navBar.php"); ?>
<div class="w3-content w3-center" style="max-width: 1000px; margin: auto">
<div class="w3-card-4">
    <?php
    $sql = "SELECT ime, prezime FROM ck_volonteri.volonter";
    $result = $conn->query($sql);
    if($conn->query($sql)== FALSE){
        echo 'Error:'.mysqli_error($conn);
    }
    ?>
    <p><form method="POST" action="allAktivnosti.php" >
        <div class="w3-section">
            <input class="w3-input w3-center" type="date" name="datum" required placeholder="Unesite datum volontiranja">
            <label>Datum aktivnosti</label>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-center" type="time" name="pocetak" required placeholder="Unesite vrijeme početka volontiranja">
            <label>Početak aktivnosti</label>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-center" type="time" name="kraj" required placeholder="Unesite vrijeme završetka volontiranja">
            <label>Kraj aktivnosti</label>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-center" type="text" name="opis" placeholder="Unesite opis aktivnosti">
            <label>Opis</label>
        </div>
        Vrsta aktivnosti:
        <div class="w3-row">

            <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Administrativne usluge" checked>
            <label>Administrativne usluge</label>
            <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Intelektualne usluge">
            <label>Intelektualne usluge</label>
            <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Socijalne usluge">
            <label>Socijalne usluge</label>
            <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Fizički poslovi ili usluge">
            <label>Fizički poslovi ili usluge</label>
            <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Drugo">
            <label>Drugo</label>

            <br>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-center" type="text" name="materijal">
            <label>Korišteni materijal</label>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-center" type="text" name="mjesto" placeholder="Unesite naziv mjesta održavanja aktivnosti">
            <label>Mjesto održavanja aktivnosti</label>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-center" type="text" name="sudjelovali" placeholder="Unesite imena i prezimena volontera odvojena zarezom">
            <label>Volonteri koji su sudjelovali</label>
        </div>
        <div class="w3-padding">
        <button class="w3-button w3-white w3-xlarge w3-round-large w3-hover-green" type="submit" name="submit"><i class="fas fa-check fa-5x" style="font-size:50px"></i></button>
    </div>
    </form></p>
</div></div>
<?php
mysqli_free_result($result);
$conn->close();
?>
<div class="w3-display-container w3-center w3-black w3-opacity-min" id="footer">

    <a href="#" class="w3-bar-item w3-mobile w3-large"><img src="img/logo.png" alt="logo" width="40px"
                                                            height="40px"></a>
    <a href="#" class="w3-bar-item w3-mobile w3-large">Gradsko društvo Crvenog križa Opatija</a>

</div>
</body>
</html>
