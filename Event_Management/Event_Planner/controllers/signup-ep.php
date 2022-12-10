<?php
session_start();

// Check the method of the request
// If request methot is not POST redirect to the register page
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $_SESSION['error'] = "Invalid request method!";
    header("location: ../sign_up_form.php");
} else {
    // include the database config file
    include_once '../../constants.php';

    // remove white spaces and unwanted special characters
    function chekcInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // get all data that have been received from post method
    $firstname = chekcInput($_POST['firstname']);
    $lastname = chekcInput($_POST['lastname']);
    $email = chekcInput($_POST['email']);
    $nic = chekcInput($_POST['nic']);
    $contact = chekcInput($_POST['contact']);
    $password = chekcInput($_POST['password']);
    $cpassword = chekcInput($_POST['cpassword']);
    $address = chekcInput($_POST['address']);
    $city = chekcInput($_POST['city']);
    $zip = chekcInput($_POST['zip']);

    // Validation patterns
    $onlyLetters = "/^[a-zA-Z ]*$/";
    $nicPattern1 = "/^[0-9]{9}[vVxX]$/";
    $nicPattern2 = "/^[0-9]{12}$/";
    $contactPattern = "/^[0-9]{10}$/";
    $passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";

    // Validate firstname
    if (empty($firstname)) {
        $_SESSION['error-firstname'] = "First name is required";
    } else if (!preg_match($onlyLetters, $firstname)) {
        // firstname can only contain letters and whitespace
        $_SESSION['error-firstname'] = "Only letters allowed";
    }


    // Validate lastname
    if (empty($lastname)) {
        $_SESSION['error-lastname'] = "Last name is required";
    } else if (!preg_match($onlyLetters, $lastname)) {
        // firstname can only contain letters and whitespace
        $_SESSION['error-lastname'] = "Only letters allowed";
    }

    // Validate email
    if (empty($email)) {
        $_SESSION['error-email'] = "Email is required";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error-email'] = "Invalid email format! (example@email.com)";
    }

    // Validate nic
    if (empty($nic)) {
        $_SESSION['error-nic'] = "NIC is required";
    } else if (!preg_match($nicPattern1, $nic) && !preg_match($nicPattern2, $nic)) {
        $_SESSION['error-nic'] = "Invalid NIC format! (991458412V or 199958723614)";
    }

    // Validate contact
    if (empty($contact)) {
        $_SESSION['error-contact'] = "Contact Number is required";
    } else if (!preg_match($contactPattern, $contact)) {
        $_SESSION['error-contact'] = "Invalid contact number format! (0123456789)";
    }

    // Validate password
    if (empty($password)) {
        $_SESSION['error-password'] = "Password is required";
    } else if (!preg_match($passwordPattern, $password)) {
        $_SESSION['error-password'] = "Password must contain at least 8 characters, at least one uppercase letter, one lowercase letter and one number!";
    }

    // Validate cpassword
    if (empty($cpassword)) {
        $_SESSION['error-cpassword'] = "Confirm password is required";
    } else if ($password != $cpassword) {
        $_SESSION['error-cpassword'] = "Passwords do not match!";
    }

    // Validate address
    if (empty($address)) {
        $_SESSION['error-address'] = "Address is required";
    }

    // Validate city
    if (empty($city)) {
        $_SESSION['error-city'] = "City is required";
    }

    // Validate zip
    if (empty($zip)) {
        $_SESSION['error-zip'] = "ZIP Code is required";
    }

    // if there is any error, go back to signup page
    if (
        isset($_SESSION['error-firstname']) ||
        isset($_SESSION['error-lastname']) ||
        isset($_SESSION['error-email']) ||
        isset($_SESSION['error-nic']) ||
        isset($_SESSION['error-contact']) ||
        isset($_SESSION['error-password']) ||
        isset($_SESSION['error-cpassword']) ||
        isset($_SESSION['error-address']) ||
        isset($_SESSION['error-city']) ||
        isset($_SESSION['error-zip'])
    ) {
        // go back to the signup page with entered values
        echo "<script> history.back(); </script>";
    } else {
        // code for no form validation errors
    }
}
