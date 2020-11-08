function add_to_cart(product_id) {
//здесь, как и в PHP, значение количества по умолчанию 1
//пишем запрос к файлу backend
    $.post( "add_to_cart.php", {product_id: product_id , count: count}, update_cart());
}
function update_cart() {
    $.post( "update_cart.php", {}, on_success);
    function on_success(data)
    {
        $('#small_cart').html(data);
    }
}