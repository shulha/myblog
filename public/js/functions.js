$(document).ready(function(){
    $('.add_button').click(function(){
        // alert('ndj. vfnm');
        var button;
        var list;
        button=$(this); // объект кнопка
        $.ajax({
            url: '/adminzone/products/parameters',
            type: "GET",
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function($list){
                button.after($list);
            },
            error: function(msg){
                console.log(msg);
            }
        });
    });
});

$(document).on('click','.remove_button',function(){
    var block;
    if(confirm('Delete?'))
    {
        block=$(this).parent().parent().parent();
        block.remove();
    }
});

$(document).on('click','.add_parameter',function(){
    $('#myModal').modal();
});

$(document).on('click','.save_and_close',function(){
    var title;
    var unit;
    title=$('.parameter_modal').val();
    unit=$('.unit_modal').val();
    $.ajax({
        url: '/adminzone/products/parameters',
        method: 'POST',
        data: {title:title,unit:unit},
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(param)
        {
            $('select').append($('<option>', {value:param[0], text: param[1]+' ('+param[2]+')'}));//добавляем к существующему списку новый параметр
            $('#myModal').modal('hide');
        },
        error: function(msg){
            console.log(msg);
        }
    });
});

$(document).on('click','.add_images',function(){
    var all = $('input[name="preview[]"]');
    if(all.length==11) return; //ограничим количество картинок 1 превью и 10 дополнительных картинок.
    var field = $('input[name="preview[]"]:first').clone(); // клонируем поле preview
    $(this).after(field); //вставляем поле после кнопки
});

$(document).on('click','.del_image',function(){
    div=$(this).parent(); //div, который содержить и картинку и кнопку
    src=$(this).prev().attr('src'); //ссылка на кратинку
    item_id=$("#item_id").val(); //id товара

    $.ajax({
        url: '/adminzone/products/del_image',
        method: 'POST',
        data: {src:src,item_id:item_id},
        // headers: {
        //     'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        // },
        success: function(res)
        {
            div.remove(); //если все прошло без ошибок то удаляем div
        },
        error: function(msg)
        {
            console.log(msg);// если ошибка, то можно посмотреть в консоле
        }
    });
});

$(document).on('click','.del_product',function() {
    id = parseInt($(this).attr('id'));
    confirm_var=confirm('Удалить продукт?');
    if (!confirm_var) return false;
    $.ajax({
        url:'/adminzone/products/'+id,
        method: 'DELETE',
        success: function(msg)
        {
            alert('Product "'+msg+'" destroy');
            window.location.reload();
        },
        error: function(msg)
        {
            console.log(msg);
        }
    });
});

$(document).on('click','.buy-btn',function(){
    item_id=parseInt($(this).attr('id')); //получаем id товара
// alert(item_id);
//     $.session.set('some key', item_id);
//     alert($.session.get('some key'));
//     alert(sessionStorage['user_id']);
//     price=parseInt($(this).parent().prev().children().html()); //получаем цену товара и преобразуем значение в число parseInt
//     img=$(this).parent().parent().parent().children('img').attr('src'); //получаем ссылку на изображение, что бы отразить в корзине
//     title=$(this).parent().parent().children('h3').html();
    //теперь нужно узнать есть ли в куках уже такой товар
    order=$.cookie('basket'); //получаем куки с именем basket
    !order ? order=[]: order=JSON.parse(order);
    if(order.length==0)
    {
        order.push({'item_id': item_id, 'amount':1});//добавляем объект к пустому массиву
    }
    else
    {
        flag=false; //флаг, который указывает, что такого товара в корзине нет
        for(var i=0; i<order.length; i++) //перебираем массив в поисках наличия товара в корзине
        {
            if(order[i].item_id==item_id)
            {
                order[i].amount=order[i].amount+1; //если товар уже в корзине, то добавляем +1 к количеству (amount)
                flag=true; //поднимаем флаг, что такой товар есть и с ним делать ничего не нужно
            }

        }

        if(!flag) //если флаг опущен, значит товара в корзине нет и его надо добавить.
        {
            order.push({'item_id': item_id, 'amount':1}); //добавляем к существующему массиву новый объект
        }
    }
    $.cookie('basket',JSON.stringify(order),{path: '/'}); // переделываем массив с объектами в строку и сохраняем в куки
    count_order(); //запускаем функция для отображения количества заказов, текст функции напишу ниже.
});

function count_order()
{
    order=$.cookie('basket'); //получаем куки
    order ? order=JSON.parse(order): order=[]; //если заказ есть, то куки переделываем в массив с объектами
    count=0; // количество товаров
    if(order.length>0)
    {
        for(var i=0; i<order.length; i++)
        {
            count=count+parseInt(order[i].amount);
        }
    }
    $('.count_order').html(count);// отображаем количество товаров корзине.
}
count_order();//запускаем функцию при загрузке страницы

