<?php
$user_id = get_current_user_id();
$user = get_user_by('id', $user_id);
$user_email = $user->user_email;
?>
<div class="tab-pane" id="Change">
    <div class="change">
        <form name="editPassword " id="sal_user_pass_from">
            <div class="form-row">
                <label>Update Password</label>
            </div>
            <div class="form-row">
                <div class="form-group ">
                    <label for="sal_old_password">Current Password</label>
                    <input type="password" id="sal_old_password" class="form-control" name="passwordCurrent">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group ">
                    <label for="sal_new_password">New Password</label>
                    <input type="password" id="sal_new_password" class="form-control" name="password">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group ">
                    <label for="sal_confirm_password">Confirm New
                        Password</label>
                    <input type="password" id="sal_confirm_password" class="form-control" name="passwordConfirm">
                </div>
                <input type="hidden" name="" id="sal_user_email" value="<?php echo $user_email  ?>">
            </div>
            <?php
            wp_nonce_field('sa_learners_change_password', "sal_user");
            ?>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>