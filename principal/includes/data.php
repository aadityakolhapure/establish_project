<?php
// Check if the 'export' button was clicked
if (isset($_POST['export'])) {
    // Establish database connection
    $conn = mysqli_connect('localhost', 'root', '', 'project') or die(mysqli_error());

    // SQL query to select data from your table
    $sql = "SELECT * FROM tblemployees";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Open a writable stream to the output buffer
        $filename = "Employees_data.csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        $output = fopen('php://output', 'w');
  
        // Add a header row to the CSV file
        $header = array("emp_id","FirstName", "LastName", "EmailId", "Password", "Gender", "Dob", "Department", "Address", "Av_leave", "role", "Phonenumber","aadhar","pan","caste","subcaste","ssc","hsc","be","pg","phd","publication","journal","patent", "Status","location");
        fputcsv($output, $header);

        // Loop through the result set and add data to the CSV file
        while ($row = $result->fetch_assoc()) {
            $data = array($row['emp_id'],$row['FirstName'], $row['LastName'], $row['EmailId'], $row['Password'], $row['Gender'], $row['Dob'], $row['Department'], $row['Address'], $row['Av_leave'], $row['role'], $row['Phonenumber'],$row['aadhar'],$row['pan'] ,$row['caste'] ,$row['subcaste'] ,$row['ssc'] ,$row['hsc'] ,$row['be'] ,$row['pg'] ,$row['phd'] ,$row['publication'] ,$row['journal'] ,$row['patent'] ,$row['Status'], $row['location']);
            fputcsv($output, $data);
        }

        fclose($output);
        exit; // Terminate the script after the file is downloaded
    }
}
?>