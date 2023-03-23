<html style="margin-top: 0!important">

<head>
    <?php
    wp_head();
    add_filter('show_admin_bar', '__return_false');
    ?>

</head>

<body>
    <div class="container-fluid ">

        <div class="row">

            <?php
            include plugin_dir_path(__FILE__) . '../tabs/top-nav/index.php';
            include plugin_dir_path(__FILE__) . '../tabs/menu-items/index.php';
            include plugin_dir_path(__FILE__) . '../tabs/tab-contents/index.php';
            ?>

        </div>
    </div>

    <?php wp_footer(); ?>
</body>

</html>