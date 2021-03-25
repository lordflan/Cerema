<?php
$conn = new mysqli("db", "root", "dreams", "cerema");
  
if ($conn->connect_error) {
  die("ERROR: Unable to connect: " . $conn->connect_error);
} 

echo 'Connected to the database.<br>';

$result = $conn->query("SELECT * FROM famille");

echo "Number of rows: $result->num_rows";

$result->close();

$conn->close();
?>