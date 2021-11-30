<!DOCTYPE html>
<html lang="en">

<head>

    <?php

    wp_head();
    add_filter('show_admin_bar', '__return_false');
    ?>
</head>

<body>
    <div class="sidebar-menu-farhan">
        <?php include_once('template-parts/dashboard-top-nav.php'); ?>
        <?php include_once('template-parts/dashboard-sidebar.php'); ?>

        <div class="main-content">
            <section class="page-title">
                <div class="container-fluid">
                    <h1>My Rewards</h1>
                </div>
            </section>
            <section class="content-main-body">
                <div class="container-fluid">
                    <!-- container-fluid-start  -->
                    <div class="row pl-3 pr-3">
                        <div class="col-12 col-md-2">
                            <div class="regular-full pointsEarned text-center pointPicker">
                                <div class="dropdown">
                                    <label type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"> This Month </label>
                                    <div aria-labelledby="dropdownMenuButton" class="dropdown-menu ">
                                        <label href="#" class="dropdown-item">Today</label>
                                        <label href="#" class="dropdown-item">This Week</label>
                                        <label href="#" class="dropdown-item">This Month</label>
                                        <label href="#" class="dropdown-item">This Year</label>
                                        <label href="#" class="dropdown-item">All Time</label>
                                    </div>
                                </div>
                                <div class="points mr-0">
                                    <p>Points Earned</p>
                                    <h2>1</h2>
                                </div>
                            </div>
                        </div><!-- col end -->
                        <div class="col-12 col-md-10">
                            <div class=" regular-full pointsEarned align-items-center">
                                <div class="trophy">
                                    <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/trophy.png" alt="trophy">
                                    <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/trophy.png" alt="trophy">
                                    <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/trophy.png" alt="trophy">
                                    <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/trophy.png" alt="trophy">
                                    <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/trophy.png" alt="trophy" class="not-earned">
                                    <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/trophy.png" alt="trophy" class="not-earned">
                                    <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/trophy.png" alt="trophy" class="not-earned">
                                    <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/trophy.png" alt="trophy" class="not-earned">
                                    <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/trophy.png" alt="trophy" class="not-earned">
                                    <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/trophy.png" alt="trophy" class="not-earned">
                                    <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/trophy.png" alt="trophy" class="not-earned">
                                    <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/trophy.png" alt="trophy" class="not-earned">
                                    <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/trophy.png" alt="trophy" class="not-earned">
                                    <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/trophy.png" alt="trophy" class="not-earned">
                                    <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/trophy.png" alt="trophy" class="not-earned">
                                </div>
                            </div>
                        </div> <!--  col end -->
                    </div> <!-- row end -->
                    <div class="col-12 regular-full white-rounded achievements">
                        <h3>Your Achievements</h3>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <ul>
                                    <li><a href="javascript:;">Signed in 2 days in a row</a></li>
                                    <li><a href="javascript:;">Signed in 5 days in a row</a></li>
                                    <li style="opacity: 0.5;"><a href="javascript:;">Signed in 7 days in a row</a></li>
                                    <li style="opacity: 0.5;"><a href="javascript:;">Signed in 14 days in a row</a></li>
                                    <li style="opacity: 0.5;"><a href="javascript:;">Signed in 21 days in a row</a></li>
                                    <li style="opacity: 0.5;"><a href="javascript:;">2 rewards for every consecutive day after</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-4">
                                <ul>
                                    <li style="opacity: 0.5;"><a href="javascript:;">Complete 10 modules</a></li>
                                    <li style="opacity: 0.5;"><a href="javascript:;">Complete 25 modules</a></li>
                                    <li style="opacity: 0.5;"><a href="javascript:;">Complete 50 modules</a></li>
                                    <li style="opacity: 0.5;"><a href="javascript:;">Complete 75 modules</a></li>
                                    <li style="opacity: 0.5;"><a href="javascript:;">Complete 100 modules</a></li>
                                    <li style="opacity: 0.5;"><a href="javascript:;">2 rewards for every module after</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-4">
                                <ul>
                                    <li style="opacity: 0.5;"><a href="javascript:;">Complete 1 course</a></li>
                                    <li style="opacity: 0.5;"><a href="javascript:;">Complete 2 courses</a></li>
                                    <li style="opacity: 0.5;"><a href="javascript:;">Complete 3 courses</a></li>
                                    <li style="opacity: 0.5;"><a href="javascript:;">3 rewards for every course completion after</a></li>
                                    <li class="mt-2"><a href="javascript:;">Register an Account</a></li>
                                    <li class="light-trophy"><a href="https://newskillsacademy.co.uk/get-our-newsletter" style="opacity: 0.5;">Subscribe to our newsletter</a></li>
                                </ul>
                            </div>
                            <div class="col-12 retext">
                                <p>Only additional rewards points collected after 12/06/21 will apply to your total</p>
                            </div>
                        </div>
                    </div>
                    <div class="Claim-reward">
                        <div class="col-12 col-md-8 white-rounded">
                            <h3>Claimed Rewards</h3>
                            <div class="rewards-inner nav-item ">
                                <a class="btn btn-primary"><img src="https://newskillsacademy.co.uk/assets/user/images/trophy-white.png" alt="trophy">X2</a>
                                <p> 80% off coupon code: 5bc4c87070b76 - <span class="unclaimed">Unclaimed</span></p>
                            </div>
                            <div class="rewards-inner">
                                <a class="btn btn-primary"><img src="https://newskillsacademy.co.uk/assets/user/images/trophy-white.png" alt="trophy">X5</a>
                                <p> 90% off - 1 more trophies needed </p>
                            </div>
                            <div class="rewards-inner">
                                <a class="btn btn-primary"><img src="https://newskillsacademy.co.uk/assets/user/images/trophy-white.png" alt="trophy">X8</a>
                                <p> Free Course (up to £100.00) - 4 more trophies needed </p>
                            </div>
                            <div class="rewards-inner">
                                <a class="btn btn-primary"><img src="https://newskillsacademy.co.uk/assets/user/images/trophy-white.png" alt="trophy">X12</a>
                                <p> Free Certificate - 8 more trophies needed </p>
                            </div>
                            <div class="rewards-inner">
                                <a class="btn btn-primary"><img src="https://newskillsacademy.co.uk/assets/user/images/trophy-white.png" alt="trophy">X15</a>
                                <p> Free Mega Course (up to £240.00) - 11 more trophies needed </p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 no-padding">
                            <div class="trophy find-bg">
                                <p>Find out how to earn trophies</p>
                                <a href="#" class="find-btn">
                                    <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/find-btn.png" alt="Find out">
                                </a>
                            </div>
                            <div class="redeem find-bg">
                                <p>Find out how to redeem your rewards</p>
                                <a href="#" class="find-btn">
                                    <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/find-btn.png" alt="Find out">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="leaderBoard mycertificate">
                        <!--leader-Board -->
                        <div class="row">
                            <div class="col-12 col-md-8  white-rounded notification ">
                                <div class="leaderboard">
                                    <h3>Student leaderboard</h3>
                                    <div class="bs-dropdown" style="float: right;">
                                        <ul class="nav nav-pills" role="tablist">
                                            <li role="presentation" class="dropdown"> <a href="#" class="dropdown-toggle" id="drop6" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Dropdown <span class="caret"></span> </a>
                                                <ul class="dropdown-menu" id="menu3" aria-labelledby="drop6">
                                                    <li><a href="#">This Month</a></li>
                                                    <li><a href="#">Last Month</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <table class="table">
                                    <tbody>
                                        <tr class="">
                                            <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png" alt="award"> 1</th>
                                            <th>Thilliar V
                                                <!---->
                                            </th>
                                            <th>5224 pts</th>
                                            <th>
                                                <!---->
                                            </th>
                                        </tr>
                                        <tr class="">
                                            <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png" alt="award"> 2</th>
                                            <th>Paul Martyn S
                                                <!---->
                                            </th>
                                            <th>783 pts</th>
                                            <th>
                                                <!---->
                                            </th>
                                        </tr>
                                        <tr class="">
                                            <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png" alt="award"> 3</th>
                                            <th>amelia w
                                                <!---->
                                            </th>
                                            <th>644 pts</th>
                                            <th>
                                                <!---->
                                            </th>
                                        </tr>
                                        <tr class="">
                                            <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png" alt="award"> 4</th>
                                            <th>Leanne A
                                                <!---->
                                            </th>
                                            <th>486 pts</th>
                                            <th>
                                                <!---->
                                            </th>
                                        </tr>
                                        <tr class="">
                                            <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png" alt="award"> 5</th>
                                            <th>Zoe B
                                                <!---->
                                            </th>
                                            <th>417 pts</th>
                                            <th>
                                                <!---->
                                            </th>
                                        </tr>
                                        <tr class="">
                                            <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png" alt="award"> 6</th>
                                            <th>Aneta K
                                                <!---->
                                            </th>
                                            <th>393 pts</th>
                                            <th>
                                                <!---->
                                            </th>
                                        </tr>
                                        <tr class="">
                                            <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png" alt="award"> 7</th>
                                            <th>Janine O
                                                <!---->
                                            </th>
                                            <th>382 pts</th>
                                            <th>
                                                <!---->
                                            </th>
                                        </tr>
                                        <tr class="">
                                            <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png" alt="award"> 8</th>
                                            <th>Angela M
                                                <!---->
                                            </th>
                                            <th>375 pts</th>
                                            <th>
                                                <!---->
                                            </th>
                                        </tr>
                                        <tr class="">
                                            <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png" alt="award"> 9</th>
                                            <th>Parveen B
                                                <!---->
                                            </th>
                                            <th>363 pts</th>
                                            <th>
                                                <!---->
                                            </th>
                                        </tr>
                                        <tr class="">
                                            <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png" alt="award"> 10</th>
                                            <th>Tina C
                                                <!---->
                                            </th>
                                            <th>360 pts</th>
                                            <th>
                                                <!---->
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!-- col-notification-end  -->
                        </div> <!-- row -->
                        <!-- </div>row--end  -->
                    </div>
                    <!--leader-Board  end-->
                    <div class="last-line">
                        <p style="margin: 30px 0; font-size: 16px;   text-align: left;">
                            <em>Please note that language courses do not count towards your rewards totals.</em>
                        </p>
                    </div>
                </div><!-- container-fluid-end  -->
            </section>
        </div>
        </section>
    </div>
    </div>
    <?php wp_footer(); ?>
</body>

</html>