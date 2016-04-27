<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Pronto
 * @since Pronto 1.0
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php if ( !post_password_required() ) { ?>
		<?php get_template_part('content', get_post_format() ); ?>
	<?php } ?>
	<div id="primary" class="content-area clr">
		<div id="content" class="site-content boxed" role="main">
			<header class="post-header">
				<h1 class="post-header-title"><?php the_title(); ?></h1>
				<ul class="meta single-meta clr">
					<?php if ( get_theme_mod('wpex_post_date','1') == '1' ) { ?>
						<li><i class="fa fa-clock-o"></i><?php the_date(); ?></li>
					<?php } ?>
					<?php if ( get_theme_mod('wpex_post_category','1') == '1' ) { ?>
						<li><i class="fa fa-folder-open"></i><?php the_category(' / '); ?></li>
					<?php } ?>
					<?php if( comments_open() ) { ?>
						<li class="comment-scroll"><i class="fa fa-comment"></i> <?php comments_popup_link(__('Leave a comment', 'wpex'), __('1 Comment', 'wpex'), __('% Comments', 'wpex'), 'comments-link', __('Comments closed', 'wpex')); ?></li>
					<?php } ?>
					<?php if ( get_theme_mod('wpex_post_author','1') == '1' ) { ?>
						<li><i class="fa fa-user"></i><?php the_author_posts_link(); ?></li>
					<?php } ?>
				</ul><!-- .meta -->
			</header><!-- .post-header -->
			<article class="entry clr">
				<?php the_content(); ?>
			</article><!-- /entry -->
			<?php wp_link_pages( array( 'before' => '<div class="page-links clr">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
			<?php if ( get_theme_mod('wpex_blog_tags', '1' ) =='1' ) : ?>
				<?php the_tags('<div class="post-tags clr">','','</div>'); ?>
			<?php endif; ?>
			<?php comments_template(); ?>
		</div><!-- #content -->
		<nav class="single-nav clr"> 
			<?php next_post_link('<div class="single-nav-left col span_12 clr-margin">%link</div>', '&larr; %title', false); ?>
			<?php previous_post_link('<div class="single-nav-right col span_12">%link</div>', '%title &rarr;', false); ?>
		</nav><!-- .page-header-title --> 
	</div><!-- #primary -->
<?php endwhile; ?>
<?php get_footer(); ?>