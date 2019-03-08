<?php
$queue = new Queue();
foreach($queue->getAll() as $each) {
    $each_journey = $queue->getJourney($each->JourneyID);
    $each_customer = $queue->getCustomer($each->CustomerID);
    echo '<div class="table100-body js-pscroll">
                <table>
                    <tbody>
                    <tr class="row100 body">
	                    ' . // Id in queue
        '
                        <td class="cell100 width-5">' . $each->ID . '</td>
                        ' . // name
        '
                        <td class="cell100 width-30">' . $each_customer['Name'] . '</td>
                        ' . // From
        '
                        <td class="cell100 width-40">'. $each_journey['From'] . '</td>
                        ' . // To
        '
                        <td class="cell100 width-10">'  . $queue->isDriverAssigned($each->ID) . '</td>
                        ' . // Is Driver Assigned
        '
                        <td class="cell100 width-5">X</td>
                    </tr>
                    </tbody>
                </table>
            </div>';
}
?>