$(document).on('change', '.total', function() {
    value=$(this).val(); //получаем введенное значение
    if(value.match(/[^0-9]/g) || value<=0)//проверяем, что введенно число, что оно не равно нулю и не отрицательное.
    {
        $(this).val('1'); //если условие выше не вополняется то значение равно 1
        value=1;
    }
    // price=$(this).parent().prev().html(); //получаем цену товара
    // $(this).parent().next().html(value*price); //пересчитываем общую цену за товар
    item_id=$(this).parent().parent().children().first().html(); //получаем id товара
    set_amount(item_id,value); //сохраняем новое количество товара в куки
    window.location.reload();
    insert_cost();
});

function set_amount(item_id, amount)
{
    order=JSON.parse($.cookie('basket')); //получаем куки и переделываем в массив с объектами

    for(var i=0;i<order.length; i++) //перебераем весь массив с объектами
    {
        if(order[i].item_id == item_id) //ищем нжный id
        {
            order[i].amount = amount; // устанавливаем количество товара
        }
    }
    $.cookie('basket',JSON.stringify(order)); // сохраняем все в куки
    count_order(); //не забываем обновлять количество товаров в корзине
}

$(document).on('click','.plus',function()
{
    current_val=$(this).prev().val();//получаем текущее значение количества товара
    $(this).prev().val(+current_val+1); //добавляем к текущему значению единицу
    $('.total').change(); //сообщаем, что значение изменилось
});

$(document).on('click','.minus',function()
{
    current_val=$(this).prev().prev().val();
    new_val=+current_val-1;
    if(new_val<=0)
    {
        new_val=1;
    }
    $(this).prev().prev().val(new_val);
    $('.total').change();
});

$(document).on('click','.del_order',function()
{
    string=$(this).parent().parent();// выбираем всю строку в таблице
    item_id=$(this).parent().parent().children().first().html();//получаем id товара
    string.remove();// удаляем строку
    order=JSON.parse($.cookie('basket'));//получаем массив с объектами из куки
    for(var i=0;i<order.length; i++)
    {
        if(order[i].item_id==item_id)
        {
            order.splice(i,1); //удаляем из массива объект
        }
    }
    $.cookie('basket',JSON.stringify(order));//сохраняем объект в куки
    count_order(); //обновляем корзину
    all_order=$('tr'); //получаем все строки таблицы
    if(all_order.length<=1) {location.reload()}; //если нет ни одного заказа, то перезагружаем страницу
});

function total_cost()
{
    order=JSON.parse($.cookie('basket'));
    total=0;
    for(var i=0;i<order.length; i++)
    {
        total=total+(order[i].amount*order[i].price);
    }
    return total;
}

function insert_cost()
{
    $('.total_cost').html(total_cost());
}

$(document).ready(function()
{
    $('.del_category').click(function()
    {
        parent=$(this).parent().parent();//получаем родителя нашего span. parent будет содержать объект tr (строку нашей таблицы)
        id=parent.children().first().html(); //id будет содержать id нашей категории, которое берется из первой ячейки строки
        confirm_var=confirm('Удалить категорию?');//запрашиваем подтверждение на удаление
        if (!confirm_var) return false;
        $.ajax({
            url:'/adminzone/categories/'+id, //url куда мы мы передаем delete запрос
            method: 'DELETE',
            // data: {'_token':"{{csrf_token()}}" }, //не забываем передавать токен, или будет ошибка.
            success: function(msg)
            {
                parent.remove(); // удаляем строчку tr из таблицы
                alert('Category "'+msg+'" destroy');
            },
            error: function(msg)
            {
                console.log(msg); // в консоле  отображаем информацию об ошибки, если они есть
            }
        });
    });
});

/*
function add_to_cart(product_id) {
    // alert(product_id);
    $.post( "/add_to_cart", {product_id: product_id}, update_cart);
    // alert('Товар добавлен в корзину');
}
function update_cart() {
    $.post( "/update_cart", {}, on_success);
    // alert('dfsfddsf');
    function on_success(data)
    {
        $('#small_cart').html(data);
    }
}
function remove_from_cart(product_id) {
    $.post( "/remove_from_cart", {product_id:product_id}, update_cart_interface);
}
function update_product_count(product_id, count) {
    $.post( "/update_product_count", {product_id:product_id, count:count}, update_cart_interface);
}
function update_cart_interface() {
    $.post( "/cart_interface", {}, on_success);
    function on_success(data)
    {
        $('#cart_interface').html(data);
    }
}
*/
