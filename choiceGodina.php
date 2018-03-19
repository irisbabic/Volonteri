<?php
include_once ("check.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Godina</title>
    <?php include_once ("head.php"); ?>
</head>
<body>
<?php include_once ("navBar.php"); ?>
<div class="w3-container">
    <div id="id04" class="w3-modal" role="form" data-backdrop = false>
        <div class="w3-modal-content">

            <header class="w3-container w3-red w3-opacity-min">
      <span onclick="document.getElementById('id04').style.display='none'"
            class="w3-button w3-display-topright">&times;</span>
                <h2>Izbor godine za izvješće</h2>
            </header>

            <div class="w3-container" style="overflow: scroll; max-height: 400px;">
                <ul class="w3-ul">
                    <form action="reportGodina.php" method="post">
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

            <footer class="w3-containerw3-red w3-opacity-min w3-center">
                <button class="w3-button w3-white w3-xlarge w3-round-large w3-hover-green w3-margin" type="submit" name="submit"><i class="fas fa-check fa-3x" style="font-size:30px"></i></button>
                </form>
            </footer>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function()
    {
        $('#id04').modal('show');

    });
</script>
</body>
</html>


