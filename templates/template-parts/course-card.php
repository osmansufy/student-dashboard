<div class="category-box" style="background-image: url('<?php echo $course->featured_image ?>');">
    <div class="Popular-title-top"><i class="far fa-user"></i> <?php
                                                                echo $course->student_count;
                                                                ?> students enrolled
    </div>
    <div class="Popular-title-bottom"><?php echo $course->post_title; ?>
        <h3><?php
            echo  get_woocommerce_currency_symbol();

            echo $course->regular_price;
            ?></h3>
    </div>
    <div class="popular-box-overlay">
        <p><strong><?php echo $course->post_title ?></strong></p>
        <div class="button-box">
            <div class="popular-overlay-btn">
                <button type="button" class="btn btn-outline-primary btn-lg extra-radius">
                    <?php echo count($course->curriculums) ?>
                    Modules
                </button>
            </div>
            <div class="popular-overlay-btn">
                <button type="button" class="btn btn-outline-primary btn-lg extra-radius">
                    Rating <?php $average_rating = get_post_meta($course->ID, 'average_rating', true);

                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $average_rating) {
                                    echo '<i class="fas fa-star" style="color: orange;"></i>';
                                } else {
                                    echo '<i class="far fa-star"></i>';
                                }
                            }
                            ?>
                </button>
            </div>
        </div>
        <h3><?php
            echo  get_woocommerce_currency_symbol();

            echo $course->regular_price;
            ?></h3>
        <div class="popular-overlay-btn-btm sa-btn_<?php echo $course->product_id ?>">
            <a target="_blank" href="<?php echo get_site_url() . '/courses/' . $course->post_name ?>" role="button" class="btn btn-outline-primary btn-lg extra-radius nsa_course_more_info">More
                Info</a>
            <?php
            if (!is_product_in_cart($course->product_id)) {

            ?>
                <a role="button" data-course-title="<?php echo $course->post_title ?>" data-product_id="<?php echo $course->product_id ?>" class="btn btn-outline-primary btn-lg extra-radius sal_add_to_cart_button
                                                    sa-cart-btn_<?php echo $course->product_id ?>
                                                    ">Add to Cart</a>
            <?php
            } else {
            ?>
                <a href="<?php echo wc_get_cart_url() ?>" target="_blank" role="button" class="btn sa-go-to-cart btn-outline-primary btn-lg extra-radius">
                    Go to cart
                </a>
            <?php
            }

            ?>
            <!-- loading button  -->

            <a href="<?php echo wc_get_cart_url() ?>" role="button" target="_blank" class="btn sa-go-to-cart btn-outline-primary btn-lg extra-radius  sa-gotoCart-btn_<?php echo $course->product_id ?>" style="display:none">
                Go to cart
            </a>
        </div>
    </div>
</div>