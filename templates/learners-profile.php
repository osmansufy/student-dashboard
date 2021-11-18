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
                    <h1>Dashboard</h1>
                </div>
            </section>
            <section class="content-main-body">
                <div class="container-fluid">
                    <!-- container-fluid-start  -->
                    <div class="subscribeUpsell">
                        <a href="#"><i class="fad fa-medal"></i>
                            Get access to all 700+ courses (and MORE) for only £12 per
                            month. Find out more.

                        </a>
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
                                                <h1>My Details</h1>
                                                <div class="myDetail">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="firstName">First name</label>
                                                            <input type="text" id="firstName" class="form-control"
                                                                name="firstname" value="">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="lastName">Last name</label>
                                                            <input type="text" id="lastName" class="form-control"
                                                                name="lastname" value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="email">Email Address</label>
                                                            <input type="email" id="email" class="form-control"
                                                                name="email" value="kaderahmed.cse@gmail.com">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="leaderboard">How would you like your name to
                                                                appear on the leaderboard</label>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                        value="1" checked=""
                                                                        name="leaderboardName">First name and First
                                                                    letter of Last Name </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                        value="2" name="leaderboardName">Full Name
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                        value="3" name="leaderboardName">First Letter of
                                                                    First Name and Full Last Name </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                        value="4" name="leaderboardName">Don't show my
                                                                    name </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                            <div class="tab-pane " id="Profile">
                                                <div class="Profile">
                                                    <div class="exisiting-img">
                                                        <img src="https://newskillsacademy.co.uk/assets/cdn/profileImg/default.png"
                                                            alt="profile" style="max-width:150px;" id="currentImg">
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="uploaded_file">
                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="Change">
                                                <div class="change">
                                                    <form name="editPassword">
                                                        <div class="form-row">
                                                            <label>Update Password</label>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group ">
                                                                <label for="passwordCurrent">Current Password</label>
                                                                <input type="password" id="passwordCurrent"
                                                                    class="form-control" name="passwordCurrent">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group ">
                                                                <label for="password">New Password</label>
                                                                <input type="password" id="password"
                                                                    class="form-control" name="password">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group ">
                                                                <label for="confirmPassword">Confirm New
                                                                    Password</label>
                                                                <input type="password" id="confirmPassword"
                                                                    class="form-control" name="passwordConfirm">
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="Preferences">
                                                <div class="preferences">
                                                    <form name="updatePreferences">
                                                        <div class="form-row"> </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label for="rewardNotification">Receive reward
                                                                    notifications...</label>&nbsp;&nbsp;
                                                                <label class="nsa-switch">
                                                                    <input id="rewardNotification"
                                                                        name="rewardNotification" type="checkbox"
                                                                        checked="">
                                                                    <span class="slider round"></span> </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label for="twoFactor">Enable 2FA (Two Factor
                                                                    Authentication) (we will email you a code when you
                                                                    sign in from a new device)...</label>&nbsp;&nbsp;
                                                                <label class="nsa-switch">
                                                                    <input id="twoFactor" value="1" name="twoFactor"
                                                                        type="checkbox">
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

                    </div><!-- container-fluid-end  -->
            </section>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>

</html>