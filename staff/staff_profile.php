<?php include('includes/header.php') ?>
<?php include('../includes/session.php') ?>
<?php
if (isset($_POST['new_update'])) {
	$empid = $session_id;
	$fname = $_POST['fname'];
	$lname = $_POST['lastname'];
	$email = $_POST['email'];
	$dob = $_POST['dob'];
	$department = $_POST['department'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$phonenumber = $_POST['phonenumber'];
	$emp = $_POST['emp'];
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

	$result = mysqli_query($conn, "update tblemployees set FirstName='$fname', LastName='$lname', EmailId='$email', Gender='$gender', Dob='$dob', Department='$department', Address='$address', Phonenumber='$phonenumber', emp = '$emp', aadhar = '$aadhar', pan = '$pan', caste = '$caste', subcaste = '$subcaste', ssc = '$ssc', hsc = '$hsc', be = '$be', pg = '$pg', phd = '$phd', publication = '$publication', journal = '$journal', patent = '$patent' where emp_id='$session_id'         
		") or die(mysqli_error());
	if ($result) {
		echo "<script>alert('Your records Successfully Updated');</script>";
		echo "<script type='text/javascript'> document.location = 'staff_profile.php'; </script>";
	} else {
		die(mysqli_error());
	}
}

if (isset($_POST["update_image"])) {

	$image = $_FILES['image']['name'];

	if (!empty($image)) {
		move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/' . $image);
		$location = $image;
	} else {
		echo "<script>alert('Please Select Picture to Update');</script>";
	}

	$result = mysqli_query($conn, "update tblemployees set location='$location' where emp_id='$session_id'         
		") or die(mysqli_error());
	if ($result) {
		echo "<script>alert('Profile Picture Updated');</script>";
		echo "<script type='text/javascript'> document.location = 'staff_profile.php'; </script>";
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
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Profile</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p">

							<?php $query = mysqli_query($conn, "select * from tblemployees LEFT JOIN tbldepartments ON tblemployees.Department = tbldepartments.DepartmentShortName where emp_id = '$session_id'") or die(mysqli_error());
							$row = mysqli_fetch_array($query);
							?>

							<div class="profile-photo">
								<a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
								<img src="<?php echo (!empty($row['location'])) ? '../uploads/' . $row['location'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" alt="" class="avatar-photo">
								<form method="post" enctype="multipart/form-data">
									<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="weight-500 col-md-12 pd-5">
													<div class="form-group">
														<div class="custom-file">
															<input name="image" id="file" type="file" class="custom-file-input" accept="image/*" onchange="validateImage('file')">
															<label class="custom-file-label" for="file" id="selector">Choose file</label>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<input type="submit" name="update_image" value="Update" class="btn btn-primary">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
							<h5 class="text-center h5 mb-0"><?php echo $row['FirstName'] . " " . $row['LastName']; ?></h5>
							<p class="text-center text-muted font-14"><?php echo $row['DepartmentName']; ?></p>
							<div class="profile-info">
								<h5 class="mb-20 h5 text-blue">Contact Information</h5>
								<ul>
									<li>
										<span>Email Address:</span>
										<?php echo $row['EmailId']; ?>
									</li>
									<li>
										<span>Phone Number:</span>
										<?php echo $row['Phonenumber']; ?>
									</li>
									<li>
										<span>My Role:</span>
										<?php echo $row['role']; ?>
									</li>
									<li>
										<span>Address:</span>
										<?php echo $row['Address']; ?>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
						<div class="card-box height-100-p overflow-hidden">
							<div class="profile-tab height-100-p">
								<div class="tab height-100-p">
									<ul class="nav nav-tabs customtab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">Leave Records</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#setting" role="tab">Settings</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#document" role="tab">Document</a>
										</li>

									</ul>
									<div class="tab-content">
										<!-- Timeline Tab start -->
										<div class="tab-pane fade show active" id="timeline" role="tabpanel">
											<div class="pd-20">
												<div class="profile-timeline">
													<?php $query = mysqli_query($conn, "SELECT * from tblleaves where empid = '$session_id'") or die(mysqli_error());
													while ($row = mysqli_fetch_array($query)) {
														$id = $row['id'];
													?>
														<div class="timeline-month">
															<h5><?php echo date('d M Y', strtotime($row['PostingDate'])); ?></h5>
														</div>
														<div class="profile-timeline-list">
															<ul>

																<li>
																	<div class="date"><?php echo $row['num_days']; ?> Days</div>
																	<div class="task-name"><i class="ion-ios-chatboxes"></i><?php echo $row['LeaveType']; ?></div>
																	<p><?php echo $row['Description']; ?></p>

																	<div class="task-time">
																		<?php $stats = $row['Status'];
																		if ($stats == 1) {
																		?>
																			<span style="color: green">Recommend</span>
																		<?php }
																		if ($stats == 2) { ?>
																			<span style="color: red">Not Recommend</span>
																		<?php }
																		if ($stats == 0) { ?>
																			<span style="color: blue">Pending</span>
																		<?php } ?>
																	</div>

																</li>


															</ul>
														</div>
													<?php } ?>
												</div>
											</div>
										</div>
										<!-- Timeline Tab End -->
										<!-- Setting Tab start -->
										<div class="tab-pane fade height-100-p" id="setting" role="tabpanel">
											<div class="profile-setting">
												<form method="POST" enctype="multipart/form-data">
													<div class="profile-edit-list row">
														<div class="col-md-12">
															<h4 class="text-blue h5 mb-20">Edit Your Personal Setting</h4>
														</div>

														<?php
														$query = mysqli_query($conn, "select * from tblemployees where emp_id = '$session_id' ") or die(mysqli_error());
														$row = mysqli_fetch_array($query);
														?>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>First Name</label>
																<input name="fname" class="form-control form-control-lg" type="text" required="true" autocomplete="off" value="<?php echo $row['FirstName']; ?>">
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Last Name</label>
																<input name="lastname" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $row['LastName']; ?>">
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Email Address</label>
																<input name="email" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $row['EmailId']; ?>">
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Phone Number</label>
																<input name="phonenumber" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $row['Phonenumber']; ?>">
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Date Of Birth</label>
																<input name="dob" class="form-control form-control-lg date-picker" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $row['Dob']; ?>">
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Gender</label>
																<select name="gender" class="custom-select form-control" required="true" autocomplete="off">
																	<option value="<?php echo $row['Gender']; ?>"><?php echo $row['Gender']; ?></option>
																	<option value="male">Male</option>
																	<option value="female">Female</option>
																</select>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Address</label>
																<input name="address" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $row['Address']; ?>">
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Department</label>
																<select name="department" class="custom-select form-control" required="true" autocomplete="off">
																	<?php
																	$query_staff = mysqli_query($conn, "select * from tblemployees join  tbldepartments where emp_id = '$session_id'") or die(mysqli_error());
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
														<div class="weight-500 col-md-6">
															<?php
															$query = mysqli_query($conn, "select * from tblemployees where emp_id = '$session_id' ") or die(mysqli_error());
															$row = mysqli_fetch_array($query);
															?>
															<div class="form-group">
																<label>Available Leave Days</label>
																<input class="form-control form-control-lg" type="text" required="true" autocomplete="off" readonly value="<?php echo $row['Av_leave']; ?>">
															</div>
														</div>

														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Unique id</label>
																<span name="emp" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off"><?php echo $row['emp_id']; ?></span>
															</div>
														</div>

														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Employee id(enter the same as unique id)</label>
																<input name="emp" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $row['emp']; ?>">
															</div>
														</div>

														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Aadhar number</label>
																<input name="aadhar" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $row['aadhar']; ?>">
															</div>
														</div>

														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Pan number</label>
																<input name="pan" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $row['pan']; ?>">
															</div>
														</div>

														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Caste</label>
																<input name="caste" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $row['caste']; ?>">
															</div>
														</div>

														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Sub Caste</label>
																<input name="subcaste" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $row['subcaste']; ?>">
															</div>
														</div>

														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>SSC marks</label>
																<input name="ssc" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $row['ssc']; ?>">
															</div>
														</div>

														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Hsc marks</label>
																<input name="hsc" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $row['hsc']; ?>">
															</div>
														</div>

														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>BE/B.Tech marks</label>
																<input name="be" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $row['be']; ?>">
															</div>
														</div>

														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Post Graduation marks</label>
																<input name="pg" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $row['pg']; ?>">
															</div>
														</div>

														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>PHD marks</label>
																<input name="phd" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $row['phd']; ?>">
															</div>
														</div>

														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Publication</label>
																<input name="publication" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $row['publication']; ?>">
															</div>
														</div>

														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Journal</label>
																<input name="journal" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $row['journal']; ?>">
															</div>
														</div>

														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Patent</label>
																<input name="patent" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $row['patent']; ?>">
															</div>
														</div>


														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label></label>
																<div class="modal-footer justify-content-center">
																	<button class="btn btn-primary" name="new_update" id="new_update" data-toggle="modal">Save & &nbsp;Update</button>
																</div>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
										<!-- Setting Tab End -->
										<!-- upload start -->


									</div>

									<!-- document -->

									<div class="tab-content">
										<div class="tab-pane fade show active" id="document" role="tabpanel">
											<div class="profile-setting">
												<div class="row">
													<div class="col-md-4 col-sm-12">
														<div class="form-group">
															<label>Aadhar PDF</label>
															<div class="aadhar-photo">
																<?php
																if (isset($_POST["update_aadhar"])) {
																	$aadhar_name = $_FILES['image']['name'];
																	if (!empty($aadhar_name)) {
																		move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/aadhar/' . $aadhar_name);
																		$aadhar_pdf = $aadhar_name;
																	} else {
																		echo "<script>alert('Please Select PDF to Update');</script>";
																	}

																	$result = mysqli_query($conn, "update tblemployees set aadhar_pdf='$aadhar_pdf' where emp_id='$session_id'") or die(mysqli_error());
																	if ($result) {
																		echo "<script>alert('Aadhar PDF Updated');</script>";
																		echo "<script type='text/javascript'> document.location = 'document.php'; </script>";
																	} else {
																		die(mysqli_error());
																	}
																}
																?>
																<a href="#aadhar_modal" data-toggle="modal" data-target="#aadhar_modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
																<iframe src="<?php echo (!empty($row['aadhar_pdf'])) ? '../uploads/aadhar/' . $row['aadhar_pdf'] : ''; ?>" width="300px" height="300px"></iframe>
																<form method="post" enctype="multipart/form-data">
																	<div class="modal fade" id="aadhar_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
																		<div class="modal-dialog modal-dialog-centered" role="document">
																			<div class="modal-content">
																				<div class="weight-500 col-md-12 pd-5">
																					<div class="form-group">
																						<div class="custom-file">
																							<input name="image" id="aadhar_file" type="file" class="custom-file-input" onchange="validateAadharImage('aadhar_file')">
																							<label class="custom-file-label" for="aadhar_file">Choose file</label>
																						</div>
																					</div>
																				</div>
																				<div class="modal-footer">
																					<input type="submit" name="update_aadhar" value="Update" class="btn btn-primary">
																					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																				</div>
																			</div>
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</div>
													<div class="col-md-4 col-sm-12">
														<div class="form-group">
															<label>Pan Card PDF</label>
															<div class="pan-photo">
																<?php
																if (isset($_POST["update_pan"])) {
																	$pan_name = $_FILES['image1']['name'];
																	if (!empty($pan_name)) {
																		move_uploaded_file($_FILES['image1']['tmp_name'], '../uploads/Pan/' . $pan_name);
																		$pan_pdf = $pan_name;
																	} else {
																		echo "<script>alert('Please Select PDF to Update');</script>";
																	}

																	$result = mysqli_query($conn, "update tblemployees set pan_pdf='$pan_pdf' where emp_id='$session_id'") or die(mysqli_error());
																	if ($result) {
																		echo "<script>alert('Pan Card PDF Updated');</script>";
																		echo "<script type='text/javascript'> document.location = 'document.php'; </script>";
																	} else {
																		die(mysqli_error());
																	}
																}
																?>
																<a href="#pan_modal" data-toggle="modal" data-target="#pan_modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
																<iframe src="<?php echo (!empty($row['pan_pdf'])) ? '../uploads/Pan/' . $row['pan_pdf'] : ''; ?>" width="300px" height="300px"></iframe>
																<form method="post" enctype="multipart/form-data">
																	<div class="modal fade" id="pan_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
																		<div class="modal-dialog modal-dialog-centered" role="document">
																			<div class="modal-content">
																				<div class="weight-500 col-md-12 pd-5">
																					<div class="form-group">
																						<div class="custom-file">
																							<input name="image1" id="pan_file" type="file" class="custom-file-input" onchange="validatePanImage('pan_file')">
																							<label class="custom-file-label" for="pan_file">Choose file</label>
																						</div>
																					</div>
																				</div>
																				<div class="modal-footer">
																					<input type="submit" name="update_pan" value="Update" class="btn btn-primary">
																					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																				</div>
																			</div>
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>

												<div class="row">
													<!-- SSC Marksheet -->
													<div class="col-md-4 col-sm-12">
														<div class="form-group">
															<label>SSC Mark Sheet PDF</label>
															<div class="ssc-photo">
																<?php
																if (isset($_POST["update_ssc"])) {
																	$ssc_name = $_FILES['image2']['name'];
																	if (!empty($ssc_name)) {
																		move_uploaded_file($_FILES['image2']['tmp_name'], '../uploads/SSC/' . $ssc_name);
																		$ssc_pdf = $ssc_name;
																	} else {
																		echo "<script>alert('Please Select PDF to Update');</script>";
																	}

																	$result = mysqli_query($conn, "update tblemployees set ssc_pdf='$ssc_pdf' where emp_id='$session_id'") or die(mysqli_error());
																	if ($result) {
																		echo "<script>alert('SSC MarkSheet PDF Updated');</script>";
																		echo "<script type='text/javascript'> document.location = 'document.php'; </script>";
																	} else {
																		die(mysqli_error());
																	}
																}
																?>
																<a href="#ssc_modal" data-toggle="modal" data-target="#ssc_modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
																<iframe src="<?php echo (!empty($row['ssc_pdf'])) ? '../uploads/SSC/' . $row['ssc_pdf'] : ''; ?>" width="300px" height="300px"></iframe>
																<form method="post" enctype="multipart/form-data">
																	<div class="modal fade" id="ssc_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
																		<div class="modal-dialog modal-dialog-centered" role="document">
																			<div class="modal-content">
																				<div class="weight-500 col-md-12 pd-5">
																					<div class="form-group">
																						<div class="custom-file">
																							<input name="image2" id="ssc_file" type="file" class="custom-file-input" onchange="validateSscImage('ssc_file')">
																							<label class="custom-file-label" for="ssc_file">Choose file</label>
																						</div>
																					</div>
																				</div>
																				<div class="modal-footer">
																					<input type="submit" name="update_ssc" value="Update" class="btn btn-primary">
																					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																				</div>
																			</div>
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</div>

													<!-- HSC marksheet -->
													<div class="col-md-4 col-sm-12">
														<div class="form-group">
															<label>HSC Mark Sheet PDF</label>
															<div class="hsc-photo">
																<?php
																if (isset($_POST["update_hsc"])) {
																	$hsc_name = $_FILES['image3']['name'];
																	if (!empty($hsc_name)) {
																		move_uploaded_file($_FILES['image3']['tmp_name'], '../uploads/HSC/' . $hsc_name);
																		$hsc_pdf = $hsc_name;
																	} else {
																		echo "<script>alert('Please Select PDF to Update');</script>";
																	}

																	$result = mysqli_query($conn, "update tblemployees set hsc_pdf='$hsc_pdf' where emp_id='$session_id'") or die(mysqli_error());
																	if ($result) {
																		echo "<script>alert('HSC MarkSheet PDF Updated');</script>";
																		echo "<script type='text/javascript'> document.location = 'document.php'; </script>";
																	} else {
																		die(mysqli_error());
																	}
																}
																?>
																<a href="#hsc_modal" data-toggle="modal" data-target="#hsc_modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
																<iframe src="<?php echo (!empty($row['hsc_pdf'])) ? '../uploads/HSC/' . $row['hsc_pdf'] : ''; ?>" width="300px" height="300px"></iframe>
																<form method="post" enctype="multipart/form-data">
																	<div class="modal fade" id="hsc_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
																		<div class="modal-dialog modal-dialog-centered" role="document">
																			<div class="modal-content">
																				<div class="weight-500 col-md-12 pd-5">
																					<div class="form-group">
																						<div class="custom-file">
																							<input name="image3" id="hsc_file" type="file" class="custom-file-input" onchange="validateHscImage('hsc_file')">
																							<label class="custom-file-label" for="hsc_file">Choose file</label>
																						</div>
																					</div>
																				</div>
																				<div class="modal-footer">
																					<input type="submit" name="update_hsc" value="Update" class="btn btn-primary">
																					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																				</div>
																			</div>
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</div>

													<!-- BE marksheet -->
													<div class="col-md-4 col-sm-12">
														<div class="form-group">
															<label>BE/B.Tech Mark Sheet PDF</label>
															<div class="be-photo">
																<?php
																if (isset($_POST["update_be"])) {
																	$be_name = $_FILES['image4']['name'];
																	if (!empty($be_name)) {
																		move_uploaded_file($_FILES['image4']['tmp_name'], '../uploads/BE/' . $be_name);
																		$be_pdf = $be_name;
																	} else {
																		echo "<script>alert('Please Select PDF to Update');</script>";
																	}

																	$result = mysqli_query($conn, "update tblemployees set be_pdf='$be_pdf' where emp_id='$session_id'") or die(mysqli_error());
																	if ($result) {
																		echo "<script>alert('BE/B.Tech MarkSheet PDF Updated');</script>";
																		echo "<script type='text/javascript'> document.location = 'document.php'; </script>";
																	} else {
																		die(mysqli_error());
																	}
																}
																?>
																<a href="#be_modal" data-toggle="modal" data-target="#be_modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
																<iframe src="<?php echo (!empty($row['be_pdf'])) ? '../uploads/BE/' . $row['be_pdf'] : ''; ?>" width="300px" height="300px"></iframe>
																<form method="post" enctype="multipart/form-data">
																	<div class="modal fade" id="be_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
																		<div class="modal-dialog modal-dialog-centered" role="document">
																			<div class="modal-content">
																				<div class="weight-500 col-md-12 pd-5">
																					<div class="form-group">
																						<div class="custom-file">
																							<input name="image4" id="be_file" type="file" class="custom-file-input" onchange="validateBeImage('be_file')">
																							<label class="custom-file-label" for="be_file">Choose file</label>
																						</div>
																					</div>
																				</div>
																				<div class="modal-footer">
																					<input type="submit" name="update_be" value="Update" class="btn btn-primary">
																					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																				</div>
																			</div>
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</div>

												</div>

												<div class="row">
													<!-- Pg marksheet -->
													<div class="col-md-4 col-sm-12">
														<div class="form-group">
															<label>PG Mark Sheet PDF</label>
															<div class="pg-photo">
																<?php
																if (isset($_POST["update_pg"])) {
																	$pg_name = $_FILES['image5']['name'];
																	if (!empty($pg_name)) {
																		move_uploaded_file($_FILES['image5']['tmp_name'], '../uploads/PG/' . $pg_name);
																		$pg_pdf = $pg_name;
																	} else {
																		echo "<script>alert('Please Select PDF to Update');</script>";
																	}

																	$result = mysqli_query($conn, "update tblemployees set pg_pdf='$pg_pdf' where emp_id='$session_id'") or die(mysqli_error());
																	if ($result) {
																		echo "<script>alert('PG MarkSheet PDF Updated');</script>";
																		echo "<script type='text/javascript'> document.location = 'document.php'; </script>";
																	} else {
																		die(mysqli_error());
																	}
																}
																?>
																<a href="#pg_modal" data-toggle="modal" data-target="#pg_modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
																<iframe src="<?php echo (!empty($row['pg_pdf'])) ? '../uploads/PG/' . $row['pg_pdf'] : ''; ?>" width="300px" height="300px"></iframe>
																<form method="post" enctype="multipart/form-data">
																	<div class="modal fade" id="pg_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
																		<div class="modal-dialog modal-dialog-centered" role="document">
																			<div class="modal-content">
																				<div class="weight-500 col-md-12 pd-5">
																					<div class="form-group">
																						<div class="custom-file">
																							<input name="image5" id="pg_file" type="file" class="custom-file-input" onchange="validatePgImage('pg_file')">
																							<label class="custom-file-label" for="pg_file">Choose file</label>
																						</div>
																					</div>
																				</div>
																				<div class="modal-footer">
																					<input type="submit" name="update_pg" value="Update" class="btn btn-primary">
																					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																				</div>
																			</div>
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</div>

													<!-- PHD marksheet -->
													<div class="col-md-4 col-sm-12">
														<div class="form-group">
															<label>PHD Mark Sheet PDF</label>
															<div class="phd-photo">
																<?php
																if (isset($_POST["update_phd"])) {
																	$phd_name = $_FILES['image6']['name'];
																	if (!empty($phd_name)) {
																		move_uploaded_file($_FILES['image6']['tmp_name'], '../uploads/PHD/' . $phd_name);
																		$phd_pdf = $phd_name;
																	} else {
																		echo "<script>alert('Please Select PDF to Update');</script>";
																	}

																	$result = mysqli_query($conn, "update tblemployees set phd_pdf='$phd_pdf' where emp_id='$session_id'") or die(mysqli_error());
																	if ($result) {
																		echo "<script>alert('PHD MarkSheet PDF Updated');</script>";
																		echo "<script type='text/javascript'> document.location = 'document.php'; </script>";
																	} else {
																		die(mysqli_error());
																	}
																}
																?>
																<a href="#phd_modal" data-toggle="modal" data-target="#phd_modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
																<iframe src="<?php echo (!empty($row['phd_pdf'])) ? '../uploads/PHD/' . $row['phd_pdf'] : ''; ?>" width="300px" height="300px"></iframe>
																<form method="post" enctype="multipart/form-data">
																	<div class="modal fade" id="phd_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
																		<div class="modal-dialog modal-dialog-centered" role="document">
																			<div class="modal-content">
																				<div class="weight-500 col-md-12 pd-5">
																					<div class="form-group">
																						<div class="custom-file">
																							<input name="image6" id="phd_file" type="file" class="custom-file-input" onchange="validatePhdImage('phd_file')">
																							<label class="custom-file-label" for="phd_file">Choose file</label>
																						</div>
																					</div>
																				</div>
																				<div class="modal-footer">
																					<input type="submit" name="update_phd" value="Update" class="btn btn-primary">
																					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																				</div>
																			</div>
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>


											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php include('includes/footer.php'); ?>
			</div>
		</div>
		<!-- js -->
		<?php include('includes/scripts.php') ?>

		<script type="text/javascript">
			var loader = function(e) {
				let file = e.target.files;

				let show = "<span>Selected file : </span>" + file[0].name;
				let output = document.getElementById("selector");
				output.innerHTML = show;
				output.classList.add("active");
			};

			let fileInput = document.getElementById("file");
			fileInput.addEventListener("change", loader);
		</script>
		<script type="text/javascript">
			function validateImage(id) {
				var formData = new FormData();
				var file = document.getElementById(id).files[0];
				formData.append("Filedata", file);
				var t = file.type.split('/').pop().toLowerCase();
				if (t != "jpeg" && t != "jpg" && t != "png") {
					alert('Please select a valid image file');
					document.getElementById(id).value = '';
					return false;
				}
				if (file.size > 1050000) {
					alert('Max Upload size is 1MB only');
					document.getElementById(id).value = '';
					return false;
				}

				return true;
			}

			function validateAadharImage(id) {
				var file = document.getElementById(id).files[0];
				var t = file.type.split('/').pop().toLowerCase();
				if (t != "pdf") {
					alert('Please select a valid PDF file');
					document.getElementById(id).value = '';
					return false;
				}
				if (file.size > 1050000) {
					alert('Max upload size is 1MB');
					document.getElementById(id).value = '';
					return false;
				}

				return true;
			}

			function validatePanImage(id) {
				var file = document.getElementById(id).files[0];
				var t = file.type.split('/').pop().toLowerCase();
				if (t != "pdf") {
					alert('Please select a valid PDF file');
					document.getElementById(id).value = '';
					return false;
				}
				if (file.size > 1050000) {
					alert('Max upload size is 1MB');
					document.getElementById(id).value = '';
					return false;
				}

				return true;
			}

			function validateSscImage(id) {
				var file = document.getElementById(id).files[0];
				var t = file.type.split('/').pop().toLowerCase();
				if (t != "pdf") {
					alert('Please select a valid PDF file');
					document.getElementById(id).value = '';
					return false;
				}
				if (file.size > 1050000) {
					alert('Max upload size is 1MB');
					document.getElementById(id).value = '';
					return false;
				}

				return true;
			}

			function validateHscImage(id) {
				var file = document.getElementById(id).files[0];
				var t = file.type.split('/').pop().toLowerCase();
				if (t != "pdf") {
					alert('Please select a valid PDF file');
					document.getElementById(id).value = '';
					return false;
				}
				if (file.size > 1050000) {
					alert('Max upload size is 1MB');
					document.getElementById(id).value = '';
					return false;
				}

				return true;
			}

			function validateBeImage(id) {
				var file = document.getElementById(id).files[0];
				var t = file.type.split('/').pop().toLowerCase();
				if (t != "pdf") {
					alert('Please select a valid PDF file');
					document.getElementById(id).value = '';
					return false;
				}
				if (file.size > 1050000) {
					alert('Max upload size is 1MB');
					document.getElementById(id).value = '';
					return false;
				}

				return true;
			}

			function validatePgImage(id) {
				var file = document.getElementById(id).files[0];
				var t = file.type.split('/').pop().toLowerCase();
				if (t != "pdf") {
					alert('Please select a valid PDF file');
					document.getElementById(id).value = '';
					return false;
				}
				if (file.size > 1050000) {
					alert('Max upload size is 1MB');
					document.getElementById(id).value = '';
					return false;
				}

				return true;
			}

			function validatePhdImage(id) {
				var file = document.getElementById(id).files[0];
				var t = file.type.split('/').pop().toLowerCase();
				if (t != "pdf") {
					alert('Please select a valid PDF file');
					document.getElementById(id).value = '';
					return false;
				}
				if (file.size > 1050000) {
					alert('Max upload size is 1MB');
					document.getElementById(id).value = '';
					return false;
				}

				return true;
			}
		</script>
</body>

</html>