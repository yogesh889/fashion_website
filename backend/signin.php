<?php session_start(); ?>
<?php require_once('../includes/db.php'); ?>
<?php
if(isset($_POST['cpagesin'])){
    $cpage = $_POST['cpagesin'];
    $_SESSION['cpage'] = $_POST['cpagesin'];
}

?>
<?php
    if(isset($_SESSION['login']) || isset($_COOKIE['_uid_']) || isset($_COOKIE['_uiid_'])) {
        header('Location: http://localhost/lalit_fashion_website/'.$cpage);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>SIGN IN || Admin Panel</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="js/all.min.js"></script>
        <script src="js/feather.min.js"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">

                                

                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header justify-content-center"><h3 class="font-weight-light my-4">SIGN IN</h3></div>
                                    <div class="card-body">
                                        <?php
                                            
                                            if(isset($_SESSION['success'])) {
                                                $success = $_SESSION['success'];
                                                echo "<p class='alert alert-success'>{$success}</p>";
                                                unset($_SESSION['success']);
                                            }
                                            if(isset($_SESSION['error']))  {
                                                $error = $_SESSION['error'];
                                                echo "<p class='alert alert-danger'>{$error}</p>";
                                                unset($_SESSION['error']);
                                            } else if(isset($_SESSION['error_password'])) {
                                                $error_password = $_SESSION['error_password'];
                                                echo "<p class='alert alert-danger'>{$error_password}</p>";
                                                unset($_SESSION['error_password']);
                                            }
                                            
                                            
                                            
                                        ?>
                                        <form action="check.php" method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input name="email" class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input name="password" class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" />
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input name="check" class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="#"></a>
                                                <button name="submit" class="btn btn-primary btn-block" type="submit">SIGN IN</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small">
                                            <a href="signup.php">Need an account? Sign up!</a> <br>
                                            <a href="forgot-password.php">Forgot password</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <!--Script JS-->
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
