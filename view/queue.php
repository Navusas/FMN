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

<div id="hiddenAddQueue">
    <div id="hiddenAddQueueContainer">
    <?php include('index_col1_custAdd.php'); ?>
    </div>
</div>

<!--      Main Container    -->
<div class="main_container">
    <div class="column">
        <input id="queueAddCustomer" type="button" value="Add New Order" class="btn">
        <div class="columnHeader">
            <p>Detailed Queue Information</p>
        </div>
        <div class="table100 ver1 m-b-110">
            <div class="table100-head">
                <table>
                    <thead>
                    <tr class="row100 head">
                        <th class="cell100 width-5">ID</th>
                        <th class="cell100 width-5">Booking</th>
                        <th class="cell100 width-10">Name</th>
                        <th class="cell100 width-25">From</th>
                        <th class="cell100 width-25">To</th>
                        <th class="cell100 width-10">Driver Name</th>
                        <th class="cell100 width-10">Vehicle</th>
                        <th class="cell100 width-5">V.I.P</th>
                        <th class="cell100 width-5">Delete? </th>
                    </tr>
                    </thead>
                </table>
            </div>
            <?php
            include('../dao/Queue.php');
            include('loadView/loadQueue.php');
            ?>
        </div>
        <!--    Footer!    -->
        <?php include('include_structure/footer.php'); ?>
    </div>
</div>
<script>
    $(document).mouseup(function(e)
    {
        var container = $("#hiddenAddQueueContainer");

        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0)
        {
            container.hide();
            $("#hiddenAddQueue").css('display','none');
        }
    });
    $('#queueAddCustomer').click(function() {
        if($('#hiddenAddQueue').css('display') === 'none') {
            $('#hiddenAddQueue').css('display','block');
            $('#hiddenAddQueueContainer').css({"display" : "block",
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