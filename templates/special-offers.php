<?php




if (have_posts()) {
    include_once('common-parts/dashboard-head.php');
    while (have_posts()) {
        // title 
        $head = get_the_title();

        the_post();
?>
        <section class="content-main-body">
            <div class="container-fluid">
                <?php
                the_content();
                ?>
            </div>
        </section>
<?php
    }
    wp_reset_postdata();
}
include_once('common-parts/dashboard-footer.php');

