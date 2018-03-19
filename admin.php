<?php include_once ("check.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Administrator</title>
    <?php include_once ("head.php");?>
</head>
<body>
<?php include_once ("navBar.php");?>
<br>
<div class="w3-display-container">
    <div class="w3-cell-row w3-center" style="width:40%; margin: auto;">
        <div class="w3-container w3-cell w3-cell-middle w3-half">
            <svg height="100" width="100">
                <circle cx="50" cy="50" r="50" fill="blue"/>
            </svg>
        </div>

        <div class="w3-container w3-cell w3-cell-middle w3-half">
            <a href="allAktivnosti.php"><h3><strong>Aktivnosti</strong></h3><br>
                <p>Popis svih aktivnosti svih </p>
                <p>volontera <strong>Gradskog društva</p>
                <p>Crvenog križa Opatija</strong></p></a>
        </div>

    </div>
</div>
<br>
<div class="w3-display-container">
    <div class="w3-cell-row w3-center" style="width:40%; margin: auto;">

        <a href="allVolonteri.php">
            <div class="w3-container w3-cell-middle w3-half">
                <h3><strong>Volonteri</strong></h3><br>
                <p>Popis svih volontera <strong>Gradskog društva</p>
                <p>Crvenog križa Opatija</strong></p>
            </div>
        </a>

        <div class="w3-container w3-cell-middle w3-half">

            <svg height="100" width="100">
                <circle cx="50" cy="50" r="50" fill="red"/>
            </svg>

        </div>

    </div>
</div>
<br>
<div class="w3-display-container">
    <div class="w3-cell-row w3-center" style="width:40%; margin: auto;">

        <div class="w3-container w3-cell w3-cell-middle w3-half">
            <svg height="100" width="100">
                <circle cx="50" cy="50" r="50" fill="green"/>
            </svg>
        </div>

        <div class="w3-container w3-cell w3-cell-middle w3-half">
            <a href="choiceVolonter.php"><h3><strong>Pojedinačno izvješće</strong></h3><br>
                <p>Izaberite volontera kako bi dobili</p>
                <p>izvješće za tu osobu.</p></a>
        </div>

    </div>
</div>
<br>
<div class="w3-display-container">
    <div class="w3-cell-row w3-center" style="width:40%; margin: auto;">

        <a href="choiceMjesec.php">
            <div class="w3-container w3-cell-middle w3-half">
                <h3><strong>Mjesečno izvješće</strong></h3><br>
                <p>Izaberite mjesec kako bi dobili</p>
                <p>izvješće za taj mjesec.</p>
            </div>
        </a>
        <div class="w3-container w3-cell-middle w3-half">
            <svg height="100" width="100">
                <circle cx="50" cy="50" r="50" fill="yellow"/>
            </svg>
        </div>

    </div>
</div>
<br>
<div class="w3-display-container">
    <div class="w3-cell-row w3-center" style="width:40%; margin: auto;">

        <div class="w3-container w3-cell w3-cell-middle w3-half">
            <svg height="100" width="100">
                <circle cx="50" cy="50" r="50" fill="purple"/>
            </svg>
        </div>

        <div class="w3-container w3-cell w3-cell-middle w3-half">
            <a href="choiceGodina.php"><h3><strong>Godišnje izvješće</strong></h3><br>
                <p>Izaberite godinu kako bi dobili</p>
                <p>izvješće za tu godinu.</p></a>
        </div>
    </div>
</div>

</div>
</div>
<br>
<div class="w3-display-container">
    <div class="w3-cell-row w3-center" style="width:40%; margin: auto;">

        <a href="allEvents.php">
            <div class="w3-container w3-cell-middle w3-half">
                <h3><strong>Događanja</strong></h3><br>
                <p>Pregled svih volonterskih događanja</p>
                <p>u organizaciji <strong>Gradskog društva</p>
                <p>Crvenog križa Opatija </strong></p>
            </div>
        </a>
        <div class="w3-container w3-cell-middle w3-half">
            <svg height="100" width="100">
                <circle cx="50" cy="50" r="50" fill="deep-orange"/>
            </svg>
        </div>

    </div>
</div>
<br>
<div class="w3-display-container">
    <div class="w3-cell-row w3-center" style="width:40%; margin: auto;">

        <div class="w3-container w3-cell w3-cell-middle w3-half">
            <svg height="100" width="100">
                <circle cx="50" cy="50" r="50" fill="teal"/>
            </svg>
        </div>

        <div class="w3-container w3-cell w3-cell-middle w3-half">
            <a href="galerija.php"><h3><strong>Galerija</strong></h3><br>
                <p>Galerija slika sa događanja</p>
                <p>u kojima su sudjelovali volonteri</p>
                <p><strong>Gradskog društva Crvenog križa Opatija.</strong></p></a>
        </div>
    </div>
</div>

</div>
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
