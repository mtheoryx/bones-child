			<footer role="contentinfo" class="container_12">
			
				<div id="inner-footer" class="">
					

			
					<p class="attribution grid_6 push_3">&copy; <?php bloginfo('name'); ?> <?php bloginfo('description'); ?> | Site Design: <a href="http://davidrpoindexter.com/">David R Poindexter</a> | <a href="<?php echo home_url()?>/questions-and-contact-us/">Contact Us</a></p>
				
				</div> <!-- end #inner-footer -->
				
			</footer> <!-- end footer -->
		
		</div> <!-- end #container -->

		<!-- custom scripts -->
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/scripts.js"></script>
		
		<!--[if (lt IE 9) & (!IEMobile)]>
			<script src="<?php echo get_template_directory_uri(); ?>/library/js/libs/ie/DOMAssistantCompressed-2.8.js"></script>
			<script src="<?php echo get_template_directory_uri(); ?>/library/js/libs/ie/selectivizr-1.0.1.js"></script>
			<script src="<?php echo get_template_directory_uri(); ?>/library/js/libs/respond.min.js"></script>
		<![endif]-->		
		
		<!--[if lt IE 7 ]>
    		<script src="<?php echo get_template_directory_uri(); ?>/library/js/libs/ie/dd_belatedpng.js"></script>
    		<script>DD_belatedPNG.fix("img, .png_bg");</script>
  		<![endif]-->
		
		<?php wp_footer(); // js scripts are inserted using this function ?>
		
		<!-- Insert Analytics -->
		
		<!-- End Analytics -->

	</body>

</html>