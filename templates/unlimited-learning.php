<?php
wp_head();
add_filter('show_admin_bar', '__return_false');
?>
<div class="d-flex align-items-start ">
    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</button>
        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</button>
        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</button>
        <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>
    </div>
    <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane  active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <?php

            // show recomended courses from tab-content directory
            include plugin_dir_path(__FILE__) . '../tab-content/recomended-corses.php';
            ?>
        </div>
        <div class="tab-pane " id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            <?php include plugin_dir_path(__FILE__) . './views/learners-profile.view.php'; ?>
        </div>
        <div class="tab-pane " id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...
        </div>
        <div class="tab-pane " id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...
        </div>
    </div>
</div>

<?php wp_footer(); ?>