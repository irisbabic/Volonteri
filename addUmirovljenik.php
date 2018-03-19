<?php
include_once ("check.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Volonteri</title>
    <?php include_once ("head.php");?>
</head>
<body>
<?php include_once ("navBar.php");?>
<div class="w3-content w3-center" style="max-width: 1000px; margin: auto">
    <div class="w3-card-4">
        <p>
        <form method="POST" action="allUmirovljenici.php">
            <div class="w3-section">
                <input class="w3-input" type="text" name="JMBG">
                <label>JBMG</label>
            </div>
            <div class="w3-section">
                <input class="w3-input" type="text" name="brOI">
                <label>Broj osobne iskaznice</label>
            </div>
            <div class="w3-section">
                <input class="w3-input" type="text" name="oib">
                <label>OIB</label>
            </div>
            <div class="w3-section">
                <input class="w3-input" type="text" name="prezime">
                <label>Prezime</label>
            </div>
            <div class="w3-section">
                <input class="w3-input" type="text" name="ime">
                <label>Ime</label>
            </div>
            <div class="w3-section">
                <input class="w3-input w3-center" type="date" name="datumR">
                <label>Datum rođenja</label>
            </div>
            <div class="w3-section">
                <input class="w3-input" type="text" name="mjestoR">
                <label>Mjesto rođenja</label>
            </div>
            <div class="w3-section">
                <input class="w3-input" type="text" name="adresa">
                <label>Adresa</label>
            </div>
            <div class="w3-section">
                <input class="w3-input" type="tel" name="brojTel">
                <label>Broj kućnog telefona</label>
            </div>
            <div class="w3-section">
                <input class="w3-input" type="tel" name="brojMob">
                <label>Broj mobilnog telefona</label>
            </div>
            <div class="w3-section">
                <input class="w3-input" type="text" name="clanoviDom">
                <label>Broj članova domaćinstva</label>
            </div>
            <div class="w3-section">
                <input class="w3-input" type="text" name="zanimanje">
                <label>Zanimanje prije umirovljenja</label>
            </div>
            <div class="w3-section">
                <input class="w3-input" type="text" name="tvrtka">
                <label>Organizacija u kojoj je radio/la prije umirovljenja</label>
            </div>
            <div class="w3-section">
                <input class="w3-input" type="text" name="interes">
                <label>Sekcija u kojoj želi sudjelovati</label>
            </div>
            <div class="w3-section">
                <input class="w3-input w3-center" type="date" name="uclanjenje">
                <label>Datum učlanjenja</label>
            </div>
            <br>
            <div class="w3-padding">
                <button class="w3-button w3-white w3-xlarge w3-round-large w3-hover-green" type="submit" name="submit">
                    <i
                        class="fas fa-check fa-5x" style="font-size:50px"></i></button></div>
        </form>
        </p>
    </div>
</div>

<br>
<div class="w3-display-container w3-center w3-black w3-opacity-min" id="footer">

    <a href="#" class="w3-bar-item w3-mobile w3-large"><img src="img/logo.png" alt="logo" width="40px"
                                                            height="40px"></a>
    <a href="#" class="w3-bar-item w3-mobile w3-large">Gradsko društvo Crvenog križa Opatija</a>

</div>
<script type="text/javascript">
    function myFunction(id) {
        var x = document.getElementById(id);
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }
</script>
</body>
</html>

