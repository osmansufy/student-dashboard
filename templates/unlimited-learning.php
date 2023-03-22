<?php
wp_head();
add_filter('show_admin_bar', '__return_false');
?>
<div class="container-fluid">
    <div class="row">
        <?php
        include plugin_dir_path(__FILE__) . '../tabs/menu-items/index.php';
        include plugin_dir_path(__FILE__) . '../tabs/tab-contents/index.php';
        ?>

    </div>
</div>

<?php wp_footer(); ?>