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
								<h4>Principal Portal</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
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
											<span name="phonenumber" class="form-control" required="true" autocomplete="off"><?php echo $row['Gender']; ?></span>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Phone Number :</label>
											<span name="phonenumber" class="form-control" required="true" autocomplete="off"><?php echo $row['Phonenumber']; ?></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Date Of Birth :</label>
											<span name="dob" class="form-control" required="true" autocomplete="off" ><?php echo $row['Dob']; ?></span>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Address :</label>
											<span name="address" class="form-control" required="true" autocomplete="off" ><?php echo $row['Address']; ?></span>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Department :</label>
											<span name="department" class="custom-select form-control" required="true" autocomplete="off">
											<?php echo $row['Department']; ?>
												
											</span>
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
											<span name="leave_days" type="text" class="form-control" required="true" autocomplete="off"><?php echo $new_row['Av_leave']; ?></span>
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>User Role :</label>
											<span name="user_role" class="custom-select form-control" required="true" autocomplete="off">
												<?php echo $new_row['role']; ?>
												
											</span>
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Employment ID :</label>
											<span name="emp_id" type="text" class="form-control" required="true" autocomplete="off" ><?php echo $new_row['emp']; ?></span>
										</div>
									</div>


								</div>

								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Caste :</label>
											<span name="caste" type="text" class="form-control" required="true" autocomplete="off"><?php echo $new_row['caste']; ?></span>
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Sub-Caste :</label>
											<span name="subcaste" type="text" class="form-control" required="true" autocomplete="off"><?php echo $new_row['subcaste']; ?></span>
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
											<span name="aadhar" type="text" class="form-control" required="true" autocomplete="off"><?php echo $new_row['aadhar']; ?></span>
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Pan number :</label>
											<span name="pan" type="text" class="form-control" required="true" autocomplete="off"><?php echo $new_row['pan']; ?></span>
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
											<span name="ssc" type="text" class="form-control" required="true" autocomplete="off"><?php echo $new_row['ssc']; ?></span>
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
											<span name="be" type="text" class="form-control" required="true" autocomplete="off"><?php echo $new_row['be']; ?></span>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>PG marks :</label>
											<span name="pg" type="text" class="form-control" required="true" autocomplete="off"><?php echo $new_row['pg']; ?></span>
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>PHD marks :</label>
											<span name="phd" type="text" class="form-control" required="true" autocomplete="off"><?php echo $new_row['phd']; ?></span>
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
											<span name="publication" type="text" class="form-control" required="true" autocomplete="off"><?php echo $new_row['publication']; ?></span>
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Journals :</label>
											<span name="journal" type="text" class="form-control" required="true" autocomplete="off"><?php echo $new_row['journal']; ?></span>
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Patents :</label>
											<span name="patent" type="text" class="form-control" required="true" autocomplete="off"><?php echo $new_row['patent']; ?></span>
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