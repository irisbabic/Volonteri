<?php
include_once ("check.php");
include_once ("conn.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datum = test_input($_POST["datum"]);
    $naziv = test_input($_POST["naziv"]);
    $trajanje = test_input($_POST["trajanje"]);
    $opis = test_input($_POST["opis"]);
    $voditelj = test_input($_POST["voditelj"]);
    $mjesto = test_input($_POST["mjesto"]);


    $sql = "UPDATE ck_volonteri.events SET naziv_eventa='$naziv', datum_eventa='$datum', opis_eventa='$opis',mjesto='$mjesto', voditelj='$voditelj', trajanje='$trajanje' WHERE id_aktivnosti='$id'";
    $result = $conn->query($sql);
    if ($conn->query($sql) == false) {
        echo 'Error:' . mysqli_error($conn);
    } else {
        mysqli_free_result($result);
        header("Location: allEvents.php");
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Izmjena</title>
    <?php include_once ("head.php"); ?>
</head>
<body>
<?php include_once ("navBar.php"); ?>
<div class="w3-content w3-center" style="max-width: 1000px; margin: auto">
    <div class="w3-card-4">
        <?php
        $id = $_GET["id"];
        $sql = "SELECT * FROM ck_volonteri.events WHERE id_eventa='$id'";
        $result = $conn->query($sql);

        while ($row = mysqli_fetch_array($result)) {
            ?>

            <p>
            <form method="POST" action="updateEvent.php">
                <div class="w3-section">
                    <input class="w3-input w3-center" type="date" name="datum" required
                           value="<?php echo $row['datum_eventa'] ?>">
                    <label>Datum događaja</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input w3-center" type="text" name="naziv" required
                           value="<?php echo $row['naziv_eventa'] ?>">
                    <label>Naziv događaja</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input w3-center" type="text" name="voditelj"
                           value="<?php echo $row['voditelj'] ?>">
                    <label>Voditelj događaja</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input w3-center" type="text" name="mjesto" value="<?php echo $row['mjesto'] ?>">
                    <label>Mjesto održavanja</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input w3-center" type="text" name="opis" value="<?php echo $row['opis_eventa'] ?>">
                    <label>Opis događaja</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input w3-center" type="time" name="trajanje" required
                           value="<?php echo $row['trajanje'] ?>">
                    <label>Trajanje događaja</label>
                </div>

                <button class="w3-button w3-white w3-xlarge w3-round-large w3-hover-green" type="submit" name="submit">
                    <i class="fas fa-check fa-5x" style="font-size:50px"></i></button>
            </form></p>

            <?php
        }
        mysqli_free_result($result);
        $conn->close();
        ?>
    </div>
</div>
<div class="w3-display-container w3-center w3-black w3-opacity-min" id="footer">

    <a href="#" class="w3-bar-item w3-mobile w3-large"><img src="img/logo.png" alt="logo" width="40px"
                                                            height="40px"></a>
    <a href="#" class="w3-bar-item w3-mobile w3-large">Gradsko društvo Crvenog križa Opatija</a>

</div>
</body>
</html>
