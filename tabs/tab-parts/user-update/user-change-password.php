<?php
$user_id = get_current_user_id();
$user = get_user_by('id', $user_id);
$user_email = $user->user_email;
?>
<div class="tab-pane mx-auto w-50" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
    <div class="change">
        <form name="editPassword " id="sal_user_pass_from">
            <div class="form-row">
                <label>Update Password</label>
            </div>
            <div class="form-row">
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="sal_old_password" name="passwordCurrent" placeholder="name@example.com">
                    <label for="floatingInput">Current Password</label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="sal_new_password" name="password" placeholder="
    New Password">
                    <label for="floatingInput">New Password</label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="sal_confirm_password" name="passwordConfirm" placeholder="
    Confirm New Password">
                    <label for="floatingInput">Confirm New Password</label>
                </div>

            </div>
            <input type="hidden" name="" id="sal_user_email" value="<?php echo $user_email  ?>">
    </div>


    <?php
    wp_nonce_field('sa_learners_change_password', "sal_user");
    ?>
    <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>