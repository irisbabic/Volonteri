<?php
include_once ("check.php");
include_once ("conn.php");
$id = $_GET['oib'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pogled</title>
    <?php include_once ("head.php"); ?>
</head>
<body>
<?php include_once ("navBar.php"); ?>
<div class="w3-content w3-center" style="max-width: 1000px; margin: auto">
    <div class="w3-card-4">
        <?php
        $sql = "SELECT * FROM ck_volonteri.volonter WHERE oib=" . $id;
        $result = $conn->query($sql);
        if ($conn->query($sql) == FALSE) {
            echo 'Error:' . mysqli_error($conn);
        }

        while ($row = mysqli_fetch_array($result)) {
            $datumR = $row['datum_rodjenja'];
            $datumR = explode("-", $datumR);
            $clanOd = $row['uclanjenje'];
            $clanOd = explode("-", $clanOd);
            ?>
            <br>
            <div class="w3-section">
                <h3>OIB volontera</h3>
                <p><?php echo $row['oib'] ?></p>
            </div>
            <hr>
            <div class="w3-section">
                <h3>Prezime volontera</h3>
                <p><?php echo $row['prezime'] ?></p>
            </div>
            <hr>
            <div class="w3-section">
                <h3>Ime volontera</h3>
                <p><?php echo $row['ime'] ?></p>
            </div>
            <hr>
            <div class="w3-section">
                <h3>e-mail volontera</h3>
                <p><?php echo $row['email'] ?></p>
            </div>
            <hr>
            <div class="w3-section">
                <h3>Datum rođenja</h3>
                <p><?php echo $datumR[2] . "." . $datumR[1] . "." . $datumR[0] . "." ?></p>
            </div>
            <hr>
            <div class="w3-section">
                <h3>Dob</h3>
                <p><?php $dob = dob($datumR[2], $datumR[1], $datumR[0]);
                    echo $dob; ?></p>
            </div>
            <hr>
            <div class="w3-section">
                <h3>Spol volontera</h3>
                <p><?php echo $row['spol'] ?></p>
            </div>
            <hr>
            <div class="w3-section">
                <h3>Adresa</h3>
                <p><?php echo $row['adresa'] ?></p>
            </div>
            <hr>
            <div class="w3-section">
                <h3>Grad</h3>
                <p><?php echo $row['grad'] ?></p>
            </div>
            <hr>
            <div class="w3-section">
                <h3>Mjesto rođenja</h3>
                <p><?php echo $row['mjestoR'] ?></p>
            </div>
            <hr>
            <div class="w3-section">
                <h3>Grad</h3>
                <p><?php echo $row['drzavljanstvo'] ?></p>
            </div>
            <hr>
            <div class="w3-section">
                <h3>Telefon</h3>
                <p><?php echo $row['telefon'] ?></p>
            </div>
            <hr>
            <div class="w3-section">
                <h3>Zanimanje</h3>
                <p><?php echo $row['zanimanje'] ?></p>
            </div>
            <hr>
            <div class="w3-section">
                <h3>Stručna sprema</h3>
                <p><?php echo $row['strucnaSp'] ?></p>
            </div>
            <hr>
            <div class="w3-section">
                <h3>Radni status</h3>
                <p><?php echo $row['radniSt'] ?></p>
            </div>
            <hr>
            <div class="w3-section">
                <h3>Dodatno obrazovanje</h3>
                <p><?php echo $row['dodatnoObr'] ?></p>
            </div>
            <hr>
            <div class="w3-section">
                <h3>Interesi</h3>
                <p><?php $interes = explode(',', $row['interes']);
                    foreach ($interes as $element) {
                        echo $element . '<br>';
                    } ?></p>
            </div>
            <hr>
            <div class="w3-section">
                <h3>Status</h3>
                <p><?php echo $row['aktivnost'] ?></p>
            </div>
            <hr>
            <div class="w3-section">
                <h3>Volonter</h3>
                <p><?php echo $row['uloga'] ?></p>
            </div>
            <hr>
            <div class="w3-section">
                <h3>Dostupnost volontera</h3>
                <p><?php echo $row['dostupnost'] ?></p>
            </div>
            <hr>
            <div class="w3-section">
                <h3>Član od</h3>
                <p><?php echo $clanOd[2] . "." . $clanOd[1] . "." . $clanOd[0] . "." ?></p>
            </div>
            <hr>
            <div class="w3-section">
                <h3>Volonter je član:</h3>
                <p><?php echo $row['clanstvo'] ?></p>
            </div>
            <br>

        <?php } ?>
    </div>
</div>
<br>
<div class="w3-display-container w3-center w3-black w3-opacity-min" id="footer">

    <a href="#" class="w3-bar-item w3-mobile w3-large"><img src="img/logo.png" alt="logo" width="40px"
                                                            height="40px"></a>
    <a href="#" class="w3-bar-item w3-mobile w3-large">Gradsko društvo Crvenog križa Opatija</a>

</div>
<?php
mysqli_free_result($result);
$conn->close();
?>
</body>
</html>
