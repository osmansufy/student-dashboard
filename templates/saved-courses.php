

    <?php
    $user_id = get_current_user_id();
    $saved_courses = SaCourse::sa_get_saved_courses($user_id);
    //  check product is in cart or not
    function is_product_in_cart($product_id)
    {
        $product_cart_id = WC()->cart->generate_cart_id($product_id);
        if (WC()->cart->find_product_in_cart($product_cart_id)) {
            return true;
        }
        return false;
    };
    $head = "Saved Courses";
    include_once('common-parts/dashboard-head.php');
    ?>
    <?php include_once('views/saved-courses.view.php'); ?>
    <?php include_once('common-parts/dashboard-footer.php') ?>
