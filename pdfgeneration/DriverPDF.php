<?php 
require_once("../vendor/autoload.php");
require_once("../Dao/db_connect.php");

$sql = "SELECT * FROM drivercredentials";

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
        <td>First Name</td>
        <td>Last Name</td>
        <td>Date of Birth</td>
        <td>Contact</td>
        <td>Email</td>
        <td>License Number</td>
        <td>License Type</td>
        <td>Expiration Date</td>
        <td>Certifications</td>
        <td>Accidents</td>
        <td>Violations</td>

        
    </tr>';

    while($row = mysqli_fetch_assoc($result)) {
        $html .= '<tr>
        <td>' . $row['id'] . '</td>
        <td>' . $row['fname'] . '</td>
        <td>' . $row['sname'] . '</td>
        <td>' . $row['dob'] . '</td>
        <td>' . $row['contact_number'] . '</td>
        <td>' . $row['email'] . '</td>
        <td>' . $row['license_number'] . '</td>
        <td>' . $row['license_type'] . '</td>
        <td>' . $row['expiration_date'] . '</td>
        <td>' . $row['certifications'] . '</td>
        <td>' . $row['accidents'] . '</td>
        <td>' . $row['violations'] . '</td>
        </tr>';
    }
    $html .= '</table>';
} else {
    $html = "Data not found";
}

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file = 'drivers/'.time() .'.pdf'; // Save as PDF with unique timestamp
$mpdf->Output($file, 'I'); // Output PDF to browser

