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
        <?php include_once('template-parts/dashboard-sidebar.php'); ?>
        <?php include_once('template-parts/dashboard-top-nav.php'); ?>

        <div class="main-content">
            <section class="page-title">
                <div class="container-fluid">
                    <h1>My Profile</h1>
                    <ul class="nav nav-tabs" role="tablist" id="myTab">
                        <li class="active"><a href="#Details" role="tab" data-toggle="tab">My
                                Details</a></li>
                        <li><a href="#Profile" role="tab" data-toggle="tab">Profile Image</a></li>
                        <li><a href="#Change" role="tab" data-toggle="tab">Change Password</a></li>
                        <li><a href="#Preferences" role="tab" data-toggle="tab">Preferences & 2FA</a>
                        </li>
                    </ul>
                </div>
            </section>
            <section class="content-main-body text-left">
                <div class="container-fluid" id="PD">
                    <!-- container-fluid-start  -->
                    <div class="profile white-board">
                        <div class="tab-content">
                            <div class="tab-pane active " id="Details">
                                <h1 class="text-dark">My Details</h1>
                                <div class="myDetail">
                                    <div id="sa-data-div">

                                    </div>
                                    <?php
                                    $user_id = get_current_user_id();
                                    $user_info = get_userdata($user_id);
                                    $user_meta = get_user_meta($user_id);
                                    $firstName =       $user_meta['first_name'][0];
                                    $lastName =        $user_meta['last_name'][0];
                                    $description =     $user_meta['description'][0];
                                    $user_email =      $user_info->user_email;
                                    $displayName =     $user_info->display_name;
                                    // $displayName=     $user_meta['display_name'][0];
                                    // $email=           $user_meta['user_email'][0];


                                    ?>
                                    <form action="" class="sa-learners-edit-user d-flex flex-column" method="post">
                                        <div class="sa-field-wrap">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="firstName">First name</label>
                                                    <input type="text" id="sa-firstName" value="<?php echo $firstName ?>" class="form-control" name="firstName" value="">
                                                    <input type="hidden" id="sa-userId" value="<?php echo $user_id ?>" name="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="lastName">Last name</label>
                                                    <input type="text" id="sa-lastName" value="<?php echo $lastName ?>" class="form-control" name="lastName" value="">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="sa-displayName">Display Name</label>
                                                    <input type="text" id="sa-displayName" value="<?php echo $displayName ?>" class="form-control" name="email">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="sa-email">Email</label>
                                                    <input type="email" id="sa-email" readonly value="<?php echo $user_email ?>" class="form-control" name="email">
                                                </div>

                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="sa-description">About Me</label>
                                                    <textarea id="sa-description" class="form-control" name="description" rows="5">
                                                            <?php echo $description ?>
                                                </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sa-d-flex" i>
                                            <button type="submit" id="sa-user-update-btn" class="btn btn-primary">Update</button>
                                            <!-- <span id="sa-loading-state">Loading...</span> -->
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <?php include_once('template-parts/user-update/user-profile-picture.php'); ?>
                            <?php include_once('template-parts/user-update/user-change-password.php'); ?>

                            <div class="tab-pane" id="Preferences">
                                <div class="preferences">
                                    <form name="updatePreferences">
                                        <div class="form-row"> </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="rewardNotification">Receive reward
                                                    notifications...</label>&nbsp;&nbsp;
                                                <label class="nsa-switch">
                                                    <input id="rewardNotification" name="rewardNotification" type="checkbox" checked="">
                                                    <span class="slider round"></span> </label>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="twoFactor">Enable 2FA (Two Factor
                                                    Authentication) (we will email you a code when you
                                                    sign in from a new device)...</label>&nbsp;&nbsp;
                                                <label class="nsa-switch">
                                                    <input id="twoFactor" value="1" name="twoFactor" type="checkbox">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!-- container-fluid-end  -->
            </section>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>

</html>