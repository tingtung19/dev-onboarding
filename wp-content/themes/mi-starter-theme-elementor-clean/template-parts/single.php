<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<?php


while ( have_posts() ) :
	the_post();
	?>

<main <?php post_class( 'site-main' ); ?> role="main">

	<?php if ( apply_filters( 'hello_elementor_page_title', true ) ) : ?>
		<header class="page-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header>
	<?php endif; ?>
	<div class="page-content">
		<?php the_content(); ?>
		<div class="post-tags">
			<?php the_tags( '<span class="tag-links">' . __( 'Tagged ', 'hello-elementor' ), null, '</span>' ); ?>
		</div>
		<?php
		$post_object = get_field('address');
		if ($post_object != null) {		
		?>
		<p><b>Information : </b> </p>
		<ul>
			<li><Address>Address : <?php the_field('address'); ?></Address></li>			
			<li><Address>Phone : <?php the_field('phone'); ?></Address></li>
			<li><Address>Email : <?php the_field('email'); ?></Address></li>
			<li><Address>Website : <?php the_field('website'); ?></Address></li>
		</ul>
		<?php
		}
		?>
		<ul>
		<?php
		if( get_field('detail') ): //from acf repeater
			while( the_repeater_field('detail') ): ?>
				<li><Address>Author : <?php the_sub_field('author'); ?></Address></li>
				<li><Address>Publisher : <?php the_sub_field('publisher'); ?></Address></li>
				<li><Address>Location : <?php the_sub_field('location'); ?></Address></li>
			<?php
			endwhile;
		endif; 
		?>
		</ul>
		<hr>
		<p></p>
		
		<?php wp_link_pages(); ?>
	</div>

	<?php comments_template(); ?>
</main>

	<?php
endwhile;
