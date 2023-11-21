<?php
include "database.php";

if (isset($_POST['idClient']) && isset($_POST['salePrice']) && isset($_POST['saleDate']) && isset($_POST['immat'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $idClient = validate($_POST['idClient']);
    $immat = validate($_POST['immat']);
    $salePrice = validate($_POST['salePrice']);
    $saleDate = validate($_POST['saleDate']);

    $car_data = "immat=" . $immat . "&idClient=" . $idClient . "&salePrice=" . $salePrice . "&saleDate" . $saleDate;

    if (empty($immat)) {
        header("Location: sale.php?error=immat is required");
        exit();
    } elseif (empty($idClient)) {
        header("Location: sale.php?error=idClient is required&$car_data");
        exit();
    } elseif (empty($salePrice)) {
        header("Location: sale.php?error=salePrice is required&$car_data");
        exit();
    } elseif (empty($saleDate)) {
        header("Location: sale.php?error=saleDate is required&$car_data");
        exit();
    } else {
        $sql = "SELECT * from car.sale WHERE immat = '$immat'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            header("Location: sale.php?error=car is already sold");
            exit();
        } else {
            $sql4 = "SELECT * from car.car WHERE immat = '$immat'";
            $result4 = mysqli_query($conn, $sql4);
            if (mysqli_num_rows($result4) == 0) {
                header("Location: sale.php?error=car is not existed&$client_data");
                exit();
            } else {
                $sql3 = "SELECT * from car.client WHERE idClient = '$idClient'";
                $result3 = mysqli_query($conn, $sql3);
                if (mysqli_num_rows($result3) == 0) {
                    header("Location: sale.php?error=Client is not existed&$client_data");
                    exit();
                } else {
                    $sql2 = "INSERT INTO `car`.`sale` (`immat`, `idClient`, `salePrice`, `saleDate`) VALUES ('$immat', '$idClient', '$salePrice', '$saleDate');";
                    $result2 = mysqli_query($conn, $sql2);
                    if ($result2) {
                        header("Location: sale.php?success=Your Car has sold successfully&$car_data");
                        exit();
                    } else {
                        header("Location: sale.php?error unknown&");
                        exit();
                    }
                }
            }
        }
    }
}
