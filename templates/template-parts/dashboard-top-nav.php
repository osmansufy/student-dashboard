<?php
// if user not logged in redirect to login page
if (!is_user_logged_in()) {
    wp_redirect(site_url() . '/wp-login.php');
}
$user_id = get_current_user_id();
$user_info = get_userdata($user_id);
$displayName = $user_info->display_name;
$url = get_option('sal_dashboard_logo_url');
?>
<nav class="navbar navbar-inverse navbar-global navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <div class="top-nav-mobile" style="display: none;">
                <a class="navbar-brand top-nav-logo" href="<?php echo get_site_url() . '/' ?>" style="display: none;

            ">

                    <img src="<?php echo vibe_sanitizer($url, 'url'); ?>" alt="<?php echo get_bloginfo('name'); ?>" />
                    <!-- <img class="collapse-img-collapse" src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/Screenshot_1.png" alt="" /> -->
                </a>
                <a style="
                font-size: 20px;
                color: #fff;
                "><span style="margin-right: 10px;"><?php echo $displayName ?></span><i
                        class="fas fa-user-alt"></i></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>


        </div>
        <div id="navbar" class="collapse navbar-collapse" style="max-height:100%">
            <!-- nav item for mobile -->
            <ul class="nav navbar-nav navbar-user navbar-mobile navbar-left" style="display:none">
                <?php
foreach ($navItems as $key => $value) {
    ?>
                <li class="nav-item <?php echo $value['active']; ?>">
                    <a href="<?php echo $value['url']; ?>">
                        <i class="<?php echo $value['icon']; ?>"></i>
                        <span class="nav-label"><?php echo $value['title']; ?></span>
                    </a>
                </li>
                <?php
}
?>
                <li>
                    <a href="<?php echo wp_logout_url() ?>">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-label">Logout</span>
                    </a>
                </li>



            </ul>
            <ul class="nav navbar-nav navbar-user navbar-pc navbar-right">
                <li>
                    <a href="<?php echo site_url() ?>"><span class="glyphicon glyphicon-dashboard"></span> Home</a>
                </li>
                <li>
                    <a href="#"><span class="glyphicon glyphicon-user"></span><?php echo $displayName ?></a>
                </li>
                <li>
                    <a href="<?php echo wp_logout_url() ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
        <div class="alert-container">
            <div class="alert alert-warning">
                <a class="sa-alert-text" style="color: chocolate;">

                </a>
            </div>
        </div>
    </div>
</nav>