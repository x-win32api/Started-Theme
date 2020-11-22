<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Started
 */

get_header();
?>

<section class="content">
    <div class="container">
<h1 class="entry-title"><?php print get_the_title(); ?></h1>
			<div class="single__items">

				<div class="single__item filter">
				<?php
					while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', get_post_type() );
					endwhile; // End of the loop.
				?>
				
				</div>

				<div class="single__item transfer__form">
				<div class="product__content-header">Доставка</div>
				<p>
				Мы доставим, куда пожелаете (в рамках приличия и зоны покрытия ресторанов). 
                Заказывайте на сайте или по телефону, оставьте номер и адрес, и мы почти звоним в вашу дверь.
				</p>

				<div class="product__content-header">Оплата</div>
				<p>
				<b>Наличными</b><br>
				Говорят, самовывоз – это когда ты не ходишь к психологу, а ходишь за любимыми вкусняшками сам. Только заказать их нужно минимум за 30 минут до визита, чтобы мы успели приготовить. Ближайший ресторан тоже подскажет наш красивый оператор.
				<br><br>
				<b>Перевод на банковскую карту</b><br>
				Прямой перевод на банковскую карту Сбербанка.<br><br>
				</p>
				<div class="product__content-header">Поделитесь с друзьями</div>
				<script type="text/javascript">(function() {
  if (window.pluso)if (typeof window.pluso.start == "function") return;
  if (window.ifpluso==undefined) { window.ifpluso = 1;
    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
    s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
    var h=d[g]('body')[0];
    h.appendChild(s);
  }})();</script>
<div class="pluso" data-background="#ebebeb" data-options="big,square,line,horizontal,counter,theme=04" data-services="vkontakte,facebook,odnoklassniki,bookmark"></div>


<br><div class="product__content-header">Отзывы клиентов</div>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>
				</div><!----- TEST ------->

			</div>
	</div>
</section>



<?php
get_sidebar();
get_footer();
