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
<div class="tab-content col-md-9" id="v-pills-tabContent">

    <?php
    foreach ($navItems as $key => $value) {
        $active = $key == 'Dashboard' ? 'active' : '';
    ?>
        <div class="tab-pane  <?php echo $active; ?> " id="v-pills-<?php echo $value['id'] ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $value['id'] ?>-tab">
            <?php
            $file = $value['id'] . '.php';
            include_once $file;
            ?>
        </div>
    <?php
    }
    ?>

</div>