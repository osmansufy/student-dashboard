<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    wp_head();
    add_filter('show_admin_bar', '__return_false');



    ?>
</head>

<body>
    <div class="sidebar-menu-farhan">
        <?php include_once(plugin_dir_path(__FILE__) . '../template-parts/dashboard-top-nav.php'); ?>
        <?php include_once(plugin_dir_path(__FILE__) . '../template-parts/dashboard-sidebar.php'); ?>

        <div class="main-content">
            <section class="page-title">
                <div class="container-fluid">
                    <h1>

                        <?php
                        echo $head
                        ?>
                    </h1>
                </div>
            </section>