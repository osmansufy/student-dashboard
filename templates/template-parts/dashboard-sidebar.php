  <?php
  $activeClass = 'active';

  ?>
  <nav class="navbar-primary">

      <a href="#" class="btn-expand-collapse"><span class="glyphicon glyphicon-menu-left"></span></a>
      <ul class="navbar-primary-menu navbar-nav">
          <a class="navbar-brand" href="#">
              <img class="collapse-img" src="https://www.trainingexpress.org.uk/wp-content/uploads/2020/12/tx-logo.png"
                  alt="" />
              <img class="collapse-img-collapse"
                  src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/Screenshot_1.png" alt="" />
          </a>
          <li class="nav-item <?php echo is_page_template( 'learners-dashboard.php' ) ? $activeClass:"" ?>">
              <a href="<?php echo get_site_url() . '/learners-dashboard' ?>"><span
                      class="glyphicon glyphicon-list-alt"></span><span
                      class="nav-label <?php echo $activeClass ?>">Dashboard</span></a>
          </li>
          <li class="nav-item "><a href="<?php echo get_site_url() . '/my-courses-dashboard' ?>"><span
                      class="glyphicon glyphicon-envelope"></span><span class="nav-label">My Courses</span></a>
          </li>
          <li class="nav-item"> <a href="MyCertificates.html"><span class="glyphicon glyphicon-cog"></span><span
                      class="nav-label">My Certificates</span></a></li>
          <li class="nav-item"><a href="MyRewards.html"><span class="glyphicon glyphicon-film"></span><span
                      class="nav-label">My Rewards</span></a></li>
          <li class="nav-item"><a href="UnlimitedLearning.html"><span class="glyphicon glyphicon-calendar"></span><span
                      class="nav-label">Unlimited
                      Learning</span></a></li>
          <li class="nav-item "><a href="SavedCourses.html"><span class="glyphicon glyphicon-floppy-saved"></span><span
                      class="nav-label">Saved
                      Courses</span></a>
          </li>
          <li class="nav-item  "><a href="Messages.html"><span class="glyphicon glyphicon-envelope"></span><span
                      class="nav-label">Messages</span></a>
          </li>
          <li class="nav-item"><a href="RecommendFriends.html"><span class="glyphicon glyphicon-fire"></span><span
                      class="nav-label">Recommend Friends</span></a>
          </li>
          <li class="nav-item "><a href="SpecialOffers.html"><span class="glyphicon glyphicon-star"></span><span
                      class="nav-label">Special Offers</span></a>
          </li>
          <li class="nav-item"><a href="MyOrders.html"><span class="glyphicon glyphicon-tag"></span><span
                      class="nav-label">My Orders</span></a>
          </li>
          <li class="nav-item "><a href="MyProfile.html"><span class="glyphicon glyphicon-user"></span><span
                      class="nav-label">My Profile.</span></a>
          </li>
          <li class="nav-item "><a href="StudentPortal.html"><span class="glyphicon glyphicon-import"></span><span
                      class="nav-label">Student Portal</span></a>
          </li>
          <li class="nav-item  "><a href="support.html"><span class="far fa-comments"> </span><span class="nav-label">
                      Support</span></a>
          </li>
      </ul>
  </nav>