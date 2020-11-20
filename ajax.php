<?

add_action( 'wp_ajax_filter', 'ajax_filter' ); // wp_ajax_{ЗНАЧЕНИЕ ПАРАМЕТРА ACTION!!}
add_action( 'wp_ajax_nopriv_filter', 'ajax_filter' );  // wp_ajax_nopriv_{ЗНАЧЕНИЕ ACTION!!}
// первый хук для авторизованных, второй для не авторизованных пользователей

// Фнкция обработки
function ajax_filter(){
	$size = ($_POST['prop']) ? $_POST['prop'] : "10x10";
    global $post;
    $myposts = get_posts(array(
        'meta_query' => array(
            array(
                'key'     => 'product',
                'value'   => $size,
                'compare' => 'LIKE'
            )
        )
        ));


    foreach( $myposts as $post ){ setup_postdata($post);
  
        ?>

        <?php
					get_template_part( 'template-parts/content', get_post_type() );
		?>

        <?php
    }
    wp_reset_postdata();

    ?>


    <?	
	die; // даём понять, что обработчик закончил выполнение
}
	


?>