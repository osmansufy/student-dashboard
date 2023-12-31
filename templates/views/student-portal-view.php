<?php
$user_id = get_current_user_id();

?>
<main class="w-100  d-flex flex-column">
    <?php

    // top nav
    include plugin_dir_path(__FILE__) . '../common-parts/top-nav.php';


    if (have_posts()) {
        while (have_posts()) {
            the_post();
            // title
            $page_title = get_the_title();
            include plugin_dir_path(__FILE__) . '../../tabs/template-parts/page-title.php';
    ?>
            <div class="container-fluid">
                <?php
                the_content();
                ?>
            </div>
    <?php
        }
    }
    ?>

</main>