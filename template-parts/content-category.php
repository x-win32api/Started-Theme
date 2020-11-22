<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Started
 */

?>

				<div class="product__item item" data-item='{"name": "<?php print get_the_title(); ?>","price": "<?php print get_field( "price" ); ?>", "id": <?php the_ID(); ?>, "count": "1"}'>
                    <div class="product__item-img">
						
					<?
					 $image_id = get_post_thumbnail_id(get_the_ID());
					 $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
					 ?>
					<img src="<?php print get_the_post_thumbnail_url(); ?>" alt="<?php print $image_alt; ?>" width="500" height="299">
					 
                    </div>
 
                        <div class="product__item-title"><a href="<? print get_permalink(); ?>"><?php print get_the_title(); ?></a></div>

                         <?
                         $content = get_the_content(); 
                         if($content): ?>
                            <div class="product__item-desk">
                                <?php print $content; ?>
                            </div>
                         <? endif;?>

						<?php
						$posttags = get_field('product');
                        if( $posttags ) : ?>
                        <div class="product__item-desk">
                        Ингридиенты: 
                        <?php
							for($i=0;$i<count($posttags);$i++){
								echo mb_strtolower($posttags[$i]);
								if($i<count($posttags)-1){ echo ', '; } else { echo '.';}
                            }
                        ?>
                        </div>
                        <?php endif; ?>

                    <div class="product__item-prop">
                        <? $massa = get_field( "massa" ); if($massa) : ?>
                        <div class="propBlock">Вес <?php print get_field( "massa" ); ?></div>
                        <? endif; ?>
                        <? $diametr = get_field( "diametr" ); if($diametr) : ?>
                        <div class="propBlock">⌀ <?php print get_field( "diametr" ); ?></div>
                        <? endif; ?>
                    </div>
                  
                    <div class="product__item-count">
                        <div class="countMinus position__minus"></div>
                        <div class="countProduct position__count">1</div>
                        <div class="countPlus position__plus">+</div>
                    </div>

                    <div class="buy__group">
                        <div class="product__item-price">
                      
                            <?php print get_field( "price" ); ?> ₽

                        </div>
                        <div class="product__item-buy">
                            <button class="buy_button">В корзину +</button>     
						</div>
					</div>
					<?php edit_post_link('Редактировать товар', '<div class="edit__post buy_button" style="padding-top:20px;text-align:center;">', '</div>'); ?>
                </div>



