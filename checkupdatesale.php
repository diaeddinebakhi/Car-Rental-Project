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
        header("Location: updatesale.php?error=immat is required");
        exit();
    } else {
        $sql = "SELECT * from car.sale WHERE immat = '$immat'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            header("Location: updatesale.php?error=Car not existed or not sold yet");
            exit();
        } else {
            if (empty($idClient) && empty($salePrice) && empty($saleDate)) {
                header("Location: updatesale.php?error=You didn't update anything");
                exit();
            }
            if (!empty($idClient)) {
                $sql2 = "UPDATE car.sale set idClient = '$idClient' where immat = '$immat';";
                $result2 = mysqli_query($conn, $sql2);
            }
            if (!empty($salePrice)) {
                $sql3 = "UPDATE car.sale set salePrice = '$salePrice' where immat = '$immat';";
                $result3 = mysqli_query($conn, $sql3);
            }
            if (!empty($saleDate)) {
                $sql4 = "UPDATE car.sale set saleDate = '$saleDate' where immat = '$immat';";
                $result4 = mysqli_query($conn, $sql4);
            }







            if ($result2 || $result3 || $result4) {
                header("Location: updatesale.php?success=Your operation has updated successfully&$car_data");
                exit();
            } else {
                header("Location: updatesale.php?error unknown&");
                exit();
            }
        }
    }
}
