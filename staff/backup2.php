<?php include('../includes/config.php') ?>
<?php include('../includes/session.php') ?>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="form.css">
	<title>Document</title>
</head>

<body>
	<div class="container">
		<div class="header">
			<div class="logo">
				<img src="logo_w-modified.png" alt="">
			</div>
			<div class="name">
				<div class="a1">
					<h4>Raosaheb Wangde Master Charitable Trust's</h4>
				</div>
				<div class="a1">
					<h1>DNYANSHREE</h1>
				</div>
				<div class="a1">
					<h3>Institute of Engineering & Technology</h3>
				</div>
				<div class="a1">
					<h4>A/P.:Sonavadi-gajawadi,Sajjangad Road,Tal. & Dist.:Satara-415013</h4>
				</div>
				<div class="a1">
					<h4>Maharashtra State.DTE Code : EN6797</h4>
				</div>
			</div>


			<?php
			if (!isset($_GET['edit']) && empty($_GET['edit'])) {
				header('Location: index.php');
			} else {

				$lid = intval($_GET['edit']);
				$sql = "SELECT tblleaves.id as lid,tblemployees.FirstName,tblemployees.LastName,tblemployees.emp_id,tblemployees.Gender,tblemployees.Phonenumber,tblemployees.EmailId,tblemployees.Av_leave,tblemployees.RegDate,tblemployees.Department,tblleaves.LeaveType,tblleaves.ToDate,tblleaves.FromDate,tblleaves.Description,tblleaves.PostingDate,tblleaves.Status,tblleaves.AdminRemark,tblleaves.admin_status,tblleaves.registra_remarks,tblleaves.AdminRemarkDate,tblleaves.num_days from tblleaves join tblemployees on tblleaves.empid=tblemployees.emp_id where tblleaves.id=:lid";
				$query = $dbh->prepare($sql);
				$query->bindParam(':lid', $lid, PDO::PARAM_STR);
				$query->execute();
				$results = $query->fetchAll(PDO::FETCH_OBJ);
				$cnt = 1;
				if ($query->rowCount() > 0) {
					foreach ($results as $result) {
			?>
		</div>
		<hr>
		<h4 id="title">Leave Application form</h4>
		<div class="header2">
			<div class="gree">
				<span>To,</span><br>
				<span>The Principal,</span>
			</div>
			<div class="date">
				<span>Date- <?php echo htmlentities($result->PostingDate); ?></span>
			</div>
		</div>
		<div class="header3">
			<span>Respected Sir,</span><br>
			<span> I am Mr./Mrs./Ms. <?php echo htmlentities($result->FirstName . " " . $result->LastName); ?> applying for the leave. You are requested to kindly
				approve the same.</span>
		</div>

		<div class="header4">
			<table>
				<tr>
					<td>Destination: </td>
					<td>department: <?php echo htmlentities($result->Department); ?></td>
				</tr>
			</table>
			<table>
				<tr id="duty">
					<td>
						Reason :
						<?php echo htmlentities($result->Description); ?>
				</tr>
			</table>
			<table>
				<td>
					No. of days:
					<?php echo htmlentities($result->num_days); ?>
				</td>
				<td>

					From <?php echo htmlentities($result->FromDate); ?> to <?php echo htmlentities($result->ToDate); ?>
				</td>

			</table>
			<table>
				<tr>
					<td>Type of leave(which is applicable):</td>
					<td><?php echo htmlentities($result->LeaveType); ?><style></style>
					</td>
				</tr>
			</table>

			<table>
				<tr>
					<td>Details of alternative Arrangement:(Please attach separate Sheet if required)</td>
				</tr>
			</table>
			<table>
				<tr>
					<td>SR no.</td>
					<td>Date</td>
					<td>Existing Load</td>
					<td>Schedule <br>Time</td>
					<td>Class</td>
					<td>Name of <br>alternative <br>faculty</td>
					<td>Designation</td>
					<td>Sign <br>of alternative <br>faculty</td>
				</tr>
				<tr>
					<td>1.</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>2.</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>3.</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>4.</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<table>
				<td>
					<br><br><br>
					<div class="box">
						<div class="da">
							<span><?php echo htmlentities($result->PostingDate); ?></span>
						</div>
						<div class="si">
							Applicant Sign
						</div>
					</div>
				</td>
				<td>
					<span>Hod Remark:
						<?php $stats = $result->Status; ?>
						<?php
						if ($stats == 1) : ?>
							<span style="color: green;"><?php echo "Approved"; ?></span>
						<?php
						elseif ($stats == 2) : ?>
							<span style="color: red;"><?php echo "Rejected"; ?></span>
						<?php
						else : ?>
							<span style="color: blue;"><?php echo "Pending"; ?></span>
						<?php endif ?>
					</span><br><br><br>
					<div class="box">

						<div class="si" style="justify-item: center">
							HOD Sign
						</div>
					</div>
				</td>
			</table>
			<table>
				<td>
					<span>Establishment Section</span>
				</td>
				<td>
					<span>Remark: <?php echo htmlentities($result->AdminRemark); ?></span>
				</td>
			</table>
			<table>
				<tr>
					<td>
						<table>
							<tr>
								<td>Type of leave</td>
								<td>Opening Balance</td>
								<td>Sanction Days</td>
								<td>Balance Days</td>
							</tr>
							<tr>
								<td>1.</td>
								<td></td>
								<td><?php echo htmlentities($result->num_days); ?></td>
								<td><?php echo htmlentities($result->Av_leave);?></td>
							</tr>
							
						</table>
					</td>
					<td>
						<span>Approved:
							<?php $stats = $result->admin_status; ?>
							<?php
							if ($stats == 1) : ?>
								<span style="color: green;"><?php echo "Approved"; ?></span>
							<?php
							elseif ($stats == 2) : ?>
								<span style="color: red;"><?php echo "Rejected"; ?></span>
							<?php
							else : ?>
								<span style="color: blue;"><?php echo "Pending"; ?></span>
							<?php endif ?>
						</span><br><br><br>
						<div class="box">
							<div class="da">
								<span>Date: <?php echo htmlentities($result->AdminRemarkDate); ?></span>
							</div>
							<div class="si">
								Administrator
							</div>
						</div>
					</td>
				</tr>
			</table>
		</div>
<?php $cnt++;
					}
				}
			} ?>


	</div>

	<button id="print">Print the Form</button>
	<button id="print"><a href="leave_history.php"> back</a></button>


	<script>
		const printDoc = document.getElementById('print');
		printDoc.addEventListener('click', function() {
			print();
		});
	</script>

</body>

</html>