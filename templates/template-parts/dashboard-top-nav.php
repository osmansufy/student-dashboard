<?php
// if user not logged in redirect to login page
if (!is_user_logged_in()) {
    wp_redirect(site_url() . '/wp-login.php');
}
$user_id = get_current_user_id();
$user_info = get_userdata($user_id);
$displayName =     $user_info->display_name;
?>
<nav class="navbar navbar-inverse navbar-global navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-user navbar-right">
                <li>
                    <a href="#"><span class="glyphicon glyphicon-user"></span><?php echo $displayName ?></a>
                </li>
                <li>
                    <a href="<?php echo wp_logout_url() ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
<div class="alert-container">
    <div class="alert alert-warning">
        <a class="sa-alert-text" style="color: chocolate;">

        </a>
    </div>
</div>