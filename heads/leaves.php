<?php
// Include necessary files
include('includes_hod/header.php');
// include('../includes/session.php');

// Initialize an empty variable for error messages
$error_message = "";

// Get the user ID and role of the logged-in user from the session
$user_id = $session_id; // Assuming the user ID is stored in the session
$user_role = $session_depart; // Assuming the user role is stored in the session

// Database query to fetch leave records based on user role
$sql = "SELECT l.id AS leave_id, e.FirstName, e.LastName, l.LeaveType, l.PostingDate, l.Status AS hod_status, l.admin_status
        FROM tblleaves AS l
        INNER JOIN tblemployees AS e ON l.empid = e.emp_id
        WHERE e.emp_id = $user_id";

// If the user is an HOD, filter leave records based on the department
if ($user_role == 'HOD') {
	$sql .= " AND e.Department = (SELECT Department FROM tblemployees WHERE emp_id = $user_id)";
}

$result = mysqli_query($conn, $sql);

// Check if query executed successfully
if ($result) {
	// Check if there are any leave records
	if (mysqli_num_rows($result) > 0) {
		// Output leave history table
?>

		<body>
			<div class="pre-loader">
				<div class="pre-loader-box">
					<div class="loader-logo"><img src="../vendors/images/deskapp-logo-svg.png" alt=""></div>
					<div class='loader-progress' id="progress_div">
						<div class='bar' id='bar1'></div>
					</div>
					<div class='percent' id='percent1'>0%</div>
					<div class="loading-text">
						Loading...
					</div>
				</div>
			</div>

			<?php include('includes_hod/navbar.php'); ?>
			<?php include('includes_hod/right_sidebar.php'); ?>
			<?php include('includes_hod/left_sidebar.php'); ?>

			<div class="mobile-menu-overlay"></div>

			<div class="main-container">
				<div class="pd-ltr-20">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Leave Portal</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
										<li class="breadcrumb-item active" aria-current="page">All Leave</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>

					<div class="card-box mb-30">
						<div class="pd-20">
							<h2 class="text-blue h4">LEAVE HISTORY</h2>
						</div>
						<div class="pb-20">
							<table class="data-table table stripe hover nowrap">
								<thead>
									<tr>
										<th class="table-plus datatable-nosort">Staff Name</th>
										<th>Leave Type</th>
										<th>Applied Date</th>
										<th>HOD Status</th>
										<th>Admin Status</th>
										<th class="datatable-nosort">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									// Iterate through the result set
									while ($row = mysqli_fetch_assoc($result)) {
										echo "<tr>";
										echo "<td class='table-plus'>" . $row['FirstName'] . " " . $row['LastName'] . "</td>";
										echo "<td>" . $row['LeaveType'] . "</td>";
										echo "<td>" . $row['PostingDate'] . "</td>";
										echo "<td>" . ($row['hod_status'] == 1 ? 'Approved' : ($row['hod_status'] == 2 ? 'Rejected' : 'Pending')) . "</td>";
										echo "<td>" . ($row['admin_status'] == 1 ? 'Approved' : ($row['admin_status'] == 2 ? 'Rejected' : 'Pending')) . "</td>";
										echo "<td>";
										echo "<a class='dropdown-item' href='leave_details.php?leaveid=" . $row['leave_id'] . "'><i class='dw dw-eye'></i> View</a>";
										echo "</td>";
										echo "</tr>";
									}
									?>
								</tbody>
							</table>
						</div>
					</div>

					<?php include('includes_hod/footer.php'); ?>
				</div>
			</div>

			<!-- js -->
			<script src="../vendors/scripts/core.js"></script>
			<script src="../vendors/scripts/script.min.js"></script>
			<script src="../vendors/scripts/process.js"></script>
			<script src="../vendors/scripts/layout-settings.js"></script>
			<script src="../src/plugins/apexcharts/apexcharts.min.js"></script>
			<script src="../src/plugins/datatables/js/jquery.dataTables.min.js"></script>
			<script src="../src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
			<script src="../src/plugins/datatables/js/dataTables.responsive.min.js"></script>
			<script src="../src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>

			<!-- buttons for Export datatable -->
			<script src="../src/plugins/datatables/js/dataTables.buttons.min.js"></script>
			<script src="../src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
			<script src="../src/plugins/datatables/js/buttons.print.min.js"></script>
			<script src="../src/plugins/datatables/js/buttons.html5.min.js"></script>
			<script src="../src/plugins/datatables/js/buttons.flash.min.js"></script>
			<script src="../src/plugins/datatables/js/vfs_fonts.js"></script>

			<script src="../vendors/scripts/datatable-setting.js"></script>
			<?php include('includes_hod/scripts.php') ?>
		</body>
<?php
	} else {
		// No leave history found
		$error_message = "No leave history found.";
	}
} else {
	// Error in executing the query
	$error_message = "Error fetching leave history: " . mysqli_error($conn);
}

// Display error message if any
if (!empty($error_message)) {
	echo "Error: $error_message";
}
?>