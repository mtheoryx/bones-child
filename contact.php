<?php
/*
Template Name: Contact Page Template
*/
?>

<?php get_header(); ?>
			
			<div id="content" class="clearfix container_12">
			
				<div id="contact" class="clearfix grid_5" role="main">
					<h3>Contact Us</h3>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
					<?php endwhile; ?>
					<?php endif; ?>
				</div> <!-- end #main -->
    
				<div id="questions" class="clearfix grid_7">
					<h3>FAQs</h3>
					<?php
						global $post;
						$args = array(
							'numberposts' => 10,
							'post_type' => 'faq',
							'order' => 'ASC'
						);
						$posts = get_posts( $args ); 
					?>
						
					<ul>
					<?php foreach( $posts as $post ) :	setup_postdata($post); ?>
						<li>
							<a href="#"><?php the_title(); ?></a>
							<br />
							<p><?php the_content();?></p>
						</li>
					<?php endforeach; ?>
					</ul>
				</div>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>