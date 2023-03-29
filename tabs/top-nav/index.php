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
max-height: 100%;" class="navbar navbar-expand-lg
w-100 position-sticky top-0 navbar-dark border-0

    rounded-0 my-0">
    <div class="container-fluid">
        <div class="d-flex w-100 justify-content-end">
            <ul class="d-none d-lg-flex ">

                <?php

                foreach ($topNavItems as $key => $value) {
                ?>
                <li class="text-white nav-item me-2">
                    <a class="text-white " style="text-decoration: none;" href="<?php echo $value['url'] ?>">
                        <i class="<?php echo $value['icon'] ?> me-1"></i>
                        <?php echo $value['title'] ?>

                    </a>
                </li>
                <?php
                }
                ?>
            </ul>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="nav flex-column nav-pills sa-top-nav d-lg-none " id="v-pills-tab" role="tablist"
                aria-orientation="vertical">
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
                <li class="nav-item my-1 <?php echo $active ?>" data-bs-toggle="collapse"
                    data-bs-target=".navbar-collapse.show">
                    <a class="nav-link text-white    d-flex  <?php echo $active ?> " id=" v-pills-<?php echo $id ?>-tab"
                        data-bs-toggle="pill" href="#v-pills-<?php echo $id ?>" role="tab"
                        aria-controls="v-pills-<?php echo $id ?>" aria-selected="false">
                        <i class="<?php echo $icon ?> me-2"></i>
                        <?php echo $title ?></a>
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
            </div>
        </div>
    </div>
</nav>