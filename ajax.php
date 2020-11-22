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

    foreach( $myposts as $post ){ 
        setup_postdata($post);
		get_template_part( 'template-parts/content', 'category' );
    }

    wp_reset_postdata();
	die; // даём понять, что обработчик закончил выполнение
}

add_action( 'wp_ajax_order', 'ajax_order' ); // wp_ajax_{ЗНАЧЕНИЕ ПАРАМЕТРА ACTION!!}
add_action( 'wp_ajax_nopriv_order', 'ajax_order' );  // wp_ajax_nopriv_{ЗНАЧЕНИЕ ACTION!!}
function ajax_order(){ 

if(isset($_REQUEST['torpedo'])){
 //   print $_REQUEST['torpedo'];
   // print 'Ошибка error. <br>Ты спамер мой друг! Я тебя зафиксировал и заблокировал.';
    //exit;
}
if(isset($_POST['form'])&&isset($_POST['order'])){
$data = json_decode(stripslashes($_POST['order']));
//print $data[0]->price;
$price = 0;
$zakaz = '';
foreach($data as $item){
    $zakaz .= "$item->name: ($item->count)шт. {$item->price}руб.\n\r";
    $price += $item->price;
}
$zakaz .= "Общая стоимость: $price\n\r";

print $zakaz;
$str = urldecode($_POST['form']);
parse_str($str);
$res = "Имя $name \n\rТелефон: $tel\n\r Адрес доставки: \n\r";

$zakaz .= $res;
wp_mail( 'google-poogle@mail.ru', 'Заказ с сайта', $zakaz);
}
  
}
?>