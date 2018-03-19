<?php include_once ("check.php");?>
<!DOCTYPE html>
<html>
<head>
    <title>Dodavanje</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once ("head.php");?>
</head>
<body>
<?php include_once ("navBar.php");?>
<div class="w3-content w3-center" style="max-width: 1000px; margin: auto">
    <div class="w3-card-4">
        <p><form method="POST" action="allEvents.php" >
            <div class="w3-section">
                <input class="w3-input w3-center" type="date" name="datum" required placeholder="Unesite datum događaja">
                <label>Datum događaja</label>
            </div>
            <div class="w3-section">
                <input class="w3-input w3-center" type="text" name="naziv" required placeholder="Unesite naziv događaja">
                <label>Naziv događaja</label>
            </div>
            <div class="w3-section">
                <input class="w3-input w3-center" type="text" name="voditelj" placeholder="Unesite ime i prezime voditelja događaja">
                <label>Voditelj događaja</label>
            </div>
            <div class="w3-section">
                <input class="w3-input w3-center" type="text" name="mjesto" placeholder="Unesite mjesto održavanja događaja">
                <label>Mjesto održavanja</label>
            </div>
            <div class="w3-section">
                <input class="w3-input w3-center" type="text" name="opis" placeholder="Unesite opis događaja">
                <label>Opis događaja</label>
            </div>
            <div class="w3-section">
                <input class="w3-input w3-center" type="time" name="trajanje" required placeholder="Unesite trajanje događaja">
                <label>Trajanje događaja</label>
            </div>
            <div class="w3-padding">
            <button class="w3-button w3-white w3-xlarge w3-round-large w3-hover-green" type="submit" name="submit">
                <i class="fas fa-check fa-5x" style="font-size:50px"></i></button></div>
        </form></p>
    </div></div>
<div class="w3-display-container w3-center w3-black w3-opacity-min" id="footer">

    <a href="#" class="w3-bar-item w3-mobile w3-large"><img src="img/logo.png" alt="logo" width="40px"
                                                            height="40px"></a>
    <a href="#" class="w3-bar-item w3-mobile w3-large">Gradsko društvo Crvenog križa Opatija</a>

</div>
</body>
</html>
