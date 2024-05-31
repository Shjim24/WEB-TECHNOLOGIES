<?php
$isValid = 1;

function sanitize($data) {
    $data = htmlspecialchars($data);
    return $data;
}

function validateFirstName($firstName) {
    global $isValid;
    if (empty($firstName)) {
        $isValid = 0;
        return "First name is empty";
    }
    return "";
}

function validateLastName($lastName) {
    global $isValid;
    if (empty($lastName)) {
        $isValid = 0;
        return "Last name is empty";
    }

    return "";
}

function validateGender($gender) {
    global $isValid;
    if (empty($gender)) {
        $isValid = 0;
        return "Gender is required";
    } else {
        return '';
    }

}

function validateFatherName($fatherName) {
    global $isValid;
    if (empty($fatherName)) {
        $isValid = 0;
        return "Father's name is empty";
    }

    return "";
}

function validateMotherName($motherName) {
    global $isValid;
    if (empty($motherName)) {
        $isValid = 0;
        return "Mother's name is empty";
    }

    return "";
}

function validateBloodGroup($bloodGroup) {
    global $isValid;
    if (empty($bloodGroup)) {
        $isValid = 0;
        return "Blood group is empty";
    }

    return "";
}

function validateReligion($religion) {
    global $isValid;
    if (empty($religion)) {
        $isValid = 0;
        return "Religion is empty";
    }

    return "";
}

function validateEmail($email) {
    global $isValid;
    if (empty($email)) {
        $isValid = 0;
        return "Email is empty";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $isValid = 0;
        return "Invalid email format";
    }

    
    return "";
}

function validatePhoneNumber($phoneNumber) {
    global $isValid;
    if (empty($phoneNumber)) {
        $isValid = 0;
        return "Phone number is empty";
    } elseif (!preg_match("/^[0-9]{11}$/", $phoneNumber)) {
        $isValid = 0;
        return "Invalid phone number format";
    }
    return "";
}

function validateWebsite($website) {
    global $isValid;
    if (empty($website)) {
        $isValid = 0;
        return "Empty";
    } elseif (!filter_var($website, FILTER_VALIDATE_URL)) {
        $isValid = 0;
        return "Invalid website URL";
    }
    return "";
}

function validateAddress($address) {
    global $isValid;
    if (empty($address)) {
        $isValid = 0;
        return "Address is empty";
    }
    return "";
}

function validatePostcode($postcode) {
    global $isValid;
    if (empty($postcode)) {
        $isValid = 0;
        return "Postcode is empty";
    }
    return "";
}

function validateUsername($username) {
    global $isValid;
    if (empty($username)) {
        $isValid = 0;
        return "Username is empty";
    }
    return "";
}

function validatePassword($password) {
    global $isValid;
    if (empty($password)) {
        $isValid = 0;
        return "Password is empty";
    }
    return "";
}

function validateConfirmPassword($password, $confirmPassword) {
    global $isValid;
    if (empty($confirmPassword)) {
        $isValid = 0;
        return "Confirm password is empty";
    } elseif ($password !== $confirmPassword) {
        $isValid = 0;
        return "Passwords do not match";
    }
    return "";
}

function success(){
    global $isValid;

    if ($isValid) {
        header("C:/xampp/htdocs/2/profile.php");
        $_SESSION['formData']=$_POST;

    }
}
?>