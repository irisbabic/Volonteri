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

    $sql = "INSERT INTO ck_volonteri.events VALUES (NULL,'".$naziv."', '".$datum."', '".$opis."','".$mjesto."','".$voditelj."','".$trajanje."')";

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
    <title>Događaji</title>
    <?php include_once ("head.php");?>
    <link rel="stylesheet" href="css/timeline.css">
</head>
<body>
<?php
include_once ("navBar.php");
    $sql = "SELECT * FROM ck_volonteri.events";
    $result = $conn->query($sql);
    ?>
<div class="w3-container w3-center">
    <button class="w3-red w3-button w3-bar-item w3-opacity-min w3-center" id="myButton"><i
                class="fas fa-plus fa-2x"></i></button></div>
<br>
<div class="w3-container" style="max-width: 85%; margin: auto;">
    <ul class="timeline">
        <?php
        $i=1;
        while($row = mysqli_fetch_array($result)){
            if($i%2 != 0) {
                ?>
                <li>
                    <div class="timeline-badge danger"><i class="glyphicon glyphicon-thumbs-up"></i></div>
                    <div class="timeline-panel">

                        <div class="timeline-heading">
                            <h2 class="timeline-title"><strong><?php echo $row['naziv_eventa'].' ('.$row['datum_eventa'].')';?></strong></h2>
                        </div>
                        <div class="timeline-body">
                            <h4>Opis</h4>
                            <p><?php echo $row['opis_eventa'];?></p>
                            <hr>
                            <h4>Mjesto održavanja</h4>
                            <p><?php echo $row['mjesto'];?></p>
                            <hr>
                            <h4>Voditelj</h4>
                            <p><?php echo $row['voditelj'];?></p>
                            <hr>
                            <h4>Trajanje</h4>
                            <p><?php echo $row['trajanje'];?></p>
                        </div>
                        <hr>
                        <div class="w3-display-container w3-center">
                                <form method="GET" action="updateEvent.php" style="display: inline-block">
                                    <input type="hidden" value="<?php echo $row['id_eventa'] ?>" name="id">
                                    <td>
                                        <button type="submit" name="submit"><i class='far fa-edit fa-2x'></i></button>
                                    </td>
                                </form>
                                <form method="GET" action="deleteAllEvent.php"  style="display: inline-block">
                                    <input type="hidden" value="<?php echo $row['id_eventa'] ?>" name="id">
                                    <button type="submit" name="submit"><i class='far fa-trash-alt fa-2x'></i></button>
                                    </form>
                        </div>
                    </div>
                </li>
                <?php
            }
            else {
                ?>
                <li class="timeline-inverted">
                    <div class="timeline-badge success"><i class="glyphicon glyphicon-thumbs-up"></i></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h2 class="timeline-title"><strong><?php echo $row['naziv_eventa'].' ('.$row['datum_eventa'].')';?></strong></h2>
                        </div>
                        <div class="timeline-body">
                            <h4>Opis</h4>
                            <hr>
                            <p><?php echo $row['opis'];?></p>
                            <hr>
                            <h4>Mjesto održavanja</h4>
                            <hr>
                            <p><?php echo $row['mjesto'];?></p>
                            <hr>
                            <h4>Voditelj</h4>
                            <hr>
                            <p><?php echo $row['voditelj'];?></p>
                            <hr>
                            <h4>Trajanje</h4>
                            <hr>
                            <p><?php echo $row['trajanje'];?></p>
                        </div>
                        <hr>
                        <div class="w3-display-container w3-center">
                            <form method="GET" action="updateEvent.php" style="display: inline-block">
                                <input type="hidden" value="<?php echo $row['id_eventa'] ?>" name="id">
                                <td>
                                    <button type="submit" name="submit"><i class='far fa-edit fa-2x'></i></button>
                                </td>
                            </form>
                            <form method="GET" action="deleteAllEvent.php"  style="display: inline-block">
                                <input type="hidden" value="<?php echo $row['id_eventa'] ?>" name="id">
                                <button type="submit" name="submit"><i class='far fa-trash-alt fa-2x'></i></button>
                            </form>
                        </div>
                    </div>
                </li>
                <?php
            }
            $i += 1;
        }
        ?>
    </ul>
</div>
<div class="w3-display-container w3-center w3-black w3-opacity-min" id="footer">

    <a href="#" class="w3-bar-item w3-mobile w3-large"><img src="img/logo.png" alt="logo" width="40px"
                                                            height="40px"></a>
    <a href="#" class="w3-bar-item w3-mobile w3-large">Gradsko društvo Crvenog križa Opatija</a>

</div>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "addEvent.php";
    };
</script>

</body>
</html>
