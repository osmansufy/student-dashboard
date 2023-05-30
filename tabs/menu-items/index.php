<nav id="sa-sidebarMenu" class="
d-lg-block d-none

sa-learners-dashboard-sidebar">

    <div class="nav flex-column nav-pills " style="
        margin-left: auto;
        position: relative;
        width: 90%;
        " id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <!-- logo -->
        <?php
        $url = get_option('sal_dashboard_logo_url');

        if (!empty($url)) {
        ?>

        <a class="nav-link my-3" href="<?php echo get_site_url() . '/' ?>" style="max-width: 200px;">
            <img src="<?php echo vibe_sanitizer($url, 'url'); ?>" alt="<?php echo get_bloginfo('name'); ?>" />
        </a>
        <?php
        }
        ?>
        <a class="sa-sidebar-btn-expand" id="sa-sidebar-btn-expand" type="button">

            <i class="fas fa-chevron-left"></i>


        </a>
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

        <a class="nav-link py-3 d-flex sa-sidebar-item my-2
            <?php echo $active ?>" id="v-pills-<?php echo $id ?>-tab" data-bs-toggle="pill"
            href="#v-pills-<?php echo $id ?>" role="tab" aria-controls="v-pills-<?php echo $id ?>"
            aria-selected="<?php echo $ariaSelected ?>">
            <i class="<?php echo $icon ?> me-2"></i>

            <span>
                <?php echo $title ?>
            </span>


        </a>

        <?php
        }
        ?>
    </div>

</nav>