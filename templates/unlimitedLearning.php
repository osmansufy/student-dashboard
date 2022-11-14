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
        <?php include_once('template-parts/dashboard-top-nav.php'); ?>
        <?php include_once('template-parts/dashboard-sidebar.php'); ?>

        <div class="main-content">
            <section class="page-title">
                <div class="container-fluid">
                    <h1>Dashboard</h1>
                </div>
            </section>
            <?php

            function show_post($path)
            {
                $post = get_page_by_path($path);
                $content = apply_filters('the_content', $post->post_content);
                echo $content;
            }

            show_post('subscription-offer');
            ?>
            ?>
        </div>
        </section>
    </div>
    </div>
    <?php wp_footer(); ?>
</body>

</html>