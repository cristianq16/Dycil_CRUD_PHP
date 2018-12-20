<?php 

$conn = new mysqli('localhost','root', '', 'crud');
if ($conn->connect_error) {
    echo $error = $conn->connect_error;
}
?>