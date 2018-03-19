<?php
include_once ("check.php");
include_once ("conn.php");
$id = $_GET['id'];
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
            $sql = "SELECT * FROM ck_volonteri.aktivnost WHERE id_aktivnosti=" . $id;
            $result = $conn->query($sql);
            if ($conn->query($sql) == FALSE) {
                echo 'Error:' . mysqli_error($conn);
            }
            ?>

            <?php while ($row = mysqli_fetch_array($result)) { ?>
                <br>
                <div class="w3-section">
                    <h3>Naziv aktivnosti</h3>
                    <p><?php echo $row['datum'] ?></p>
                </div>
                <hr>
                <div class="w3-section">
                    <h3>Vrijeme početka aktivnosti</h3>
                    <p><?php echo $row['pocetak'] ?></p>
                </div>
                <hr>
                <div class="w3-section">
                    <h3>Vrijeme završetka aktivnosti</h3>
                    <p><?php echo $row['kraj'] ?></p>
                </div>
                <hr>
                <div class="w3-section">
                    <h3>Ukupno trajanje aktivnosti</h3>
                    <p><?php echo $row['ukupno'] ?></p>
                </div>
                <hr>
                <div class="w3-section">
                    <h3>Opis aktivnosti</h3>
                    <p><?php echo $row['opis'] ?></p>
                </div>
                <hr>
                <div class="w3-section">
                    <h3>Vrsta aktivnosti</h3>
                    <p><?php echo $row['vrsta'] ?></p>
                </div>
                <hr>
                <div class="w3-section">
                    <h3>Korišteni materijal</h3>
                    <p><?php echo $row['materijal'] ?></p>
                </div>
                <hr>
                <div class="w3-section">
                    <h3>Mjesto održavanja aktivnosti</h3>
                    <p><?php echo $row['mjesto'] ?></p>
                </div>
                <hr>
                <div class="w3-section">
                    <h3>Volonteri koji su sudjelovali u aktivnosti</h3>
                    <p><?php echo $row['sudjelovali'] ?></p>
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
