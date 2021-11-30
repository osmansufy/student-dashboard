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
                    <h1>Special Offers</h1>
                </div>
            </section>
            <section class="content-main-body">
                <div class="container-fluid">
                    <!-- container-fluid-start  -->
                    <div class="offer-box">
                        <div class="regular-full white-rounded">
                            <div class="rewards-inner"> <a class=" btn btn-primary abs">Offer 1</a>
                                <h3 class="text-center">Brand New Course: Bartending Certificate</h3>
                            </div>
                            <div class="text-center offer-text">
                                <h3 class="text-primary">
                                    <a href="#"><span class="underlined">Browse Courses</span></a>
                                </h3>
                                <a class="btn btn-outline-primary offer-btn" href="#">Claim Offer</a>
                            </div>
                        </div>
                    </div>
                    <div class="offer-box">
                        <div class="regular-full white-rounded">
                            <div class="rewards-inner"> <a class=" btn btn-primary abs">Offer 2</a>
                                <h3 class="text-center">Brand New Course: Bartending Certificate</h3>
                            </div>
                            <div class="text-center offer-text">
                                <p>Learning about bartending is essential for anybody with a passion for the hospitality industry and the vibrant and exciting world of bartending - whether you’re in the industry already or are aspiring to begin your journey.&nbsp;</p>
                                <p>This course covers everything you need to know about being a successful bartender, including a full job description and all the career options you’ll have.&nbsp;</p>
                                <p>From the personal traits and skills required, to the various tools of the trade and professional tips to excel in bartending, this course covers everything you need to know about one of the most rewarding and exciting service industry careers!&nbsp;</p>
                                <p><strong>Give the course a go today for only £8.00!</strong></p>
                                <h3 class="text-primary">
                                    <a href="#"><span class="underlined">Browse Courses</span></a>
                                </h3>
                                <a class="btn btn-outline-primary offer-btn" href="#">Claim Offer</a>
                            </div>
                        </div>
                    </div>
                    <div class="offer-box">
                        <div class="regular-full white-rounded">
                            <div class="rewards-inner"> <a class=" btn btn-primary abs">Offer 3</a>
                                <h3 class="text-center">Brand New Course: Bartending Certificate</h3>
                            </div>
                            <div class="text-center offer-text">
                                <p>Learning about bartending is essential for anybody with a passion for the hospitality industry and the vibrant and exciting world of bartending - whether you’re in the industry already or are aspiring to begin your journey.&nbsp;</p>
                                <p>This course covers everything you need to know about being a successful bartender, including a full job description and all the career options you’ll have.&nbsp;</p>
                                <p>From the personal traits and skills required, to the various tools of the trade and professional tips to excel in bartending, this course covers everything you need to know about one of the most rewarding and exciting service industry careers!&nbsp;</p>
                                <p><strong>Give the course a go today for only £8.00!</strong></p>
                                <h3 class="text-primary">
                                    <a href="#"><span class="underlined">Browse Courses</span></a>
                                </h3>
                                <a class="btn btn-outline-primary offer-btn" href="#">Claim Offer</a>
                            </div>
                        </div>
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