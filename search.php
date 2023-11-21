<link rel="stylesheet" href="typesearch.css">
<?php
include "database.php";
if (isset($_POST['brand']) || isset($_POST['model']) || isset($_POST['minpriceByDay']) || isset($_POST['maxpriceByDay']) || isset($_POST['immat'])) {
    if ($_POST['brand'] === '') {
        $brand = '%';
    } else {
        $brand = $_POST['brand'];
    }
    if ($_POST['model'] === '') {
        $model = '%';
    } else {
        $model = $_POST['model'];
    }
    if ($_POST['immat'] === '') {
        $immat = '%';
    } else {
        $immat = $_POST['immat'];
    }
    $pricebyday = $_POST['PriceByDay'];
    $minprice = $_POST['minpriceByDay'];
    $maxprice = $_POST['maxpriceByDay'];

    if (empty($pricebyday)) {
        $sql = "SELECT * FROM car.car WHERE brand like '$brand' and model like '$model' and immat like '$immat' and priceByDay BETWEEN $minprice and $maxprice";
    } else {
        $sql = "SELECT * FROM car.car WHERE brand like '$brand' and model like '$model' and immat like '$immat' and priceByDay = $pricebyday";
    }
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
?>
        <table>
            <tr>
                <th>Immat</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Price/Day</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["immat"] . "</td><td>" . $row["brand"] . "</td><td>" . $row["model"] . "</td><td>" . $row["priceByDay"] . "</td></tr>";
            }
            ?>
        </table>
<?php
    } else {
        echo "We are sorry , we cannot afford these conditions for Now !";
    }
}
