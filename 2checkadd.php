<?php
include "database.php";

if (isset($_POST['brand']) && isset($_POST['model']) && isset($_POST['PriceByDay']) && isset($_POST['immat'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $brand = validate($_POST['brand']);
    $immat = validate($_POST['immat']);
    $model = validate($_POST['model']);
    $PriceByDay = validate($_POST['PriceByDay']);

    $car_data = "immat=" . $immat . "&brand=" . $brand . "&model=" . $model . "&PriceByDay" . $PriceByDay;

    if (empty($immat)) {
        header("Location: 2addcar.php?error=immat is required");
        exit();
    } elseif (empty($brand)) {
        header("Location: 2addcar.php?error=brand is required&$car_data");
        exit();
    } elseif (empty($model)) {
        header("Location: 2addcar.php?error=model is required&$car_data");
        exit();
    } elseif (empty($PriceByDay)) {
        header("Location: 2addcar.php?error=PriceByDay is required&$car_data");
        exit();
    } else {
        $sql = "SELECT * from car WHERE immat = '$immat'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            header("Location: 2addcar.php?error=Immat is already existed");
            exit();
        } else {
            $sql2 = "INSERT INTO `car`.`car` (`immat`, `brand`, `model`, `priceByDay`) VALUES ('$immat', '$brand', '$model', '$PriceByDay');";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                header("Location: 2addcar.php?success=Your Car has Added successfully&$car_data");
                exit();
            } else {
                header("Location: 2addcar.php?error unknown&");
                exit();
            }
        }
    }
}
