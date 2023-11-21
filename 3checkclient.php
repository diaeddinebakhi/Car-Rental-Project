<?php
include "database.php";

if (isset($_POST['id']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['phone']) && isset($_POST['street']) && isset($_POST['city']) && isset($_POST['job'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $id = validate($_POST['id']);
    $fname = validate($_POST['fname']);
    $lname = validate($_POST['lname']);
    $phone = validate($_POST['phone']);
    // if (!preg_match('/^[0-9]+$/', $phone)) {
    //     echo "Invalid number. Please enter only numeric characters.";
    // }
    // if (!preg_match('/^[0-9]{10}$/', $number)) {
    //     echo "Invalid number. Please enter a 10-digit number.";
    //     exit;
    //   }
    $city = validate($_POST['city']);
    $street = validate($_POST['street']);
    $job = validate($_POST['job']);

    $client_data = "fname=" . $fname . "&lname=" . $lname . "&phone=" . $phone . "&city=" . $city . "&street=" . $street . "&job=" . $job;

    if (empty($id)) {
        header("Location: 3client.php?error=id is required&$client_data");
        exit();
    } elseif (empty($fname)) {
        header("Location: 3client.php?error=fname is required&$client_data");
        exit();
    } elseif (empty($lname)) {
        header("Location: 3client.php?error=lname is required&$client_data");
        exit();
    } elseif (!preg_match('/^[0-9]+$/', $phone)) {
        header("Location: 3client.php?error=Invalid number&$client_data");
        exit();
    } elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
        header("Location: 3client.php?error=Please enter a 10-digit number&$client_data");
        exit();
    } elseif (empty($city)) {
        header("Location: 3client.php?error=city is required&$client_data");
        exit();
    } elseif (empty($street)) {
        header("Location: 3client.php?error=street is required&$client_data");
        exit();
    } elseif (empty($job)) {
        header("Location: 3client.php?error=job is required&$client_data");
        exit();
    } else {
        $sql = "SELECT * from car.client WHERE idClient = '$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            header("Location: 3client.php?error=id is already existed");
            exit();
        } else {
            $sql2 = "INSERT INTO `car`.`client` (`idClient`, `fName`, `lName`, `phone`, `street`, `city`, `job`) VALUES ('$id', '$fname', '$lname', '$phone', '$street', '$city', '$job');";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                header("Location: 3client.php?success=Client Added successfully&$client_data");
                exit();
            } else {
                header("Location: 3client.php?error unknown&");
                exit();
            }
        }
    }
}
