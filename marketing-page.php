<?php
/**
 * Template Name: Marketing Page
 */
get_header(); 

if(have_posts()){
	while (have_posts()) : the_post();
		echo the_content();
	endwhile;
}

?>

<div class="row-fluid marketing">
	<div class="span6">
		<h4>Subheading</h4>
		<p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus
		mollis interdum.</p>
		
		<h4>Subheading</h4>
		<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras
		mattis consectetur purus sit amet fermentum.</p>
		
		<h4>Subheading</h4>
		<p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
		</div>
		
		<div class="span6">
		<h4>Subheading</h4>
		<p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus
		mollis interdum.</p>
		
		<h4>Subheading</h4>
		<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras
		mattis consectetur purus sit amet fermentum.</p>
		
		<h4>Subheading</h4>
		<p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
	</div>
</div>


<?php
get_footer ();