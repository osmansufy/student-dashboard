  <?php

    ?>
  <nav class="navbar-primary">

      <a href="#" class="btn-expand-collapse"><span class="glyphicon glyphicon-menu-left"></span></a>
      <ul class="navbar-primary-menu navbar-nav">
          <?php
            $url = get_option('sal_dashboard_logo_url');

            if (!empty($url)) {
            ?>
          <a class="navbar-brand" href="<?php echo get_site_url() . '/' ?>" style="max-width: 200px;">

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