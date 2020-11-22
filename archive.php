<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Started
 */

get_header();
?>


<?
/*
$posts = get_posts(array(
	'numberposts'	=> -1,
	'post_type'	=> 'post',
	'meta_key'	=> 'product',

));*/
/*$posts = get_posts(array(
    'meta_query' => array(
        array(
            'key'     => 'product',
            'value'   => 'утка',
            'compare' => 'LIKE'
        )
    )
));*/


require get_template_directory() . '/filter.php';



?>




<section class="content">
        <div class="container">

		<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<div class="container_ajax">
				<div class="loader-container" style="display:none">
					<div class="loader"></div>
				</div>
			</div>
            <div class="product__items filter">

			<?php if ( have_posts() ) : ?>
			<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', 'category');
				endwhile;
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
			</div>
		
		</div>
    </section>


	





<?php
get_sidebar();
get_footer();
