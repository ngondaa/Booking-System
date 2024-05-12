<?php 
require_once("../vendor/autoload.php");
require_once("../Dao/db_connect.php");

$sql_retrieve_users = "SELECT * FROM users";

$result = mysqli_query($conn, $sql_retrieve_users);

if(mysqli_num_rows($result) > 0) {
    $html = '
    <style>
    .table {
        width: 100%;
        border: 1px solid;s
    }
    .th, td, tr {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    </style>
    <table class="table">';
    $html .= 
    '<tr>
        <td>ID</td>
        <td>username</td>
        <td>firstname</td>
        <td>lastname</td>
    </tr>';

    while($row = mysqli_fetch_assoc($result)) {
        $html .= 
        '<tr>
            <td>' . $row['id'] . '</td>
            <td>' . $row['username'] . '</td>
            <td>' . $row['firstname'] . '</td>
            <td>' . $row['lastname'] . '</td>


        </tr>';
    }
    $html .= '</table>';
} else {
    $html = "Data not found";
}

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file = 'users/'.time() .'.pdf'; // Save as PDF with unique timestamp
$mpdf->Output($file, 'I'); // Output PDF to browser

