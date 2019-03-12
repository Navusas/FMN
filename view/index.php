<!DOCTYPE html>
<html>
<head>
    <!--      Include header structure  -->
    <?php include('include_structure/head.php');?>
    <title>Forget-Me-Not</title>
</head>
<body>
<!--    Navigation Bar    -->
<?php include('include_structure/navigationBar.php'); ?>

<!--      Main Container    -->
<div class="main_container">
    <div class="flexbox">

        <!--              COLUMN 1      -->
        <div class="column">
            <div class="columnHeader">
                <p>Add Customer</p>
            </div>
            <?php include('index_col1_custAdd.php'); ?>
        </div>

        <div class="column">
            <div class="columnHeader">
                <p>Queue</p>
            </div>
            <?php include('index_col2_custWaiting.php'); ?>
        </div>
        <div class="column">
            <div class="columnHeader">
                <p>Available Drivers </p>
            </div>
            <?php include('index_col3_drivers.php'); ?>
        </div>
    </div>
</div>

<!--    Footer!    -->
<?php include('include_structure/footer.php'); ?>
</body>

</html>