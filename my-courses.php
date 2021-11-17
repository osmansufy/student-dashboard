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
        <nav class="navbar navbar-inverse navbar-global navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-user navbar-right">
                        <li>
                            <a href="#"><span class="glyphicon glyphicon-user"></span>Sakib Ahmed</a>
                        </li>
                        <li>
                            <a href="#about"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </nav>
        <nav class="navbar-primary">
            <a href="#" class="btn-expand-collapse"><span class="glyphicon glyphicon-menu-left"></span></a>
            <ul class="navbar-primary-menu navbar-nav">
                <a class="navbar-brand" href="#">
                    <img class="collapse-img"
                        src="https://www.trainingexpress.org.uk/wp-content/uploads/2020/12/tx-logo.png" alt="" />
                    <img class="collapse-img-collapse"
                        src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/Screenshot_1.png" alt="" />
                </a>
                <li class="nav-item">
                    <a href="dashboard.html"><span class="glyphicon glyphicon-list-alt"></span><span
                            class="nav-label">Dashboard</span></a>
                </li>
                <li class="nav-item active"><a href="MyCourses.html"><span
                            class="glyphicon glyphicon-envelope"></span><span class="nav-label">My Courses</span></a>
                </li>
                <li class="nav-item"> <a href="MyCertificates.html"><span class="glyphicon glyphicon-cog"></span><span
                            class="nav-label">My Certificates</span></a></li>
                <li class="nav-item"><a href="MyRewards.html"><span class="glyphicon glyphicon-film"></span><span
                            class="nav-label">My Rewards</span></a></li>
                <li class="nav-item"><a href="UnlimitedLearning.html"><span
                            class="glyphicon glyphicon-calendar"></span><span class="nav-label">Unlimited
                            Learning</span></a></li>
                <li class="nav-item "><a href="SavedCourses.html"><span
                            class="glyphicon glyphicon-floppy-saved"></span><span class="nav-label">Saved
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
                <li class="nav-item  "><a href="support.html"><span class="far fa-comments"> </span><span
                            class="nav-label">
                            Support</span></a>
                </li>
            </ul>
        </nav>
        <div class="main-content">
            <section class="page-title">
                <div class="container-fluid">
                    <h1>My Courses</h1>
                </div>
            </section>
            <section class="content-main-body">
                <div class="container-fluid">
                    <!-- container-fluid-start  -->
                    <div class="subscribeUpsell">
                        <a href="#"><i class="fad fa-medal"></i>
                            Get access to all 700+ courses (and MORE) for only £12 per
                            month. Find out more.
                        </a>
                    </div>

                    <!-- Award days banner section -->
                    <div class="row award-section">
                        <div class="col-md-4 ">
                            <div class="white-rounded dash-details">
                                <div class="count-number">
                                    <span>2 <sup><i class="fas fa-arrow-up"></i></sup></span>
                                </div>
                                <div class="number-text">
                                    <p>Days Logged In</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="white-rounded dash-details">
                                <div class="Reward-number">
                                    <span>2</span>
                                </div>
                                <div class="number-text">
                                    <p>Reward Points</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="white-rounded dash-details">
                                <div class="Reward-number">
                                    <span>2</span>
                                </div>
                                <div class="number-text">
                                    <p>Reward Points</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Award days banner section END -->
                    <!-- Search Field Start -->
                    <div class="search-field">
                        <form action="https://www.trainingexpress.org.uk/?s=&post_type=course" method="GET">
                            <div class="input-group ">
                                <input type="text" class="form-control" placeholder="Search my courses..."
                                    id="txtSearch" />
                                <div class="input-group-btn ">
                                    <button class="btn btn-primary" type="submit">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Search Field END -->
                    <div class="my-course">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 col-sm-6">
                                <!-- col-start  -->
                                <div class="progress-box"
                                    style="  background-image: url('https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/admin-diploma-d69569d2dc405ebe0992c7b2970a6d35-1.jpg');">
                                    <div class="Popular-title-top">
                                        <div class="progress">
                                            <div role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                                aria-valuemax="100" class="progressbar bg-secondary"
                                                style="width: 70%;">70%</div>
                                        </div>
                                    </div>
                                    <div class="Popular-title-bottom">
                                        <h3> Level 3 Admin, PA and Secretarial Diploma </h3>
                                        <a href="#" role="button"
                                            class="btn btn-outline-primary btn-lg extra-radius">Add to Cart</a>
                                    </div>

                                </div>
                            </div><!-- col-end  -->
                        </div><!-- row--end  -->
                    </div>


                </div><!-- container-fluid-end  -->
            </section>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>

</html>