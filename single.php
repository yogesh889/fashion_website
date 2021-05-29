<?php $current_page = "Single"; ?>
<link href="css/style_1.css" rel="stylesheet" type="text/css"/>
<?php require_once('includes/head_section.php') ?>



<body class="single">


<!-- NAVBAR -->
<?php
    $curr_page = basename(__FILE__);
    include('includes/navbar.php');
?>

<?php
    if(isset($_GET['post_id'])){
        $post_id = $_GET['post_id'];
        $sql = "SELECT * FROM posts WHERE post_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $post_id
        ]);
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        if($count == 0){
            header("Location: index.php");
        }

        $post_title = $post['post_title'];
        $post_date = $post['post_date'];
        $post_detail = $post['post_detail'];
        $post_views = $post['post_views'];
        $post_image = $post['post_image'];


        $sql1 = "UPDATE posts SET post_views = post_views + 1 WHERE post_id = :id";
        $stmt = $pdo->prepare($sql1);
        $stmt->execute([
            ':id' => $post_id
        ]);
    } else{
        ?><script>
        window.location.href = "index.php";
        </script>
        <?php
    }
        
?>

<div id="fh5co-title-box" style="background-image: url(images/<?php echo $post_image; ?>); background-position: 100% ;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="page-title">
        <img src="images/<?php echo $post_image; ?>" alt="Free HTML5 by FreeHTMl5.co">
        <span><?php echo $post_date; ?></span>
        <h2><?php echo $post_title; ?></h2>
    </div>
