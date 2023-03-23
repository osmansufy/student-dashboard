<div class="tab-pane  active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <h1 class="text-dark">My Details</h1>
    <div class="myDetail">
        <div id="sa-data-div">

        </div>
        <?php
        $user_id = get_current_user_id();
        $user_info = get_userdata($user_id);
        $user_meta = get_user_meta($user_id);
        $firstName =       $user_meta['first_name'][0];
        $lastName =        $user_meta['last_name'][0];
        $description =     $user_meta['description'][0];
        $user_email =      $user_info->user_email;
        $displayName =     $user_info->display_name;
        // $displayName=     $user_meta['display_name'][0];
        // $email=           $user_meta['user_email'][0];


        ?>
        <form action="" class="sa-learners-edit-user d-flex flex-column" method="post">
            <div class="sa-field-wrap">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstName">First name</label>
                        <input type="text" id="sa-firstName" value="<?php echo $firstName ?>" class="form-control" name="firstName" value="">
                        <input type="hidden" id="sa-userId" value="<?php echo $user_id ?>" name="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastName">Last name</label>
                        <input type="text" id="sa-lastName" value="<?php echo $lastName ?>" class="form-control" name="lastName" value="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="sa-displayName">Display Name</label>
                        <input type="text" id="sa-displayName" value="<?php echo $displayName ?>" class="form-control" name="email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="sa-email">Email</label>
                        <input type="email" id="sa-email" readonly value="<?php echo $user_email ?>" class="form-control" name="email">
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="sa-description">About Me</label>
                        <textarea id="sa-description" class="form-control" name="description" rows="5">
                                                            <?php echo $description ?>
                                                </textarea>
                    </div>
                </div>
            </div>
            <div class="sa-d-flex" i>
                <button type="submit" id="sa-user-update-btn" class="btn btn-primary">Update</button>
                <!-- <span id="sa-loading-state">Loading...</span> -->
            </div>

        </form>
    </div>

</div>