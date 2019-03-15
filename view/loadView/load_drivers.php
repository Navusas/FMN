<?php
$queue = new Queue();
foreach ($queue->getAllDrivers() as $each) {
    $employeeInfo = $queue->getEmployeeInfo($each->EmployeeID);
    $vehicleInfo = $queue->getVehicle($employeeInfo->ID);
    echo '<div class="table100-body js-pscroll">
                <table>
                    <thead>
                    <td class="row100 body">
	                    ' . // id
        '
                        <td class="cell100 width-5 shift">' . $each->ID . '</td> 
                        ' . // name
        '
                        <td class="cell100 width-20">' . $employeeInfo->Name . ' ' . $employeeInfo->Surname . '</td>
                        ' . // Car Make and Model
        '
                        <td class="cell100 width-30">' . $vehicleInfo->Make . ' ' . $vehicleInfo->Model . '</td>
                        ' . // Car reg
        '
                        <td class="cell100 width-10 shift">' . $vehicleInfo->Registration . '</td>
                        ' . // Capacity
        '
                        <td class="cell100 width-10 shift">' . $vehicleInfo->Capacity . '</td>
                        ' . // Available
        '
                        <td class="cell100 width-10 shift"> ' . $each->Available . ' </td>
                        ' . // Completed
        '
                        <td class="cell100 width-15 shift">0</td>
                    </td>
                    </thead>
                </table>
            </div>';
}
?>
