(function($) {
    "use strict";
    $(function() {
        var basket = new Basket('.js-basket');

        var x = new Basket('.order-basket');

        function Basket(selector) {
            var basketBlock = $(selector),
                basketList = basketBlock.find('[data-list]'),
                totalPrice = basketBlock.find('[data-total-price]'),
                emptyTxt = basketBlock.find('[data-empty]');

            $('.buy_button').on('click', function() {
                var arrayBasket = JSON.parse(localStorage.getItem('basket'));
                if (arrayBasket === null) {
                    arrayBasket = [];
                }
                var item = $(this).closest('.item').data('item');

                var position_count = Number($(this).parent().parent().parent().find(".position__count").text());
                item.count = position_count;

                var idElement = item.id;
                var isExist = false;

                arrayBasket.forEach(function(elem) {
                    if (idElement === elem.id) {
                        isExist = true;
                    }
                });
                if (!isExist) {
                    arrayBasket.push(item);
                    localStorage.setItem('basket', JSON.stringify(arrayBasket));
                }
                updateBasket(arrayBasket);
                emptyTxt.hide();
                $('.basket__inf').text(arrayBasket.length + ' шт.');
                $('.basket__img').addClass('blink-2');
            });

            var addToBasket = function(elem) {
                var newElem = document.createElement('div');
                newElem.className = 'basketFly__item';
                newElem.dataset.id = elem.id;
                if (elem.count > 1) {
                    newElem.innerHTML = "<div class='basketFly__delete'><div class='icon close'></div></div><div class='basketFly__name'>" + elem.name + " </div><div class='basketFly__count'>(x" + elem.count + ")</div><div class='basketFly__price'>" + elem.price + "₽</div>";
                } else {
                    newElem.innerHTML = "<div class='basketFly__delete'><div class='icon close'></div></div><div class='basketFly__name'>" + elem.name + "</div><div class='basketFly__price'>" + elem.price + "₽</div>";
                }

                return newElem;
            };

            var updateBasket = function(elem) {
                var htmlBasket = [];
                var calcPrice = 0;
                for (var j = 0; j < elem.length; j++) {
                    htmlBasket.push(addToBasket(elem[j]));
                    if (elem[j].count > 1) {

                        for (var t = 0; t < elem[j].count; t++) {
                            calcPrice += Number(elem[j].price);
                        }
                    } else {
                        calcPrice += Number(elem[j].price);
                    }
                }
                basketList.html(htmlBasket);
                totalPrice.html(calcPrice);
            };

            basketBlock.on('click', '.basketFly__delete', function(event) {
                var arrayBasket = JSON.parse(localStorage.getItem('basket'));
                var idElement = Number($(this).closest('.basketFly__item').data('id'));
                var number;
                //   console.log(arrayBasket);
                for (var i = 0; i < arrayBasket.length; i++) {
                    if (Number(arrayBasket[i].id) == idElement) {
                        number = i;
                    }
                }
                // console.log("--удаляю--");
                if (number || number == 0) {
                    var res = arrayBasket.splice(number, 1);
                    //    console.log(res);
                } else {
                    console.log(number);
                }
                console.log("--удаляю--");
                if (arrayBasket.length == 0) {
                    $('.basket__inf').text("Корзина пустая");
                    $('.basket__img').removeClass('blink-2');
                    emptyTxt.show();
                } else {
                    $('.basket__inf').text(arrayBasket.length + ' шт.');
                }

                //   console.log("--Записал--");
                localStorage.setItem('basket', JSON.stringify(arrayBasket));
                //   console.log("--записал--");

                updateBasket(arrayBasket);
            });

            var init = function() {
                var arrayBasket = JSON.parse(localStorage.getItem('basket'));
                if (arrayBasket === null) {
                    arrayBasket = [];
                }
                updateBasket(arrayBasket);

                if (arrayBasket.length > 0) {
                    emptyTxt.hide();
                    $('.basket__inf').text(arrayBasket.length + ' шт.');
                    $('.basket__img').addClass('blink-2');
                }
            };
            init();
        }

        $('.ok').on('click', function() {
            var arrayBasket = localStorage.getItem('basket');

            $.ajax({
                //url: '/wp-admin/admin-ajax.php',
                url: 'send.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    'localStorage': arrayBasket
                },
                beforeSend: function(xhr) {
                    console.log('Думаю');
                },
                success: function(data) {
                    console.log('все ок отправил');
                },
                error: function(jqXHR, exception) {
                    console.log('Произошла ошибка. Сообщите нам: info@7labels.ru');
                }
            });
            return false;
        });

        $('.product__item-count .position__plus').on('click', function(item) {
            var val_position = $(this).parent().parent().find('div.position__count');
            var value = Number(val_position.text()) + 1;
            console.log(value);
            val_position.text(value);
        });
        $('.product__item-count .position__minus').on('click', function(item) {
            var val_position = $(this).parent().parent().find('div.position__count');
            var value = Number(val_position.text());
            if (value > 1) {
                val_position.text(value - 1);
            } else {
                val_position.text(value);
            }

        });
        $('.basket').mouseenter(function(event) {
            $('.basketFly').show();
            event.preventDefault(); // Будут отменен переход по ссылке
            event.stopPropagation(); // Отмена всплытия
        });
        $('.basketFly').mouseleave(function(event) {
            $('.basketFly').hide();
            event.preventDefault(); // Будут отменен переход по ссылке
            event.stopPropagation(); // Отмена всплытия
        });

        $('div.filter__item').on('click', function() {
            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                type: 'POST',
                data: 'action=filter&prop=' + $(this).data("product") + '', // можно также передать в виде объекта
                beforeSend: function(xhr) {
                    jQuery.event.trigger("ajaxStart");
                },
                success: function(data) {
                    $('div.filter').html(data);
                    // res.container.html(data);
                    jQuery.event.trigger("ajaxStop");

                },
                error: function(jqXHR, exception) {
                    console.log('Err');
                }
            });

            return false;

        });

        // прелоадер 
        $(document).ajaxStop(function() {
            console.debug("ajaxStop");
            $(".loader-container ").fadeOut();
        });
        $(document).ajaxStart(function() {
            console.debug("ajaxStart");
            $(".loader-container").fadeIn();
        });

        var res = {
            loader: $('<div />', { class: 'loader-container' }),
            container: $('.container_ajax')
        }


    });
})(jQuery);