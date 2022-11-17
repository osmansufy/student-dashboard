<h1>Options Demo Admin Page</h1>
<form method="post" action="<?php echo admin_url('admin-post.php') ?>">
    <?php
    wp_nonce_field("sal_dashboard_form");
    $sal_title = get_option('sal_title');
    $sal_banner_image = get_option('sal_banner_image_url');
    ?>
    <label for="sal_title"><?php _e('Title', 'sa-learners-dashboard'); ?></label>
    <input type="text" id="sal_title" name="sal_title" value="<?php echo esc_attr($sal_title); ?>">
    <input type="hidden" name="action" value="sal_admin_page">

    <div>
        <!--Banner Image For marketing  -->

        <label for="sal_banner_image"><?php _e('Banner Image', 'sa-learners-dashboard'); ?></label>
        <button class="button button-primary" id="sal_banner_image">Select Banner image</button>
        <input type="hidden" name="sal_banner_image_id" id="sal_banner_image_id" />
        <input type="hidden" name="sal_banner_image_url" id="sal_banner_image_url" />
        <div id="sa_banner_image_show">
            <?php if ($sal_banner_image) : ?>
                <img src="<?php echo $sal_banner_image; ?>" alt="Banner Image">
            <?php endif; ?>

        </div>
    </div>
    <?php
    submit_button('Save');
    ?>
</form>