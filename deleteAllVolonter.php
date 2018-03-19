<?php
include_once ("check.php");
include_once ("conn.php");
$oib = test_input($_GET["oib"]);
$sql = "DELETE * FROM ck_volonteri.volonter WHERE oib='$oib'";

$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("Location: allVolonteri.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_free_result($result);
$conn->close();
?>