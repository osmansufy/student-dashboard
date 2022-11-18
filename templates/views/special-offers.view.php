<section class="content-main-body">
    <div class="container-fluid">
        <?php
        // dispaly the special offers
        $index = 1;
        foreach ($special_offers as $key =>  $special_offer) {
            // post url
            $post_url = get_permalink($special_offer->ID);
        ?>
            <div class="offer-box">
                <div class="regular-full white-rounded">
                    <div class="rewards-inner"> <a class=" btn btn-primary abs">Offer <?php echo $index ?></a>
                        <h3 class="text-center"><?php echo $special_offer->post_title ?></h3>
                    </div>
                    <div class="text-center offer-text">
                        <?php
                        echo $special_offer->post_content;
                        ?>
                        <h3 class="text-primary">
                            <a href="<?php echo $post_url  ?>"><span class="underlined">Browse Courses</span></a>
                        </h3>
                        <a class="btn btn-outline-primary offer-btn" href="<?php echo $post_url  ?>">Claim Offer</a>
                    </div>
                </div>
            </div>
        <?php
            $index++;
        } ?>
        <!-- container-fluid-start  -->

    </div><!-- container-fluid-end  -->
</section>