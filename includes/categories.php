<?php $current_page = "categories"; ?>



<div class="col-12 col-md-3 col-lg-2">
    <div class="footer_main_title py-3"> Category</div>
    <ul class="footer_menu">
    <?php
        $sqli = "SELECT * FROM categories WHERE category_status = :status";
        $stmt = $pdo->prepare($sqli);
        $stmt->execute([
            ':status' => 'published'
        ]);
        while($categories = $stmt->fetch(PDO::FETCH_ASSOC)){
            $category_title = $categories['category_name']; ?>
            <li><a href="#" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; <?php echo $category_title; ?></a></li>

        <?php }
    ?>
    </ul>
</div>