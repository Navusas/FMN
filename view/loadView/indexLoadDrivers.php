<?php
$queue = new Queue();
foreach ($queue->getAllDrivers() as $each) {
    $employeeInfo = $queue->getEmployeeInfo($each->EmployeeID);
    $vehicleInfo = $queue->getVehicle($employeeInfo->ID);


    echo '<div class="table100-body js-pscroll">
                <table>
                    <tbody>
                    <tr class="row100 body">
	                    ' . // id
        '
                        <td class="cell100 width-5 shift">' . $each->ID . '</td> 
                        ' . // name
        '
                        <td class="cell100 width-40">' . $employeeInfo->Name . ' ' . $employeeInfo->Surname . '</td>
                        ' . // shift
        '
                        <td class="cell100 width-35">4pm-8pm</td>
                        ' . // Car reg
        '
                        <td class="cell100 width-10 shift">0</td>
                        ' . // Shift Pattern
        '
                        <td class="cell100 width-10 shift">' . $queue->isDriverAvailable($each->ID) . '</td>
                        ' . // Break
        '
                    </tr>
                    </tbody>
                </table>
            </div>';
}
?>