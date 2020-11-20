<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Started
 */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="<?php print get_template_directory_uri(); ?>/css/main.css">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php wp_body_open(); ?>
<header>
        <div class="container">
            <div class="header__items">
                <div class="logo">
                    <div class="logo__img"><img src="/img/logo.svg" width="70px" height="auto"></div>
                    <div class="logo__slug">Доставка пиццы и роллов<br> в Ставрополе.</div>
                </div>
                <div class="contact">
                    <div class="contactTime">Время работы:<br>c 11:00 до 23:00</div>
                    <div class="contactTel">
                        <div class="contactNumber">+7 (962) 439-82-29</div>
                        <div class="contactMes">watsup / viber
                            <div></div>
                        </div>
                    </div>
                </div>
                <div class="basket">
                    <img class="basket__img" src="/img/basket.svg" width="18px"> <span class="basket__inf">Корзина пустая</span>

                    <div class="basketFly js-basket">
                        <div class="basketFly__top">
                            Корзина
                        </div>
                        <div class="basketFly__empty" data-empty>
                            Добавьте товары в корзину
                        </div>
                        <div class="basketFly__list" data-list>

                        </div>
                        <div class="basketFly__total">
                            Итого: <span data-total-price>0</span> руб.
                        </div>
                        <div class="basketFly__order"><a class="basketFly__order-link" href="">Оформить заказ</a></div>
                    </div>
                </div>
    </header>

	


	<?php
		/*	wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);*/
			?>
