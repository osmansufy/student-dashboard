<?php
$user_id = get_current_user_id();
$user_pic = get_user_meta($user_id, "profile_picture", true)
?>
<div class="tab-pane" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

    <div class="Profile">

        <!-- preview profile picture -->

        <div class="custom-file">
            <form action="" class="sal-user-profile-form

            d-flex flex-column align-items-center

            " id="sal_user_form" enctype="multipart/form-data">

                <label for="sal_profile_picture">
                    <div class="exisiting-img">
                        <img class="upload_image_preview_img" src="<?php
                                                                    echo $user_pic ?
                                                                        $user_pic : 'https://newskillsacademy.co.uk/assets/cdn/profileImg/default.png' ?>" alt=" profile" style="max-width:150px;" id="currentImg">
                    </div>


                </label>
                <input type="file" class="custom-file-input" id="sal_profile_picture" name="uploaded_file">
                <div class="sal-btn-wrap">
                    <button type="submit" class="btn-success py-3">
                        Update profile picture
                    </button>
                </div>
                <?php wp_nonce_field('sa_learners_update_profile_picture', 'user_profile_picture_nonce'); ?>
            </form>
        </div>
    </div>
</div>