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

                            <?php include_once('template-parts/user-update/user-info.php'); ?>
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