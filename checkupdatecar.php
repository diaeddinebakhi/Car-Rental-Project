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
        header("Location: updatecar.php?error=immat is required");
        exit();
    } elseif (empty($PriceByDay)) {
        header("Location: updatecar.php?error=PriceByDay is required");
        exit();
    } else {
        $sql = "SELECT * from car.car WHERE immat = '$immat'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            header("Location: updatecar.php?error=Immat is not existed");
            exit();
        } else {
            $sql2 = "UPDATE car.car set priceByDay = '$PriceByDay' where immat = '$immat';";
            if (!empty($brand)) {
                $sql3 = "UPDATE car.car set brand = '$brand' where immat = '$immat';";
                $result3 = mysqli_query($conn, $sql3);
            }
            if (!empty($model)) {
                $sql4 = "UPDATE car.car set model = '$model' where immat = '$immat';";
                $result4 = mysqli_query($conn, $sql4);
            }
            $result2 = mysqli_query($conn, $sql2);


            if ($result2 || $result3 || $result4) {
                header("Location: updatecar.php?success=Your Car has Updated successfully&$car_data");
                exit();
            } else {
                header("Location: updatecar.php?error unknown&");
                exit();
            }
        }
    }
}
