<?php

include '../local-db-connection.php';

if (isset($_POST['export'])) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('completedJobName', 'completedJobDate', 'completedJobDestination', 'completedJobType', 'completedOrderNumber', 'completedReferenceNumber', 'completedPallets', 'completedJobWeight', 'completedJobStatus', 'completedJobDriverName_fk', 'customerName', 'customerSignature'));
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output, $row);
    }
    fclose($output);
}
; ?>