<?php
include_once ("check.php");
include_once("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = test_input($_POST["ime"]);
    $prezime = test_input($_POST["prezime"]);
    $jmbg = test_input($_POST["jmbg"]);
    $brOI = test_input($_POST["brOI"]);
    $oib = test_input($_POST["oib"]);
    $telefon = test_input($_POST["brojTel"]);
    $mobitel = test_input($_POST["brojMob"]);
    $datumR = test_input($_POST["datumR"]);
    $mjestoR = test_input($_POST["mjestoR"]);
    $uclanjenje = test_input($_POST['uclanjenje']);
    $adresa = test_input($_POST["adresa"]);
    $zanimanje = test_input($_POST["zanimanje"]);
    $clanoviDom = test_input($_POST["clanoviDom"]);
    $tvrtka = test_input($_POST["tvrtka"]);
    $interes = test_input($_POST['interes']);

    echo $ime."<br>";
    echo $prezime."<br>";
    echo $jmbg."<br>";
    echo $brOI."<br>";
    echo $oib."<br>";
    echo $telefon."<br>";
    echo $mobitel."<br>";
    echo $datumR."<br>";
    echo $mjestoR."<br>";
    echo $uclanjenje."<br>";
    echo $adresa."<br>";
    echo $zanimanje."<br>";
    echo $clanoviDom."<br>";
    echo $tvrtka."<br>";
    echo $interes."<br>";


    $sql = "INSERT INTO ck_volonteri.k60 VALUES (NULL,'".$ime."','".$prezime."','".$jmbg."','".$brOI."','".$oib."','".$datumR."','".$mjestoR."','".$adresa."','".$telefon."','".$mobitel."','".$tvrtka."',$clanoviDom,'".$interes."','".$uclanjenje."','".$zanimanje."')";

$result = $conn->query($sql);

    if ($result === FALSE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } else {
        header("Location: allUmirovljenici.php");
    }
    mysqli_free_result($result);
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
            <th>JMBG</th>
            <th>Broj osobne</th>
            <th>OIB</th>
            <th>Datum r.</th>
            <th>Mjesto r.</th>
            <th>Dob</th>
            <th>Adresa</th>
            <th>Kućni</th>
            <th>Mobitel</th>
            <th>Članovi domaćinstva</th>
            <th>Zanimanje</th>
            <th>Tvrtka</th>
            <th>Interesi</th>
            <th>Učlanjenje</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <?php

        $sql = "SELECT * FROM ck_volonteri.k60 ORDER BY prezime";
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
            <td><?php echo $row['prezime'] ?></td>
            <td><?php echo $row['ime'] ?></td>
            <td><?php echo $row['jmbg'] ?></td>
            <td><?php echo $row['brOI'] ?></td>
            <td><?php echo $row['oib'] ?></td>
            <td><?php echo $datumR[2] . "." . $datumR[1] . "." . $datumR[0] . "." ?></td>
            <td><?php echo $row['mjesto_rodjenja'] ?></td>
            <td><?php
                $dob = dob($datumR[2], $datumR[1], $datumR[0]);
                echo $dob; ?></td>
            <td><?php echo $row['adresa'] ?></td>
            <td><?php echo $row['brTel'] ?></td>
            <td><?php echo $row['brMob'] ?></td>
            <td><?php echo $row['clanoviDom'] ?></td>
            <td><?php echo $row['zanimanje'] ?></td>
            <td><?php echo $row['tvrtka'] ?></td>
            <td><?php echo $row['interes'] ?></td>
            <td><?php echo $clanOd[2] . "." . $clanOd[1] . "." . $clanOd[0] . "." ?></td>
            <form method="GET" action="updateUmirovljenik.php">
                <input type="hidden" value="<?php echo $row['id_umirovljenika'] ?>" name="id_umirovljenika">
                <td>
                    <button type="submit" name="submit"><i class='fas fa-edit '></i></button>
                </td>
            </form>
            <td>
                <form method="GET" action="deleteAllUmirovljenik.php">
                    <input type="hidden" value="<?php echo $row['id_umirovljenika'] ?>" name="id_umirovljenika">
                    <button type="submit" name="submit"><i class='fas fa-trash'></i></button>
                </form>
            </td>
            <td>
                <form method="GET" action="viewVUmirovljenik.php">
                    <input type="hidden" value="<?php echo $row['id_umirovljenika'] ?>" name="id_umirovljenika">
                    <button type="submit" name="submit"><i class='fas fa-eye'></i></button>
                </form>
            </td>
        </tr>

        <?php
            $brVolontera++;

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
<br>
    <div id="Demo1" class="w3-hide w3-container w3-light-grey" style="width: 40%">
        <p class="w3-center w3-margin-top"><?php
            $brVolontera--;
            echo $brVolontera; ?></p>
    </div>
    <br>
</div>
<div class="w3-display-container w3-center w3-black w3-opacity-min" id="footer">

    <a href="#" class="w3-bar-item w3-mobile w3-large"><img src="img/logo.png" alt="logo" width="40px"
                                                            height="40px"></a>
    <a href="#" class="w3-bar-item w3-mobile w3-large">Gradsko društvo Crvenog križa Opatija</a>

</div>
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
        location.href = "addUmirovljenik.php";
    };
</script>

</body>
</html>
