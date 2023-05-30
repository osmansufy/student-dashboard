<?php
$user_id = get_current_user_id();

?>
<main class="w-100  d-flex flex-column">
    <?php

    // top nav
    include plugin_dir_path(__FILE__) . '../../templates/common-parts/top-nav.php';
    ?>
    <div class="tab-content px-1 " style="background-color: #f8f8f8;" id="v-pills-tabContent">

        <?php
        foreach ($navItems as $key => $value) {
            $active = $key == 'Dashboard' ? 'active' : '';
        ?>
            <div class="tab-pane  <?php echo $active; ?> " ] id="v-pills-<?php echo $value['id'] ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $value['id'] ?>-tab">
                <?php
                $file = $value['id'] . '.php';
                include_once(plugin_dir_path(__FILE__) . $file);
                ?>
            </div>
        <?php
        }
        ?>

    </div>
</main>