<!DOCTYPE html>
<html lang="en">
<?php
include "database.php";
?>

<head>
    <title>RENT</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
    <form action="4insertrental.php" method="post">
        <h2>RENT A CAR</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error'] ?> </p>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success'] ?> </p>
        <?php } ?>



        <label>Rental ID</label>
        <?php if (isset($_GET['rentalID'])) { ?>
            <input type="text" name="rentalID" placeholder="######" value="<?php echo $_GET['rentalID'] ?>">
        <?php } else { ?>
            <input type="text" name="rentalID" placeholder="######">
        <?php } ?>



        <label>Location Date</label>
        <?php if (isset($_GET['locDate'])) { ?>
            <input type="date" name="locDate" value="<?php echo $_GET['locDate'] ?>">
        <?php } else { ?>
            <input type="date" name="locDate">
        <?php } ?>



        <label>Start Date</label>
        <?php if (isset($_GET['sdate'])) { ?>
            <input type="date" name="sdate" value="<?php echo $_GET['sdate'] ?>">
        <?php } else { ?>
            <input type="date" name="sdate">
        <?php } ?>


        <label>End Date</label>
        <?php if (isset($_GET['edate'])) { ?>
            <input type="date" name="edate" value="<?php echo $_GET['edate'] ?>">
        <?php } else { ?>
            <input type="date" name="edate">
        <?php } ?>


        <label for="types">Rental Type </label>
        <select name="rtype" id="types">
            <option value="ND">ND</option>
            <option value="WD">WD</option>
        </select>

        <label>Immat</label>
        <?php if (isset($_GET['immat'])) { ?>
            <input type="text" name="immat" value="<?php echo $_GET['immat'] ?>">
        <?php } else { ?>
            <input type="text" name="immat" placeholder="######">
        <?php } ?>

        <label>ID</label>
        <?php if (isset($_GET['id'])) { ?>
            <input type="text" name="id" value="<?php echo $_GET['id'] ?>">
        <?php } else { ?>
            <input type="text" name="id" placeholder="######">
        <?php } ?>



        <button type="submit">Sign Up</button>
        <a href="updaterent.php">UPDATE</a>

    </form>
</body>

</html>