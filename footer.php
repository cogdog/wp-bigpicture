		<!-- Footer -->
			<footer id="footer">

				<!-- social ucons -->
				<?php 
				if (  has_nav_menu( 'bigpicture-social' ) ) {
					wp_nav_menu( array( 'theme_location' => 'bigpicture-social', 'menu_class' => 'actions' ) );
				} else {
					// use blog name if no social icon menu set up
					echo '<ul class="actions"><li>' .  get_bloginfo( 'name' ) . '</li></ul>';	
				}				
				?>		
				<!-- Credits -->
					<ul class="menu">
					<li><em><?php bigpicture_footer_text()?></em></li>
					<li>theme: <a href="https://github.com/cogdog/wp-bigpicture">WP Big Picture</a> based on <a href="https://html5up.net/big-picture">HTML5 UP</a> modded by <a href="http://cog.dog">cog.dog</a></li>
					</ul>

			</footer>

			
	<?php wp_footer(); ?>
	</body>
</html>


