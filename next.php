<?php
include("inc/config.php");
$query = $connection->prepare("SELECT * FROM `Volunteers Data`");
$query->execute();
// Use fetchAll as you have
$aResults = $query->fetchAll(PDO::FETCH_ASSOC);

// Then, check you have results
$numResults = count($aResults);
if (count($numResults) > 0) {
    // Output the table header
    echo '<table><tr>';
    foreach ($aResults[0] as $fieldName=>$value) {
        echo '<th>' . htmlspecialchars($fieldName) . '</th>';
    }
    echo '</tr>';

    // Now output all the results
    foreach($aResults as $row) {
        echo '<tr>';
        foreach ($row as $fieldName=>$value) {
            echo '<td>' . $value . '</td>';
        }
        echo '</tr>';
    }

    // Close the table
    echo '</table>';
} else {
    echo 'No results';
}
                                  
?>