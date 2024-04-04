<?php include('includes/header.php') ?>
<?php include('../includes/session.php') ?>
<?php $get_id = $_GET['edit']; ?>
<?php
if (isset($_POST['add_staff'])) {

	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$dob = $_POST['dob'];
	$department = $_POST['department'];
	$address = $_POST['address'];
	$leave_days = $_POST['leave_days'];
	$user_role = $_POST['user_role'];
	$phonenumber = $_POST['phonenumber'];
	$emp = $_POST['emp_id'];
	$aadhar = $_POST['aadhar'];
	$pan = $_POST['pan'];
	$caste = $_POST['caste'];
	$subcaste = $_POST['subcaste'];
	$ssc = $_POST['ssc'];
	$hsc = $_POST['hsc'];
	$be = $_POST['be'];
	$pg = $_POST['pg'];
	$phd = $_POST['phd'];
	$publication = $_POST['publication'];
	$journal = $_POST['journal'];
	$patent = $_POST['patent'];

	$result = mysqli_query($conn, "update tblemployees set FirstName='$fname', LastName='$lname', EmailId='$email', Gender='$gender', Dob='$dob', Department='$department', Address='$address', Av_leave='$leave_days', role='$user_role', Phonenumber='$phonenumber', emp_id = '$emp', aadhar = '$aadhar', pan = '$pan', caste = '$caste', subcaste = '$subcaste', ssc = '$ssc', hsc = '$hsc', be = '$be', pg = '$pg', phd = '$phd', publication = '$publication', journal = '$journal', patent = '$patent' where emp_id='$get_id'         
		");
	if ($result) {
		echo "<script>alert('Record Successfully Updated');</script>";
		echo "<script type='text/javascript'> document.location = 'staff.php'; </script>";
	} else {
		die(mysqli_error());
	}
}

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

	<?php include('includes/navbar.php') ?>

	<?php include('includes/right_sidebar.php') ?>

	<?php include('includes/left_sidebar.php') ?>

	<div class="mobile-menu-overlay"></div>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Staff Portal</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Staff Edit</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Edit Staff</h4>
							<!-- <p class="mb-20"></p> -->
							<div class="title">
								<h5>Personal Details</h5>
							</div>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="">

							<section>

								<?php
								$query = mysqli_query($conn, "select * from tblemployees where emp_id = '$get_id' ") or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								?>

								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>First Name :</label>
											<span name="firstname" class="form-control wizard-required" required="true" autocomplete="off" value=""><?php echo $row['FirstName']; ?></span>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Last Name :</label>
											<span name="lastname" class="form-control" required="true" autocomplete="off" value=""><?php echo $row['LastName']; ?></span>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Email Address :</label>
											<span name="email" class="form-control" required="true" autocomplete="off" value=""><?php echo $row['EmailId']; ?></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Password :</label>
											<input name="password" type="password" placeholder="**********" class="form-control" readonly required="true" autocomplete="off" value="<?php echo $row['Password']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Gender :</label>
											<select name="gender" class="custom-select form-control" required="true" autocomplete="off">
												<span value=""><?php echo $row['Gender']; ?></span>
												<option value="male">Male</option>
												<option value="female">Female</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Phone Number :</label>
											<input name="phonenumber" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $row['Phonenumber']; ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Date Of Birth :</label>
											<input name="dob" type="text" class="form-control date-picker" required="true" autocomplete="off" value="<?php echo $row['Dob']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Address :</label>
											<input name="address" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $row['Address']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Department :</label>
											<select name="department" class="custom-select form-control" required="true" autocomplete="off">
												<?php
												$query_staff = mysqli_query($conn, "select * from tblemployees join  tbldepartments where emp_id = '$get_id'") or die(mysqli_error());
												$row_staff = mysqli_fetch_array($query_staff);

												?>
												<option value="<?php echo $row_staff['DepartmentShortName']; ?>"><?php echo $row_staff['DepartmentName']; ?></option>
												<?php
												$query = mysqli_query($conn, "select * from tbldepartments");
												while ($row = mysqli_fetch_array($query)) {

												?>
													<option value="<?php echo $row['DepartmentShortName']; ?>"><?php echo $row['DepartmentName']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>

								<?php
								$query = mysqli_query($conn, "select * from tblemployees where emp_id = '$get_id' ") or die(mysqli_error());
								$new_row = mysqli_fetch_array($query);
								?>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Staff Leave Days :</label>
											<input name="leave_days" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $new_row['Av_leave']; ?>">
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>User Role :</label>
											<select name="user_role" class="custom-select form-control" required="true" autocomplete="off">
												<option value="<?php echo $new_row['role']; ?>"><?php echo $new_row['role']; ?></option>
												<option value="Admin">Admin</option>
												<option value="HOD">HOD</option>
												<option value="Staff">Staff</option>
											</select>
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Employment ID :</label>
											<input name="emp_id" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $new_row['emp']; ?>">
										</div>
									</div>


								</div>

								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Caste :</label>
											<input name="caste" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $new_row['caste']; ?>">
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Sub-Caste :</label>
											<input name="subcaste" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $new_row['subcaste']; ?>">
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Date of Joining :</label><br>
											<?php echo $new_row['RegDate']; ?>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Aadhar number :</label>
											<input name="aadhar" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $new_row['aadhar']; ?>">
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Pan number :</label>
											<input name="pan" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $new_row['pan']; ?>">
										</div>
									</div>

								</div>

								<div class="title">
									<h5>Education Details</h5>
								</div>
								<p class="mb-20"></p>

								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>SSC marks :</label>
											<input name="ssc" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $new_row['ssc']; ?>">
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>HSC marks :</label>
											<span name="hsc" class="form-control" required="true" autocomplete="off" value=""><?php echo $new_row['hsc']; ?></span>
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>BE/B.Tech marks :</label>
											<input name="be" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $new_row['be']; ?>">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>PG marks :</label>
											<input name="pg" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $new_row['pg']; ?>">
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>PHD marks :</label>
											<input name="phd" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $new_row['phd']; ?>">
										</div>
									</div>
								</div>

								<div class="title">
									<h5>Achievement</h5>
								</div>
								<p class="mb-20"></p>

								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Publication :</label>
											<input name="publication" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $new_row['publication']; ?>">
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Journals :</label>
											<input name="journal" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $new_row['journal']; ?>">
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Patents :</label>
											<input name="patent" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $new_row['patent']; ?>">
										</div>
									</div>
								</div>
							</section>
						</form>
					</div>
				</div>

			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts.php') ?>
</body>

</html>