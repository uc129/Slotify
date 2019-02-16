<?php

ob_start();
session_start();

$timezone=date_default_timezone_set("Asia/Kolkata");

$host = "localhost";
$id = "root";
$pass = "";
$db = "slotify";

$conn = mysqli_connect("$host", "$id", "$pass", "$db");

if (mysqli_connect_errno()) {
    echo "Failed to Connect" .mysql_connect_errno();
}
// else{
//     echo "Connected";
// }


?>