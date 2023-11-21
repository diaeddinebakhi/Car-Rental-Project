<!DOCTYPE html>
<html lang="en">

<head>
    <title>UPDATE_SALE</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="checkupdatesale.php" method="post">
        <h2>SALE Car</h2>

        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error'] ?> </p>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success'] ?> </p>
        <?php } ?>

        <label>idClient</label>
        <?php if (isset($_GET['idClient'])) { ?>
            <input type="text" name="idClient" value="<?php echo $_GET['idClient'] ?>">
        <?php } else { ?>
            <input type="text" name="idClient">
        <?php } ?>

        <label>Immat</label>
        <?php if (isset($_GET['immat'])) { ?>
            <input type="text" name="immat" value="<?php echo $_GET['immat'] ?>">
        <?php } else { ?>
            <input type="text" name="immat">
        <?php } ?>

        <label>salePrice</label>
        <?php if (isset($_GET['salePrice'])) { ?>
            <input type="number" name="salePrice" value="<?php echo $_GET['salePrice'] ?>">
        <?php } else { ?>
            <input type="number" name="salePrice">
        <?php } ?>



        <label>saleDate</label>
        <?php if (isset($_GET['saleDate'])) { ?>
            <input type="date" name="saleDate" value="<?php echo $_GET['saleDate'] ?>">
        <?php } else { ?>
            <input type="date" name="saleDate">
        <?php } ?>




        <button type="submit">UPDATE</button>




    </form>

</body>

</html>