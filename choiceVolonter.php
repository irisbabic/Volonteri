<?php
include_once ("check.php");
include_once ("conn.php");
$sql = "SELECT ime,prezime,oib FROM ck_volonteri.volonter";
$result = $conn->query($sql);
if($conn->query($sql)== false){
    echo 'Error:'.mysqli_error($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Volonter</title>
    <?php include_once ("head.php"); ?>
</head>
<body>
<?php include_once ("navBar.php"); ?>
<div class="w3-container">
    <div id="id01" class="w3-modal" role="form" data-backdrop = false>
        <div class="w3-modal-content">

            <header class="w3-container w3-red w3-opacity-min">
      <span onclick="document.getElementById('id01').style.display='none'"
            class="w3-button w3-display-topright">&times;</span>
                <h2>Izbor volontera za izvješće</h2>
            </header>

            <div class="w3-container" style="overflow: scroll; max-height: 400px;">
                <ul class="w3-ul">
                    <form action="reportVolonter.php" method="post">
                        <?php while($row = mysqli_fetch_array($result)){  ?>
                            <li class="w3-hover-grey w3-padding-small">
                                <input id="<?php echo $row['oib']; ?>" class="w3-radio" type="radio" name="volonter" value="<?php echo $row['oib']; ?>" >
                                <label><?php echo $row['ime'].' '.$row['prezime']; ?></label></li>
                            <?php
                            }
                        ?>

                </ul>
            </div>

            <footer class="w3-container w3-red w3-opacity-min w3-center">
                <button class="w3-button w3-white w3-xlarge w3-round-large w3-hover-green w3-margin" type="submit" name="submit"><i class="fas fa-check fa-3x" style="font-size:30px"></i></button>
                </form>
            </footer>

        </div>
    </div>
    <?php echo mysqli_free_result($result);
    $conn->close();?>
    <script type="text/javascript">
        $(document).ready(function(volonter)
        {
            $('#id01').modal('show');

        });
    </script>
</body>
</html>