</div>
<div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <?php echo $post_detail; ?>
                <h1><?php echo $post_views; ?></h1> 
            </div>
            <!--start comment section-->
            <div class="pt-3 col-lg-8 col-xl-8">
                <div class="d-flex align-items-center justify-content-between flex-column flex-md-row">
                    <h2 class="mb-0">Comments</h2>
                </div>
                <hr class="mb-4" />
                <?php
                    $sql = "SELECT * FROM comments WHERE com_post_id = :id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([
                        ':id' => $_GET['post_id']
                    ]);
                    $count = $stmt->rowCount();
                    if($count == 0){
                        echo "no comments"; 
                    } else {
                        $sql1 = "SELECT * FROM comments WHERE com_post_id = :id";
                        $stmt1 = $pdo->prepare($sql1);
                        $stmt1->execute([
                            ':id' => $_GET['post_id']
                        ]);
                        while($comments = $stmt1->fetch(PDO:: FETCH_ASSOC)){
                            $user_name = $comments['com_user_name'];
                            $com_date = $comments['com_date'];
                            $com_detail = $comments['com_detail'];
                            $com_status = $comments['com_status'];
                            $com_user_id = $comments['com_user_id']; 

                            // com status unpproved and com_user_id == singedInUserID
                            if(isset($_SESSION['user_id'])) {
                                $signed_in_user_id = $_SESSION['user_id'];
                            } else if(isset($_COOKIE['_uid_'])) {
                                $signed_in_user_id = base64_decode($_COOKIE['_uid_']);
                            } else  {
                                $signed_in_user_id = -1;
                            }

                            if($com_status == 'unapproved' && $com_user_id == $signed_in_user_id ) { ?>
                                
                                <div class="card mb-5">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="mr-2 text-dark">
                                            <?php echo $user_name; ?>
                                            <div class="text-xs text-muted"><?php echo $com_date; ?></div>
                                        </div>
                                        <div class="h5"><span class="badge badge-warning-soft text-warning font-weight-normal">Awaiting Response</span></div>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $com_detail; ?>                                 
                                    </div>
                                </div>
                            <?php } else if($com_status == 'approved') { ?>
                                <div class="card mb-5">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="mr-2 text-dark">
                                            <?php echo $user_name; ?>
                                            <div class="text-xs text-muted"><?php echo $com_date; ?></div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $com_detail; ?>                                 
                                    </div>
                                </div>
                            <?php }
                            ?>
                            
                        <?php }
                    }
                ?>
                
                <?php 
                    if(isset($_COOKIE['_uid_']) || isset($_COOKIE['_uiid_']) || isset($_SESSION['login'])) { ?>
                        <div class="card">
                            <div class="card-header">Add Comment</div>
                            <div class="card-body">
                                <?php 
                                    if(isset($_POST['submit'])) {
                                        $comments = trim($_POST['comments']);
                                        $sql = "INSERT INTO comments (com_post_id, com_detail, com_user_id, com_user_name, com_date, com_status) VALUES (:post_id, :com_detail, :user_id, :user_name, :com_date, :com_status)";
                                        $stmt = $pdo->prepare($sql);

                                        if(isset($_SESSION['user_id'])){
                                            $signed_in_user_id = $_SESSION['user_id'];
                                        } else if(isset($_COOKIE['_uid_'])) {
                                            $signed_in_user_id = base64_decode($_COOKIE['_uid_']);
                                        } else {
                                            $signed_in_user_id = -1;
                                        }

                                        $sql2 = "SELECT * FROM users WHERE user_id = :id";
                                        $stmt2 = $pdo->prepare($sql2);
                                        $stmt2->execute([
                                            ':id' => $_SESSION['user_id']
                                        ]);
                                        $result = $stmt2->fetch(PDO::FETCH_ASSOC);
                                        $user_name = $result['user_name'];



                                        $stmt->execute([
                                            ':post_id' => $_GET['post_id'],
                                            ':com_detail' => $comments,
                                            ':user_id' => $_SESSION['user_id'],
                                            ':user_name' => $user_name,
                                            ':com_date' => date("M n, Y") . ' at ' . date("h:i A"),
                                            ':com_status' => 'unapproved'
                                        ]);
                                        header("Location: single.php?post_id={$_GET['post_id']}");
                                    }
                                ?>
                                <form action="single.php?post_id=<?php echo $_GET['post_id']; ?>" method="POST">
                                    <textarea name="comments" placeholder="Type here..." class="form-control mb-2" rows="4"></textarea>
                                    <button type="submit" name="submit" class="btn btn-primary btn-sm mr-2">Post Comment</button>
                                </form>
                            </div>
                        </div>
                    <?php } else {
                        echo "<a href='/fashion_website/backend/signin.php'>Sign in to comment</a>";
                    }
                ?>
                
            </div>
            <!--end comment section end-->

            <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
                </div>
                <div class="clearfix"></div>
                <div class="fh5co_tags_all">
                    <?php
                        $sqli = "SELECT * FROM categories WHERE category_status = :status";
                        $stmt = $pdo->prepare($sqli);
                        $stmt->execute([
                            ':status' => 'published'
                        ]);
                        while($categories = $stmt->fetch(PDO::FETCH_ASSOC)){
                            $category_title = $categories['category_name']; ?>
                            <a href="category.php?cat=<?php echo $category_title ?>" class="fh5co_tagg"><?php echo $category_title; ?></a>
    
                        <?php }
                    ?>
                    
                </div>
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                </div>
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="images/download (1).jpg" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"> Magna aliqua ut enim ad minim veniam quis nostrud.</div>
                        <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="images/allef-vinicius-108153.jpg" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"> Enim ad minim veniam nostrud xercitation ullamco.</div>
                        <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="images/download (2).jpg" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"> Magna aliqua ut enim ad minim veniam quis nostrud.</div>
                        <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-5 align-self-center"><img src="images/seth-doyle-133175.jpg" alt="img"
                                                              class="fh5co_most_trading"/></div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"> Magna aliqua ut enim ad minim veniam quis nostrud.</div>
                        <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pb-4 pt-5">
    <div class="container animate-box">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
        </div>
        <div class="owl-carousel owl-theme" id="slider2">
            <div class="item px-2">
                <div class="fh5co_hover_news_img">
                    <div class="fh5co_news_img"><img src="images/39-324x235.jpg" alt=""/></div>
                    <div>
                        <a href="#" class="d-block fh5co_small_post_heading"><span class="">The top 10 best computer speakers in the market</span></a>
                        <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                    </div>
                </div>
            </div>
            <div class="item px-2">
                <div class="fh5co_hover_news_img">
                    <div class="fh5co_news_img"><img src="images/joe-gardner-75333.jpg" alt=""/></div>
                    <div>
                        <a href="#" class="d-block fh5co_small_post_heading"><span class="">The top 10 best computer speakers in the market</span></a>
                        <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                    </div>
                </div>
            </div>
            <div class="item px-2">
                <div class="fh5co_hover_news_img">
                    <div class="fh5co_news_img"><img src="images/ryan-moreno-98837.jpg" alt=""/></div>
                    <div>
                        <a href="#" class="d-block fh5co_small_post_heading"><span class="">The top 10 best computer speakers in the market</span></a>
                        <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                    </div>
                </div>
            </div>
            <div class="item px-2">
                <div class="fh5co_hover_news_img">
                    <div class="fh5co_news_img"><img src="images/seth-doyle-133175.jpg" alt=""/></div>
                    <div>
                        <a href="#" class="d-block fh5co_small_post_heading"><span class="">The top 10 best computer speakers in the market</span></a>
                        <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- FOOTER -->
<?php include('includes/footer.php') ?>

