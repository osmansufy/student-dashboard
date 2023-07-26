<?php

$topNavItems = array(
    'Home' => array(
        'id' => 'home',
        'title' => 'Home',
        'icon' => 'fas fa-home',
        'url' => site_url()
    ),
    'Name' => array(
        'id' => 'name',
        'title' => $displayName,
        'icon' => 'fas fa-user-alt',
        'url' => '#'
    ),
    'Logout' => array(
        'id' => 'logout',
        'title' => 'Logout',
        'icon' => 'fas fa-sign-out-alt',
        'url' => wp_logout_url()
    )
)
?>
<nav style="background-color:#003a59;
z-index: 400    ;

max-height: 100%;" class="navbar navbar-expand-md
w-100 position-sticky top-0 navbar-dark border-0
py-6
    rounded-0 my-0">
    <div class="container-fluid">
        <div class="d-flex w-100 justify-content-between">
            <!-- logo -->

            <ul class="d-none w-100 d-md-flex justify-content-end align-items-center m-0">

                <?php

                foreach ($topNavItems as $key => $value) {
                ?>
                    <li class="text-white nav-item me-4">
                        <a class="text-white " style="text-decoration: none;" href="<?php echo $value['url'] ?>">
                            <i class="<?php echo $value['icon'] ?> me-1"></i>
                            <?php echo $value['title'] ?>

                        </a>
                    </li>
                <?php
                }
                ?>
            </ul>
            <?php
            $url = get_option('sal_dashboard_logo_url');

            if (!empty($url)) {
            ?>

                <a class="nav-link  d-md-none" href="<?php echo get_site_url() . '/' ?>" style="max-width: 100px;">
                    <img src="<?php echo vibe_sanitizer($url, 'url'); ?>" alt="<?php echo get_bloginfo('name'); ?>" />
                </a>
            <?php
            }
            ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav flex-column nav-pills sa-top-nav d-md-none " id="top-nav-bar" role="tablist" aria-orientation="vertical">
                <?php
                $i = 0;
                foreach ($navItems as $key => $value) {
                    $i++;
                    $active = ($i == 1) ? 'active' : '';
                    $ariaSelected = ($i == 1) ? 'true' : 'false';
                    $ariaControls = $value['id'];
                    $id = $value['id'];
                    $title = $value['title'];
                    $icon = $value['icon'];
                ?>
                    <li class="nav-item my-1" data-bs-toggle="collapse" data-bs-target=".navbar-collapse.show" aria-selected="<?php echo $ariaSelected ?>">
                        <a class="nav-link text-white    d-flex  <?php echo $active ?> " id=" v-pills-<?php echo $id ?>-tab" data-bs-toggle="pill" href="#v-pills-<?php echo $id ?>" role="tab" aria-controls="v-pills-<?php echo $id ?>" aria-selected="<?php echo $ariaSelected ?>">
                            <i class="<?php echo $icon ?> me-2"></i>
                            <?php echo $title ?></a>
                    </li>
                <?php
                }
                ?>
                <li class="nav-item my-1">
                    <a class="nav-link text-white    d-flex" href="<?php echo wp_logout_url() ?>">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-label">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>