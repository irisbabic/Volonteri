<?php
// define variables and set to empty values
/*$servername = "localhost";
$username = "id4908067_root";
$password = ".sombermind.2909";
$dbname = "id4908067_ck_volonteri"; */
$servername = "localhost";
$username = "root";
$password = ".sombermind.2909";
$dbname = "ck_volonteri";
$ukupno = 0;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function izracun($start, $end){
    $start = explode(":",$start);
    $end = explode(":",$end);
    $start_h = $start[0];
    $start_m = $start[1];
    $end_h = $end[0];
    $end_m = $end[1];

    $min = 60 - $start_m;
    $h = $end_h - ($start_h + 1);
    $min += $end_m;
    if($min >= 60){
        $min -= 60;
        $h += 1;
    }
    $ukupno = $h.":".$min;

    return $ukupno;
}


function dob($d, $m, $g)
{
    if (in_array($m, ["01", "03", "05", "07", "08", "10", "12"])) {
        $d = 31 - intval($d);
    } else {
        $d = 30 - intval($d);
    }

    $m = $m + 1;
    $m = 12 - $m;

    $g = $g + 1;
    $g = date("Y") - $g;
    return $g;
}
?>