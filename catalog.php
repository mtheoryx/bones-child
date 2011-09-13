<?php
/*
Template Name: Catalog Page Template
*/
?>

<?php get_header(); ?>
			
			<div id="content" class="clearfix container_12">
			
				<div id="main" class="clearfix container_12" role="main">
					
					<?php
						
						if ( is_page("services") ) {
							$page_selection = 'services-2';
							$page_type = 'service';
						} else if ( is_page("products") ) {
							$page_selection = 'products-2';
							$page_type = 'product';
						}
					 
						
					
						$args = array(
							'post_type' => 'static asset',
							'page_selection' => $page_selection,
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
						
						<header>
							<h2>
								<a href="<?php echo site_url($page_type); ?>"><?php the_title(); ?></a>
							</h2>
						</header> <!-- end article header -->
						
						
					
						<section class="post_content clearfix">
							<?php the_excerpt(); ?>					
						</section> <!-- end article section -->
						
					</article> <!-- end article -->
					
					<?php endwhile; wp_reset_query(); ?>
			
				</div> <!-- end #main -->
    
				<div id="secondary" class="clearfix container_12">

						<?php 
							$args = array(
								'post_type' => 'static asset',
								'page_selection' => $page_selection,
								'page_position' => 'summary',
								'posts_per_page' => 2
							);
							query_posts( $args ); 
						?>
						<?php while (have_posts()) : the_post(); ?>
							<article class="grid_6">
								<header>
									<h2>
									<a href="<?php echo site_url($page_type) ?>"><?php the_title(); ?></a>
									</h2>
								</header> <!-- end article header -->

								<section class="post_image grid_3">							
									<?php the_post_thumbnail('featured'); ?>
								</section>

								<section class="post_content">
									<?php the_excerpt(); ?>
								</section> <!-- end article section -->

							</article> <!-- end article -->
						<?php endwhile; wp_reset_query(); ?>
				</div>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>