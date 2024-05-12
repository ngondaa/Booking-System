<?php 

require_once("../vendor/autoload.php");
require_once("../Dao/db_connect.php");

$sql = "SELECT * FROM vehicles";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
    $html = '
    <style>
    .table {
        width: 100%;
        border: 1px solid;
    }
    .th, td, tr {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    </style>
    <table class="table">';
    $html .= '<tr>
        <td>ID</td>
        <td>License Plate</td>
        <td>Vehicle Making</td>
        <td>Vehicle Model</td>
        <td>Vehicle Year</td>
        <td>Mileage</td>
        <td>Capacity</td>
        <td>Vehicle Model</td>


    </tr>';

    while($row = mysqli_fetch_assoc($result)) {
        $html .= '<tr>
            <td>' . $row['id'] . '</td>
            <td>' . $row['registration_number'] . '</td>
            <td>' . $row['make'] . '</td>
            <td>' . $row['model'] . '</td>
            <td>' . $row['year_of_make'] . '</td>
            <td>' . $row['capacity'] . '</td>
            <td>' . $row['mileage'] . '</td>
            <td>' . $row['vehicle_condition'] . '</td>
        </tr>';
    }
    $html .= '</table>';
} else {
    $html = "Data not found";
}

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file = 'vehicles/' . time() . '.pdf'; // Save as PDF with unique timestamp
$mpdf->Output($file, 'I'); // Output PDF to browser

