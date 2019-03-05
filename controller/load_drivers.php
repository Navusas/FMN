<?php
$drivers = new drivers();
foreach($drivers->getAll() as $each_driver) {
    $driver_vehicle = $drivers->getVehicle($each_driver->ID);
    $employee_info = $drivers->getEmployeeInfo($each_driver->ID);
echo '<div class="table100-body js-pscroll">
                <table>
                    <thead>
                    <td class="row100 body">
	                    ' . // id
	                    '
                        <td class="cell100 width-5">' . $each_driver->ID . '</td> 
                        ' . // name
	                    '
                        <td class="cell100 width-20">' . $employee_info->Name . '</td>
                        ' . // current location
	                    '
                        <td class="cell100 width-30">Current Location</td>
                        ' . // Car reg
	                    '
                        <td class="cell100 width-10">'  . $driver_vehicle->Registration. '</td>
                        ' . // Shift Pattern
	                    '
                        <td class="cell100 width-10">Shift Pattern</td>
                        ' . // Break
	                    '
                        <td class="cell100 width-5">Break</td>
                        ' . // Waiting
	                    '
                        <td class="cell100 width-5"> ' . $drivers->isAvailable($each_driver->ID) . '</td>
                        ' .// Completed
	                    '
                        <td class="cell100 width-5">Completed</td>
                        ' . // On Task
	                    '
                        <td class="cell100 width-10">On Task</td>
                    </td>
                    </thead>
                </table>
            </div>'; 
}
?>