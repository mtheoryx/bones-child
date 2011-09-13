<?php
/*
This is the custom post type post template.
If you edit the post type name, you've got
to change the name of this template to
reflect that name change.

i.e. if your custom post type is called
register_post_type( 'bookmarks',
then your single template should be
single-bookmarks.php

*/
?>

<?php get_header(); ?>
			
			<div id="content" class="clearfix">

				<div id="main" class="col960 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
						
						<header>
							
							<h1><?php the_title(); ?></h1>
							
						
						</header> <!-- end article header -->
						
						
						
						<section class="post_content clearfix">

								<?php the_post_thumbnail('featured'); ?>

							<?php the_content(); ?>
					
						</section> <!-- end article section -->
						

					
					</article> <!-- end article -->
					

					
					<?php endwhile; ?>			
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1>Not Found</h1>
					    </header>
					    <section class="post_content">
					    	<p>Sorry, but the requested resource was not found on this site.</p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    

    
			</div> <!-- end #content -->

<?php get_footer(); ?>