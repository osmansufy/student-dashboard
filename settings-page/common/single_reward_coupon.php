<div style="    display: flex;
    flex-wrap: wrap;
    margin: 1rem auto;
    border: 1px solid;
    padding: 2rem;
    width: 80%
">
    <div style="width: 100%;
    margin: 1rem;

    ">
        <h5>
            <?php echo $title ?>
        </h5>
        <p><?php echo $description ?></p>
    </div>
    <?php
    foreach ($coupon_fields as $coupon_field) {
        $field_value = get_option($coupon_field['option_name']);
    ?>
        <div style="width:45%;
    margin: 1rem;
        
        ">
            <h6><?php echo $coupon_field['title'] ?></h6>
            <?php if ($coupon_field['type'] == 'select') {
                $options = $coupon_field['options'];
            ?>
                <select style="padding: 0.5rem 1rem;
    width: 90%;
    
    " id="<?php echo $coupon_field['id'] ?>" name="<?php echo $coupon_field['option_name'] ?>">
                    <option value="">Select Option</option>
                    <?php foreach ($options as  $key => $value) {
                        $selected = $field_value == $key ? 'selected' : '';
                    ?>
                        <option <?php echo $selected ?> value="<?php echo $key ?>"><?php echo $value ?></option>
                    <?php }  ?>

                </select>
        </div>
    <?php
            } else {
    ?>
        <input type="<?php echo esc_html($coupon_field['type']) ?>" name="<?php echo esc_html($coupon_field['option_name'])  ?>" style="padding: 0.5rem 1rem;
    width: 90%;

    " placeholder="<?php echo esc_html($coupon_field['placeholder']) ?>" value="<?php echo $field_value ?>">
</div>
<?php
            }
        }

?>
</div>