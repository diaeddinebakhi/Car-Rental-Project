<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIGN UP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <form action="3checkclient.php" method="post">
        <h2>SIGN UP</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error'] ?> </p>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success'] ?> </p>
        <?php } ?>

        <label>ID</label>
        <?php if (isset($_GET['id'])) { ?>
            <input type="text" name="id" placeholder="######" value="<?php echo $_GET['id'] ?>">
        <?php } else { ?>
            <input type="text" name="id" placeholder="######">
        <?php } ?>



        <label>first Name</label>
        <?php if (isset($_GET['fname'])) { ?>
            <input type="text" name="fname" placeholder="First Name" value="<?php echo $_GET['fname'] ?>">
        <?php } else { ?>
            <input type="text" name="fname" placeholder="First Name">
        <?php } ?>



        <label>last Name</label>
        <?php if (isset($_GET['lname'])) { ?>
            <input type="text" name="lname" placeholder="last Name" value="<?php echo $_GET['lname'] ?>">
        <?php } else { ?>
            <input type="text" name="lname" placeholder="last Name">
        <?php } ?>

        <label>Phone Number</label>
        <?php if (isset($_GET['phone'])) { ?>
            <input type="text" name="phone" placeholder="+213#########" value="<?php echo $_GET['phone'] ?>">
        <?php } else { ?>
            <input type="text" name="phone" placeholder="+213#########">
        <?php } ?>

        <label>Street</label>
        <?php if (isset($_GET['street'])) { ?>
            <input type="text" name="street" placeholder="Street" value="<?php echo $_GET['street'] ?>">
        <?php } else { ?>
            <input type="text" name="street" placeholder="Street">
        <?php } ?>

        <label>City</label>
        <?php if (isset($_GET['city'])) { ?>
            <input type="text" name="city" placeholder="City" value="<?php echo $_GET['city'] ?>">
        <?php } else { ?>
            <input type="text" name="city" placeholder="City">
        <?php } ?>

        <label>Job</label>
        <?php if (isset($_GET['job'])) { ?>
            <input type="text" name="job" placeholder="Job" value="<?php echo $_GET['job'] ?>">
        <?php } else { ?>
            <input type="text" name="job" placeholder="Job">
        <?php } ?>


        <button type="submit">Sign Up</button>




    </form>
</body>

</html>