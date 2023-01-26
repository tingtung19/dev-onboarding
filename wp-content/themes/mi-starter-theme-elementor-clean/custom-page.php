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
	<hr>
	<div>	
	<?php
		$post_object = get_field('logo','option');
		if ($post_object != null) {		
		?>
		<table>
			<tr>
				<td width="10%"><img src="<?php the_field('logo','option'); ?>" width="100px"> </td>		
				<td width="70%" style="text-align: center;"> <h2>Header Form ACF Option</h2></td>	
				<td width="20%" style="text-align: right;"><Address>Chat me on WA : <?php the_field('wa_number','option'); ?></Address></td>
			</tr>
		</table>
		<?php
		}
		?>
	</div>
	<hr>
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
			<p><b>Detail Information : </b> <i>From ACF Field</i></p>
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
		
		<?php wp_link_pages(); ?>
	</div>
	<div>
		<h3>Footer from ACF Repeater</h3>

		<?php if( have_rows('footer_kanan', 'option') ): ?>
			<ul>
			<?php while( have_rows('footer_kanan', 'option') ) : the_row(); ?>
				<li><Address>Address : <?php the_sub_field('address'); ?></Address></li>
				<li><Address>Email : <?php the_sub_field('email'); ?></Address></li>
				<li><Address>WA Number : <?php the_sub_field('wa_number'); ?></Address></li>
			<?php endwhile; ?>
			</ul>

		<?php endif; ?>	
	</div>

	<?php comments_template(); ?>
</main>

	<?php
endwhile;
