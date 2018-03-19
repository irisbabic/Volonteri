<?php
include_once ("check.php");
include_once ("conn.php");

$id = test_input($_GET['id']);
$sql = "DELETE FROM ck_volonteri.aktivnost WHERE id_aktivnosti='$id'";

$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("Location: allAktivnosti.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_free_result($result);
$conn->close();
?>