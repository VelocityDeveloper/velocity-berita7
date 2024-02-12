<?php

/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package justg
 */

// Exit if accessed directly.

defined('ABSPATH') || exit;
get_header();
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 pt-2">	
            <h1 class="velocity-title"><?php wp_title(''); ?></h1>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php velocity_post_loop();?>
				<?php endwhile; ?>
	<?php justg_pagination();?>
			<?php else : ?>
				<?php get_template_part( 'loop-templates/content', 'none' ); ?>
			<?php endif; ?>
        </div>
        <div class="col-md-4 pt-2">
            <?php get_sidebar('main');?>
        </div>
    </div>
</div>

<?php
get_footer();
