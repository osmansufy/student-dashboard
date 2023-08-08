<?php
$page_title = 'Profile Details';
include plugin_dir_path(__FILE__) . '../../tab-parts/page-title.php';
?>

<div class="container-fluid">
    <nav class="d-flex justify-content-center align-items-center w-100 mt-4 bg-light">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                My Details</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile Image</button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Change Password</button>
        </div>
    </nav>
</div>
<div class="container-fluid" id="PD">
    <!-- container-fluid-start  -->
    <div class="profile white-board">
        <div class="tab-content" id="nav-tabContent">
            <?php
            include_once(plugin_dir_path(__FILE__) .
                '../../tab-parts/user-update/user-info.php');
            ?>
            <?php include_once(plugin_dir_path(__FILE__) .
                '../../tab-parts/user-update/user-profile-picture.php'); ?>
            <?php include_once(plugin_dir_path(__FILE__) . '../../tab-parts/user-update/user-change-password.php'); ?>


        </div>
    </div>
</div>