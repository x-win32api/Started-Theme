<section class="filter">
        <div class="container">
        <div class="filter__title">
                    Я хочу:
        </div>
        <div class="filter__items">
        <?php
        $allProduct = get_field_object ('product')['choices'];
        foreach($allProduct as $key):
        ?>

        <div class="filter__item" data-product='<? print $key ;?>'><? print ucfirst($key) ;?></div>

        <?endforeach;?>

            </div>
        </div>
    </section>

