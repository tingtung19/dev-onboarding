<?php 
/**
 *  Template Name: Custom Page */

?>
<?php
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
		$post_object = get_field('price');
		if ($post_object != null) {		
		?>
		<p><b>Detail Information : </b> </p>
		<ul>
			<li><Address>Price : <?php the_field('price'); ?></Address></li>			
			<li><Address>Wide : <?php the_field('wide'); ?></Address></li>
			<li><Address>Accessbility : <?php the_field('accessbility'); ?></Address></li>
		</ul>
		<?php
		}
		?>
		<ul>
		
		</ul>
		<hr>
		<p></p>
		
		<?php wp_link_pages(); ?>
	</div>

	<?php comments_template(); ?>
</main>

	<?php
endwhile;
