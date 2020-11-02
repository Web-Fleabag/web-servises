<?php

$_SESSION['products']=array(
'идентификатор_товара_1'=>array('cost'=>'цена_товара_1', 'count'=>'количество_товара_1_в_корзине'),
'идентификатор_товара_2'=>array('cost'=>'цена_товара_1', 'count'=>'количество_товара_2_в_корзине') );
$db = mysqli_connect('localhost', 'root', '', 'collection');
/**
 * параметры:
 * $product_id – идентификатор товара
 * $count – количество добавляемого товара, по умолчанию 1,
 */
function add_to_cart($product_id, $count=1) {
    //проверяем,  не был ли добавлен товар в корзину ранее:
    if (!empty($_SESSION['products'][$product_id]))  {
        //увеличиваем  количество на единицу, если товар уже добавлен:
        $_SESSION['products'][$product_id]['count']++;
    }
    else {
        //создаем  пустой массив, на всякий случай, можно и без него.
        $_SESSION['products'][$product_id]=array();
        //извлекаем  цену товара из базы данных:
        $q="SELECT price FROM collection WHERE id='$product_id'";
    //разбиваем  результат запроса в массив:
    $add_product=mysql_fetch_assoc(mysql_query($q));
    //добавляем товар в корзину:
    $_SESSION['products'][$product_id]['cost']=$add_product['price'];
    $_SESSION['products'][$product_id]['count']=$count;
  }
    /*
    вызываем  функции для подсчета стоимости корзины и количества товаров.
    здесь  я опять внесу изменение, будем считать не количество товаров в корзине,
    а  количество самих товаров, т.е. если в корзине 5 единиц товара 1, и 2 – товара  2,
    то  товаров в корзине – 2, а не 7.
    И  еще один момент, лучше всего объединить в одну функцию подсчет суммы      корзины и количества товаров в ней: update_cart()
    */
    update_cart();
}

function update_cart() {
    //количество  товаров в корзине считаем как количество элементов в массиве
    //$_SESSION['products'] с помощью стандартной функции  PHP count():
    $_SESSION['products_incart']=count($_SESSION['products']);
    //сначала  обнулим стоимость:
    $_SESSION['cart_cost']=0;
    //стоимость  корзины (перемножаем цены на количество и складываем):
    foreach ($_SESSION['products'] as  $key=>$value) {
        $_SESSION['cart_cost']+=$_SESSION['products'][$key]['cost']*  $_SESSION['products'][$key]['count'];
    }
}
/**
 * принимает те же параметры, что и функция add_to_cart()
 */
  function update_product_count($product_id, $count) {
      $_SESSION['products'][$product_id]['count']=$count;
      //вызываем update_cart() чтобы пересчитать стоимость.
      update_cart();
  }

  function remove_from_cart($product_id) {
      unset($_SESSION['products'][$product_id]);
      update_cart();
  }
    ?>