function confirmDeletion(id, name) {
    var confirmation = confirm("Are you sure you want to delete the following:\n"
        + "ID: " + id + "\n" +
        "Name: " + name);
    if (confirmation === true) {
        $.ajax({
            type: 'POST',
            url: '../controller/deleteQueueRow.php',
            data: {'ID': id},
            success: function (data) {
                if (data === "YES") {
                    $('#table' + id).fadeOut("slow");
                } else {
                    alert("Can not delete the row");
                }
            }

        });
    }
}

function assignDriver(driverID, queueID) {
    $.ajax({
        type: 'POST',
        url: '../controller/assignDriver.php',
        data: {'driverID': driverID, 'queueID': queueID},
        success: function (data) {
            location.reload();
        }

    });
}
function unassignedDriver(queueID) {
    var confirmation = confirm("Are you sure you want to unassign driver for queue ID :" + queueID);
    if(confirmation === true) {
        $.ajax({
            type: 'POST',
            url: '../controller/unassignDriver.php',
            data: {'queueID': queueID},
            success: function (data) {
                location.reload();
            }

        });
    }
}