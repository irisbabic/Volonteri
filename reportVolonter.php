<?php
include_once ("check.php");
include_once ("conn.php");
if (isset($_POST['volonter'])) {
    $volonter = $_POST['volonter'];
    $sql = "SELECT * FROM ck_volonteri.volonter WHERE oib='$volonter'";
    $sql2 = "SELECT ime,prezime FROM ck_volonteri.volonter WHERE oib='$volonter'";
    $sql3 = "SELECT ukupno,sudjelovali FROM ck_volonteri.aktivnost";
    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);
    $result3 = $conn->query($sql3);
    if ($conn->query($sql) == false) {
        echo 'Error:' . mysqli_error($conn);
    }
    if ($conn->query($sql2) == false) {
        echo 'Error:' . mysqli_error($conn);
    }
    if ($conn->query($sql3) == false) {
        echo 'Error:' . mysqli_error($conn);
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pojedinačno</title>
    <?php include_once ("head.php"); ?>
</head>
<body>
<?php include_once ("navBar.php"); ?>
<div class="w3-container" style="max-width: 98%; margin: auto">
    <div class="w3-container w3-center">
        <?php while ($row = mysqli_fetch_array($result2)) { ?>
            <h1>Izvješće za <?php echo $row['prezime'] . ' ' . $row['ime']; ?></h1>

        <?php } ?>
    </div>
    <br>
    <table class="w3-table-all w3-hoverable w3-centered">
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
            <th>Dodatno obrazovanje</th>
            <th>Član od</th>
            <th>Dostupnost</th>
            <th>Državljanstvo</th>
            <th>Mjesto rođenja</th>
            <th>Zanimanje</th>
            <th>Telefon</th>
            <th>Stručna sprema</th>
            <th>Radni status</th>
            <th>Grad</th>
        </tr>
        </thead>

        <?php
        while ($row = mysqli_fetch_array($result)) {
            $datumR = $row['datum_rodjenja'];
            $datumR = explode("-", $datumR);
            $ime = $row['ime'].' '.$row['prezime'];
            ?>
            <tr>
                <td>1.</td>
                <td><?php echo $row['prezime'] ?>
                <td><?php echo $row['ime'] ?></td>
                <td><?php echo $row['oib'] ?></td>
                <td><?php echo $row['spol'] ?></td>
                <td><?php echo $datumR[2] . "." . $datumR[1] . "." . $datumR[0] . "." ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo dob($datumR[2], $datumR[1], $datumR[0]); ?></td>
                <td><?php echo $row['adresa'] ?></td>
                <td><?php echo $row['dodatnoObr'] ?></td>
                <td><?php echo $row['uclanjenje'] ?></td>
                <td><?php echo $row['dostupnost'] ?></td>
                <td><?php echo $row['drzavljanstvo'] ?></td>
                <td><?php echo $row['mjestoR'] ?></td>
                <td><?php echo $row['zanimanje'] ?></td>
                <td><?php echo $row['telefon'] ?></td>
                <td><?php echo $row['strucnaSp'] ?></td>
                <td><?php echo $row['radniSt'] ?></td>
                <td><?php echo $row['grad'] ?></td>
            </tr>
            <?php
        }
        $sati = 0;
        $minute = 0;
        while ($row = mysqli_fetch_array($result3)){
          $sudjelovali = explode(',',$row['sudjelovali']);
          $ukupno = explode(':',$row['ukupno']);

          foreach ($sudjelovali as $sudionik){
              if ($sudionik == $ime){
                  if($minute<60){
                     $minute += $ukupno[1];
                  }
                  else{
                     $minute = $minute - 60;
                     $sati += 1;
                  }
                  $sati += $ukupno[0];
              }
          }
        }
        ?>
        <thead>
        <tr class=" w3-red w3-opacity-min">
            <th>Sati volontiranja:</th>
            <th><?php echo $sati.'h i '.$minute.'min';?></th>
        </tr>
        </thead>
    </table>
</div>
<?php
mysqli_free_result($result);
mysqli_free_result($result2);
$conn->close(); ?>
<br>
<div class="w3-display-container w3-center w3-black w3-opacity-min" id="footer">

    <a href="#" class="w3-bar-item w3-mobile w3-large"><img src="img/logo.png" alt="logo" width="40px"
                                                            height="40px"></a>
    <a href="#" class="w3-bar-item w3-mobile w3-large">Gradsko društvo Crvenog križa Opatija</a>

</div>
<script type="text/javascript">
    function myFunction() {
        var x = document.getElementById("Demo");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }
</script>
</body>
</html>



