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
            <form method="POST" action="allVolonteri.php">
                <div class="w3-section">
                    <input class="w3-input" type="text" name="oib" required>
                    <label>OIB</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input" type="text" name="ime" required>
                    <label>Ime</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input" type="text" name="prezime" required>
                    <label>Prezime</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input" type="text" name="email" required>
                    <label>Email</label>
                </div>
                <div class="w3-row">
                    <input id="musko" class="w3-radio" type="radio" name="spol" value="m" checked>
                    <label>Muško</label>
                    <br>
                    <input id="zensko" class="w3-radio" type="radio" name="spol" value="ž">
                    <label>Žensko</label>
                    <br>
                </div>
                <div class="w3-section">
                    <input class="w3-input w3-center" type="date" name="datumR" required>
                    <label>Datum rođenja</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input" type="text" name="mjestoR" required>
                    <label>Mjesto rođenja</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input" type="text" name="adresa" required>
                    <label>Adresa</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input" type="text" name="grad" required>
                    <label>Grad</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input" type="text" name="drzavljanstvo" required>
                    <label>Državljanstvo</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input" type="tel" name="brojTel">
                    <label>Broj telefona</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input" type="text" name="zanimanje">
                    <label>Zanimanje</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input" type="text" name="dodatnoObr">
                    <label>Dodatno obrazovanje</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input w3-center" type="date" name="uclanjenje">
                    <label>Član od:</label>
                </div>
                <hr>
                Radni status
                <div class="w3-row">

                    <input id="zaposlen" class="w3-radio" type="radio" name="radniStatus" value="Zaposlen" checked>
                    <label>Zaposlen</label>
                    <br>
                    <input id="nezaposlen" class="w3-radio" type="radio" name="radniStatus" value="Nezaposlen">
                    <label>Nezaposlen</label>
                    <br>
                    <input id="ucenik" class="w3-radio" type="radio" name="radniStatus" value="Učenik">
                    <label>Učenik</label>
                    <br>
                    <input id="student" class="w3-radio" type="radio" name="radniStatus" value="Student">
                    <label>Student</label>
                    <br>
                    <input id="umirovljenik" class="w3-radio" type="radio" name="radniStatus" value="Umirovljenik">
                    <label>Umirovljenik</label>
                    <br>
                </div>
                <hr>

                Razina obrazovanja
                <div class="w3-row">

                    <input id="nk" class="w3-radio" type="radio" name="strucnaSprema" value="NK" checked>
                    <label>NK (I. niža stručna sprema)</label>
                    <br>
                    <input id="nss" class="w3-radio" type="radio" name="strucnaSprema" value="NSS">
                    <label>PK, NSS (II. niža stručna sprema)</label>
                    <br>
                    <input id="kv" class="w3-radio" type="radio" name="strucnaSprema" value="KV">
                    <label>KV (III. srednja stručna sprema)</label>
                    <br>
                    <input id="sss" class="w3-radio" type="radio" name="strucnaSprema" value="SSS">
                    <label>KV, SSS (IV. srednja stručna sprema, 3-godišnja škola)</label>
                    <br>
                    <input id="vk" class="w3-radio" type="radio" name="strucnaSprema" value="VK">
                    <label>VK (V. srednja stručna sprema – 4-godišnja škola)</label>
                    <br>
                    <input id="spec" class="w3-radio" type="radio" name="strucnaSprema" value="VŠS">
                    <label>VŠS (VI/1. i VI/2. viša stručna sprema ili specijalist)</label>
                    <br>
                    <input id="vss" class="w3-radio" type="radio" name="strucnaSprema" value="VSS">
                    <label>VSS (VII/1. visoka stručna sprema / magistar struke)</label>
                    <br>
                    <input id=mag" class="w3-radio" type="radio" name="strucnaSprema" value="MAG">
                    <label>Magistar (VII/2. magistar znanosti)</label>
                    <br>
                    <input id="dr" class="w3-radio" type="radio" name="strucnaSprema" value="DR">
                    <label>Doktor (VIII. doktor znanosti)</label>
                    <br>
                </div>
                <hr>
                Koliko vremena možete izdvojiti za volonterski rad?
                <div class="w3-row">
                    <input id="jt" class="w3-radio" type="radio" name="dostupnost" value="Jednom tjedno" checked>
                    <label>Jednom tjedno</label>
                    <br>
                    <input id="vm" class="w3-radio" type="radio" name="dostupnost" value="Više puta mjesečno">
                    <label>Više puta mjesečno</label>
                    <br>
                    <input id="jm" class="w3-radio" type="radio" name="dostupnost" value="Jednom mjesečno">
                    <label>Jednom mjesečno</label>
                    <br>
                    <input id="pp" class="w3-radio" type="radio" name="dostupnost" value="Po potrebi">
                    <label>Po potrebi</label>
                    <br>
                </div>
                <hr>
                Glavni interesi:
                <div class="w3-row">
                    <input class="w3-check" type="checkbox" name="interes[]"
                           value="Sudjelovanje u provedbi zdravstveno preventivnih aktivnosti">
                    <label>Sudjelovanje u provedbi zdravstveno preventivnih aktivnosti</label>
                    <br>
                    <input class="w3-check" type="checkbox" name="interes[]"
                           value="Provedba redovnih zajedničkih akcija HCK">
                    <label>Provedba redovnih zajedničkih akcija HCK</label>
                    <br>
                    <input class="w3-check" type="checkbox" name="interes[]" value="Socijalni programi u GDCK Opatija">
                    <label>Socijalni programi u GDCK Opatija</label>
                    <br>
                    <input class="w3-check" type="checkbox" name="interes[]" value="Rad s mladima">
                    <label>Rad s mladima</label>
                    <br>
                    <input class="w3-check" type="checkbox" name="interes[]" value="Mediji">
                    <label>Mediji</label>
                    <br>
                    <input class="w3-check" type="checkbox" name="interes[]" value="Promidžba davalaštva krvi">
                    <label>Promidžba davalaštva krvi</label>
                    <br>
                    <input class="w3-check" type="checkbox" name="interes[]" value="Služba traženja-tečaj">
                    <label>Služba traženja-tečaj</label>
                    <br>
                    <input class="w3-check" type="checkbox" name="interes[]"
                           value="Edukacija u pružanju prve pomoći kao člana tima za izvanredne situacije">
                    <label>Edukacija u pružanju prve pomoći kao člana tima za izvanredne situacije</label>
                    <br>
                    <input class="w3-check" type="checkbox" name="interes[]"
                           value="Član tima za logistiku u izvanrednim situacijama">
                    <label>Član tima za logistiku u izvanrednim situacijama</label>
                </div>
                <hr>
                Aktivan ili pasivan član:
                <div class="w3-row">

                    <input id="aktivan" class="w3-radio" type="radio" name="aktivnost" value="Aktivan" checked>
                    <label>Aktivan</label>
                    <br>
                    <input id="pasivan" class="w3-radio" type="radio" name="aktivnost" value="Pasivan">
                    <label>Pasivan</label>
                    <br>
                    <input id="potporan" class="w3-radio" type="radio" name="aktivnost" value="Potporni">
                    <label>Potporni</label>
                    <br>
                    <input id="pocasni" class="w3-radio" type="radio" name="aktivnost" value="Počasni">
                    <label>Počasni</label>
                    <br>
                </div>
                <hr>
                Volonter:
                <div class="w3-row">

                    <input id="volonter" class="w3-radio" type="radio" name="uloga" value="Da" checked>
                    <label>Da</label>
                    <br>
                    <input id="volonter" class="w3-radio" type="radio" name="uloga" value="Ne">
                    <label>Ne</label>

                    <br>
                </div>
            <hr>
            Članstvo:
            <div class="w3-row">

                <input id="k60" class="w3-radio" type="radio" name="clanstvo" value="k60" checked>
                <label>Klub 60+</label>
                <br>
                <input id="knz" class="w3-radio" type="radio" name="clanstvo" value="knz">
                <label>Klub "Novi Život"</label>
                <br>
            </div>
                <hr>
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

