<?php
$conn = new mysqli("localhost", "root", "", "retail_store");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>