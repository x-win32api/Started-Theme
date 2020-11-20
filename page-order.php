<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Started
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post(); ?>

<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Started
 */

?>


<div class="container">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>


<div class="order-basket">
                        <div class="basketFly__top">
                            У вас в корзине:
                        </div>
                        <div class="basketFly__empty" data-empty>
                            Добавьте товары в корзину
                        </div>
                        <div class="basketFly__list" data-list>

                        </div>
                        <div class="basketFly__total">
                            Итого: <span data-total-price>0</span> руб.
                        </div>
                       
                    </div>
	<div class="entry-content">
		<?php
		the_content();
		?>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->

</div>




<?
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
