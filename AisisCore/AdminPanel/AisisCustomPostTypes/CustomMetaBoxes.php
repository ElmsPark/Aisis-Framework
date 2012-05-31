<?php


function aisis_add_meta_boxes()
{
	add_meta_box( 'aisis-meta-id', 'Articles and Essays Refrences', 'aisis_articles_essays_refrence', 'ae', 'normal', 'high' );
}

function aisis_articles_essays_refrence( $post )
{;
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	aisis_articles_essays_meta_box();
}



function aisis_articles_essays_save( $post_id )
{
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		 return;
	}
	
	if(!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')){
		 return;
	}
	
	if(!current_user_can('edit_post')){
		 return;
	}
	
	$allowed = array( 
		'a' => array( 
			'href' => array()
		)
	);
	
	if(isset($_POST['my_meta_box_text'])){
		update_post_meta( $post_id, 'my_meta_box_text', wp_kses( $_POST['my_meta_box_text'], $allowed ) );
	}
		
	if(isset($_POST['my_meta_box_select'])){
		update_post_meta( $post_id, 'my_meta_box_select', esc_attr( $_POST['my_meta_box_select'] ) );
	}
		
	$chk = (isset($_POST['my_meta_box_check']) && $_POST['my_meta_box_check'] ) ? 'on' : 'off';
	update_post_meta( $post_id, 'my_meta_box_check', $chk );
}

add_action( 'add_meta_boxes', 'aisis_add_meta_boxes' );
add_action( 'save_post', 'aisis_articles_essays_save' );
?>