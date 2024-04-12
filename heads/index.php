<?php include('includes_hod/header.php') ?>

<?php include('../includes/session.php') ?>

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

<?php include('includes_hod/navbar.php') ?>
<?php include('includes_hod/right_sidebar.php') ?>
<?php include('includes_hod/left_sidebar.php') ?>

<div class="mobile-menu-overlay"></div>

<div class="main-container">
  <div class="pd-ltr-20">
    <div class="card-box pd-20 height-100-p mb-30">
      <div class="row align-items-center">
        <div class="col-md-4 user-icon">
          <img src="../vendors/images/banner-img.png" alt="">
        </div>
        <div class="col-md-8">
          <?php
          $session_depart = $session_depart;
          $query = mysqli_query($conn, "select * from tblemployees where emp_id = '$session_id'") or die(mysqli_error());
          $row = mysqli_fetch_array($query);
          ?>
          <h4 class="font-20 weight-500 mb-10 text-capitalize">
            Welcome back <div class="weight-600 font-30 text-blue"><?php echo $row['FirstName'] . " " . $row['LastName']; ?>,</div>
          </h4>
          <p class="font-18 max-width-600">in Dnyanshree Institute of Engineering and Technology, Satara as a <?php echo $row['role'] ?></p>
        </div>
      </div>
    </div>

    <div class="title pb-20">
      <h2 class="h3 mb-0">Data Information</h2>
    </div>

    <div class="row pb-10">
      <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
          <?php
          $sql = "SELECT emp_id from tblemployees WHERE Department = '$session_depart'";
          $query = $dbh->prepare($sql);
          $query->execute();
          $empcount = $query->rowCount();
          ?>
          <div class="d-flex flex-wrap">
            <div class="widget-data">
              <div class="weight-700 font-24 text-dark"><?php echo $empcount; ?></div>
              <div class="font-14 text-secondary weight-500">Total Staff in Department</div>
            </div>
            <div class="widget-icon">
              <div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-user-2"></i></div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
          <?php
          $status = 1;
          $sql = "SELECT id from tblleaves WHERE Status = :status AND empid IN (SELECT emp_id FROM tblemployees WHERE Department = '$session_depart')";
          $query = $dbh->prepare($sql);
          $query->bindParam(':status', $status, PDO::PARAM_STR);
          $query->execute();
          $approvedLeaveCount = $query->rowCount();
          ?>
          <div class="d-flex flex-wrap">
            <div class="widget-data">
              <div class="weight-700 font-24 text-dark"><?php echo $approvedLeaveCount; ?></div>
              <div class="font-14 text-secondary weight-500">Approved Leave</div>
            </div>
            <div class="widget-icon">
              <div class="icon" data-color="#09cc06"><span class="icon-copy fa fa-hourglass"></span></div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
          <?php
          $status = 0;
          $sql = "SELECT id from tblleaves WHERE Status = :status AND empid IN (SELECT emp_id FROM tblemployees WHERE Department = '$session_depart')";
          $query = $dbh->prepare($sql);
          $query->bindParam(':status', $status, PDO::PARAM_STR);
          $query->execute();
          $pendingLeaveCount = $query->rowCount();
          ?>
          <div class="d-flex flex-wrap">
            <div class="widget-data">
              <div class="weight-700 font-24 text-dark"><?php echo $pendingLeaveCount; ?></div>
              <div class="font-14 text-secondary weight-500">Pending Leave</div>
            </div>
            <div class="widget-icon">
              <div class="icon"><i class="icon-copy fa fa-hourglass-end" aria-hidden="true"></i></div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
          <?php
          $status = 2;
          $sql = "SELECT id from tblleaves WHERE Status = :status AND empid IN (SELECT emp_id FROM tblemployees WHERE Department = '$session_depart')";
          $query = $dbh->prepare($sql);
          $query->bindParam(':status', $status, PDO::PARAM_STR);
          $query->execute();
          $rejectedLeaveCount = $query->rowCount();
          ?>
          <div class="d-flex flex-wrap">
            <div class="widget-data">
              <div class="weight-700 font-24 text-dark"><?php echo $rejectedLeaveCount; ?></div>
              <div class="font-14 text-secondary weight-500">Rejected Leave</div>
            </div>
            <div class="widget-icon">
              <div class="icon" data-color="#ff5b5b"><i class="icon-copy fa fa-hourglass-o" aria-hidden="true"></i></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card-box mb-30">
      <div class="pd-20">
        <h2 class="text-blue h4">LATEST LEAVE APPLICATIONS</h2>
      </div>
      <div class="pb-20">
        <table class="data-table table stripe hover nowrap">
          <thead>
            <tr>
              <th class="table-plus datatable-nosort">STAFF NAME</th>
              <th>LEAVE TYPE</th>
              <th>APPLIED DATE</th>
              <th>STATUS</th>
              <th class="datatable-nosort">ACTION</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT tblleaves.id as lid, tblemployees.FirstName, tblemployees.LastName, tblemployees.emp_id, tblleaves.LeaveType, tblleaves.PostingDate, tblleaves.Status
                    FROM tblleaves 
                    JOIN tblemployees ON tblleaves.empid = tblemployees.emp_id
                    WHERE tblemployees.Department = '$session_depart'
                    ORDER BY lid DESC
                    LIMIT 5";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {
              foreach ($results as $result) {
            ?>
                <tr>
                  <td class="table-plus">
                    <div class="name-avatar d-flex align-items-center">
                      <div class="txt mr-2 flex-shrink-0">
                        <b><?php echo $cnt; ?></b>
                      </div>
                      <div class="txt">
                        <div class="weight-600"><?php echo $result->FirstName . " " . $result->LastName; ?></div>
                      </div>
                    </div>
                  </td>
                  <td><?php echo $result->LeaveType; ?></td>
                  <td><?php echo $result->PostingDate; ?></td>
                  <td>
                    <?php
                    $stats = $result->Status;
                    if ($stats == 1) {
                      echo "<span style='color: green'>Approved</span>";
                    } elseif ($stats == 2) {
                      echo "<span style='color: red'>Rejected</span>";
                    } else {
                      echo "<span style='color: blue'>Pending</span>";
                    }
                    ?>
                  </td>
                  <td>
                    <div class="dropdown">
                      <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <i class="dw dw-more"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="leave_details.php?leaveid=<?php echo $result->lid; ?>"><i class="dw dw-eye"></i> View</a>
                        <a class="dropdown-item" href="admin_dashboard.php?leaveid=<?php echo $result->lid; ?>"><i class="dw dw-delete-3"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
            <?php
                $cnt++;
              }
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
<?php include('includes_hod/scripts.php') ?>
</body>
</html>