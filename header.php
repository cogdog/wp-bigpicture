<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		

		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		
		<?php wp_head(); ?>

		<style>
		
		<?php if ( is_home() ):?>
		
		#intro {
			background: url('<?php echo get_stylesheet_directory_uri()?>/assets/images/overlay.png'), url("<?php header_image(); ?>");
		
		<?php elseif ( is_single() ):?>
		
		#top {
			background: url('<?php echo get_stylesheet_directory_uri()?>/assets/images/overlay.png'), url("<?php echo get_the_post_thumbnail_url(); ?>");
		
		
		<?php endif?>


			background-size: 256px 256px, cover;
			background-attachment: fixed, fixed;
			background-position: top left, bottom center;
			background-repeat: repeat, no-repeat;
		}	
		
		<?php if ( is_admin_bar_showing() ) :?>
		#header { top: 30px;}
		<?php endif?>	
		</style>

		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->

	</head>
	<?php echo '<body class="'.join(' ', get_body_class()).'">'; ?>

		<!-- Header -->
			<header id="header">
				<h1><a href="<?php echo site_url();?>"><?php bloginfo( 'name' ); ?></a></h1>

				<nav>
					<ul>
						<li><a href="#intro"><?php echo get_bigpicture_intro_menu_label() ?></a></li>