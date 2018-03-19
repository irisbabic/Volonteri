<?php
include_once ("check.php");
include_once ("conn.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datum = test_input($_POST["datum"]);
    $pocetak = test_input($_POST["pocetak"]);
    $kraj = test_input($_POST["kraj"]);
    $opis = test_input($_POST["opis"]);
    $ukupno = izracun($pocetak,$kraj);
    $vrsta = test_input($_POST['vrsta']);
    $materijal = test_input($_POST['materijal']);
    $mjesto = test_input($_POST['mjesto']);
    $sudjelovali = test_input($_POST["sudjelovali"]);

    $sql = "INSERT INTO ck_volonteri.aktivnost VALUES (NULL,'".$datum."', '".$opis."', '".$pocetak."','".$kraj."','".$ukupno."','".$vrsta."','".$materijal."','".$mjesto."','".$sudjelovali."')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Aktivnosti</title>
    <?php include_once ("head.php");?>
</head>
<body>
<?php include_once ("navBar.php");?>
<div class="w3-container" style="max-width: 1700px; margin: auto">
    <button class="w3-red w3-button w3-opacity-min" id="myButton"><i class="fas fa-plus fa-2x"></i></button>
    <br>
    <br>
    <table class="w3-table-all w3-hoverable w3-centered">
        <thead>
        <tr class="w3-red w3-opacity-min">
            <th>Datum</th>
            <th>Početak</th>
            <th>Kraj</th>
            <th>Ukupno</th>
            <th>Opis</th>
            <th>Vrsta</th>
            <th>Materijal</th>
            <th>Mjesto</th>
            <th>Sudjelovali</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <?php
        $sql = "SELECT * FROM ck_volonteri.aktivnost ORDER BY datum";
        $result = $conn->query($sql);
        $zbrojSati = 0;
        $zbrojMinuta = 0;
        while($row = mysqli_fetch_array($result)){
            $datum = $row['datum'];
            $datum = explode("-",$datum);
            $ukupno = $row['ukupno'];
            $ukupno = explode(":",$ukupno);
            ?>
            <tr>
                <td><?php echo $datum[2].".".$datum[1].".".$datum[0]."." ?></td>
                <td><?php echo $row['pocetak']?></td>
                <td><?php echo $row['kraj']?></td>
                <td><?php echo $ukupno[0].'h '.$ukupno[1].'min';
                    $zbrojMinuta += intval($ukupno[1]);
                    if($zbrojMinuta >= 60){
                        $zbrojSati +=1;
                        $zbrojMinuta -= 60;
                    }
                    $zbrojSati += intval($ukupno[0]);
                ?></td>
                <td><?php echo $row['opis']?></td>
                <td><?php echo $row['vrsta']?></td>
                <td><?php echo $row['materijal']?></td>
                <td><?php echo $row['mjesto']?></td>
                <td><?php echo $row['sudjelovali']?></td>
                <td>
                    <form method="GET" action="updateAktivnost.php">
                    <input type="hidden" value="<?php echo $row['id_aktivnosti']?>" name="id">
                    <button type="submit" name="submit"><i class='far fa-edit'></i></button>
                </form></td>
                <td>
                    <form method="GET" action="deleteAllAktivnost.php">
                        <input type="hidden" value="<?php echo $row['id_aktivnosti']?>" name="id">
                        <button type="submit" name="submit"><i class='far fa-trash-alt'></i></button>
                    </form>
                </td>
                <td>
                    <form method="GET" action="viewAktivnost.php">
                        <input type="hidden" value="<?php echo $row['id_aktivnosti']?>" name="id">
                        <button type="submit" name="submit"><i class='fas fa-eye'></i></button>
                    </form>
                </td>
            </tr>


            <?php
        } ?>
        <thead>
            <tr class="w3-red w3-opacity-min">
                <th>Ukupan broj sati volontiranja: </th>
                <th> <?php echo $zbrojSati.'h '.$zbrojMinuta.'min' ?></th>
        </tr>
        </thead>
        </table>

    <?php
    mysqli_free_result($result);
    $conn->close();
    ?>
</div>
<br>
<div class="w3-display-container w3-center w3-black w3-opacity-min" id="footer">

    <a href="#" class="w3-bar-item w3-mobile w3-large"><img src="img/logo.png" alt="logo" width="40px"
                                                            height="40px"></a>
    <a href="#" class="w3-bar-item w3-mobile w3-large">Gradsko društvo Crvenog križa Opatija</a>

</div>
<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "addAktivnost.php";
    };
</script>

</body>
</html>

