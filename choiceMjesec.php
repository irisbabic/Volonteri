<?php
/**
 * Created by PhpStorm.
 * User: iris
 * Date: 18.01.18.
 * Time: 12:53
 */
include_once ("check.php");
$mjeseci = ['siječanj','veljača','ožujak','travanj','svibanj','lipanj','srpanj','kolovoz','rujan','listopad','studeni','prosinac'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mjesec</title>
    <?php include_once ("head.php"); ?>
</head>
<body>
<?php include_once ("navBar.php"); ?>
<div class="w3-container">
    <div id="id03" class="w3-modal" role="form" data-backdrop = false>
        <div class="w3-modal-content">

            <header class="w3-container w3-red w3-opacity-min">
      <span onclick="document.getElementById('id03').style.display='none'"
            class="w3-button w3-display-topright">&times;</span>
                <h2>Izbor mjeseca za izvješće</h2>
            </header>

            <div class="w3-row" style="overflow: scroll; max-height: 400px;">
                <div class="w3-cell w3-half">
                <ul class="w3-ul">
                    <form action="reportMjesec.php" method="post">
                        <?php for($i=0; $i<12; $i++) {?>
                            <li class="w3-hover-grey w3-padding-small">
                                <input id="<?php echo $mjeseci[$i]; ?>" class="w3-radio" type="radio" name="mjesec"
                                       value="<?php echo $mjeseci[$i]; ?>">
                                <label><?php echo $mjeseci[$i]; ?></label></li>
                            <?php
                        }
                        ?>
                </ul>
            </div>
            <div class="w3-cell w3-half">
                <ul class="w3-ul">
                <li><input id="sve" class="w3-radio" type="radio" name="godina"
                           value="sve">
                    <label>Sve godine</label></li>
                <?php for($i=2018; $i>1950; $i--) {?>
                    <li class="w3-hover-grey w3-padding-small">
                        <input id="<?php echo $i; ?>" class="w3-radio" type="radio" name="godina"
                               value="<?php echo $i; ?>">
                        <label><?php echo $i.'.'; ?></label></li>
                    <?php
                }
                ?>
                </ul>
            </div>
            </div>

            <footer class="w3-container w3-red w3-center w3-opacity-min">
                <button class="w3-button w3-white w3-xlarge w3-round-large w3-hover-green w3-margin" type="submit" name="submit"><i class="fas fa-check fa-3x" style="font-size:30px"></i></button>
                </form>
            </footer>

        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).ready(function()
        {
            $('#id03').modal('show');

        });
    </script>
</body>
</html>


