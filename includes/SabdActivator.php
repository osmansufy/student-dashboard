<?php

class SaLearnersDbActivator
{
    public function __construct() {
    }

    public static function activate() {
        self::SaLearnersDbCreate(['title'=>'My Courses','slug'=>'my-courses-dashboard','template'=>'my-courses-dashboard']);
        self::SaLearnersDbCreate(['title'=>'Learners Dashboard','slug'=>'learners-dashboard','template'=>'learners-dashboard']);
    
    }
    protected function SaLearnersDbCreate($data) {
        $post_id = -1;
        $slug = $data['slug'];
        $title = $data['title'];
        if ( null == get_page_by_title( $title )) {
            $uploader_page = array(
                'comment_status'        => 'closed',
                'ping_status'           => 'closed',
                'post_name'             => $slug,
                'post_title'            => $title,
                'post_status'           => 'publish',
                'post_type'             => 'page'
            );
            $post_id = wp_insert_post( $uploader_page );
            if ( !$post_id ) {
                wp_die( 'Error creating template page' );
            } else {
                update_post_meta( $post_id, '_wp_page_template', $data['template'].'.php' );
            }
        }
    }
    
}