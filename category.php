

<?php $current_page = "category.php"; ?>


<?php require_once('includes/head_section.php') ?>


<body>


<!-- NAVBAR -->
<?php
    $curr_page = basename(__FILE__);
    include('includes/navbar.php');
?>


<?php
    if(isset($_GET['cat'])){
        $category_name = $_GET['cat'];
    }
    if(isset($_GET['post_id'])){
        $post_id = $_GET['post_id'];
        $sql = "SELECT * FROM posts WHERE post_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $post_id
        ]);


        $post_title = $post['post_title'];
        $post_date = $post['post_date'];
        $post_detail = $post['post_detail'];
        $post_views = $post['post_views'];

        $sql1 = "UPDATE posts SET post_views = post_views + 1 WHERE post_id = :id";
        $stmt = $pdo->prepare($sql1);
        $stmt->execute([
            ':id' => $post_id
        ]);
    }
        
?>


<div class="container-fluid paddding mb-5">
    <div class="row mx-0">
        <div class="col-md-6 col-12 paddding animate-box" data-animate-effect="fadeIn">
            <div class="fh5co_suceefh5co_height"><img src="images/ahmed-carter-tiWcNvpQF4E-unsplash.jpg" alt="img"/>
                <div class="fh5co_suceefh5co_height_position_absolute"></div>
                <div class="fh5co_suceefh5co_height_position_absolute_font">
                    <div class=""><a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;Dec 31,2017
                    </a></div>
                    <div class=""><a href="single.php" class="fh5co_good_font"> After all is said and done, more is said than done </a></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">

            <?php
                $sql2 = "SELECT * FROM posts ORDER BY post_views DESC limit 0,4";
                $stmt = $pdo->prepare($sql2);
                $stmt->execute();
                while($posts = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $post_id = $posts['post_id'];
                    $post_title = $posts['post_title'];
                    $post_detail = substr($posts['post_detail'], 0, 200);
                    $post_image = $posts['post_image'];
                    $post_views = $posts['post_views'] ?>

                    <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                        <div class="fh5co_suceefh5co_height_2"><img src="images/<?php echo $post_image; ?>" alt="<?php echo $post_image ?>"/>
                            <div class="fh5co_suceefh5co_height_position_absolute"></div>
                            <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                <div class=""><a href="single.php?post_id=<?php echo $post_id; ?>" class="fh5co_good_font_2"><?php echo $post_title; ?></a></div>
                            </div>
                        </div>
                    </div>

                <?php }
            ?>

        </div>
    </div>
</div>


<!-- Ne -->

<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <?php 
                        $sql1 = "SELECT * FROM categories WHERE category_status = :status";
                        $stmt = $pdo->prepare($sql1);
                        $stmt->execute([
                            ':status' => 'Published'
                        ]);
                        while($categories = $stmt->fetch(PDO::FETCH_ASSOC)){
                            $category_title = $categories['category_name']; ?>
                        <?php }
                    ?>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Welcome to <span style="color: coral;"><?php echo $category_name; ?>
                    </span></div>
                </div>
                <?php
                    $sql = "SELECT * FROM posts WHERE post_status = :status ORDER BY post_id DESC LIMIT 0,5";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([
                        ':status' => 'published'
                    ]);
                    while($posts = $stmt->fetch(PDO:: FETCH_ASSOC)){
                        $post_id = $posts['post_id'];
                        $post_title = $posts['post_title'];
                        $post_detail = substr($posts['post_detail'], 0, 200);
                        $post_image = $posts['post_image'];
                        ?>
                            <div class="row pb-4">
                                <div class="col-md-5">
                                    <div class="fh5co_hover_news_img">
                                        <div class="fh5co_news_img"><img src="images/<?php echo $post_image; ?>" alt="<?php echo $post_image ?>"/></div>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="col-md-7 animate-box">
                                    <a href="single.php?post_id=<?php echo $post_id; ?>" class="fh5co_magna py-2"> <?php echo $post_title; ?> </a> 
                
                                    <div class="fh5co_consectetur"> <?php echo $post_detail; ?> </div>
                                </div>
                            </div>
                        
                        <?php }
                ?>
                </div>
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
                        <img src="images/rowan-chestnut-m663zRzRe40-unsplash.jpg" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"> Magna aliqua ut enim ad minim veniam quis nostrud.</div>
                        <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="images/s-o-c-i-a-l-c-u-t-aXJdmnxauwY-unsplash.jpg" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"> Enim ad minim veniam nostrud xercitation ullamco.</div>
                        <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="images/sarah-dorweiler-fr0J5-GIVyg-unsplash.jpg" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"> Magna aliqua ut enim ad minim veniam quis nostrud.</div>
                        <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-5 align-self-center"><img src="images/solesavy-QGcRQiUV-Vc-unsplash.jpg" alt="img"
                                                              class="fh5co_most_trading"/></div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"> Magna aliqua ut enim ad minim veniam quis nostrud.</div>
                        <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-0 animate-box" data-animate-effect="fadeInUp">
            <div class="col-12 text-center pb-4 pt-4">
                <a href="#" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous</a>
                <a href="#" class="btn_pagging">1</a>
                <a href="#" class="btn_pagging">2</a>
                <a href="#" class="btn_pagging">3</a>
                <a href="#" class="btn_pagging">...</a>
                <a href="#" class="btn_mange_pagging">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a>
             </div>
        </div>
    </div>
</div>

<!-- FOOTER -->
<?php require_once('includes/footer.php') ?>


