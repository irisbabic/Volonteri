<?php
include_once ("check.php");
include_once("conn.php");
$ime = $prezime = $telefon = $drzavljanstvo = $dodatnoObr = $uclanjenje = $datumR = $mjestoR = $adresa = $grad = $zanimanje = $radniSt = $strucnaSp = $dostupnost = $interesi = $spol = $email = $aktivnost = $uloga = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = test_input($_POST["ime"]);
    $prezime = test_input($_POST["prezime"]);
    $oib = test_input($_POST["oib"]);
    if (strlen($oib) !== 11) {
        header("Location: addVolonter.php");
    }
    $telefon = test_input($_POST["brojTel"]);
    $drzavljanstvo = test_input($_POST["drzavljanstvo"]);
    $dodatnoObr = test_input($_POST["dodatnoObr"]);
    $uclanjenje = test_input($_POST['uclanjenje']);
    $datumR = test_input($_POST["datumR"]);
    $mjestoR = test_input($_POST["mjestoR"]);
    $adresa = test_input($_POST["adresa"]);
    $grad = test_input($_POST['grad']);
    $zanimanje = test_input($_POST["zanimanje"]);
    $radniSt = test_input($_POST["radniStatus"]);
    $strucnaSp = test_input($_POST["strucnaSprema"]);
    $dostupnost = test_input($_POST["dostupnost"]);
    $interesi = implode(',', $_POST['interes']);
    $spol = test_input($_POST["spol"]);
    $email = test_input($_POST['email']);
    $aktivnost = test_input($_POST['aktivnost']);
    $uloga = test_input($_POST['uloga']);
    $clanstvo = test_input($_POST['clanstvo']);

    $sql = "INSERT INTO ck_volonteri.volonter
VALUES ('" . $oib . "','" . $ime . "', '" . $spol . "','" . $prezime . "','" . $datumR . "','" . $email . "','" . $adresa . "','" . $dodatnoObr . "','$uclanjenje','" . $dostupnost . "','" . $drzavljanstvo . "','" . $mjestoR . "','" . $zanimanje . "','" . $telefon . "','" . $strucnaSp . "','" . $radniSt . "','" . $grad . "','$aktivnost','$interesi','$uloga','$clanstvo')";

    if ($conn->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } else {
        header("Location: allVolonteri.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Volonteri</title>
   <?php include_once ("head.php"); ?>
</head>
<body>
<?php include_once ("navBar.php"); ?>
<div class="w3-container" style="max-width: 98%; margin:auto">
    <br>
    <div class="w3-bar">
        <button class="w3-red w3-button w3-bar-item w3-opacity-min w3-left" id="myButton"><i
                    class="fas fa-plus fa-2x"></i></button>
        <button onclick="document.getElementById('sort').style.display='block'"
                class="w3-button w3-bar-item w3-red w3-opacity-min w3-large w3-right">Sortiraj po...
        </button>
        <div class="search-container w3-bar-item w3-right w3-large">
            <form method="post" action="prezime.php">
                <input type="text" placeholder="Pretraži po prezimenu" name="search">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
    <br>
    <table class="w3-table-all w3-hoverable" >
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
            <th>Volonter</th>
            <th>Članstvo</th>
            <th></th>
            <th></th>
            <th></th>
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
            ?>
            <tr>
                <td><?php echo $brVolontera ?>.</td>
                <td><?php echo $row['prezime']?></td>
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
                <td><?php //$interes = explode(',',
                    echo $row['interes'];
                    //foreach ($interes as $element){
                    //  echo $element.'<br>';
                    // } ?></td>
                <td><?php echo $row['uloga'] ?></td>
                <td><?php echo $row['clanstvo'] ?></td>
                <form method="GET" action="updateVolonter.php">
                    <input type="hidden" value="<?php echo $row['oib'] ?>" name="oib">
                    <td>
                        <button type="submit" name="submit"><i class='fas fa-edit '></i></button>
                    </td>
                </form>
                <td>
                    <form method="GET" action="deleteAllVolonter.php">
                        <input type="hidden" value="<?php echo $row['oib'] ?>" name="oib">
                        <button type="submit" name="submit"><i class='fas fa-trash'></i></button>
                    </form>
                </td>
                <td>
                    <form method="GET" action="viewVolonter.php">
                        <input type="hidden" value="<?php echo $row['oib'] ?>" name="oib">
                        <button type="submit" name="submit"><i class='fas fa-eye'></i></button>
                    </form>
                </td>
            </tr>

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
                case'NK':
                    $nk += 1;
                    break;
                case'NSS':
                    $nss += 1;
                    break;
                case'KV':
                    $kv += 1;
                    break;
                case'SSS':
                    $sss += 1;
                    break;
                case'VK':
                    $vk += 1;
                    break;
                case'VŠS':
                    $spec += 1;
                    break;
                case'VSS':
                    $vss += 1;
                    break;
                case'MAG':
                    $mag += 1;
                    break;
                case'DR':
                    $dr += 1;
                    break;
            }
        } ?>
    </table>
    <?php

    mysqli_free_result($result);
    $conn->close();
    ?>
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

            <div class="w3-container" style="overflow: scroll; max-height: 450px;">
                <form action="sort.php" method="POST">
                    <div class="w3-row w3-left-align">

                        <input id="ime" class="w3-radio" type="radio" name="sort" value="ime" checked>
                        <label>Ime</label>
                        <br>
                        <input id="ime" class="w3-radio" type="radio" name="sort" value="prezime" checked>
                        <label>Prezime</label>
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
                                type="submit" name="submit"><i class="far fa-check fa-3x" style="font-size:30px"></i>
                        </button>
                    </footer>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="w3-display-container w3-center w3-black w3-opacity-min" id="footer">

    <a href="#" class="w3-bar-item w3-mobile w3-large"><img src="img/logo.png" alt="logo" width="40px"
                                                            height="40px"></a>
    <a href="#" class="w3-bar-item w3-mobile w3-large">Gradsko društvo Crvenog križa Opatija</a>

</div>
<?php
mysqli_free_result($result);
$conn->close();
?>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
        integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>

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
