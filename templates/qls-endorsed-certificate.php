<?php
if (!defined('ABSPATH')) exit;


if (have_posts()) {
    // title
    $head = get_the_title();
    include_once('common-parts/dashboard-head.php');
    while (have_posts()) {
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
