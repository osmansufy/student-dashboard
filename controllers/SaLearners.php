<?php
class SALearners {
    public function __construct() {
       
    }
    function sa_learners_update_callback (){
        $email = $_POST['email'];
        $user_id = get_current_user_id();
        $args = [
            'ID' => $_POST['id'],
            'first_name' => $_POST['firstName'],
            'last_name' => $_POST['lastName'],
            'display_name' => $_POST['displayName'],
            'description' => $_POST['description'],
        ];
        if($user_id!=$_POST['id']){
            wp_send_json_error(['message'=>'You are not allowed to update this user']);
        }
        if(!empty($email) || $email != null){
            $args['user_email'] = $email;
            $user_data = wp_update_user($args);
            if(is_wp_error($user_data)){
                wp_send_json_error(['message'=>$user_data->get_error_message()]);
            } else{
                wp_send_json_success( ['message'=>'User updated successfully']);
            }
        }else{
            wp_send_json_error(['message' => 'Email is required']);
        }
        // echo "<pre> ";
        // echo $user_data;
        // echo "</pre>";
        die();
    }

}
new SALearners();
?>