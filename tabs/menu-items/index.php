<?php
$navItems = array(
    "Dashboard" => array(
        "id" => "dashboard",
        'title' => 'Dashboard',
        "icon" => "fas fa-columns",

    ),
    "My Courses" => array(
        "id" => "my-courses",
        'title' => 'My Courses',
        "icon" => "fas fa-chalkboard",

    ),
    "My Certificates" => array(
        "id" => "my-certificates",
        'title' => 'My Certificates',
        "icon" => "fas fa-graduation-cap",

    ),
    "My Rewards" => array(
        "id" => "my-rewards",
        'title' => 'My Rewards',
        "icon" => "fas fa-trophy",

    ),
    "Saved Courses" => array(
        "id" => "saved-courses",
        'title' => 'Saved Courses',
        "icon" => "fas fa-heart",

    ),
    "Unlimited Learning" => array(
        "id" => "unlimited-learning",
        'title' => 'Unlimited Learning',
        "icon" => "fas fa-chalkboard-teacher",

    ),
    "Messages" => array(
        "id" => "messages",
        'title' => 'Messages',
        "icon" => "fas fa-comment-alt",

    ),
    "Refer & Earn Cash" => array(
        "id" => "refer-earn-cash",
        'title' => 'Refer & Earn Cash',
        "icon" => "fas fa-hand-holding-usd",


    ),
    "Special Offers" => array(
        "id" => "special-offers",
        'title' => 'Special Offers',
        "icon" => "fas fa-percent",

    ),
    "My Orders" => array(
        "id" => "my-orders",
        'title' => 'My Orders',
        "icon" => "fas fa-shopping-bag",

    ),
    "My Profile" => array(
        "id" => "my-profile",
        'title' => 'My Profile',
        "icon" => "fas fa-user",

    ),
    "Student Card" => array(
        "id" => "student-card",
        'title' => 'Student Card',
        "icon" => "fas fa-address-card",

    ),
    "Help & Support" => array(
        "id" => "help-support",
        'title' => 'Help & Support',
        "icon" => "fas fa-question-circle",

    ),

)
?>


<div style="background-color: #003a59;" class="col-2">
    <nav id="sidebarMenu" class="w-100   d-md-block pt-0 sidebar collapse">
        <div class="position-fixed ">
            <div class="sa-learners-dashboard-nav">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <!-- logo -->
                    <?php
                    $url = get_option('sal_dashboard_logo_url');

                    if (!empty($url)) {
                    ?>
                        <a class="nav-link" href="<?php echo get_site_url() . '/' ?>" style="max-width: 200px;">

                            <img src="<?php echo vibe_sanitizer($url, 'url'); ?>" alt="<?php echo get_bloginfo('name'); ?>" />
                            <!-- <img class="collapse-img-collapse" src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/Screenshot_1.png" alt="" /> -->
                        </a>
                    <?php
                    }
                    ?>
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
                        echo '<a class="nav-link  ' . $active . '" id="v-pills-' . $id . '-tab" data-bs-toggle="pill" href="#v-pills-' . $id . '" role="tab" aria-controls="v-pills-' . $id . '" aria-selected="' . $ariaSelected . '"><i class="' . $icon . '"></i> ' . $title . '</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>

</div>