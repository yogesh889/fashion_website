
<link href=".//css/style_1.css" rel="stylesheet" type="text/css"/>


<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 fh5co_padding_menu">
                <img src="images/logo.png" alt="img" class="fh5co_logo_width"/>
            </div>
            <div class="col-12 col-md-9 align-self-center fh5co_mediya_right">
                <div class="text-center d-inline-block">
                    <a class="fh5co_display_table"><div class="fh5co_verticle_middle"><i class="fa fa-search"></i></div></a>
                </div>
                <div class="text-center d-inline-block">
                    <a class="fh5co_display_table"><div class="fh5co_verticle_middle"><i class="fa fa-linkedin"></i></div></a>
                </div>
                <div class="text-center d-inline-block">
                    <a class="fh5co_display_table"><div class="fh5co_verticle_middle"><i class="fa fa-google-plus"></i></div></a>
                </div>
                <div class="text-center d-inline-block">
                    <a href="https://twitter.com/fh5co" target="_blank" class="fh5co_display_table"><div class="fh5co_verticle_middle"><i class="fa fa-twitter"></i></div></a>
                </div>
                <div class="text-center d-inline-block">
                    <a href="https://fb.com/fh5co" target="_blank" class="fh5co_display_table"><div class="fh5co_verticle_middle"><i class="fa fa-facebook"></i></div></a>
                </div>
                <!--<div class="d-inline-block text-center"><img src="images/country.png" alt="img" class="fh5co_country_width"/></div>-->
                <?php 

                    
                    if(isset($_SESSION['login'])) { ?>
                        <form action="<?php echo $curr_page; ?>" method="POST">
                            <button class="btn-teal btn rounded-pill px-4 ml-lg-4">Sign out (<?php echo $_SESSION['user_name']; ?>)</button>
                        </form>
                    <?php } else {
                        if(!isset($_COOKIE['_uid_']) && !isset($_COOKIE['_uiid_'])) {
                            echo '<a class="btn-teal btn rounded-pill px-4 ml-lg-4" href="./backend/signin.php">Sign in</a>';
                            echo '<a class="btn-teal btn rounded-pill px-4 ml-lg-4" href="./backend/signup.php">Sign up</a>';
                        } else {
                            $user_id = base64_decode($_COOKIE['_uid_']);
                            $user_nickname = base64_decode($_COOKIE['_uiid_']);
                            $sql = "SELECT * FROM users WHERE user_id = :id AND user_nickname = :nickname";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute([
                                ':id' => $user_id,
                                ':nickname' => $user_nickname
                            ]);
                            $user = $stmt->fetch(PDO::FETCH_ASSOC);
                            $user_name = $user['user_name'];
                            $user_role = $user['user_role'];
                            $_SESSION['user_name'] = $user_nickname;
                            $_SESSION['user_role'] = $user_role;
                            $_SESSION['login'] = 'success'; ?>
                            <form action="<?php $curr_page; ?>" method="POST">
                                <button class="btn-teal btn rounded-pill px-4 ml-lg-4">Sign out (<?php echo $_SESSION['user_name']; ?>)</button>
                            </form>
                        <?php }
                        
                    }
                ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
    <div class="container padding_786">
        <nav class="navbar navbar-toggleable-md navbar-light ">
            <button class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
            <a class="navbar-brand" href="#"><img src="images/logo.png" alt="img" class="mobile_logo_width"/></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="blog.php">Blog <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="single.php">Single <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton2" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">World <span class="sr-only">(current)</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                            <a class="dropdown-item" href="#">Action in</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton3" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Community<span class="sr-only">(current)</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                            <a class="dropdown-item" href="#">Action in</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="Contact_us.php">Contact <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
