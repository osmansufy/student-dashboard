<?php
class SALearners
{
    public function __construct()
    {
    }
    static function sa_learners_update_callback()
    {

        $email = $_POST['email'];
        $user_id = get_current_user_id();
        $action = 'sa_learners_update';
        $nonce = $_POST['sal_nonce'];
        $args = [
            'ID' => $_POST['id'],
            'first_name' => $_POST['firstName'],
            'last_name' => $_POST['lastName'],
            'display_name' => $_POST['displayName'],
            'description' => $_POST['description'],
        ];
        if (!wp_verify_nonce($nonce, $action)) {
            wp_send_json_error(['message' => 'You are not authorized']);
            die();
        } else {
            if ($user_id != $_POST['id']) {
                wp_send_json_error();
            }
            if (!empty($email) || $email != null) {
                $args['user_email'] = $email;
                $user_data = wp_update_user($args);
                if (is_wp_error($user_data)) {
                    wp_send_json_error(['message' => $user_data->get_error_message()]);
                } else {
                    wp_send_json_success(['message' => 'User updated successfully']);
                }
            } else {
                wp_send_json_error(['message' => 'Email is required']);
            }
            // echo "<pre> ";
            // echo $user_data;
            // echo "</pre>";
            die();
        }
    }
    //  update user profile picture formData 
    static  function sa_learners_update_profile_picture_callback()
    {
        $user_id = get_current_user_id();
        $action = 'sa_learners_update_profile_picture';
        $nonce = $_POST['nonce'];
        if (!wp_verify_nonce($nonce, $action)) {
            wp_send_json_error(['message' => 'You are not authorized', 'data' => $nonce]);
            die();
        } else {
            $file = $_FILES['profile_picture'];
            $upload_overrides = array('test_form' => false);
            $movefile = wp_handle_upload($file, $upload_overrides);
            if ($movefile && !isset($movefile['error'])) {
                // echo "File is valid, and was successfully uploaded.\n";
                $user_data =  update_user_meta($user_id, 'profile_picture', $movefile['url']);
                //   send json success with object
                wp_send_json_success([
                    'message' => 'Profile picture updated successfully',
                    'user_id' => $user_data,
                    'url' => $movefile['url'],
                    'success' => true
                ]);
            } else {
                wp_send_json_error(['message' => 'Profile picture not updated']);
            }
            // }
            die();
        }
    }
    // change user password with ajax call
    static  function sa_learners_change_password_callback()
    {
        $user_id = get_current_user_id();
        $user = get_user_by('id', $user_id);
        $action = 'sa_learners_change_password';
        $nonce = $_POST['sal_nonce'];
        if (!wp_verify_nonce($nonce, $action)) {
            wp_send_json_error(['message' => 'You are not authorized', 'success' => false, 'data' => $_POST['sal_nonce']]);
            die();
        }
        // authenticate user email and password
        if (wp_check_password($_POST['old_password'], $user->data->user_pass, $user->ID)) {
            // check if new password and confirm password match
            if ($_POST['new_password'] == $_POST['confirm_password']) {
                // update user password
                $user_data = wp_update_user([
                    'ID' => $user_id,
                    'user_pass' => $_POST['new_password']
                ]);
                if (is_wp_error($user_data)) {
                    wp_send_json_error(['message' => $user_data->get_error_message()]);
                } else {
                    wp_send_json_success(['message' => 'Password updated successfully']);
                }
            } else {
                wp_send_json_error(['message' => 'New password and confirm password do not match']);
            }
        } else {
            wp_send_json_error(['message' => 'Current password is incorrect']);
        }

        die();
    }
};
