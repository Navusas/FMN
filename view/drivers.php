<?php
include("../dao/drivers.php");
?>
<!DOCTYPE html>
<html>
<head>
    <!--      Include header structure  -->
    <?php include('include_structure/head.php'); ?>
    <title>Media Shop!</title>
</head>
<body>
<!--    Navigation Bar    -->
<?php include('include_structure/NavigationBar.php'); ?>

<!--      Main Container    -->
<div class="main_container">
    <div class="column">
        <div class="columnHeader">
            <p>Drivers Detailed Information</p>
        </div>
        <div class="table100 ver1 m-b-110">
            <div class="table100-head">
                <table>
                    <thead>
                    <tr class="row100 head">
                        <th class="cell100 width-5">ID</th>
                        <th class="cell100 width-20">Name</th>
                        <th class="cell100 width-30">Current Location</th>
                        <th class="cell100 width-10">Car Reg</th>
                        <th class="cell100 width-10">Shift Pattern</th>
                        <th class="cell100 width-5">Break</th>
                        <th class="cell100 width-5">Waiting</th>
                        <th class="cell100 width-5">Completed</th>
                        <th class="cell100 width-10">On Task</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!--    Footer!    -->
    <!--    Footer!    -->
    <?php include('include_structure/footer.php'); ?>
</body>

</html>