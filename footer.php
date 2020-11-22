<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Started
 */

?>

<footer>
        <div class="container">
            <div class="footer__items">
                <div class="footer__item">
                    <div class="footer__item-title">Контакты</div>
                    <div class="footer__item-text">
                        <b>Телефон:</b><br> +7 (962) 439-82-29 <br>
                    </div>
                    <div class="footer__item-text">
                        <b>Адрес:</b>
                        <br> г. Ставрополь ул. Фроленко 21<br>
                    </div>
                    <div class="footer__item-text">
                        <b>График работы:</b><br> с 11:00 до 23:00
                    </div>
                    <div class="footer__soc">
                        <div class="inst"></div>
                        <div class="vk"></div>
                    </div>
                </div>
                <div class="footer__item">
                    <div class="footer__item-title">Для клиентов</div>
                    <div class="footer__item-text">
                        <ul>
                            <li><a href="#">Доставка</a></li>
                            <li><a href="#">Оплата</a></li>
                            <li><a href="#">Отзывы</a></li>
                            <li><a href="#">Политика обработки персональных</a></li>
                        </ul>

                    </div>
                </div>
                <div class="footer__item footer__map">
                    <div class="footer__item-title">Мы на карте</div>
                    <div style="position:relative;overflow:hidden;">
                        <iframe src="https://yandex.ru/map-widget/v1/-/CCUAV-CPSB" width="100%" height="200" frameborder="0" allowfullscreen="true" style="position:relative;"></iframe>
                    </div>
                </div>
            </div>

        </div>
        </div>
        <div class="copyright">
            Доставка пиццы и суш "Печушка" 2020 © Все права защищены.
        </div>
    </footer>

    <script>

    </script>
    <script src="<?php print get_template_directory_uri(); ?>/js/script.js"></script>

<?php wp_footer(); ?>

</body>
</html>
