<?php
include '../model/Add_records.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['id'])) {
    $Id = $_POST['id'];
    $userData = getUserData($Id);
    echo "<h2>previous Profile</h2>";
    if ($userData) {
        echo "Email: " . $userData['email'] . "<br>";
        echo "Number: " . $userData['num'] . "<br>";
    } else {
        echo "No data found.";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_email'])) {
    $Id = $_POST['id'];
    $newEmail = $_POST['new_email']; 
    
    updateEmail($Id, $newEmail);

    $userData = getUserData($Id);
    
    echo "<h2>New Profile</h2>";

    if ($userData) {
        echo "Email: " . $userData['email'] . "<br>"; 
        echo "Number: " . $userData['num'] . "<br>";
    } else {
        echo "No data found.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_num'])) {
    $Id = $_POST['id'];
    $newNumber = $_POST['new_num'];
    
    updateNumber($Id, $newNumber); 
    $userData = getUserData($Id);

    echo "<h2>New Profile</h2>";

    if ($userData) {
        echo "Email: " . $userData['email'] . "<br>";
        echo "Number: " . $userData['num'] . "<br>";
    } else {
        echo "No data found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
</head>
<body>
    <h2>Update User</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
        New Email: <input type="text" name="new_email">
        <button type="submit" name="update_email">Update Email</button> 
        <br><br>
        New Number: <input type="text" name="new_num"> 
        <button type="submit" name="update_num">Update Number</button>
    </form>
    <a href="../views/recordform.php">All Records</a>
</body>
</html>
