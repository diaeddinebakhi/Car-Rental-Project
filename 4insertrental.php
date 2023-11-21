<?php
include "database.php";

if (
    isset($_POST['rentalID']) && isset($_POST['locDate']) && isset($_POST['sdate']) && isset($_POST['edate']) && isset($_POST['rtype']) && isset($_POST['immat']) && isset($_POST['id'])
) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $rentalID = validate($_POST['rentalID']);
    $locDate = validate($_POST['locDate']);
    $sdate = validate($_POST['sdate']);
    $edate = validate($_POST['edate']);
    $rtype = validate($_POST['rtype']);
    $Immat = validate($_POST['immat']);
    $id = validate($_POST['id']);

    $client_data = "rentalID=" . $rentalID . "&locDate=" . $locDate . "&sdate=" . $sdate . "&edate=" . $edate . "&rtype=" . $rtype . "&Immat=" . $Immat . "&id=" . $id;


    if (empty($rentalID)) {
        header("Location: 4rental.php?error=rentalID is required&$client_data");
        exit();
    } elseif (empty($locDate)) {
        header("Location: 4rental.php?error=locDate is required&$client_data");
        exit();
    } elseif (empty($sdate)) {
        header("Location: 4rental.php?error=sdate is required&$client_data");
        exit();
    } elseif ($sdate < $locDate) {
        header("Location: 4rental.php?error=start date should be after location date&$client_data");
        exit();
    } elseif (empty($edate)) {
        header("Location: 4rental.php?error=edate is required&$client_data");
        exit();
    } elseif ($edate < $sdate) {
        header("Location: 4rental.php?error=end date should be after start date&$client_data");
        exit();
    } elseif (empty($rtype)) {
        header("Location: 4rental.php?error=rtype is required&$client_data");
        exit();
    } elseif (empty($Immat)) {
        header("Location: 4rental.php?error=Immat is required&$client_data");
        exit();
    } elseif (empty($id)) {
        header("Location: 4rental.php?error=id is required&$client_data");
        exit();
    } else {
        $sql = "SELECT * from car.rental WHERE rentalID = '$rentalID'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            header("Location: 4rental.php?error=rentalID is already existed");
            exit();
        } else {
            $sql2 = "SELECT * from car.car WHERE immat = '$Immat'";
            $result2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result2) == 0) {
                header("Location: 4rental.php?error=car is not existed&$client_data");
                exit();
            } else {
                $sql3 = "SELECT * from car.client WHERE idClient = '$id'";
                $result3 = mysqli_query($conn, $sql3);
                if (mysqli_num_rows($result3) == 0) {
                    header("Location: 4rental.php?error=Client is not existed&$client_data");
                    exit();
                } else {
                    $sql4 = "INSERT INTO `car`.`rental` (`rentalID`, `locDate`,`sDate`, `eDate`, `rentalType`, `immat`, `idClient`) VALUES('$rentalID', '$locDate', '$sdate', '$edate', '$rtype', '$Immat', '$id');";
                    $result4 = mysqli_query($conn, $sql4);
                    if ($result4) {
                        header("Location: 4rental.php?success=Rent done successfully&$client_data");
                        exit();
                    } else {
                        header("Location: 4rental.php?error unknown");
                        exit();
                    }
                }
            }
        }
    }
}
