<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
function addRecord($email, $num) {
    global $conn;
    try {
        $stmt = $conn->prepare("INSERT INTO users (user_email, user_num) VALUES (?, ?)");
        if (!$stmt) {
            throw new Exception("Failed to prepare statement: " . $conn->error);
        }
        $stmt->bind_param("ss", $email, $num);
        $stmt->execute();
        echo "<p>New record added</p><br>"; 
    } catch (Exception $e) {
        error_log($e->getMessage()); 
        echo "<p>An error occurred while adding the record. Please try again later.</p>"; 
    } finally {
        $stmt->close();
    }
}


function updateEmail($id, $email) {
    global $conn;
    try {
        $stmt = $conn->prepare("UPDATE users SET user_email = ? WHERE user_id = ?");
        if (!$stmt) {
            throw new Exception("Failed to prepare statement"); 
        }
        $stmt->bind_param("si", $email, $id);
        $stmt->execute();
        echo "<p>Email updated</p><br>";  
        $stmt->close();
    } catch (Exception $e) {
        echo "<p>Error</p>"; 
    }
}

function updateNum($id, $num) {
    global $conn;
    try {
        $stmt = $conn->prepare("UPDATE users SET user_num = ? WHERE user_id = ?");
        if (!$stmt) {
            throw new Exception("Failed to prepare statement"); 
        }
        $stmt->bind_param("si", $num, $id);
        $stmt->execute();
        echo "<p>Number updated</p><br>"; 
        $stmt->close();
    } catch (Exception $e) {
        echo "<p>Error</p>"; 
    }
}

function removeRecord($id) {
    global $conn;
    try {
        $stmt = $conn->prepare("DELETE FROM users WHERE user_id = ?");
        if (!$stmt) {
            throw new Exception("Failed to prepare statement"); 
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        echo "<p>Record deleted</p><br>"; 
        $stmt->close();
    } catch (Exception $e) {
        echo "<p>Error</p>"; 
    }
}

function getAll() {
    global $conn;
    try {
        $stmt = $conn->prepare("SELECT user_id, user_email, user_num FROM users");
        if (!$stmt) {
            throw new Exception("Failed to prepare statement"); 
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $data = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    } catch (Exception $e) {
        echo "<p>Error</p>"; 
    }
}

function getDetails($id) {
    global $conn;
    try {
        $stmt = $conn->prepare("SELECT user_email, user_num FROM users WHERE user_id = ?");
        if (!$stmt) {
            throw new Exception("Failed to prepare statement"); 
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return array("email" => $row['user_email'], "num" => $row['user_num']);
        } else {
            return null; 
        }
    } catch (Exception $e) {
        echo "<p>Error</p>"; 
    }
}
?>
