<?php
include_once("check.php");
include_once("conn.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $datum = test_input($_POST["datum"]);
    $pocetak = test_input($_POST["pocetak"]);
    $kraj = test_input($_POST["kraj"]);
    $opis = test_input($_POST["opis"]);
    $vrsta = test_input($_POST["vrsta"]);
    $mjesto = test_input($_POST["mjesto"]);
    $materijal = test_input($_POST["materijal"]);
    $sudjelovali = test_input($_POST["sudjelovali"]);
    $ukupno = izracun($pocetak, $kraj);

    $sql = "UPDATE ck_volonteri.aktivnost SET datum='$datum',opis='$opis',pocetak='$pocetak',kraj='$kraj',ukupno='$ukupno',vrsta='$vrsta',materijal='$materijal',mjesto='$mjesto',sudjelovali='$sudjelovali' WHERE id_aktivnosti='$id'";
    $result = $conn->query($sql);
    var_dump($sql);
    if ($conn->query($sql) == false) {
        echo 'Error:' . mysqli_error($conn);
    } else {
        header("Location: allAktivnosti.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Izmjena</title>
    <?php include_once("head.php"); ?>
</head>
<body>
<?php include_once("navBar.php"); ?>

<div class="w3-content w3-center" style="max-width: 1000px; margin: auto">
    <div class="w3-card-4">
        <?php
        $id = $_GET["id"];
        $sql2 = "SELECT ime, prezime FROM ck_volonteri.volonter";
        $result2 = $conn->query($sql2);
        if ($conn->query($sql2) == FALSE) {
            echo 'Error:' . mysqli_error($conn);
        }

        while ($row2 = mysqli_fetch_array($result2)) {
            $allVolonteri[] = $row2['ime'] . ' ' . $row2['prezime'];
        }

        $sql = "SELECT * FROM ck_volonteri.aktivnost WHERE id_aktivnosti='$id'";
        $result = $conn->query($sql);

        while ($row = mysqli_fetch_array($result)){
        ?>
        <p>
        <form method="POST" action="updateAktivnost.php">
            <div class="w3-section">
                <input class="w3-input w3-center" type="date" name="datum" required value="<?php echo $row['datum'] ?>">
                <label>Datum aktivnosti</label>
            </div>
            <div class="w3-section">
                <input class="w3-input w3-center" type="time" name="pocetak" required
                       value="<?php echo $row['pocetak'] ?>">
                <label>Početak aktivnosti</label>
            </div>
            <div class="w3-section">
                <input class="w3-input w3-center" type="time" name="kraj" required value="<?php echo $row['kraj'] ?>">
                <label>Kraj aktivnosti</label>
            </div>
            <div class="w3-section">
                <input class="w3-input w3-center" type="text" name="opis" value="<?php echo $row['opis'] ?>">
                <label>Opis</label>
            </div>
            Vrsta aktivnosti:
            <div class="w3-row">
                <?php switch ($row['vrsta']) {
                    case 'Administrativne usluge':
                        ?>
                        <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Administrativne usluge"
                               checked>
                        <label>Administrativne usluge</label>
                        <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Intelektualne usluge">
                        <label>Intelektualne usluge</label>
                        <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Socijalne usluge">
                        <label>Socijalne usluge</label>
                        <input id="volonter" class="w3-radio" type="radio" name="vrsta"
                               value="Fizički poslovi ili usluge">
                        <label>Fizički poslovi ili usluge</label>
                        <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Drugo">
                        <label>Drugo</label>
                        <?php break;
                    case 'Intelektualne usluge':
                        ?>
                        <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Administrativne usluge">
                        <label>Administrativne usluge</label>
                        <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Intelektualne usluge"
                               checked>
                        <label>Intelektualne usluge</label>
                        <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Socijalne usluge">
                        <label>Socijalne usluge</label>
                        <input id="volonter" class="w3-radio" type="radio" name="vrsta"
                               value="Fizički poslovi ili usluge">
                        <label>Fizički poslovi ili usluge</label>
                        <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Drugo">
                        <?php break;
                    case 'Socijalne usluge':
                        ?>
                        <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Administrativne usluge">
                        <label>Administrativne usluge</label>
                        <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Intelektualne usluge">
                        <label>Intelektualne usluge</label>
                        <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Socijalne usluge"
                               checked>
                        <label>Socijalne usluge</label>
                        <input id="volonter" class="w3-radio" type="radio" name="vrsta"
                               value="Fizički poslovi ili usluge">
                        <label>Fizički poslovi ili usluge</label>
                        <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Drugo">
                        <?php break;
                    case 'Fizički poslovi ili usluge':
                        ?>
                        <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Administrativne usluge">
                        <label>Administrativne usluge</label>
                        <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Intelektualne usluge">
                        <label>Intelektualne usluge</label>
                        <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Socijalne usluge">
                        <label>Socijalne usluge</label>
                        <input id="volonter" class="w3-radio" type="radio" name="vrsta"
                               value="Fizički poslovi ili usluge" checked>
                        <label>Fizički poslovi ili usluge</label>
                        <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Drugo">
                        <?php break;
                    case 'Drugo':
                        ?>
                        <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Administrativne usluge">
                        <label>Administrativne usluge</label>
                        <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Intelektualne usluge">
                        <label>Intelektualne usluge</label>
                        <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Socijalne usluge">
                        <label>Socijalne usluge</label>
                        <input id="volonter" class="w3-radio" type="radio" name="vrsta"
                               value="Fizički poslovi ili usluge">
                        <label>Fizički poslovi ili usluge</label>
                        <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Drugo" checked>
                        <?php break;
                    default:?>
                        <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Administrativne usluge">
                    <label>Administrativne usluge</label>
                    <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Intelektualne usluge">
                    <label>Intelektualne usluge</label>
                    <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Socijalne usluge">
                    <label>Socijalne usluge</label>
                    <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Fizički poslovi ili usluge">
                    <label>Fizički poslovi ili usluge</label>
                    <input id="volonter" class="w3-radio" type="radio" name="vrsta" value="Drugo">
                       <?php break;
                } ?>

                <br>
            </div>
            <div class="w3-section">
                <input class="w3-input w3-center" type="text" name="materijal" value="<?php echo $row['materijal'] ?>">
                <label>Korišteni materijal</label>
            </div>
            <div class="w3-section">
                <input class="w3-input w3-center" type="text" name="mjesto" value="<?php echo $row['mjesto'] ?>">
                <label>Mjesto održavanja aktivnosti</label>
            </div>
            <div class="w3-section">
                <input class="w3-input w3-center" type="text" name="sudjelovali"
                       value="<?php echo $row['sudjelovali'] ?>">
                <label>Volonteri koji su sudjelovali</label>
            </div>
    </div>
    <br>
    <br><br>
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <input type="hidden" name="update" value="update">
    <button class="w3-button w3-white w3-xlarge w3-round-large w3-hover-green" type="submit" name="submit"><i
                class="fas fa-check fa-5x" style="font-size:50px"></i></button>
    </form>
    </p>
    <?php
    }
    mysqli_free_result($result);
    mysqli_free_result($result2);
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
