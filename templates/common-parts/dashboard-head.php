<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    wp_head();
    add_filter('show_admin_bar', '__return_false');
    $activeClass = 'active';

    $currentPageUrl = get_permalink();
    $navItems = array(
        "Dashboard" => array(
            'title' => 'Dashboard',
            "icon" => "fas fa-columns",
            "url" => get_site_url() . "/learners-dashboard",
            "active" => $currentPageUrl === get_site_url() . "/learners-dashboard/" ? $activeClass : "",
        ),
        "My Courses" => array(
            'title' => 'My Courses',
            "icon" => "fas fa-chalkboard",
            "url" => get_site_url() . "/my-courses-dashboard",
            "active" => $currentPageUrl === get_site_url() . "/my-courses-dashboard/" ? $activeClass : "",
        ),
        "My Certificates" => array(
            'title' => 'My Certificates',
            "icon" => "fas fa-graduation-cap",
            "url" => get_site_url() . "/learners-certificates",
            "active" => $currentPageUrl === get_site_url() . "/learners-certificates/" ? $activeClass : "",
        ),
        "My Rewards" => array(
            'title' => 'My Rewards',
            "icon" => "fas fa-trophy",
            "url" => get_site_url() . "/learners-rewards",
            "active" => $currentPageUrl === get_site_url() . "/learners-rewards/" ? $activeClass : "",
        ),
        "Unlimited Learning" => array(
            'title' => 'Unlimited Learning',
            "icon" => "fas fa-chalkboard-teacher",
            "url" => get_site_url() . "/unlimited-learning",
            "active" => $currentPageUrl === get_site_url() . "/unlimited-learning/" ? $activeClass : "",
        ),
        "Saved Courses" => array(
            'title' => 'QLS Endorsed Certificate',
            "icon" => "fas fa-user-graduate",
            "url" => get_site_url() . "/qls-endorsed-certificate",
            "active" => $currentPageUrl === get_site_url() . "/qls-endorsed-certificate/" ? $activeClass : "",
        ),
        // "Saved Courses" => array(
        //     'title' => 'Saved Courses',
        //     "icon" => "fas fa-heart",
        //     "url" => get_site_url() . "/learners-saved-courses",
        //     "active" => $currentPageUrl === get_site_url() . "/learners-saved-courses/" ? $activeClass : "",
        // ),
        "Messages" => array(
            'title' => 'Messages',
            "icon" => "fas fa-comment-alt",
            "url" => get_site_url() . "/learners-messages",
            "active" => $currentPageUrl === get_site_url() . "/learners-messages/" ? $activeClass : "",
        ),
        "Refer & Earn Cash" => array(
            'title' => 'Refer & Earn Cash',
            "icon" => "fas fa-hand-holding-usd",
            "url" => get_site_url() . "/learners-recommend-friends",
            // check page url for this and active class
            "active" => $currentPageUrl === get_site_url() . "/learners-recommend-friends/" ? $activeClass : "",

        ),
        "Special Offers" => array(
            'title' => 'Special Offers',
            "icon" => "fas fa-percent",
            "url" => get_site_url() . "/special-offers",
            "active" => $currentPageUrl === get_site_url() . "/special-offers/" ? $activeClass : "",
        ),
        "My Orders" => array(
            'title' => 'My Orders',
            "icon" => "fas fa-shopping-bag",
            "url" => get_site_url() . "/learners-orders",
            "active" => $currentPageUrl === get_site_url() . "/learners-orders/" ? $activeClass : "",
        ),
        "My Profile" => array(
            'title' => 'My Profile',
            "icon" => "fas fa-user",
            "url" => get_site_url() . "/learners-profile",
            "active" => $currentPageUrl === get_site_url() . "/learners-profile/" ? $activeClass : "",
        ),
        "Student Card" => array(
            'title' => 'Student Card',
            "icon" => "fas fa-address-card",
            "url" => get_site_url() . "/student-portal",
            "active" => $currentPageUrl === get_site_url() . "/student-portal/" ? $activeClass : "",
        ),
        "Help & Support" => array(
            'title' => 'Help & Support',
            "icon" => "fas fa-question-circle",
            "url" => get_site_url() . "/learners-support",
            "active" => $currentPageUrl === get_site_url() . "/learners-support/" ? $activeClass : "",
        ),

    )

    ?>
</head>

<body>
    <div class="sidebar-menu-farhan">
        <?php include_once plugin_dir_path(__FILE__) . '../template-parts/dashboard-top-nav.php'; ?>
        <?php include_once plugin_dir_path(__FILE__) . '../template-parts/dashboard-sidebar.php'; ?>

        <div class="main-content">
            <section class="page-title">
                <div class="container-fluid">
                    <h1>

                        <?php
                        echo $head
                        ?>
                    </h1>
                </div>
            </section>