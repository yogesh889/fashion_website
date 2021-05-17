<div class="container-fluid fh5co_footer_bg pb-3">
    <div class="container animate-box">
        <div class="row">
            <div class="col-12 spdp_right py-5"><img src="images/stil-D4jRahaUaIc-unsplash.jpg" alt="img" class="footer_logo"/></div>
            <div class="clearfix"></div>
            <div class="col-12 col-md-4 col-lg-3">
                <div class="footer_main_title py-3"> About</div>
                <div class="footer_sub_about pb-3"> Lorem Ipsum is simply dummy text of the printing and typesetting
                    industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                    unknown printer took a galley of type and scrambled it to make a type specimen book.
                </div>
                <div class="footer_mediya_icon">
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-linkedin"></i></div>
                    </a></div>
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-google-plus"></i></div>
                    </a></div>
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-twitter"></i></div>
                    </a></div>
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-facebook"></i></div>
                    </a></div>
                </div>
            </div>
        
        <!-- category -->

            <div class="col-12 col-md-3 col-lg-2">
                <div class="footer_main_title py-3">Category</div>
                <ul class="footer_menu">
                <?php
                    $sql1 = "SELECT * FROM categories WHERE category_status = :status";
                    $stmt = $pdo->prepare($sql1);
                    $stmt->execute([
                        ':status' => 'published'
                    ]);
                    while($categories = $stmt->fetch(PDO::FETCH_ASSOC)){
                        $category_title = $categories['category_name']; ?>
                        <li><a href="category.php" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; <?php echo $category_title; ?></a></li>

                    <?php }
                ?>
                </ul>
            </div>
        <!-- -------- -->





            
            <div class="col-12 col-md-5 col-lg-3 position_footer_relative">
                <div class="footer_main_title py-3"> Most Viewed Posts</div>
                <?php
                    $sql2 = "SELECT * FROM posts ORDER BY post_views DESC limit 0,3";
                    $stmt = $pdo->prepare($sql2);
                    $stmt->execute();
                    while($posts = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $post_id = $posts['post_id'];
                        $post_title = $posts['post_title'];
                        $post_views = $posts['post_views'];
                        $post_date = $posts['post_date']; ?>

                        
                        <a href="#" class="footer_post pb-4"> <?php echo $post_title; ?> </a>
                        <hr>

                    <?php }
                ?>
                <div class="footer_position_absolute"><img src="images/footer_sub_tipik.png" alt="img" class="width_footer_sub_img"/></div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 ">
                <div class="footer_main_title py-3"> Last Modified Posts</div>
                <a href="#" class="footer_img_post_6"><img src="images/tamara-bellis-IwVRO3TLjLc-unsplash.jpg" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="images/ahmed-carter-tiWcNvpQF4E-unsplash.jpg" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="images/alexandra-gorn-WF0LSThlRmw-unsplash.jpg" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="images/alexandru-zdrobau-juESZxMhtXk-unsplash.jpg" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="images/andrew-morris-_uNtFKWpFAc-unsplash (1).jpg" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="images/andrew-morris-_uNtFKWpFAc-unsplash.jpg" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="images/country.png" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="images/dami-adebayo-k6aQzmIbR1s-unsplash.jpg" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="images/eli-defaria-oV4PktGcXCs-unsplash.jpg" alt="img"/></a>
            </div>
        </div>
        <div class="row justify-content-center pt-2 pb-4">
            <div class="col-12 col-md-8 col-lg-7 ">
                <div class="input-group">
                    <span class="input-group-addon fh5co_footer_text_box" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                    <input type="text" class="form-control fh5co_footer_text_box" placeholder="Enter your email..." aria-describedby="basic-addon1">
                    <a href="#" class="input-group-addon fh5co_footer_subcribe" id="basic-addon12"> <i class="fa fa-paper-plane-o"></i>&nbsp;&nbsp;Subscribe</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid fh5co_footer_right_reserved">
    <div class="container">
        <div class="row  ">
            <div class="col-12 col-md-2 py-4 Reserved"><a href="/lalit_fashion_website/privacy_policy.php" title="Privacy Policy">Privacy Policy</a> </div>
            <div class="col-12 col-md-2 py-4 Reserved"><a href="/lalit_fashion_website/terms_and_condition.php" title="terms_and_condition">Terms and condition</a> </div>
            <div class="col-12 col-md-8 spdp_right py-4">
                <a href="/lalit_fashion_website/index.php" class="footer_last_part_menu">Home</a>
                <a href="/lalit_fashion_website/about_us.php" class="footer_last_part_menu">About</a>
                <a href="/lalit_fashion_website/Contact_us.php" class="footer_last_part_menu">Contact</a>
                <a href="/lalit_fashion_website/blog.php" class="footer_last_part_menu">Latest News</a></div>
        </div>
    </div>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/owl.carousel.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Main -->
<script src="js/main.js"></script>

</body>
</html>