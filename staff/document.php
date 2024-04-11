<?php include('includes/header.php') ?>
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

    <?php include('includes/navbar.php') ?>
    <?php include('includes/right_sidebar.php') ?>
    <?php include('includes/left_sidebar.php') ?>

    <div class="mobile-menu-overlay"></div>
    <div class="main-container">
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

    <!-- Include scripts -->
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