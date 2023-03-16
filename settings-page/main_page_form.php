<h3 style="
margin: 2rem;
    ">Student Dashboard</h3>
<form method="post" action="<?php echo admin_url('admin-post.php') ?>" style="
margin: 2rem;
    padding: 2rem;
    border: 1px solid #ccc;
    border-radius: 8px;">
    <?php
    wp_nonce_field("sal_dashboard_form");
    $sal_banner_image = get_option('sal_banner_image_url');
    $sal_certificate_banner_image = get_option('sal_certificate_banner_image_url');
    $sal_dashboard_logo = get_option('sal_dashboard_logo_url');
    ?>

    <input type="hidden" name="action" value="sal_admin_page">

    <div>
        <!--Banner Image For marketing  -->

        <label for="sal_dashboard_logo"><?php _e('Dashboard Logo', 'sa-learners-dashboard'); ?></label>
        <br />

        <button class="button button-primary" id="sal_dashboard_logo"
            style="margin: 10px 0;"><?php _e('Dashboard logo', 'sa-learners-dashboard') ?></button>
        <input type="hidden" name="sal_dashboard_logo_id" id="sal_dashboard_logo_id" />
        <input type="hidden" name="sal_dashboard_logo_url" id="sal_dashboard_logo_url" />
        <div id="sal_dashboard_logo_show" style="margin:2rem 0;
    border: 1px solid #ccc;
    max-width: 300px;
    padding: 1rem;
    background-color: #003A59;
    ">
            <?php if ($sal_dashboard_logo) : ?>
            <img src="<?php echo $sal_dashboard_logo; ?>" alt="Banner Image">
            <?php endif; ?>

        </div>
    </div>
    <div>
        <!--Banner Image For marketing  -->

        <label for="sal_banner_image"><?php _e('Banner Image', 'sa-learners-dashboard'); ?></label>
        <br />

        <button class="button button-primary" id="sal_banner_image" style="margin: 10px 0;">Select Banner image</button>
        <input type="hidden" name="sal_banner_image_id" id="sal_banner_image_id" />
        <input type="hidden" name="sal_banner_image_url" id="sal_banner_image_url" />
        <div id="sa_banner_image_show" style="margin: 2rem 0;
    border: 1px solid #ccc;
    max-width: 300px;
    padding: 1rem;">
            <?php if ($sal_banner_image) : ?>
            <img src="<?php echo $sal_banner_image; ?>" alt="Banner Image">
            <?php endif; ?>

        </div>
    </div>
    <div style="
    border: 1px solid #ccc;
    padding: 1rem;">
        <!--Banner Image For Certificate  -->

        <label
            for="sal_certificate_banner_image"><?php _e('Certificate Banner Image', 'sa-learners-dashboard'); ?></label>
        <br />
        <button class="button button-primary" id="sal_certificate_banner_image" style="margin: 10px 0;">Select Banner
            image</button>
        <input type="hidden" name="sal_certificate_banner_image_id" id="sal_certificate_banner_image_id" />
        <input type="hidden" name="sal_certificate_banner_image_url" id="sal_certificate_banner_image_url" />
        <div id="sal_certificate_banner_image_show">
            <?php if ($sal_certificate_banner_image) : ?>
            <img style="margin:2rem 0; max-width: 850px; height:auto" src="<?php echo $sal_certificate_banner_image; ?>"
                alt="Certificate Banner Image">
            <?php endif; ?>

        </div>
    </div>
    <?php
    submit_button('Save');
    ?>
</form>