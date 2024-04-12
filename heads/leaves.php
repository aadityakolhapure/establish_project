<?php include('includes_hod/header.php');
include('../includes/session.php'); ?>

<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="../vendors/images/deskapp-logo-svg.png" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">Loading...</div>
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
								<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
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
				<div class="col-md-5">
					<input type="text" id="searchInput2" class="form-control" placeholder="Search....">
				</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap" id="example">
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
							// Database query to fetch leave records based on user role and department
							$hod_department = $session_depart;
							$sql = "SELECT tblleaves.id as leave_id, tblemployees.FirstName, tblemployees.LastName, tblleaves.LeaveType, tblleaves.PostingDate, tblleaves.Status as hod_status, tblleaves.admin_status 
                      FROM tblleaves 
                      INNER JOIN tblemployees ON tblleaves.empid = tblemployees.emp_id
                      WHERE tblemployees.Department = '$hod_department'";
							$result = mysqli_query($conn, $sql);
							if ($result && mysqli_num_rows($result) > 0) {
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
							} else {
								echo "<tr><td colspan='6'>No leave history found.</td></tr>";
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
			<?php include('includes_hod/footer.php'); ?>
		</div>
	</div>
	
	<?php include('includes_hod/scripts.php') ?>
</body>
<!-- <script src="../vendors/scripts/core.js"></script>
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
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script> -->
		$(document).ready(function() {
			$("#searchInput2").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#example tbody tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
		});
	</script>



</html>