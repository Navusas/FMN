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
            <p>Detailed Queue Information</p>
        </div>
        <div class="table100 ver1 m-b-110">
            <div class="table100-head">
                <table>
                    <thead>
                    <tr class="row100 head">
                        <th class="cell100 width-5">ID</th>
                        <th class="cell100 width-10">Booking Time</th>
                        <th class="cell100 width-10  ">Name</th>
                        <th class="cell100 width-25">From</th>
                        <th class="cell100 width-25">To</th>
                        <th class="cell100 width-10">Assigned Driver</th>
                        <th class="cell100 width-5">Waiting</th>
                        <th class="cell100 width-5">V.I.P</th>
                        <th class="cell100 width-5">X</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!--    Footer!    -->
        <?php include('include_structure/footer.php'); ?>
    </div>
</div>
</body>
</html>