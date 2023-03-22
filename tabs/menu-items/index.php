<?php $navItems = array(
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
    "Unlimited Learning" => array(
        "id" => "unlimited-learning",
        'title' => 'Unlimited Learning',
        "icon" => "fas fa-chalkboard-teacher",

    ),
    "Saved Courses" => array(
        "id" => "saved-courses",
        'title' => 'Saved Courses',
        "icon" => "fas fa-heart",

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



<nav id="sidebarMenu" style="background-color: #003a59;" class="col-md-3 col-lg-2 d-md-block  sidebar collapse">
    <div class="position-sticky pt-3 vh-100 ">
        <div class="sa-learners-dashboard-nav">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
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
                    echo '<a class="nav-link ' . $active . '" id="v-pills-' . $id . '-tab" data-bs-toggle="pill" href="#v-pills-' . $id . '" role="tab" aria-controls="v-pills-' . $id . '" aria-selected="' . $ariaSelected . '"><i class="' . $icon . '"></i> ' . $title . '</a>';
                }
                ?>
            </div>
        </div>
    </div>
</nav>