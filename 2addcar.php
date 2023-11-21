<!DOCTYPE html>
<html lang="en">

<head>
    <title>ADD</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="2checkadd.php" method="post">
        <h2>ADD Car</h2>

        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error'] ?> </p>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success'] ?> </p>
        <?php } ?>

        <label>Immat</label>
        <?php if (isset($_GET['immat'])) { ?>
            <input type="text" name="immat" value="<?php echo $_GET['immat'] ?>">
        <?php } else { ?>
            <input type="text" name="immat">
        <?php } ?>

        <label>Brand</label>
        <?php if (isset($_GET['brand'])) { ?>
            <input type="text" name="brand" value="<?php echo $_GET['brand'] ?>">
        <?php } else { ?>
            <input type="text" name="brand">
        <?php } ?>


        <label>Model</label>
        <?php if (isset($_GET['model'])) { ?>
            <input type="text" name="model" value="<?php echo $_GET['model'] ?>">
        <?php } else { ?>
            <input type="text" name="model">
        <?php } ?>


        <label>PriceByDay</label>
        <?php if (isset($_GET['PriceByDay'])) { ?>
            <input type="number" name="PriceByDay" value="<?php echo $_GET['PriceByDay'] ?>">
        <?php } else { ?>
            <input type="number" name="PriceByDay">
        <?php } ?>

        <button type="submit">ADD</button>
        <a href="updatecar.php">UPDATE</a>




    </form>

</body>

</html>