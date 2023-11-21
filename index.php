<!DOCTYPE html>
<?php
include "database.php";
?>

<head>
    <title>Car agency</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="typesearch.css">
    <script>
        function fillFormFields(immat, brand, model, priceByDay) {
            document.getElementsByName('immat')[0].value = immat;
            document.getElementsByName('brand')[0].value = brand;
            document.getElementsByName('model')[0].value = model;
            document.getElementsByName('PriceByDay')[0].value = priceByDay;
        }
    </script>
</head>

<body>


    <form action="search.php" method="post" class="my-div">
        <h2>SEARCH PAGE</h2>

        <label>Immat</label>
        <input type="text" name="immat">


        <label>Brand</label>
        <input type="text" name="brand">


        <label>Model</label>
        <input type="text" name="model">


        <label>Price By day</label>
        <input type="number" name="PriceByDay">


        <label>min_price_byday</label>
        <input type="number" name="minpriceByDay" value=1000>
        <label>max_price_byday</label>
        <input type="number" name="maxpriceByDay" value=1000000>

        <br>
        <br>
        <?php
        $sql = "SELECT * FROM car.car;";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
        ?>
            <div class="table-container">
                <table>
                    <tr>
                        <th>Immat</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Price/Day</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr onclick=\"fillFormFields('" . $row["immat"] . "', '" . $row["brand"] . "', '" . $row["model"] . "', '" . $row["priceByDay"] . "')\"><td>" . $row["immat"] . "</td><td>" . $row["brand"] . "</td><td>" . $row["model"] . "</td><td>" . $row["priceByDay"] . "</td></tr>";
                    }
                    ?>
                </table>
            </div>
        <?php } ?>
        <br>
        <br>
        <button type="submit">Search</button>
        <button type="reset">reset</button>
        <a href="2addcar.php">ADD Car</a>
        <a href="3client.php">ADD Client</a>
        <a href="4rental.php">Rent</a>
        <a href="sale.php">SALE</a>
        <a href="5update.php">UPDATE</a>

    </form>
</body>

</html>