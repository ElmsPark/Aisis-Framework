<?php
global $wp_query;

$original_query = $wp_query;
$list_index =  array ( 'posts_per_page' => 5 );
$wp_query = new WP_Query ( $first_index );

if($wp_query->have_posts()){
	while($wp_query->have_posts()){
		$wp_query->the_post();
		?>
		<div class="post">
			<?php the_post_thumbnail('medium', $attr); ?>
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<p><?php the_excerpt(); ?></p>
		</div>
		<?php
	}
	
	?>
	<ul class="pager paddingBottom20">
	  <li class="previous">
	    <?php next_posts_link('&laquo; Older Entries'); ?>
	  </li>
	  <li class="next">
	  	<?php previous_posts_link('Newer Entries &raquo;'); ?>
	  </li>
	</ul><?php 
}

$wp_query = $original_query;