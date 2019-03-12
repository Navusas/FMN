<!DOCTYPE html>
<html>
<head>
    <!--      Include header structure  -->
    <?php include('include_structure/head.php'); ?>
    <title>Media Shop!</title>
</head>
<body>
<!--    Navigation Bar    -->
<?php include('include_structure/navigationBar.php'); ?>

<!--      Main Container    -->
<div id="hiddenAddDriver">
    <div id="hiddenAddDriverContainer">
        <?php include('include_structure/addDriver.php'); ?>
    </div>
</div>
<div class="main_container">
    <div class="column">
        <input id="addDriver" type="button" value="Add New Driver" class="btn">
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
                        <th class="cell100 width-30">Car Details</th>
                        <th class="cell100 width-10">Car Reg</th>
                        <th class="cell100 width-10">Capacity</th>
                        <th class="cell100 width-10">Available</th>
                        <th class="cell100 width-15">Completed Tasks</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <?php include('loadView/load_drivers.php'); ?>
        </div>
    </div>
    <!--    Footer!    -->
    <?php include('include_structure/footer.php'); ?>

    <script>
        $(document).mouseup(function(e)
        {
            var container = $("#hiddenAddDriverContainer");

            // if the target of the click isn't the container nor a descendant of the container
            if (!container.is(e.target) && container.has(e.target).length === 0)
            {
                container.hide();
                $("#hiddenAddDriver").css('display','none');
            }
        });
        $('#addDriver').click(function() {
            if($('#hiddenAddDriver').css('display') === 'none') {
                $('#hiddenAddDriver').css('display','block');
                $('#hiddenAddDriverContainer').css({"display" : "block",
                    "width" : "50%",
                    "background-color" : "#fefefe",
                    "margin": "5% auto 50% auto",
                    "border" : "1pd solid #888",
                    "padding": "auto"});
            }
        });


    </script>
</body>

</html>