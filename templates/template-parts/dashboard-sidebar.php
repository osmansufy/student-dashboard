  <?php
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
        'title' => 'Saved Courses',
        "icon" => "fas fa-heart",
        "url" => get_site_url() . "/learners-saved-courses",
        "active" => $currentPageUrl === get_site_url() . "/learners-saved-courses/" ? $activeClass : "",
    ),
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
  <nav class="navbar-primary">

      <a href="#" class="btn-expand-collapse"><span class="glyphicon glyphicon-menu-left"></span></a>
      <ul class="navbar-primary-menu navbar-nav">
          <?php
$url = get_option('sal_dashboard_logo_url');

if (!empty($url)) {
    ?>
          <a class="navbar-brand" href="<?php echo get_site_url() . '/' ?>" style="max-width: 150px;">

              <img src="<?php echo vibe_sanitizer($url, 'url'); ?>" alt="<?php echo get_bloginfo('name'); ?>" />
              <!-- <img class="collapse-img-collapse" src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/Screenshot_1.png" alt="" /> -->
          </a>
          <?php
}
?>
          <?php
foreach ($navItems as $key => $value) {
    ?>
          <li class="nav-item <?php echo $value['active']; ?>">
              <a href="<?php echo $value['url']; ?>">
                  <i class="<?php echo $value['icon']; ?>"></i>
                  <span class="nav-label"><?php echo $value['title']; ?></span>
              </a>
          </li>
          <?php
}
?>
      </ul>
  </nav>