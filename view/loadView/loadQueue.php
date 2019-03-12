<?php
$queue = new Queue();
foreach ($queue->getAll() as $each) {

    // get objects for each queue row
    $each_journey = $queue->getJourney($each->JourneyID);
    $each_customer = $queue->getCustomer($each->CustomerID);
    $assignedDriver = $queue->getAssignedDriver($each->ID);

    $driverAssigned = false;

    // in case there are no assigned driver
    $vehicle = "N/A";

    // header of dropdown menu table
    $htmlDropdown = '<div class="dropdown">
                      <button class="dropbtn">Choose Driver</button>
                      <div class="dropdown-content">
                          <div class="table100 ver1 m-b-110">
                            <div class="table100-head">
                                <table>
                                    <thead>
                                    <tr class="row100 head">
                                        <th class="cell100 width-10">ID</th>
                                        <th class="cell100 width-40">Name</th>
                                        <th class="cell100 width-40">Vehicle</th>
                                        <th class="cell100 width-10">Capacity</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>';

    // check if driver is assigned
    if ($assignedDriver != false) {
        $driverAssigned = true;

        // get objects
        $driverInfo = $queue->getDriver($assignedDriver->driverID);
        $employeeInfo = $queue->getEmployeeInfo($driverInfo->EmployeeID);
        $vehicleInfo = $queue->getVehicle($driverInfo->ID);

        // concatenate objects
        $driverName = $employeeInfo->Name . " " . $employeeInfo->Surname;
        $vehicle = $vehicleInfo->Make . " " . $vehicleInfo->Model;
    } else { // if driver is NOT assigned

        // get all AVAILABLE drivers
        $availableDrivers = $queue->getAllAvailableDrivers();
        foreach ($availableDrivers as $driver) { // for every driver
            // concatenate NAME and VEHICLE information
            // which will be displayed in dropdown menu
            $name = $queue->getEmployeeInfo($driver['EmployeeID'])->Name . ' ' .
                        $queue->getEmployeeInfo($driver['EmployeeID'])->Surname;
            $makemodel = $queue->getVehicle($driver['ID'])->Make . " " .
                    $queue->getVehicle($driver['ID'])->Model;
            $capacity = $queue->getVehicle($driver['ID'])->Capacity;

            // add the elements to dropdown table menu
            $htmlDropdown = $htmlDropdown . '<div class="table100-body js-pscroll cursorPointer" onclick="assignDriver(' . $driver["ID"] .', '. $each->ID . ')">
                                    <table>
                                        <tbody>
                                        <td class="row100 body">
                                            <td class="cell100 width-10 shift">' . $driver['ID'] .'</td>
                                            <td class="cell100 width-40">' . $name .'</td>
                                            <td class="cell100 width-40">'. $makemodel .'</td>
                                            <td class="cell100 width-10 shift">' . $capacity .'</td>
                                        </td>
                                        </tbody>
                                    </table>
                                </div>';
        }
        // complete the dropdown table
        $htmlDropdown = $htmlDropdown . "</div></div>";
    }
    echo '<div class="table100-body js-pscroll" id="table' . $each->ID . '">
                <table>
                    <tbody>
                    <td class="row100 body">
	                    ' . // id
        '
                        <td class="cell100 width-5 shift">' . $each->ID . '</td> 
                        ' . // name
        '
                        <td class="cell100 width-5 shift">' . $each_journey->Time . '</td>
                        ' . // current location
        '
                        <td class="cell100 width-10"> ' . $each_customer->Name . ' </td>
                        ' . // Car reg
        '
                        <td class="cell100 width-25">' . $each_journey->From . '</td>
                        ' . // Shift Pattern
        '
                        <td class="cell100 width-25">' . $each_journey->To . '</td>
                        ' . // Break
        '
                        <td class="cell100 width-10 shift cursorPointer" ' . (($driverAssigned == true) ? "onclick=\"unassignedDriver('$each->ID')\" " : "") . '>' . (($driverAssigned == true) ? $driverName : $htmlDropdown) . '</td>
                        ' . // Waiting
        '
                        <td class="cell100 width-10 shift">' . $vehicle . '</td>
                        ' .// Completed
        '
                        <td class="cell100 width-5 shift">' . $queue->hasPriority($each->JourneyID) . '</td>
                        ' . // On Task
        '
                        <td class="cell100 width-5 shift cellButton"><button class="delete" onclick="
                        confirmDeletion(' . $each->ID . ',\'' . $each_customer->Name . '\');">Remove</button></td>
                    </td>
                    </tbody>
                </table>
            </div>';
}
?>
<script src="scripts/queueDelete.js">
</script>