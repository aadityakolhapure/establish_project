<?php include('includes/header.php') ?>
<?php include('../includes/session.php') ?>
<?php $get_id = $_GET['edit']; ?>

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
                                <h4>Admin Portal</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Document</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <div class="title">
                                <h5>View Document</h5>
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
                                        <div class="avatar mr-2 flex-shrink-0">
                                            <label style="font-size: 18px;">Aadhar Card:</label>
                                            <iframe src="<?php echo (!empty($row['aadhar_pdf'])) ? '../uploads/aadhar/' . $row['aadhar_pdf'] : '../uploads/aadhar/NO-IMAGE-AVAILABLE.jpg'; ?>" width="300px" height="300px" alt=""></iframe>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="avatar mr-2 flex-shrink-0">
                                            <label style="font-size: 18px;">Pan Card:</label>
                                            <iframe src="<?php echo (!empty($row['pan_pdf'])) ? '../uploads/Pan/' . $row['pan_pdf'] : '../uploads/Pan/NO-IMAGE-AVAILABLE.jpg'; ?>" width="300px" height="300px" alt=""></iframe>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="avatar mr-2 flex-shrink-0">
                                            <label style="font-size: 18px;">SSC Marksheet:</label>
                                            <iframe src="<?php echo (!empty($row['ssc_pdf'])) ? '../uploads/SSC/' . $row['ssc_pdf'] : '../uploads/SSC/NO-IMAGE-AVAILABLE.jpg'; ?>" width="300px" height="300px" alt=""></iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <div class="avatar mr-2 flex-shrink-0">
                                            <label style="font-size: 18px;">HSC Marksheet:</label>
                                            <iframe src="<?php echo (!empty($row['hsc_pdf'])) ? '../uploads/HSC/' . $row['hsc_pdf'] : '../uploads/HSC/NO-IMAGE-AVAILABLE.jpg'; ?>" width="300px" height="300px" alt=""></iframe>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="avatar mr-2 flex-shrink-0">
                                            <label style="font-size: 18px;">BE/B.Tech Marksheet:</label>
                                            <iframe src="<?php echo (!empty($row['be_pdf'])) ? '../uploads/BE/' . $row['be_pdf'] : '../uploads/BE/NO-IMAGE-AVAILABLE.jpg'; ?>" width="300px" height="300px" alt=""></iframe>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="avatar mr-2 flex-shrink-0">
                                            <label style="font-size: 18px;">PG Marksheet:</label>
                                            <iframe src="<?php echo (!empty($row['pg_pdf'])) ? '../uploads/PG/' . $row['pg_pdf'] : '../uploads/PG/NO-IMAGE-AVAILABLE.jpg'; ?>" width="300px" height="300px" alt=""></iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <div class="avatar mr-2 flex-shrink-0">
                                            <label style="font-size: 18px;">PHD Marksheet:</label>
                                            <iframe src="<?php echo (!empty($row['phd_pdf'])) ? '../uploads/PHD/' . $row['phd_pdf'] : '../uploads/PHD/NO-IMAGE-AVAILABLE.jpg'; ?>" width="300px" height="300px" alt=""></iframe>
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