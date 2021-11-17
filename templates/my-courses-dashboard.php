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
        <?php include_once('template-parts/dashboard-sidebar.php'); ?>
        <?php include_once('template-parts/dashboard-top-nav.php'); ?>
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