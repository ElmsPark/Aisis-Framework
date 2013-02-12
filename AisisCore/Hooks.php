<?php
/**
 * This class is designed to be extended and for you to pass a series of
 * tags along with functions to the main function.
 * 
 * <p>The core design princible behind this class was that users would extend
 * it so that they could implement their own custom functions, and then register each of 
 * of those functions in an array that is then passe into the setup_hooks function.</p>
 * 
 * <p>This allows the custom hooks for the theme to be all in one place and keeps the hooks
 * maintainable as the theme or heme framework grows.</p> 
 * 
 * <p>The accepted data structure for this is:</p>
 * 
 * <p><code>
 * $array_hooks = array(
 *     'hook_name' => 'function_to_call'
 * );
 * </code></p>
 *
 * @link http://codex.wordpress.org/Function_Reference/add_action
 * @link http://codex.wordpress.org/Function_Reference/do_action
 * @link http://codex.wordpress.org/Plugin_API/Hooks
 * 
 * @package AisisCore
 */
class AisisCore_Hooks{
	
	/**
	 * Core class constructor.
	 */
	public function __construct(){		
		$this->init();
	}
	
	/**
	 * Use me to pass in constructor logic in classes that extend this.
	 */
	public function init(){}
	
	/**
	 * Set up the hooks. 
	 * 
	 * <p>we take in two key peices of the array of hooks, a tag and a function call back.
	 * This allows us to set up the action. In your do_action() function you would pass in any arguments required.
	 * As for the priority, we do the default priority settings.
	 * </p>
	 * 
	 * <p>Its should be noted that this class is for creating custom actions that are created specifically
	 * for the theme, and not for those where you add actions to pre_existing actions in WordPres.
	 * How ever, with that said, you can use this class for adding any function to any action, keep in mind
	 * that do_action will pass in any arguments you need and that the priority is default.</p>
	 * 
	 * @link http://codex.wordpress.org/Function_Reference/add_action
	 * 
	 * @param array $hooks
	 */
	public function setup_hooks(array $hooks){
		foreach($hooks as $hook=>$function){
			add_action($hook, $function);
		}
	}
}
