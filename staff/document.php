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

    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="tab-pane fade height-100-p" id="upload" role="tabpanel">
            <div class="profile-setting">
                <div class="aadhar-photo">
                    <?php
                    if (isset($_POST["update_aadhar"])) {

                        $image = $_FILES['image']['name'];

                        if (!empty($image)) {
                            move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/aadhar/' . $image);
                            $location = $image;
                        } else {
                            echo "<script>alert('Please Select Picture to Update');</script>";
                        }

                        $result = mysqli_query($conn, "update tblemployees set aadhar_pdf='$aadhar_pdf' where emp_id='$session_id'         
															") or die(mysqli_error());
                        if ($result) {
                            echo "<script>alert('Aadhar pdf Updated');</script>";
                            echo "<script type='text/javascript'> document.location = 'staff_profile.php'; </script>";
                        } else {
                            die(mysqli_error());
                        }
                    }
                    ?>
                    <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
                    <img src="<?php echo (!empty($row['location'])) ? '../uploads/' . $row['location'] : '../uploads/aadhar/NO-IMAGE-AVAILABLE.jpg'; ?>" alt="" class="avatar-photo">
                    <form method="post" enctype="multipart/form-data">
                        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="weight-500 col-md-12 pd-5">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input name="image" id="file" type="file" class="custom-file-input" accept="pdf/*" onchange="validateImage('file')">
                                                <label class="custom-file-label" for="file" id="selector">Choose file</label>
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
    </script>
</body>

</html>