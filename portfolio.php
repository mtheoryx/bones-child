<?php
/*
Template Name: Gallery Page Template
*/
?>

<?php get_header(); ?>
			
			<div id="content" class="clearfix container_12">
			
				<div id="main" class="clearfix container_12" role="main">

					<?php 
						$args = array(
							'post_type' => 'project',
							'page_position' => 'featured-2',
							'posts_per_page' => 1
						);
						query_posts( $args ); 
					?>
					<?php while (have_posts()) : the_post(); ?>
					
					<article class="">
						<section class="post_image grid_7">							
							<?php the_post_thumbnail('featured'); ?>
						</section>
						
						<header class="">
							<h2>
								<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
							</h2>
						</header> <!-- end article header -->
						
						
					
						<section class="post_content">
							<?php the_excerpt(); ?>					
						</section> <!-- end article section -->
						
					</article> <!-- end article -->
					
					<?php endwhile; wp_reset_query(); ?>
			
				</div> <!-- end #main -->
    
				<div id="secondary" class="clearfix container_12">
					
					<?php 
						$args = array(
							'post_type' => 'project',
							'page_position' => 'summary',
							'posts_per_page' => 4,
							'order' => 'DESC'
						);
						query_posts( $args ); 
					?>
					<?php while (have_posts()) : the_post(); ?>
						
							<article class="grid_3">
								<header>
									<h2>
										<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
									</h2>
								</header> <!-- end article header -->

								<section class="post_image">							
									<?php the_post_thumbnail('featured'); ?>
								</section>

								
							</article> <!-- end article -->
					<?php endwhile; ?>
					<?php wp_reset_query();?>
				</div>
				
				<div><a href="<?php echo site_url('project'); ?>">See all &raquo;</a></div>
    			
			</div> <!-- end #content -->

<?php get_footer(); ?>