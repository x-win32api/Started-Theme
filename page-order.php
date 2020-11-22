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

	<?php
	while ( have_posts() ) :
	the_post(); 
	?>
<section class="order">
<div class="container">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>


<div class="order__items">

					<div class="order__item">
					<div class="transfer__form">
					<div class="order-basket">
                        <div class="form__title">
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
					</div>
                    </div>

					<div class="order__item order__info">

					<div class="transfer__form">
                            <form method="post" class="ajax_form_transfer" action="">
                                <div class="form__title">Оформить заказ</div>
                                <div class="inputText"><input type="text" name="name" placeholder="Имя"></div>
                                <div class="inputText"><input type="text" name="tel" placeholder="Телефон"></div>
                                <div class="inputText"><input type="text" name="count" placeholder="Адрес доставки">
                                <div class="login"><input type="text" name="mail" value="mail@mail.com" placeholder="mail@mail.com"></div>
                                </div>
                                <div class="inputText"><button class="btn" type="submit">ЗАКАЗАТЬ</button></div>
                                <div class="inputText result_form"></div>
                            </form>
                        </div>


						<?php
						the_content();
						?>
					</div>
</div>
				





</article>
</div>




<? endwhile; ?>

</section>

<?php
get_sidebar();
get_footer();
