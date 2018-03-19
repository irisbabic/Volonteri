<?php
include_once ("check.php");
include_once ("conn.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = test_input($_POST["ime"]);
    $prezime = test_input($_POST["prezime"]);
    $oib = test_input($_POST["oib"]);
    $telefon = test_input($_POST["brojTel"]);
    $drzavljanstvo = test_input($_POST["drzavljanstvo"]);
    $dodatnoObr = test_input($_POST["dodatnoObr"]);
    $uclanjenje = test_input($_POST["uclanjenje"]);
    $datumR = test_input($_POST["datumR"]);
    $mjestoR = test_input($_POST["mjestoR"]);
    $adresa = test_input($_POST["adresa"]);
    $grad = test_input($_POST["grad"]);
    $zanimanje = test_input($_POST["zanimanje"]);
    $radniSt = test_input($_POST["radniStatus"]);
    $strucnaSp = test_input($_POST["strucnaSprema"]);
    $dostupnost = test_input($_POST["dostupnost"]);
    $interes = implode(',', $_POST['interes']);
    $spol = test_input($_POST["spol"]);
    $email = test_input($_POST["email"]);
    $aktivnost = test_input($_POST["aktivnost"]);
    $uloga = test_input($_POST["uloga"]);
    $clanstvo = test_input($_POST['clanstvo']);

    $sql = "UPDATE ck_volonteri.volonter SET oib='$oib', ime='$ime', spol='$spol',prezime='$prezime',datum_rodjenja='$datumR',email='$email',adresa='$adresa',dodatnoObr='$dodatnoObr',uclanjenje='$uclanjenje',dostupnost='$dostupnost',drzavljanstvo='$drzavljanstvo',mjestoR='$mjestoR',zanimanje='$zanimanje',telefon='$telefon',strucnaSp='$strucnaSp',radniSt='$radniSt',grad='$grad',aktivnost='$aktivnost',interes='$interes',uloga='$uloga', clanstvo='$clanstvo' WHERE oib='$oib'";
    $result = $conn->query($sql);
    if ($conn->query($sql) == false) {
        echo 'Error:' . mysqli_error($conn);
    } else {
        mysqli_free_result($result);
        header("Location: allVolonteri.php");
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
<div class="w3-container w3-center">
    <br>
    <br>
    <?php
    $oib = $_GET["oib"];
    $sql = "SELECT * FROM volonter WHERE oib='$oib'";
    $result = $conn->query($sql);
    while ($row = mysqli_fetch_array($result)) { ?>
    <div class="w3-cell-row">
        <div class="w3-container w3-cell w3-third"></div>
        <div class="w3-container w3-cell w3-cell-middle w3-third w3-card-4">
            <p>


            <form method="POST" action="updateVolonter.php">

                <div class="w3-section">
                    <input class="w3-input" type="text" name="oib" required value="<?php echo $row['oib'] ?>">
                    <label>OIB</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input" type="text" name="ime" required value="<?php echo $row['ime'] ?>">
                    <label>Ime</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input" type="text" name="prezime" required value="<?php echo $row['prezime'] ?>">
                    <label>Prezime</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input" type="text" name="email" required value="<?php echo $row['email'] ?>">
                    <label>Email</label>
                </div>
                <div class="w3-row">
                    <?php
                    if ($row['spol'] == 'm') {
                        ?>
                        <input id="musko" class="w3-radio" type="radio" name="spol" value="m" checked>
                        <label>Muško</label>
                        <br>
                        <input id="zensko" class="w3-radio" type="radio" name="spol" value="ž">
                        <label>Žensko</label>
                        <br>
                        <?php
                    } else {
                        ?>
                        <input id="musko" class="w3-radio" type="radio" name="spol" value="m">
                        <label>Muško</label>
                        <br>
                        <input id="zensko" class="w3-radio" type="radio" name="spol" value="ž" checked>
                        <label>Žensko</label>
                        <?php
                    }
                    ?>
                    <br>
                </div>
                <div class="w3-section">
                    <input class="w3-input" type="date" name="datumR" required
                           value="<?php echo $row['datum_rodjenja'] ?>">
                    <label>Datum rođenja</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input" type="text" name="mjestoR" required value="<?php echo $row['mjestoR'] ?>">
                    <label>Mjesto rođenja</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input" type="text" name="adresa" required value="<?php echo $row['adresa'] ?>">
                    <label>Adresa</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input" type="text" name="grad" required value="<?php echo $row['grad'] ?>">
                    <label>Grad</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input" type="text" name="drzavljanstvo" required
                           value="<?php echo $row['drzavljanstvo'] ?>">
                    <label>Državljanstvo</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input" type="tel" name="brojTel" value="<?php echo $row['telefon'] ?>">
                    <label>Broj telefona</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input" type="text" name="zanimanje" value="<?php echo $row['zanimanje'] ?>">
                    <label>Zanimanje</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input" type="text" name="dodatnoObr" value="<?php echo $row['dodatnoObr'] ?>">
                    <label>Dodatno obrazovanje</label>
                </div>
                <div class="w3-section">
                    <input class="w3-input" type="date" name="uclanjenje" value="<?php echo $row['uclanjenje'] ?>">
                    <label>Član od:</label>
                </div>
                <hr>
                Radni status
                <div class="w3-row w3-left-align">
                    <?php switch ($row['radniSt']) {
                        case 'Zaposlen':
                            ?>
                            <input id="zaposlen" class="w3-radio" type="radio" name="radniStatus" value="Zaposlen"
                                   checked>
                            <label>Zaposlen</label>
                            <br>
                            <input id="nezaposlen" class="w3-radio" type="radio" name="radniStatus" value="Nezaposlen">
                            <label>Nezaposlen</label>
                            <br>
                            <input id="ucenik" class="w3-radio" type="radio" name="radniStatus" value="Učenik">
                            <label>Učenik</label>
                            <br>
                            <input id="student" class="w3-radio" type="radio" name="radniStatus" value="Student">
                            <label>Student</label>
                            <br>
                            <input id="umirovljenik" class="w3-radio" type="radio" name="radniStatus"
                                   value="Umirovljenik">
                            <label>Umirovljenik</label>
                            <br>
                            <?php break;
                        case 'Nezaposlen':
                            ?>
                            <input id="zaposlen" class="w3-radio" type="radio" name="radniStatus" value="Zaposlen">
                            <label>Zaposlen</label>
                            <br>
                            <input id="nezaposlen" class="w3-radio" type="radio" name="radniStatus" value="Nezaposlen"
                                   checked>
                            <label>Nezaposlen</label>
                            <br>
                            <input id="ucenik" class="w3-radio" type="radio" name="radniStatus" value="Učenik">
                            <label>Učenik</label>
                            <br>
                            <input id="student" class="w3-radio" type="radio" name="radniStatus" value="Student">
                            <label>Student</label>
                            <br>
                            <input id="umirovljenik" class="w3-radio" type="radio" name="radniStatus"
                                   value="Umirovljenik">
                            <label>Umirovljenik</label>
                            <br>
                            <?php break;
                        case 'Učenik':
                            ?>
                            <input id="zaposlen" class="w3-radio" type="radio" name="radniStatus" value="Zaposlen">
                            <label>Zaposlen</label>
                            <br>
                            <input id="nezaposlen" class="w3-radio" type="radio" name="radniStatus" value="Nezaposlen">
                            <label>Nezaposlen</label>
                            <br>
                            <input id="ucenik" class="w3-radio" type="radio" name="radniStatus" value="Učenik" checked>
                            <label>Učenik</label>
                            <br>
                            <input id="student" class="w3-radio" type="radio" name="radniStatus" value="Student">
                            <label>Student</label>
                            <br>
                            <input id="umirovljenik" class="w3-radio" type="radio" name="radniStatus"
                                   value="Umirovljenik">
                            <label>Umirovljenik</label>
                            <br>
                            <?php break;
                        case 'Student':
                            ?>
                            <input id="zaposlen" class="w3-radio" type="radio" name="radniStatus" value="Zaposlen">
                            <label>Zaposlen</label>
                            <br>
                            <input id="nezaposlen" class="w3-radio" type="radio" name="radniStatus" value="Nezaposlen">
                            <label>Nezaposlen</label>
                            <br>
                            <input id="ucenik" class="w3-radio" type="radio" name="radniStatus" value="Učenik">
                            <label>Učenik</label>
                            <br>
                            <input id="student" class="w3-radio" type="radio" name="radniStatus" value="Student"
                                   checked>
                            <label>Student</label>
                            <br>
                            <input id="umirovljenik" class="w3-radio" type="radio" name="radniStatus"
                                   value="Umirovljenik">
                            <label>Umirovljenik</label>
                            <br>
                            <?php break;
                        case 'Umirovljenik':
                            ?>
                            <input id="zaposlen" class="w3-radio" type="radio" name="radniStatus" value="Zaposlen">
                            <label>Zaposlen</label>
                            <br>
                            <input id="nezaposlen" class="w3-radio" type="radio" name="radniStatus" value="Nezaposlen">
                            <label>Nezaposlen</label>
                            <br>
                            <input id="ucenik" class="w3-radio" type="radio" name="radniStatus" value="Učenik">
                            <label>Učenik</label>
                            <br>
                            <input id="student" class="w3-radio" type="radio" name="radniStatus" value="Student">
                            <label>Student</label>
                            <br>
                            <input id="umirovljenik" class="w3-radio" type="radio" name="radniStatus"
                                   value="Umirovljenik">
                            <label>Umirovljenik</label>
                            <br>
                            <?php break;
                        default:
                            ?>
                            <input id="zaposlen" class="w3-radio" type="radio" name="radniStatus" value="Zaposlen">
                            <label>Zaposlen</label>
                            <br>
                            <input id="nezaposlen" class="w3-radio" type="radio" name="radniStatus" value="Nezaposlen">
                            <label>Nezaposlen</label>
                            <br>
                            <input id="ucenik" class="w3-radio" type="radio" name="radniStatus" value="Učenik">
                            <label>Učenik</label>
                            <br>
                            <input id="student" class="w3-radio" type="radio" name="radniStatus" value="Student">
                            <label>Student</label>
                            <br>
                            <input id="umirovljenik" class="w3-radio" type="radio" name="radniStatus"
                                   value="Umirovljenik" checked>
                            <label>Umirovljenik</label>
                            <br>
                            <?php break;
                    } ?>
                </div>
                <hr>

                Razina obrazovanja
                <div class="w3-row w3-left-align">
                    <?php switch ($row['strucnaSp']) {
                        case 'NK':
                            ?>
                            <input id="nk" class="w3-radio" type="radio" name="strucnaSprema" value="NK" checked>
                            <label>NK (I. niža stručna sprema)</label>
                            <br>
                            <input id="nss" class="w3-radio" type="radio" name="strucnaSprema" value="NSS">
                            <label>PK, NSS (II. niža stručna sprema)</label>
                            <br>
                            <input id="kv" class="w3-radio" type="radio" name="strucnaSprema" value="KV">
                            <label>KV (III. srednja stručna sprema)</label>
                            <br>
                            <input id="sss" class="w3-radio" type="radio" name="strucnaSprema" value="SSS">
                            <label>KV, SSS (IV. srednja stručna sprema, 3-godišnja škola)</label>
                            <br>
                            <input id="vk" class="w3-radio" type="radio" name="strucnaSprema" value="VK">
                            <label>VK (V. srednja stručna sprema – 4-godišnja škola)</label>
                            <br>
                            <input id="spec" class="w3-radio" type="radio" name="strucnaSprema" value="VŠS">
                            <label>VŠS (VI/1. i VI/2. viša stručna sprema ili specijalist)</label>
                            <br>
                            <input id="vss" class="w3-radio" type="radio" name="strucnaSprema" value="VSS">
                            <label>VSS (VII/1. visoka stručna sprema / magistar struke)</label>
                            <br>
                            <input id=mag" class="w3-radio" type="radio" name="strucnaSprema" value="MAG">
                            <label>Magistar (VII/2. magistar znanosti)</label>
                            <br>
                            <input id="dr" class="w3-radio" type="radio" name="strucnaSprema" value="DR">
                            <label>Doktor (VIII. doktor znanosti)</label>
                            <br>
                            <?php break;
                        case 'NSS':
                            ?>
                            <input id="nk" class="w3-radio" type="radio" name="strucnaSprema" value="NK">
                            <label>NK (I. niža stručna sprema)</label>
                            <br>
                            <input id="nss" class="w3-radio" type="radio" name="strucnaSprema" value="NSS" checked>
                            <label>PK, NSS (II. niža stručna sprema)</label>
                            <br>
                            <input id="kv" class="w3-radio" type="radio" name="strucnaSprema" value="KV">
                            <label>KV (III. srednja stručna sprema)</label>
                            <br>
                            <input id="sss" class="w3-radio" type="radio" name="strucnaSprema" value="SSS">
                            <label>KV, SSS (IV. srednja stručna sprema, 3-godišnja škola)</label>
                            <br>
                            <input id="vk" class="w3-radio" type="radio" name="strucnaSprema" value="VK">
                            <label>VK (V. srednja stručna sprema – 4-godišnja škola)</label>
                            <br>
                            <input id="spec" class="w3-radio" type="radio" name="strucnaSprema" value="VŠS">
                            <label>VŠS (VI/1. i VI/2. viša stručna sprema ili specijalist)</label>
                            <br>
                            <input id="vss" class="w3-radio" type="radio" name="strucnaSprema" value="VSS">
                            <label>VSS (VII/1. visoka stručna sprema / magistar struke)</label>
                            <br>
                            <input id=mag" class="w3-radio" type="radio" name="strucnaSprema" value="MAG">
                            <label>Magistar (VII/2. magistar znanosti)</label>
                            <br>
                            <input id="dr" class="w3-radio" type="radio" name="strucnaSprema" value="DR">
                            <label>Doktor (VIII. doktor znanosti)</label>
                            <br>
                            <?php break;
                        case 'KV':
                            ?>
                            <input id="nk" class="w3-radio" type="radio" name="strucnaSprema" value="NK">
                            <label>NK (I. niža stručna sprema)</label>
                            <br>
                            <input id="nss" class="w3-radio" type="radio" name="strucnaSprema" value="NSS">
                            <label>PK, NSS (II. niža stručna sprema)</label>
                            <br>
                            <input id="kv" class="w3-radio" type="radio" name="strucnaSprema" value="KV" checked>
                            <label>KV (III. srednja stručna sprema)</label>
                            <br>
                            <input id="sss" class="w3-radio" type="radio" name="strucnaSprema" value="SSS">
                            <label>KV, SSS (IV. srednja stručna sprema, 3-godišnja škola)</label>
                            <br>
                            <input id="vk" class="w3-radio" type="radio" name="strucnaSprema" value="VK">
                            <label>VK (V. srednja stručna sprema – 4-godišnja škola)</label>
                            <br>
                            <input id="spec" class="w3-radio" type="radio" name="strucnaSprema" value="VŠS">
                            <label>VŠS (VI/1. i VI/2. viša stručna sprema ili specijalist)</label>
                            <br>
                            <input id="vss" class="w3-radio" type="radio" name="strucnaSprema" value="VSS">
                            <label>VSS (VII/1. visoka stručna sprema / magistar struke)</label>
                            <br>
                            <input id=mag" class="w3-radio" type="radio" name="strucnaSprema" value="MAG">
                            <label>Magistar (VII/2. magistar znanosti)</label>
                            <br>
                            <input id="dr" class="w3-radio" type="radio" name="strucnaSprema" value="DR">
                            <label>Doktor (VIII. doktor znanosti)</label>
                            <br>
                            <?php break;
                        case 'SSS':
                            ?>
                            <input id="nk" class="w3-radio" type="radio" name="strucnaSprema" value="NK">
                            <label>NK (I. niža stručna sprema)</label>
                            <br>
                            <input id="nss" class="w3-radio" type="radio" name="strucnaSprema" value="NSS">
                            <label>PK, NSS (II. niža stručna sprema)</label>
                            <br>
                            <input id="kv" class="w3-radio" type="radio" name="strucnaSprema" value="KV">
                            <label>KV (III. srednja stručna sprema)</label>
                            <br>
                            <input id="sss" class="w3-radio" type="radio" name="strucnaSprema" value="SSS" checked>
                            <label>KV, SSS (IV. srednja stručna sprema, 3-godišnja škola)</label>
                            <br>
                            <input id="vk" class="w3-radio" type="radio" name="strucnaSprema" value="VK">
                            <label>VK (V. srednja stručna sprema – 4-godišnja škola)</label>
                            <br>
                            <input id="spec" class="w3-radio" type="radio" name="strucnaSprema" value="VŠS">
                            <label>VŠS (VI/1. i VI/2. viša stručna sprema ili specijalist)</label>
                            <br>
                            <input id="vss" class="w3-radio" type="radio" name="strucnaSprema" value="VSS">
                            <label>VSS (VII/1. visoka stručna sprema / magistar struke)</label>
                            <br>
                            <input id=mag" class="w3-radio" type="radio" name="strucnaSprema" value="MAG">
                            <label>Magistar (VII/2. magistar znanosti)</label>
                            <br>
                            <input id="dr" class="w3-radio" type="radio" name="strucnaSprema" value="DR">
                            <label>Doktor (VIII. doktor znanosti)</label>
                            <br>
                            <?php break;
                        case 'VK':
                            ?>
                            <input id="nk" class="w3-radio" type="radio" name="strucnaSprema" value="NK">
                            <label>NK (I. niža stručna sprema)</label>
                            <br>
                            <input id="nss" class="w3-radio" type="radio" name="strucnaSprema" value="NSS">
                            <label>PK, NSS (II. niža stručna sprema)</label>
                            <br>
                            <input id="kv" class="w3-radio" type="radio" name="strucnaSprema" value="KV">
                            <label>KV (III. srednja stručna sprema)</label>
                            <br>
                            <input id="sss" class="w3-radio" type="radio" name="strucnaSprema" value="SSS">
                            <label>KV, SSS (IV. srednja stručna sprema, 3-godišnja škola)</label>
                            <br>
                            <input id="vk" class="w3-radio" type="radio" name="strucnaSprema" value="VK" checked>
                            <label>VK (V. srednja stručna sprema – 4-godišnja škola)</label>
                            <br>
                            <input id="spec" class="w3-radio" type="radio" name="strucnaSprema" value="VŠS">
                            <label>VŠS (VI/1. i VI/2. viša stručna sprema ili specijalist)</label>
                            <br>
                            <input id="vss" class="w3-radio" type="radio" name="strucnaSprema" value="VSS">
                            <label>VSS (VII/1. visoka stručna sprema / magistar struke)</label>
                            <br>
                            <input id=mag" class="w3-radio" type="radio" name="strucnaSprema" value="MAG">
                            <label>Magistar (VII/2. magistar znanosti)</label>
                            <br>
                            <input id="dr" class="w3-radio" type="radio" name="strucnaSprema" value="DR">
                            <label>Doktor (VIII. doktor znanosti)</label>
                            <br>
                            <?php break;
                        case 'VŠS':
                            ?>
                            <input id="nk" class="w3-radio" type="radio" name="strucnaSprema" value="NK">
                            <label>NK (I. niža stručna sprema)</label>
                            <br>
                            <input id="nss" class="w3-radio" type="radio" name="strucnaSprema" value="NSS">
                            <label>PK, NSS (II. niža stručna sprema)</label>
                            <br>
                            <input id="kv" class="w3-radio" type="radio" name="strucnaSprema" value="KV">
                            <label>KV (III. srednja stručna sprema)</label>
                            <br>
                            <input id="sss" class="w3-radio" type="radio" name="strucnaSprema" value="SSS">
                            <label>KV, SSS (IV. srednja stručna sprema, 3-godišnja škola)</label>
                            <br>
                            <input id="vk" class="w3-radio" type="radio" name="strucnaSprema" value="VK">
                            <label>VK (V. srednja stručna sprema – 4-godišnja škola)</label>
                            <br>
                            <input id="spec" class="w3-radio" type="radio" name="strucnaSprema" value="VŠS" checked>
                            <label>VŠS (VI/1. i VI/2. viša stručna sprema ili specijalist)</label>
                            <br>
                            <input id="vss" class="w3-radio" type="radio" name="strucnaSprema" value="VSS">
                            <label>VSS (VII/1. visoka stručna sprema / magistar struke)</label>
                            <br>
                            <input id=mag" class="w3-radio" type="radio" name="strucnaSprema" value="MAG">
                            <label>Magistar (VII/2. magistar znanosti)</label>
                            <br>
                            <input id="dr" class="w3-radio" type="radio" name="strucnaSprema" value="DR">
                            <label>Doktor (VIII. doktor znanosti)</label>
                            <br>
                            <?php break;
                        case 'VSS':
                            ?>
                            <input id="nk" class="w3-radio" type="radio" name="strucnaSprema" value="NK">
                            <label>NK (I. niža stručna sprema)</label>
                            <br>
                            <input id="nss" class="w3-radio" type="radio" name="strucnaSprema" value="NSS">
                            <label>PK, NSS (II. niža stručna sprema)</label>
                            <br>
                            <input id="kv" class="w3-radio" type="radio" name="strucnaSprema" value="KV">
                            <label>KV (III. srednja stručna sprema)</label>
                            <br>
                            <input id="sss" class="w3-radio" type="radio" name="strucnaSprema" value="SSS">
                            <label>KV, SSS (IV. srednja stručna sprema, 3-godišnja škola)</label>
                            <br>
                            <input id="vk" class="w3-radio" type="radio" name="strucnaSprema" value="VK">
                            <label>VK (V. srednja stručna sprema – 4-godišnja škola)</label>
                            <br>
                            <input id="spec" class="w3-radio" type="radio" name="strucnaSprema" value="VŠS">
                            <label>VŠS (VI/1. i VI/2. viša stručna sprema ili specijalist)</label>
                            <br>
                            <input id="vss" class="w3-radio" type="radio" name="strucnaSprema" value="VSS" checked>
                            <label>VSS (VII/1. visoka stručna sprema / magistar struke)</label>
                            <br>
                            <input id=mag" class="w3-radio" type="radio" name="strucnaSprema" value="MAG">
                            <label>Magistar (VII/2. magistar znanosti)</label>
                            <br>
                            <input id="dr" class="w3-radio" type="radio" name="strucnaSprema" value="DR">
                            <label>Doktor (VIII. doktor znanosti)</label>
                            <br>
                            <?php break;
                        case 'MAG':
                            ?>
                            <input id="nk" class="w3-radio" type="radio" name="strucnaSprema" value="NK">
                            <label>NK (I. niža stručna sprema)</label>
                            <br>
                            <input id="nss" class="w3-radio" type="radio" name="strucnaSprema" value="NSS">
                            <label>PK, NSS (II. niža stručna sprema)</label>
                            <br>
                            <input id="kv" class="w3-radio" type="radio" name="strucnaSprema" value="KV">
                            <label>KV (III. srednja stručna sprema)</label>
                            <br>
                            <input id="sss" class="w3-radio" type="radio" name="strucnaSprema" value="SSS">
                            <label>KV, SSS (IV. srednja stručna sprema, 3-godišnja škola)</label>
                            <br>
                            <input id="vk" class="w3-radio" type="radio" name="strucnaSprema" value="VK">
                            <label>VK (V. srednja stručna sprema – 4-godišnja škola)</label>
                            <br>
                            <input id="spec" class="w3-radio" type="radio" name="strucnaSprema" value="VŠS">
                            <label>VŠS (VI/1. i VI/2. viša stručna sprema ili specijalist)</label>
                            <br>
                            <input id="vss" class="w3-radio" type="radio" name="strucnaSprema" value="VSS">
                            <label>VSS (VII/1. visoka stručna sprema / magistar struke)</label>
                            <br>
                            <input id=mag" class="w3-radio" type="radio" name="strucnaSprema" value="MAG" checked>
                            <label>Magistar (VII/2. magistar znanosti)</label>
                            <br>
                            <input id="dr" class="w3-radio" type="radio" name="strucnaSprema" value="DR">
                            <label>Doktor (VIII. doktor znanosti)</label>
                            <br>
                            <?php break;
                        case 'DR':
                            ?>
                            <input id="nk" class="w3-radio" type="radio" name="strucnaSprema" value="NK">
                            <label>NK (I. niža stručna sprema)</label>
                            <br>
                            <input id="nss" class="w3-radio" type="radio" name="strucnaSprema" value="NSS">
                            <label>PK, NSS (II. niža stručna sprema)</label>
                            <br>
                            <input id="kv" class="w3-radio" type="radio" name="strucnaSprema" value="KV">
                            <label>KV (III. srednja stručna sprema)</label>
                            <br>
                            <input id="sss" class="w3-radio" type="radio" name="strucnaSprema" value="SSS">
                            <label>KV, SSS (IV. srednja stručna sprema, 3-godišnja škola)</label>
                            <br>
                            <input id="vk" class="w3-radio" type="radio" name="strucnaSprema" value="VK">
                            <label>VK (V. srednja stručna sprema – 4-godišnja škola)</label>
                            <br>
                            <input id="spec" class="w3-radio" type="radio" name="strucnaSprema" value="VŠS">
                            <label>VŠS (VI/1. i VI/2. viša stručna sprema ili specijalist)</label>
                            <br>
                            <input id="vss" class="w3-radio" type="radio" name="strucnaSprema" value="VSS">
                            <label>VSS (VII/1. visoka stručna sprema / magistar struke)</label>
                            <br>
                            <input id=mag" class="w3-radio" type="radio" name="strucnaSprema" value="MAG">
                            <label>Magistar (VII/2. magistar znanosti)</label>
                            <br>
                            <input id="dr" class="w3-radio" type="radio" name="strucnaSprema" value="DR" checked>
                            <label>Doktor (VIII. doktor znanosti)</label>
                            <br>
                            <?php break;
                        default:
                            ?>
                            <input id="nk" class="w3-radio" type="radio" name="strucnaSprema" value="NK">
                            <label>NK (I. niža stručna sprema)</label>
                            <br>
                            <input id="nss" class="w3-radio" type="radio" name="strucnaSprema" value="NSS">
                            <label>PK, NSS (II. niža stručna sprema)</label>
                            <br>
                            <input id="kv" class="w3-radio" type="radio" name="strucnaSprema" value="KV">
                            <label>KV (III. srednja stručna sprema)</label>
                            <br>
                            <input id="sss" class="w3-radio" type="radio" name="strucnaSprema" value="SSS">
                            <label>KV, SSS (IV. srednja stručna sprema, 3-godišnja škola)</label>
                            <br>
                            <input id="vk" class="w3-radio" type="radio" name="strucnaSprema" value="VK">
                            <label>VK (V. srednja stručna sprema – 4-godišnja škola)</label>
                            <br>
                            <input id="spec" class="w3-radio" type="radio" name="strucnaSprema" value="VŠS">
                            <label>VŠS (VI/1. i VI/2. viša stručna sprema ili specijalist)</label>
                            <br>
                            <input id="vss" class="w3-radio" type="radio" name="strucnaSprema" value="VSS">
                            <label>VSS (VII/1. visoka stručna sprema / magistar struke)</label>
                            <br>
                            <input id=mag" class="w3-radio" type="radio" name="strucnaSprema" value="MAG">
                            <label>Magistar (VII/2. magistar znanosti)</label>
                            <br>
                            <input id="dr" class="w3-radio" type="radio" name="strucnaSprema" value="DR">
                            <label>Doktor (VIII. doktor znanosti)</label>
                            <br>
                            <?php break;
                    } ?>
                </div>
                <hr>
                Koliko vremena možete izdvojiti za volonterski rad?
                <div class="w3-row w3-left-align">
                    <?php switch ($row['dostupnost']) {
                        case 'Jednom tjedno':
                            ?>
                            <input id="jt" class="w3-radio" type="radio" name="dostupnost" value="Jednom tjedno"
                                   checked>
                            <label>Jednom tjedno</label>
                            <br>
                            <input id="vm" class="w3-radio" type="radio" name="dostupnost" value="Više puta mjesečno">
                            <label>Više puta mjesečno</label>
                            <br>
                            <input id="jm" class="w3-radio" type="radio" name="dostupnost" value="Jednom mjesečno">
                            <label>Jednom mjesečno</label>
                            <br>
                            <input id="pp" class="w3-radio" type="radio" name="dostupnost" value="Po potrebi">
                            <label>Po potrebi</label>
                            <br>
                            <?php break;
                        case 'Više puta mjesečno':
                            ?>
                            <input id="jt" class="w3-radio" type="radio" name="dostupnost" value="Jednom tjedno">
                            <label>Jednom tjedno</label>
                            <br>
                            <input id="vm" class="w3-radio" type="radio" name="dostupnost" value="Više puta mjesečno"
                                   checked>
                            <label>Više puta mjesečno</label>
                            <br>
                            <input id="jm" class="w3-radio" type="radio" name="dostupnost" value="Jednom mjesečno">
                            <label>Jednom mjesečno</label>
                            <br>
                            <input id="pp" class="w3-radio" type="radio" name="dostupnost" value="Po potrebi">
                            <label>Po potrebi</label>
                            <br>
                            <?php break;
                        case 'Jednom mjesečno':
                            ?>
                            <input id="jt" class="w3-radio" type="radio" name="dostupnost" value="Jednom tjedno">
                            <label>Jednom tjedno</label>
                            <br>
                            <input id="vm" class="w3-radio" type="radio" name="dostupnost" value="Više puta mjesečno">
                            <label>Više puta mjesečno</label>
                            <br>
                            <input id="jm" class="w3-radio" type="radio" name="dostupnost" value="Jednom mjesečno"
                                   checked>
                            <label>Jednom mjesečno</label>
                            <br>
                            <input id="pp" class="w3-radio" type="radio" name="dostupnost" value="Po potrebi">
                            <label>Po potrebi</label>
                            <br>
                            <?php break;
                        case 'Po potrebi':
                            ?>
                            <input id="jt" class="w3-radio" type="radio" name="dostupnost" value="Jednom tjedno">
                            <label>Jednom tjedno</label>
                            <br>
                            <input id="vm" class="w3-radio" type="radio" name="dostupnost" value="Više puta mjesečno">
                            <label>Više puta mjesečno</label>
                            <br>
                            <input id="jm" class="w3-radio" type="radio" name="dostupnost" value="Jednom mjesečno">
                            <label>Jednom mjesečno</label>
                            <br>
                            <input id="pp" class="w3-radio" type="radio" name="dostupnost" value="Po potrebi" checked>
                            <label>Po potrebi</label>
                            <br>
                            <?php break;
                        default:
                            ?>
                            <input id="jt" class="w3-radio" type="radio" name="dostupnost" value="Jednom tjedno">
                            <label>Jednom tjedno</label>
                            <br>
                            <input id="vm" class="w3-radio" type="radio" name="dostupnost" value="Više puta mjesečno">
                            <label>Više puta mjesečno</label>
                            <br>
                            <input id="jm" class="w3-radio" type="radio" name="dostupnost" value="Jednom mjesečno">
                            <label>Jednom mjesečno</label>
                            <br>
                            <input id="pp" class="w3-radio" type="radio" name="dostupnost" value="Po potrebi">
                            <label>Po potrebi</label>
                            <br>
                            <?php break;
                    } ?>
                </div>
                <hr>
                Glavni interesi:
                <div class="w3-row w3-left-align">
                    <?php
                    $allInteresi = ['Sudjelovanje u provedbi zdravstveno preventivnih aktivnosti', 'Provedba redovnih zajedničkih akcija HCK', 'Socijalni programi u GDCK Opatija', 'Rad s mladima', 'Mediji', 'Promidžba davalaštva krvi', 'Služba traženja-tečaj', 'Edukacija u pružanju prve pomoći kao člana tima za izvanredne situacije', 'Član tima za logistiku u izvanrednim situacijama'];
                    $interes = explode(',', $row['interes']);
                    for ($i = 0; $i < count($interes); $i++) {
                        switch ($interes[$i]) {
                            case 'Sudjelovanje u provedbi zdravstveno preventivnih aktivnosti':
                                ?>
                                <input class="w3-check" type="checkbox" name="interes[]"
                                       value="Sudjelovanje u provedbi zdravstveno preventivnih aktivnosti" checked>
                                <label>Sudjelovanje u provedbi zdravstveno preventivnih aktivnosti</label>
                                <br><?php break;
                            case 'Provedba redovnih zajedničkih akcija HCK':
                                ?>
                                <input class="w3-check" type="checkbox" name="interes[]"
                                       value="Provedba redovnih zajedničkih akcija HCK" checked>
                                <label>Provedba redovnih zajedničkih akcija HCK</label>
                                <br>
                                <?php break;
                            case 'Socijalni programi u GDCK Opatija':
                                ?>
                                <input class="w3-check" type="checkbox" name="interes[]"
                                       value="Socijalni programi u GDCK Opatija" checked>
                                <label>Socijalni programi u GDCK Opatija</label>
                                <br>
                                <?php break;
                            case 'Rad s mladima':
                                ?>
                                <input class="w3-check" type="checkbox" name="interes[]" value="Rad s mladima" checked>
                                <label>Rad s mladima</label>
                                <br>
                                <?php break;
                            case 'Mediji':
                                ?>
                                <input class="w3-check" type="checkbox" name="interes[]" value="Mediji" checked>
                                <label>Mediji</label>
                                <br>
                                <?php break;
                            case 'Promidžba davalaštva krvi':
                                ?>
                                <input class="w3-check" type="checkbox" name="interes[]"
                                       value="Promidžba davalaštva krvi" checked>
                                <label>Promidžba davalaštva krvi</label>
                                <br>
                                <?php break;
                            case 'Služba traženja-tečaj':
                                ?>
                                <input class="w3-check" type="checkbox" name="interes[]"
                                       value="Služba traženja-tečaj" checked>
                                <label>Služba traženja-tečaj</label>
                                <br>
                                <?php break;
                            case 'Edukacija u pružanju prve pomoći kao člana tima za izvanredne situacije':
                                ?>
                                <input class="w3-check" type="checkbox" name="interes[]"
                                       value="Edukacija u pružanju prve pomoći kao člana tima za izvanredne situacije"
                                       checked>
                                <label>Edukacija u pružanju prve pomoći kao člana tima za izvanredne situacije</label>
                                <br>
                                <?php break;
                            case 'Član tima za logistiku u izvanrednim situacijama':
                                ?>
                                <input class="w3-check" type="checkbox" name="interes[]"
                                       value="Član tima za logistiku u izvanrednim situacijama" checked>
                                <label>Član tima za logistiku u izvanrednim situacijama</label>
                                <br>
                            <?php
                            //switch
                        }

                        //for
                    }
                    $allInteresi = array_diff($allInteresi, $interes);
                    for ($i = 0; $i < count($allInteresi); $i++) {
                        switch ($allInteresi[$i]) {
                            case 'Sudjelovanje u provedbi zdravstveno preventivnih aktivnosti':
                                ?>
                                <input class="w3-check" type="checkbox" name="interes[]"
                                       value="Sudjelovanje u provedbi zdravstveno preventivnih aktivnosti">
                                <label>Sudjelovanje u provedbi zdravstveno preventivnih aktivnosti</label>
                                <br><?php break;
                            case 'Provedba redovnih zajedničkih akcija HCK':
                                ?>
                                <input class="w3-check" type="checkbox" name="interes[]"
                                       value="Provedba redovnih zajedničkih akcija HCK">
                                <label>Provedba redovnih zajedničkih akcija HCK</label>
                                <br>
                                <?php break;
                            case 'Socijalni programi u GDCK Opatija':
                                ?>
                                <input class="w3-check" type="checkbox" name="interes[]"
                                       value="Socijalni programi u GDCK Opatija">
                                <label>Socijalni programi u GDCK Opatija</label>
                                <br>
                                <?php break;
                            case 'Rad s mladima':
                                ?>
                                <input class="w3-check" type="checkbox" name="interes[]" value="Rad s mladima">
                                <label>Rad s mladima</label>
                                <br>
                                <?php break;
                            case 'Mediji':
                                ?>
                                <input class="w3-check" type="checkbox" name="interes[]" value="Mediji">
                                <label>Mediji</label>
                                <br>
                                <?php break;
                            case 'Promidžba davalaštva krvi':
                                ?>
                                <input class="w3-check" type="checkbox" name="interes[]"
                                       value="Promidžba davalaštva krvi">
                                <label>Promidžba davalaštva krvi</label>
                                <br>
                                <?php break;
                            case 'Služba traženja-tečaj':
                                ?>
                                <input class="w3-check" type="checkbox" name="interes[]"
                                       value="Služba traženja-tečaj">
                                <label>Služba traženja-tečaj</label>
                                <br>
                                <?php break;
                            case 'Edukacija u pružanju prve pomoći kao člana tima za izvanredne situacije':
                                ?>
                                <input class="w3-check" type="checkbox" name="interes[]"
                                       value="Edukacija u pružanju prve pomoći kao člana tima za izvanredne situacije">
                                <label>Edukacija u pružanju prve pomoći kao člana tima za izvanredne situacije</label>
                                <br>
                                <?php break;
                            case 'Član tima za logistiku u izvanrednim situacijama':
                                ?>
                                <input class="w3-check" type="checkbox" name="interes[]"
                                       value="Član tima za logistiku u izvanrednim situacijama">
                                <label>Član tima za logistiku u izvanrednim situacijama</label>
                                <br>
                            <?php
                            //switch
                        }

                        //for
                    }
                    ?>
                </div>
                <hr>
                Status člana:
                <div class="w3-row w3-left-align">
                    <?php switch ($row['aktivnost']) {
                        case 'Aktivan':
                            ?>
                            <input id="aktivan" class="w3-radio" type="radio" name="aktivnost" value="Aktivan" checked>
                            <label>Aktivan</label>
                            <br>
                            <input id="pasivan" class="w3-radio" type="radio" name="aktivnost" value="Pasivan">
                            <label>Pasivan</label>
                            <br>
                            <input id="potporan" class="w3-radio" type="radio" name="aktivnost" value="Potporni">
                            <label>Potporni</label>
                            <br>
                            <input id="pocasni" class="w3-radio" type="radio" name="aktivnost" value="Počasni">
                            <label>Počasni</label>
                            <br>
                            <?php break;
                        case 'Pasivan':
                            ?>
                            <input id="aktivan" class="w3-radio" type="radio" name="aktivnost" value="Aktivan">
                            <label>Aktivan</label>
                            <br>
                            <input id="pasivan" class="w3-radio" type="radio" name="aktivnost" value="Pasivan" checked>
                            <label>Pasivan</label>
                            <br>
                            <input id="potporan" class="w3-radio" type="radio" name="aktivnost" value="Potporni">
                            <label>Potporni</label>
                            <br>
                            <input id="pocasni" class="w3-radio" type="radio" name="aktivnost" value="Počasni">
                            <label>Počasni</label>
                            <br>
                            <?php break;
                        case 'Potporni':
                            ?>
                            <input id="aktivan" class="w3-radio" type="radio" name="aktivnost" value="Aktivan">
                            <label>Aktivan</label>
                            <br>
                            <input id="pasivan" class="w3-radio" type="radio" name="aktivnost" value="Pasivan">
                            <label>Pasivan</label>
                            <br>
                            <input id="potporan" class="w3-radio" type="radio" name="aktivnost" value="Potporni"
                                   checked>
                            <label>Potporni</label>
                            <br>
                            <input id="pocasni" class="w3-radio" type="radio" name="aktivnost" value="Počasni">
                            <label>Počasni</label>
                            <br>
                            <?php break;
                        case 'Počasni':
                            ?>
                            <input id="aktivan" class="w3-radio" type="radio" name="aktivnost" value="Aktivan">
                            <label>Aktivan</label>
                            <br>
                            <input id="pasivan" class="w3-radio" type="radio" name="aktivnost" value="Pasivan">
                            <label>Pasivan</label>
                            <br>
                            <input id="potporan" class="w3-radio" type="radio" name="aktivnost" value="Potporni">
                            <label>Potporni</label>
                            <br>
                            <input id="pocasni" class="w3-radio" type="radio" name="aktivnost" value="Počasni" checked>
                            <label>Počasni</label>
                            <br>
                            <?php break;
                        default:
                            ?>
                            <input id="aktivan" class="w3-radio" type="radio" name="aktivnost" value="Aktivan">
                            <label>Aktivan</label>
                            <br>
                            <input id="pasivan" class="w3-radio" type="radio" name="aktivnost" value="Pasivan">
                            <label>Pasivan</label>
                            <br>
                            <input id="potporan" class="w3-radio" type="radio" name="aktivnost" value="Potporni">
                            <label>Potporni</label>
                            <br>
                            <input id="pocasni" class="w3-radio" type="radio" name="aktivnost" value="Počasni">
                            <label>Počasni</label>
                            <br>
                            <?php break;
                    } ?>
                </div>
                <hr>
                Volonter:
                <div class="w3-row w3-left-align">
                    <?php switch ($row['uloga']) {
                        case 'Da':
                            ?>
                            <input id="volonter" class="w3-radio" type="radio" name="uloga" value="Da" checked>
                            <label>Da</label>
                            <br>
                            <input id="volonter" class="w3-radio" type="radio" name="uloga" value="Ne">
                            <label>Ne</label>
                            <?php break;
                        case 'Ne':
                            ?>
                            <input id="volonter" class="w3-radio" type="radio" name="uloga" value="Da">
                            <label>Da</label>
                            <br>
                            <input id="volonter" class="w3-radio" type="radio" name="uloga" value="Ne" checked>
                            <label>Ne</label>
                            <?php break;
                        default:
                            ?>
                            <input id="volonter" class="w3-radio" type="radio" name="uloga" value="Da">
                            <label>Da</label>
                            <br>
                            <input id="volonter" class="w3-radio" type="radio" name="uloga" value="Ne">
                            <label>Ne</label>
                            <?php
                            break;
                    }
                    ?>
                    <hr>
                    Clanstvo:
                    <div class="w3-row w3-left-align">
                        <?php switch ($row['clanstvo']) {
                            case 'k60':
                                ?>
                                <input id="k60" class="w3-radio" type="radio" name="clanstvo" value="k60" checked>
                                <label>Klub 60+</label>
                                <br>
                                <input id="knz" class="w3-radio" type="radio" name="clanstvo" value="knz">
                                <label>Klub "Novi život"</label>
                                <?php break;
                            case 'knz':
                                ?>
                                <input id="k60" class="w3-radio" type="radio" name="clanstvo" value="k60">
                                <label>Klub 60+</label>
                                <br>
                                <input id="knz" class="w3-radio" type="radio" name="clanstvo" value="knz" checked>
                                <label>Klub "Novi život</label>
                                <?php break;
                            default:
                                ?>
                                <input id="k60" class="w3-radio" type="radio" name="uloga" value="k60">
                                <label>Klub 60+</label>
                                <br>
                                <input id="knz" class="w3-radio" type="radio" name="uloga" value="knz">
                                <label>Klub "Novi život</label>
                                <?php
                                break;
                        }
                        ?>
                    <br>
                </div>
                <hr>
                <div class="w3-padding">
                <button class="w3-button w3-white w3-xlarge w3-round-large w3-hover-green" type="submit" name="submit">
                    <i
                            class="fas fa-check fa-5x" style="font-size:50px"></i></button></div>
            </form>
            </p>
        </div>
        <?php } ?>

        <div class="w3-container w3-cell w3-cell-bottom w3-third">

        </div>

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
<script type="text/javascript">
    function myFunction(id) {
        var x = document.getElementById(id);
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }
</script>
</body>
</html>
