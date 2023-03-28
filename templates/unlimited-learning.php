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

            <div class="d-flex px-0">

                <?php

                include plugin_dir_path(__FILE__) . '../tabs/menu-items/index.php';

                include plugin_dir_path(__FILE__) . '../tabs/tab-contents/index.php';
                ?>

            </div>
        </div>
    </div>

    <?php wp_footer(); ?>
</body>

</html>