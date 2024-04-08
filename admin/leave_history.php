<?php
include('includes/header.php');
include('../includes/session.php');

// Check if emp_id is provided in the URL
if(isset($_GET['emp_id'])) {
    $emp_id = $_GET['emp_id'];

    // Fetch leave history for the specific staff member
    $sql = "SELECT * FROM tblleaves WHERE empid = '$emp_id'";
    $query = mysqli_query($conn, $sql);

    if(mysqli_num_rows($query) > 0) {
?>
<body>
    <!-- Your HTML code here -->

    <div class="main-container">
        <div class="pd-ltr-20">
            <div class="title pb-20">
                <h2 class="h3 mb-0">Leave History for Staff ID: <?php echo $emp_id; ?></h2>
            </div>
            <div class="card-box mb-30">
                <div class="pd-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th>LEAVE TYPE</th>
                                <th>DATE FROM</th>
                                <th>DATE TO</th>
                                <th>DESCRIPTION</th>
                                <th>POSTING DATE</th>
                                <th>ADMIN REMARK</th>
                                <th>REGISTRA REMARKS</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <td><?php echo htmlentities($row['LeaveType']); ?></td>
                                <td><?php echo htmlentities($row['FromDate']); ?></td>
                                <td><?php echo htmlentities($row['ToDate']); ?></td>
                                <td><?php echo htmlentities($row['Description']); ?></td>
                                <td><?php echo htmlentities($row['PostingDate']); ?></td>
                                <td><?php echo htmlentities($row['AdminRemark']); ?></td>
                                <td><?php echo htmlentities($row['registra_remarks']); ?></td>
                                <td><?php echo ($row['Status'] == 1) ? 'Approved' : (($row['Status'] == 2) ? 'Not Approved' : 'Pending'); ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Include footer -->
            <?php include('includes/footer.php'); ?>
        </div>
    </div>

    <!-- Include scripts -->
    <?php include('includes/scripts.php'); ?>
</body>
</html>

<?php
    } else {
        echo "No leave history found for this staff member.";
    }
} else {
    // If emp_id is not provided, redirect back to the staff.php page
    header("Location: staff.php");
    exit();
}
?>
