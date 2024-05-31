<?php
include '../model/Add_records.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
    $userId = $_POST['user_id'];
    removeRecord($userId); 
    header("Location: ../views/recordform.php"); 
    exit(); 
}
?>