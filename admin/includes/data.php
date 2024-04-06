<?php
// Check if the query parameter 'export' is set
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'leave_staff');

$conn = mysqli_connect('localhost', 'root', '', 'leave_staff') or die(mysqli_error());

// Establish database connection.

    // Set headers for file download


    // SQL query to select data from your table
    $sql = "SELECT * FROM tblemployees";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Open a writable stream to the output buffer
        $filename = "exported_data.csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="exported_data.csv"');

        $output = fopen('php://output', 'w');

        // Add a header row to the CSV file
        $header = array("FirstName", "LastName", "EmailId", "Password", "Gender", "Dob", "Department", "Address", "Av_leave", "role", "Phonenumber", "Status", "location");
        fputcsv($output, $header);

        // Loop through the result set and add data to the CSV file
        while ($row = $result->fetch_assoc()) {
            $data = array($row['FirstName'], $row['LastName'], $row['EmailId'], $row['Password'], $row['Gender'], $row['Dob'], $row['Department'], $row['Address'], $row['Av_leave'], $row['role'], $row['Phonenumber'], $row['Status'], $row['location']);
            fputcsv($output, $data);
        }
        fclose($output);
    }
