<?php
include_once ("check.php");
include_once ("conn.php");
$id = test_input($_GET['id_umirovljenika']);
$sql = "DELETE * FROM ck_volonteri.k60 WHERE id_umirovljenika='$id'";

$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("Location: allUmirovljenici.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_free_result($result);
$conn->close();
?>