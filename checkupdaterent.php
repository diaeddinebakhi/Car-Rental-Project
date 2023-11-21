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
        header("Location: updaterent.php?error=rentalID is required&$client_data");
        exit();
    } elseif ($sdate < $locDate) {
        header("Location: updaterent.php?error=start date should be after location date&$client_data");
        exit();
    } elseif (empty($edate)) {
        header("Location: updaterent.php?error=edate is required&$client_data");
        exit();
    } elseif ($edate < $sdate) {
        header("Location: updaterent.php?error=end date should be after start date&$client_data");
        exit();
    } else {
        $sql = "SELECT * from car.rental WHERE rentalID = '$rentalID'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            header("Location: updaterent.php?error=rentalID is not existed");
            exit();
        } else {
            if (!empty($locDate)) {
                $sql4 = "UPDATE car.rental set locDate = '$locDate' where rentalID = '$rentalID';";
                $result4 = mysqli_query($conn, $sql4);
            }
            if (!empty($sdate)) {
                $sql5 = "UPDATE car.rental set sDate = '$sdate' where rentalID = '$rentalID';";
                $result5 = mysqli_query($conn, $sql5);
            }
            if (!empty($rtype)) {
                $sql7 = "UPDATE car.rental set rentalType = '$rtype' where rentalID = '$rentalID';";
                $result7 = mysqli_query($conn, $sql7);
            }
            if (!empty($Immat)) {
                $sql8 = "UPDATE car.rental set immat = '$Immat' where rentalID = '$rentalID';";
                $result8 = mysqli_query($conn, $sql8);
            }
            if (!empty($id)) {
                $sql9 = "UPDATE car.rental set idClient = '$id' where rentalID = '$rentalID';";
                $result9 = mysqli_query($conn, $sql9);
            }

            $sql6 = "UPDATE car.rental set eDate = '$edate' where rentalID = '$rentalID';";
            $result6 = mysqli_query($conn, $sql6);

            if ($result4 || $result5 || $result6 || $result7 || $result8 || $result9) {
                header("Location: updaterent.php?success=Rent updated successfully&$client_data");
                exit();
            } else {
                header("Location: updaterent.php?error unknown");
                exit();
            }
        }
    }
}
