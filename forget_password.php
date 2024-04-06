<?php
session_start();
include('includes/config.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the email exists in the database
    $sql = "SELECT * FROM tblemployees WHERE EmailId = '$email'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);

    if ($count == 1) {
        // Check if passwords match
        if ($password === $confirm_password) {
            // Hash the new password
            $hashed_password = md5($password);

            // Update the password in the database
            $sql_update = "UPDATE tblemployees SET Password = '$hashed_password' WHERE EmailId = '$email'";
            $query_update = mysqli_query($conn, $sql_update);

            if ($query_update) {
                $_SESSION['success'] = "Password updated successfully.";
            } else {
                $_SESSION['error'] = "Failed to update password. Please try again later.";
            }
        } else {
            $_SESSION['error'] = "Passwords do not match.";
        }
    } else {
        $_SESSION['error'] = "Email not found in our records.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Establishment Section</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
</head>

<body class="login-page">

    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="vendors/images/forgot-password.png" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Reset the Password</h2>
                        </div>
                        <form name="signin" method="post">

                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" placeholder="Email ID" name="email" id="email">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy fa fa-envelope-o" aria-hidden="true"></i></span>
                                </div>
                            </div>

                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" placeholder="New Password" name="password" id="password">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy fa fa-envelope-o" aria-hidden="true"></i></span>
                                </div>
                            </div>

                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" placeholder="Confirm Password" name="confirm_password" id="password">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy fa fa-envelope-o" aria-hidden="true"></i></span>
                                </div>
                            </div>

                            <?php if (isset($_SESSION['error'])) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $_SESSION['error']; ?>
                                </div>
                                <?php unset($_SESSION['error']); ?>
                            <?php endif; ?>

                            <?php if (isset($_SESSION['success'])) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $_SESSION['success']; ?>
                                </div>
                                <?php unset($_SESSION['success']); ?>
                            <?php endif; ?>

                            <div class="row pb-30">
                                <div class="col-6">
                                    <div class="forgot-password"><a href="index.php">Already Signup</a></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <input class="btn btn-primary btn-lg btn-block" name="submit" id="signin" type="submit" value="Reset Password">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="vendors/scripts/core.js"></script>
    <script src="vendors/scripts/script.min.js"></script>
    <script src="vendors/scripts/process.js"></script>
    <script src="vendors/scripts/layout-settings.js"></script>
</body>

</html>