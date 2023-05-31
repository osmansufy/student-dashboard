<html style="margin-top: 0!important">

<head>
    <?php
    wp_head();
    add_filter('show_admin_bar', '__return_false');
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

        "Unlimited Learning" => array(
            "id" => "unlimited-learning",
            'title' => 'Unlimited Learning',
            "icon" => "fas fa-chalkboard-teacher",

        ),
        "QLS Endorsed Certificate" => array(
            "id" => "qls-endorsed-certificate",
            'title' => 'QLS Endorsed Certificate',
            "icon" => "fas fa-certificate",

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

    );
    $displayName = get_user_meta(get_current_user_id(), 'first_name', true);
    ?>

</head>

<body>
    <div class="container-fluid ">
        <div class="row">

            <div class="d-flex px-0">