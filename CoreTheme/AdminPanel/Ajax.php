<?php
// Allows us to uncheck packages through Ajax
function uncheck_package(){
    if(isset($_POST['element_value'])){
        $element = $_POST['element_value'];
    }
    
    if(isset($element)){
        $option = get_option('aisis_options');
        if(isset($option[$element])){
            unset($option[$element]);
            update_option('aisis_options', $option);
        }
    }
    
    die();
}

// Allows us to uncheck themes through Ajax
function uncheck_themes(){
    if(isset($_POST['element_value'])){
        $element = $_POST['element_value'];
    }
    
    if(isset($element)){
        $option = get_option('aisis_options');
        if(isset($option[$element])){
            unset($option[$element]);
            update_option('aisis_options', $option);
        }
    }
    
    die();
}

// Adds the appropriate actions to wordpress Ajax calls.
add_action( 'wp_ajax_nopriv_uncheck_themes', 'uncheck_themes' );  
add_action( 'wp_ajax_uncheck_themes', 'uncheck_themes' ); 
add_action( 'wp_ajax_nopriv_uncheck_package', 'uncheck_package' );  
add_action( 'wp_ajax_uncheck_package', 'uncheck_package' );  
