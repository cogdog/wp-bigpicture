<?php 

	get_header(); 
	// keep a running list of the menu labels for intersection navigation
	$menulist[] = sanitize_title( get_bigpicture_intro_menu_label() );
	
	// store custom CSS for backgrounds
	$section_css = '';

	// custom query for posts listed by menu order
	
	$the_query = new WP_Query(array(
		'post_type' => 'post', 
		'post_status' => 'publish', 
		'orderby' => 'menu_order', 
		'order' => 'ASC',
		'posts_per_page' => 10,
	) );

	// First Loop for the nav and extra CSS
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
			echo '<li><a href="#' . sanitize_title(  $menu_label ) . '">' . $menu_label . '</a></li>';
			
			// keep track for later use
			$menulist[] = $menu_label;
			
			// build the custom CSS to put featured images in background
			if ( has_post_thumbnail() ) {
				$section_css .= '#' . sanitize_title( $menu_label ) . '{
background: url("' .  get_stylesheet_directory_uri() . '/assets/images/overlay.png"), url("' . get_the_post_thumbnail_url() . '");
background-size: 256px 256px, cover;
background-attachment: fixed, fixed;
background-position: top left, center center;
}
';	
			} //has_post_thumbnail
		} // while 
		
		echo '</ul></nav></header>';
		
		// insert custom styles, lame to do it here, sue me
		echo '<style>' . $section_css . '</style>';
		
		// rewind so we can reuse for the content
		$the_query->rewind_posts();
		
	} // $the_query->have_posts()
	?>

<!-- intro section -->

<section id="intro" class="main style1 dark fullscreen">
<div class="content">
	<header>
		<h2><?php bigpicture_intro_header()?></h2>
	</header>
	
	<?php bigpicture_intro_blurb()?>
	
	<footer>
		<a href="#<?php echo sanitize_title( $menulist[1] ); ?>" class="button style2 down">More</a>
	</footer>
</div>
</section>

<?php // Second Loop for the stuff to display

if ( $the_query->have_posts() ) {
	
	$is_rightside = false; // keep track to alternate styles of parallalax styles
	$section_count = 0; // keep the count

	while ( $the_query->have_posts() ) {
		$the_query->the_post();
					
			// bump count
			$section_count++;
			
			// what's next?
			$next_section = $section_count + 1;
			
			// No thumbnail mean regular content section 
			if ( !has_post_thumbnail() ) :?>
			
				<section id="<?php echo sanitize_title( $menulist[$section_count] )?>" class="main style3 primary">
					<div class="content">
						<header>
							<h2><?php the_title(); ?></h2>
						
							<?php the_content();?>
							
							<?php edit_post_link('Edit This', '<p class="edit-this"><span class="fa fa-pencil-square-o" aria-hidden="true"></span> ', '</p>');?>
							
						</header>
					</div>
			
			<?php
			
			else: 
				// this is a parallalax section with image background, alternating left/right styles
				$is_rightside = !$is_rightside;
				
				// class for the appropriate side
				$sideclass = ($is_rightside) ? 'right' : 'left';
				?>
				
				<section id="<?php echo sanitize_title( $menulist[$section_count] )?>" class="main style2 <?php echo $sideclass?>  dark fullscreen">
					<div class="content box style2">
						<header>
							<h2><?php the_title()?></h2>
						</header>
					
						<?php the_content();?>
						
						<?php edit_post_link('Edit This', '<p class="edit-this"><span class="fa fa-pencil-square-o" aria-hidden="true"></span> ', '</p>');?>
 					
					</div>	
										
			<?php endif?>
				
				<!-- section navigation -->
				
				<?php if ( $section_count == count($menulist) - 1 ) :?>
					<a href="#intro" class="button style2 up anchored">Top</a>
					 
				<?php else:?>
					<a href="#<?php echo sanitize_title($menulist[($section_count + 1)])?>" class="button style2 down anchored">Next</a>
					
				<?php endif?>
				</section>
		<?php
		} // while $the_query->have_posts()
	} // if $the_query->have_posts() 
	?>
	
<?php get_footer(); ?>