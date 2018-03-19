<?php
include_once ("check.php");
include_once ("conn.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Volonteri</title>
    <?php include_once ("head.php"); ?>
</head>
<body>
<?php include_once ("navBar.php"); ?>
<div class="w3-container w3-center">
    <h1>Izvješće za <?php echo $god ?>. godinu</h1>
</div>
<br>

<table class="w3-table-all w3-hoverable w3-centered" style="width: 90%; margin: auto;">
    <thead>
    <tr class="w3-red w3-opacity-min">
        <th>Datum</th>
        <th>Početak</th>
        <th>Kraj</th>
        <th>Ukupno</th>
        <th>Opis</th>
        <th>Sudjelovali</th>
    </tr>
    </thead>
    <?php

    $sql2 = "SELECT * FROM ck_volonteri.aktivnost";
    $result2 = $conn->query($sql2);

    while ($row = mysqli_fetch_array($result2)) {
        $datum = $row['datum'];
        $datum = explode("-", $datum);
        if ($datum[0] == $god) {
            $ukupno = $row['ukupno'];
            $ukupno = explode(":", $ukupno);
            ?>
            <tr>
                <td><?php echo $datum[2] . "." . $datum[1] . "." . $datum[0] . "." ?></td>
                <td><?php echo $row['pocetak'] ?></td>
                </td>
                <td><?php echo $row['kraj'] ?></td>
                <td><?php echo $ukupno[0] . "h " . $ukupno[1] . "min" ?></td>
                <?php
                $zbrojSati += intval($ukupno[0]);
                $zbrojMinuta += intval($ukupno[1]);
                if ($zbrojMinuta >= 60) {
                    $zbrojSati += 1;
                    $zbrojMinuta -= 60;
                }
                ?>
                <td><?php echo $row['opis'] ?></td>
                <td><?php echo $row['sudjelovali'] ?></td>
            </tr>
            <?php
        }
    } ?>
    <thead>
    <tr class="w3-red w3-opacity-min">
        <th>Ukupan broj sati volontiranja:</th>
        <th> <?php echo $zbrojSati . 'h ' . $zbrojMinuta . 'min' ?></th>
    </tr>
    </thead>
</table>

<div class="w3-container" style="max-width: 98%; margin: auto">
    <br>
    <table class="w3-table-all w3-hoverable w3-centered" style="max-width: 95%">
        <thead>
        <tr class="w3-red w3-opacity-min">
            <th>Redni br.</th>
            <th>Prezime</th>
            <th>Ime</th>
            <th>OIB</th>
            <th>Spol</th>
            <th>Datum r.</th>
            <th>E-mail</th>
            <th>Dob</th>
            <th>Adresa</th>
            <th>Grad</th>
            <th>Dodatno obrazovanje</th>
            <th>Član od</th>
            <th>Dostupnost</th>
            <th>Državljanstvo</th>
            <th>Mjesto rođenja</th>
            <th>Zanimanje</th>
            <th>Telefon</th>
            <th>Stručna sprema</th>
            <th>Radni status</th>
            <th>Aktivnost</th>
            <th>Interes</th>
            <th>Uloga</th>
        </tr>
        </thead>
        <?php

        $sql = "SELECT * FROM ck_volonteri.volonter ORDER BY prezime";
        $result = $conn->query($sql);

        //deklaracija varijabli za statistiku
        $brVolontera = 1;
        $brZena = 0;
        $brMuskaraca = 0;
        $prvaSkupina = 0;
        $drugaSkupina = 0;
        $trecaSkupina = 0;
        $cetvrtaSkupina = 0;
        $petaSkupina = 0;
        $sestaSkupina = 0;
        $hrvatskoD = 0;
        $stranoD = 0;
        $pasivan = 0;
        $aktivan = 0;
        $nk = 0;
        $nss = 0;
        $kv = 0;
        $sss = 0;
        $vk = 0;
        $spec = 0;
        $vss = 0;
        $mag = 0;
        $dr = 0;

        while ($row = mysqli_fetch_array($result)) {
        $datumR = $row['datum_rodjenja'];
        $datumR = explode("-", $datumR);
        $clanOd = $row['uclanjenje'];
        $clanOd = explode("-", $clanOd);
        if($clanOd[0] == $god) {
        ?>
        <tr>
            <td><?php echo $brVolontera ?>.</td>
            <td><?php echo $row['prezime'] ?>
            <td><?php echo $row['ime'] ?></td>
            <td><?php echo $row['oib'] ?></td>
            <td><?php echo $row['spol'] ?></td>
            <td><?php echo $datumR[2] . "." . $datumR[1] . "." . $datumR[0] . "." ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php
                $dob = dob($datumR[2], $datumR[1], $datumR[0]);
                echo $dob; ?></td>
            <td><?php echo $row['adresa'] ?></td>
            <td><?php echo $row['grad'] ?></td>
            <td><?php echo $row['dodatnoObr'] ?></td>
            <td><?php echo $clanOd[2] . "." . $clanOd[1] . "." . $clanOd[0] . "." ?></td>
            <td><?php echo $row['dostupnost'] ?></td>
            <td><?php echo $row['drzavljanstvo'] ?></td>
            <td><?php echo $row['mjestoR'] ?></td>
            <td><?php echo $row['zanimanje'] ?></td>
            <td><?php echo $row['telefon'] ?></td>
            <td><?php echo $row['strucnaSp'] ?></td>
            <td><?php echo $row['radniSt'] ?></td>
            <td><?php echo $row['aktivnost'] ?></td>
            <td><?php echo $row['interes']; ?></td>
            <td><?php echo $row['uloga'] ?></td>
            <?php
            $brVolontera++;

            //koliko ima zena, a koliko muskaraca
            if ($row['spol'] == "ž") {
                $brZena += 1;
            } elseif ($row['spol'] == "m") {
                $brMuskaraca += 1;
            }

            //broj volontera po dobnim skupinama
            if ($dob > 0 && $dob <= 14) {
                $prvaSkupina += 1;
            } elseif ($dob >= 15 && $dob <= 17) {
                $drugaSkupina += 1;
            } elseif ($dob >= 18 && $dob <= 30) {
                $trecaSkupina += 1;
            } elseif ($dob >= 31 && $dob <= 45) {
                $cetvrtaSkupina += 1;
            } elseif ($dob >= 46 && $dob <= 65) {
                $petaSkupina += 1;
            } else {
                $sestaSkupina += 1;
            }

            //broj volontera prema drzavljanstvu
            if ($row['drzavljanstvo'] == 'hrvatsko' || $row['drzavljanstvo'] == 'Hrvatsko') {
                $hrvatskoD += 1;
            } else {
                $stranoD += 1;
            }

            //broj aktivnih i pasivnih članova
            if ($row['aktivnost'] == 'aktivan') {
                $aktivan += 1;
            } else {
                $pasivan += 1;
            }

            //broj volontera prema razini obrazovanja
            switch ($row['strucnaSp']) {
                case'nk':
                    $nk += 1;
                    break;
                case'nss':
                    $nss += 1;
                    break;
                case'kv':
                    $kv += 1;
                    break;
                case'sss':
                    $sss += 1;
                    break;
                case'vk':
                    $vk += 1;
                    break;
                case'všs':
                    $spec += 1;
                    break;
                case'vss':
                    $vss += 1;
                    break;
                case'mag':
                    $mag += 1;
                    break;
                case'dr':
                    $dr += 1;
                    break;
            }
            }
            } ?>
    </table>
    <br>
    <br>
    <button onclick="myFunction('Demo1')" class="w3-button w3-red w3-opacity-min" style="width: 40%">
        Ukupan broj volontera
    </button>

    <div id="Demo1" class="w3-hide w3-container w3-light-grey" style="width: 40%">
        <p class="w3-center w3-margin-top"><?php
            $brVolontera--;
            echo $brVolontera; ?></p>
    </div>
    <br>
    <button onclick="myFunction('Demo2')" class="w3-button w3-red w3-opacity-min" style="width: 40%">
        Ukupan broj ženskih i muških volontera
    </button>

    <div id="Demo2" class="w3-hide w3-container w3-light-grey" style="width: 40%">
        <p class="w3-center w3-margin-top">
            Ukupan broj žena: <?php
            echo $brZena; ?></p>
        <p class="w3-center w3-margin-top">
            Ukupan broj muškaraca: <?php
            echo $brMuskaraca; ?>
    </div>
    <br>
    <button onclick="myFunction('Demo3')" class="w3-button w3-red w3-opacity-min" style="width: 40%">
        Broj volontera po dobnim skupinama
    </button>

    <div id="Demo3" class="w3-hide w3-container w3-light-grey" style="width: 40%">
        <p class="w3-center w3-margin-top">
            Broj uključenih volontera prema dobi (0-14): <?php
            echo $prvaSkupina; ?></p>
        <p class="w3-center w3-margin-top">
            Broj uključenih volontera prema dobi (15-17): <?php
            echo $drugaSkupina; ?></p>
        <p class="w3-center w3-margin-top">
            Broj uključenih volontera prema dobi (18-30): <?php
            echo $trecaSkupina; ?></p>
        <p class="w3-center w3-margin-top">
            Broj uključenih volontera prema dobi (31-45): <?php
            echo $cetvrtaSkupina; ?></p>
        <p class="w3-center w3-margin-top">
            Broj uključenih volontera prema dobi (46-65): <?php
            echo $petaSkupina; ?></p>
        <p class="w3-center w3-margin-top">
            Broj uključenih volontera prema dobi (66 i više): <?php
            echo $sestaSkupina; ?></p>
    </div>
    <br>
    <button onclick="myFunction('Demo4')" class="w3-button w3-red w3-opacity-min" style="width: 40%">
        Broj volontera prema državljanstvu
    </button>

    <div id="Demo4" class="w3-hide w3-container w3-light-grey" style="width: 40%">
        <p class="w3-center w3-margin-top">
            Broj hrvatskih državljana volontera: <?php
            echo $hrvatskoD; ?></p>
        <p class="w3-center w3-margin-top">
            Broj stranih državljana volontera: <?php
            echo $stranoD; ?></p>
    </div>
    <br>
    <button onclick="myFunction('Demo5')" class="w3-button w3-red w3-opacity-min" style="width: 40%">
        Broj aktivnih i pasivnih volontera
    </button>

    <div id="Demo5" class="w3-hide w3-container w3-light-grey" style="width: 40%">
        <p class="w3-center w3-margin-top">
            Broj aktivnih volontera: <?php
            echo $aktivan; ?></p>
        <p class="w3-center w3-margin-top">
            Broj pasivnih volontera: <?php
            echo $pasivan; ?></p>
    </div>
    <br>
    <button onclick="myFunction('Demo6')" class="w3-button w3-red w3-opacity-min" style="width: 40%">
        Broj volontera po stupnju obrazovanja
    </button>

    <div id="Demo6" class="w3-hide w3-container w3-light-grey" style="width: 40%">
        <p class="w3-center w3-margin-top">
            Broj volontera sa NK (I. niža stručna sprema): <?php
            echo $nk; ?></p>
        <p class="w3-center w3-margin-top">
            Broj volontera sa PK, NSS (II. niža stručna sprema): <?php
            echo $nss; ?></p>
        <p class="w3-center w3-margin-top">
            Broj volontera saKV (III. srednja stručna sprema): <?php
            echo $kv; ?></p>
        <p class="w3-center w3-margin-top">
            Broj volontera sa KV, SSS (IV. srednja stručna sprema, 3-godišnja škola): <?php
            echo $sss; ?></p>
        <p class="w3-center w3-margin-top">
            Broj volontera sa VK (V. srednja stručna sprema – 4-godišnja škola): <?php
            echo $vk; ?></p>
        <p class="w3-center w3-margin-top">
            Broj volontera sa VŠS (VI/1. i VI/2. viša stručna sprema ili specijalist): <?php
            echo $spec; ?></p>
        <p class="w3-center w3-margin-top">
            Broj volontera sa VSS (VII/1. visoka stručna sprema / magistar struke): <?php
            echo $vss; ?></p>
        <p class="w3-center w3-margin-top">
            Broj volontera sa titulom magistar (VII/2. magistar znanosti): <?php
            echo $mag; ?></p>
        <p class="w3-center w3-margin-top">
            Broj volontera sa titulom doktor (VIII. doktor znanosti): <?php
            echo $dr; ?></p>
    </div>
</div>


<!-- modal za izbor kriterija sortiranja -->
<br>
<div class="w3-container">
    <div id="sort" class="w3-modal" role="form" data-backdrop=false>
        <div class="w3-modal-content">

            <header class="w3-container w3-red w3-opacity-min">
      <span onclick="document.getElementById('sort').style.display='none'"
            class="w3-button w3-display-topright">&times;</span>
                <h2>Izbor kriterija za sortiranje</h2>
            </header>

            <div class="w3-container" style="overflow: scroll; max-height: 400px;">
                <form action="sort.php" method="POST">
                    <div class="w3-row w3-left-align">

                        <input id="ime" class="w3-radio" type="radio" name="sort" value="ime" checked>
                        <label>Ime</label>
                        <br>
                        <input id="spol" class="w3-radio" type="radio" name="sort" value="spol">
                        <label>Spol</label>
                        <br>
                        <input id="grad" class="w3-radio" type="radio" name="sort" value="grad">
                        <label>Grad</label>
                        <br>
                        <input id="drzavljanstvo" class="w3-radio" type="radio" name="sort" value="drzavljanstvo">
                        <label>Državljanstvo</label>
                        <br>
                        <input id="zanimanje" class="w3-radio" type="radio" name="sort" value="zanimanje">
                        <label>Zanimanje</label>
                        <br>
                        <input id="aktivnost" class="w3-radio" type="radio" name="sort" value="aktivnost">
                        <label>Aktivnost</label>
                        <br>
                        <input id="interes" class="w3-radio" type="radio" name="sort" value="interes">
                        <label>Interes</label>
                        <br>
                        <input id=dostupnost" class="w3-radio" type="radio" name="sort" value="dostupnost">
                        <label>Dostupnost</label>
                        <br>
                        <input id="strucnaSprema" class="w3-radio" type="radio" name="sort" value="strucnaSprema">
                        <label>Stručna sprema</label>
                        <br>
                    </div>

                    <footer class="w3-container w3-red w3-opacity-min w3-center">
                        <button class="w3-button w3-white w3-xlarge w3-round-large w3-hover-green w3-margin"
                                type="submit" name="submit"><i class="fas fa-check fa-3x" style="font-size:30px"></i>
                        </button>
                    </footer>
                </form>
            </div>
        </div>
    </div>
</div>
<br>

<?php
mysqli_free_result($result);
mysqli_free_result($result2);
$conn->close();
?>
<br>
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
<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "addVolonter.php";
    };
</script>

</body>
</html>
