<?php
/**
 * This is not a class file.
 * 
 * This function based file is the basis of all the theme
 * hooks with in the Aisi Theme it's self and uses the WordPress action 
 * do_action() and add_action() to allows developers to add actions to
 * various parts of the theme, such as after the the loop or before the 
 * sidebar (for example). 
 * 
 * All functions here are documented, and all fucntions here are used in the 
 * theme. all you have to do is add actions to them.
 * 
 * @package CoreTheme
 * @link http://codex.wordpress.org/Function_Reference/do_action
 * @link http://codex.wordpress.org/Function_Reference/add_action
 * 
 */

/**
 * This function allows us to add actions AFTER a single based loop
 * and BEFORE the comments section.
 */
function after_single_post(){
	do_action('after_single_post');
}

/**
 * Allows us to add actions that appear AFTER the main loop, in such
 * files as the index.php and BEFORE anything that happens after the loop.
 */
function after_main_loop(){
	do_action('after_main_loop');
}

/**
 * Allows us to add stuff AFTER the loop on a page.
 */
function after_page_loop(){
	do_action('after_page_loop');
}

/**
 * Allows you to do things AFTER the loop for a specific query.
 */
function after_query_loop(){
	do_action('after_query_loop');
}
