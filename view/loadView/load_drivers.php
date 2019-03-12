<?php
include('../DAO/Drivers.php');
$drivers = new drivers();
foreach ($drivers->getAll() as $each_driver) {
    $driver_vehicle = $drivers->getVehicle($each_driver->ID);
    $employee_info = $drivers->getEmployeeInfo($each_driver->EmployeeID);
    echo '<div class="table100-body js-pscroll">
                <table>
                    <thead>
                    <td class="row100 body">
	                    ' . // id
        '
                        <td class="cell100 width-5 shift">' . $each_driver->ID . '</td> 
                        ' . // name
        '
                        <td class="cell100 width-20">' . $employee_info->Name . ' ' . $employee_info->Surname . '</td>
                        ' . // Car Make and Model
        '
                        <td class="cell100 width-30">' . $driver_vehicle->Make . ' ' . $driver_vehicle->Model . '</td>
                        ' . // Car reg
        '
                        <td class="cell100 width-10 shift">' . $driver_vehicle->Registration . '</td>
                        ' . // Capacity
        '
                        <td class="cell100 width-10 shift">' . $driver_vehicle->Capacity . '</td>
                        ' . // Available
        '
                        <td class="cell100 width-10 shift"> ' . $drivers->isAvailable($each_driver->ID) . ' </td>
                        ' . // Completed
        '
                        <td class="cell100 width-15 shift">0</td>
                    </td>
                    </thead>
                </table>
            </div>';
}
?>
