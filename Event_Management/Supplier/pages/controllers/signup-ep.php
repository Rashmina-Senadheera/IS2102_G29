<?php
session_start();
// Check the method of the request
// If request methot is not POST redirect to the register page
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location: ../sign_up.php");
} else {
    // include the database config file
    include_once '../../../constants.php';
    include_once './commonFunctions.php';

    // define variables and set to empty values
    $firstname = $lastname = $email = $nic = $contact = $password = $cpassword = $address = $city = $zip = "";

    // get all data that have been received from post method
    $firstname = checkInput($_POST['firstname']);
    $lastname = checkInput($_POST['lastname']);
    $email = checkInput($_POST['email']);
    $nic = checkInput($_POST['nic']);
    $contact = checkInput($_POST['contact']);
    $password = checkInput($_POST['password']);
    $cpassword = checkInput($_POST['cpassword']);
    $address = checkInput($_POST['address']);


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
        // Check for duplicate email or contact number
        $chkDuplicateEmail = mysqli_query($conn, "select user_id from user where email='$email' ");
        $chkDuplicateContact = mysqli_query($conn, "select user_id from user_phone where phone_number='$contact' ");
        if (mysqli_num_rows($chkDuplicateEmail) > 0) {
            $_SESSION['error-email'] = "The EMAIL you have entered is already taken!";
        }
        if (mysqli_num_rows($chkDuplicateContact) > 0) {
            $_SESSION['error-contact'] = "The CONTACT number you have entered is already taken!";
        }

        // if there is any error, go back to signup page
        if (isset($_SESSION['error-email']) || isset($_SESSION['error-contact'])) {
            echo "<script> history.back(); </script>";
        } else {
            // Hash the password
            $password = password_hash($password, PASSWORD_DEFAULT);

            // Insert email, name, password, address and role to user table
            // Insert firstname, lastname, nic, address, city, zip to evetn_planner table
            // Insert contact to user_phone table
            // If one of the queries fail, rollback all the queries
            mysqli_query($conn, "SET autocommit = 0");
            mysqli_query($conn, "START TRANSACTION");

            $insertUser = mysqli_query($conn, "insert into user (name, email, password, address, role) values ('$firstname', '$email', '$password', '$address', 'supplier')");

            // select the user id of the user who is just inserted
            mysqli_query($conn, "SELECT @user_id:=MAX(user_id) FROM user;");

            $insertEventPlanner = mysqli_query($conn, "insert into supplier (user_id, firstname, lastname, nic) values (@user_id, '$firstname', '$lastname', '$nic')");
            $insertUserPhone = mysqli_query($conn, "insert into user_phone (user_id, phone_number) values (@user_id, '$contact')");

            if (!$insertUser || !$insertEventPlanner || !$insertUserPhone) {
                mysqli_query($conn, "ROLLBACK");
                mysqli_query($conn, "SET autocommit = 1");
                $_SESSION['error'] = "Something went wrong! Please try again!";
                echo "<script> history.back(); </script>";
            } else {
                mysqli_query($conn, "COMMIT");
                mysqli_query($conn, "SET autocommit = 1");
                // echo "<script> alert ('You have successfully registered!'); </script>";
                $_SESSION['email'] = $email;
                $_SESSION['user_name'] = $firstname;
                $_SESSION['from_page'] = 'register';
                header("Location: ../email_verification.php");
            }
        }
    }
}
