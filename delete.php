<?php
include 'config.php';

$id = $_GET['id'];

$query = "DELETE FROM expenses WHERE id = $id";
mysqli_query($conn, $query);

header("Location: index.php");
exit;
