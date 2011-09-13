<?php
/*
Template Name: Front Page
*/
?>

<?php get_header(); ?>
			
			<div id="content" class="clearfix container_12">
			
				<div id="main" class="clearfix container_12" role="main">
						
					<?php 
						$args = array(
							'post_type' => 'static asset',
							'page_selection' => 'front-2',
							'page_position' => 'featured-2',
							'posts_per_page' => 1
						);
						query_posts( $args ); 
					?>
					<?php while (have_posts()) : the_post(); ?>
					
					<article>
						
						<section class="post_image grid_7">							
							<?php the_post_thumbnail('featured'); ?>
						</section>
						
						<header class="">
							<h2>
								<?php the_title(); ?>
							</h2>
						</header> <!-- end article header -->
						
						
					
						<section class="post_content">
							<?php the_excerpt(); ?>					
						</section> <!-- end article section -->
						
					</article> <!-- end article -->
					
					<?php endwhile; wp_reset_query();?>
					
				</div> <!-- end #main featured content section -->
    
				<div id="secondary" class="clearfix container_12">
					
					<?php 
						$args = array(
							'post_type' => 'static asset',
							'page_selection' => 'front-2',
							'page_position' => 'summary',
							'posts_per_page' => 3
						);
						query_posts( $args ); 
					?>
					<?php while (have_posts()) : the_post(); ?>

						
							<article class="grid_4">
								<header class="grid_4">
									<h2>
										<?php the_title(); ?>
									</h2>
								</header> <!-- end article header -->

								<section class="post_image left">							
									<?php the_post_thumbnail('featured'); ?>
								</section>

								<section class="post_content">
									<?php the_excerpt(); ?>	
								</section> <!-- end article section -->
							</article> <!-- end article -->
					<?php endwhile; wp_reset_query();?>
				
				</div> <!-- end #secondary content section -->
    
			</div> <!-- end #content section -->

<?php get_footer(); ?>