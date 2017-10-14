<?php 
	get_header(); 

	// keep a running list of the menu labels for intersection navigation
	$menulist[] = sanitize_title( get_bigpicture_intro_menu_label() );
	
	// custom query for posts listed by menu order
	
	$the_query = new WP_Query(array(
		'post_type' => 'post', 
		'post_status' => 'publish', 
		'orderby' => 'menu_order', 
		'order' => 'ASC',
		'posts_per_page' => 10,
	) );

	// First Loop for the navigation
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
		
			$the_query->the_post();
			
			// doth we have a string for the menu item?
			$menu_label =  get_post_meta( get_the_ID(), '_button_label', true );
			
			// no, use the title, it will be ugly, but they should get the hint
			if ( empty( $menu_label ) ) {
				$menu_label = get_the_title();	
			}
			
			// add to navigation mennu	
			echo '<li><a href="' . get_permalink() . '">' . $menu_label . '</a></li>';
			
			// keep track for later use
			$menulist[] = $menu_label;
			
		} // while 
		
		echo '</ul></nav></header>';
		
	} // $the_query->have_posts()
?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	
			<?php if ( has_post_thumbnail() ) :?>
			

			<section id="top" class="main style1 dark fullscreen">
				<div class="content">
					<header>
						<h2><?php the_title(); ?></h2>
					</header>
					
					<footer>
						<a href="#more" class="button style2 down">More</a>
					</footer>
				</div>
			</section>
			
			<?php endif?>
		
			<section id="more" class="main style3 primary">
				<div class="content">
					
					<?php if ( !has_post_thumbnail() ) :?>
						<header>
							<h2><?php the_title(); ?></h2>
						</header>
					<?php endif?>
					
					<?php  the_content()?>
						
					<?php edit_post_link('Edit This', '<p class="edit-this"><span class="fa fa-pencil-square-o" aria-hidden="true"></span> ', '</p>');?>

				</div>
		
			<a href="<?php echo site_url()?>" class="button style2 down anchored">Return</a>
			
			</section>
   		<?php endwhile;?>
	<?php endif; ?> 
	  	
<?php get_footer(); ?>