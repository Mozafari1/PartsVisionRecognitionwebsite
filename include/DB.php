<?php
$conn = mysqli_connect("localhost", "root", "", "bach_1");
if (mysqli_connect_errno()) {
    echo "Connecting to DB failed: " . mysqli_connect_error();
}
$ConnectingDB = new mysqli("localhost", "root", "", "bach_1");
