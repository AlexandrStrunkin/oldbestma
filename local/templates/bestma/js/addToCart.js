function copyInpQuan(mainParent, copy, copyTo, minus, plus) {
    minus = (minus === undefined) ? ".minus" : minus;
    plus = (plus === undefined) ? ".plus" : plus;

    $(copy).keyup(function() {
        copyInp(this);
    });

    $(minus).click(function() {
        var obj = $(this).closest(mainParent).find(copy);
        copyInp(obj);
    });

    $(plus).click(function() {
        var obj = $(this).closest(mainParent).find(copy);
        copyInp(obj);
    });

    function copyInp(obj) {
        var value = $(obj).val();
        $(obj).closest(mainParent).find(copyTo).val(value);
    }
}



/*
 * item_button_buy - кнопка купить submit, т.е. пока только для формы.
 * item_contain - блок-родитель в котором содержится товар.
 * class_img - изображение товара которое в плавающее окно будет скопировано.
 * class_title - название товара которое будет скопировано в окно.
 * window_id - окно в которое будут копироваться изображение  и название товара,
 * должно содержать те же классы для изображения и названия соответственно.
 * window_close - закрыть окно.
 * Используется function showOrHideContain(contain, buttonShow, buttonClose, outsideHide, blur, delay)
 * которая валяется в файле js.js
 * Можно добавить соответствующие аргументы к описанной функции. 
 *   
 */
function changeWinItem(item_button_buy, item_contain, class_img, class_title, window_id, window_close) {

    $(item_button_buy).click(function() {
        var input = $(this).attr("type");
        var titleItem;
        var imgItemSrc;
        var form;
        var params;

        if (input === "submit") {
	    $(window_id + " " + class_img).attr("src", '');
            titleItem = $(this).parents(item_contain).find(class_title).text();
            imgItemSrc = $(this).parents(item_contain).find(class_img).attr("src");
	    //alert(imgItemSrc);
            $(window_id + " " + class_title).text(titleItem);
	    if (imgItemSrc) {
            $(window_id + " " + class_img).attr("src", imgItemSrc);
	    }
	    var form = $(this).closest("form").submit(false);
            var params = $(form).serialize();
            $.get("", params, onAjaxSuccess);
        }

        function onAjaxSuccess(data) {
            var newCartLine = $(data).find("#cart_line").html();
            $("#cart_line").html(newCartLine);
        }
        //return false;
    });
    showOrHideContain(window_id, item_button_buy, window_close, true);
}

$(document).ready(function() {
    var item_button_buy = ".button_buy_f97668b00ffded31ba0e36016cf2ad1f";
    var item_contain = ".prod_parent_block_8dfd71c72ba4339630bf25e7445cf49a";
    var class_img_item = ".class_img_item_0620e44395b9ad45e489d15b3615c972";
    var class_title_item = ".class_title_9364da414e1da2f6f7c9c67387176b1a";
    var window_id = "#windows_add_to_cart";
    var window_close = "#windows_add_to_cart .continue";
    changeWinItem(item_button_buy, item_contain, class_img_item, class_title_item, window_id, window_close);


    var trParent = "table.items_list tr";
    var copy = "input.quantity_221d2a4bfdae13dbd5aeff3b02adb8c1";
    var copyTo = "input[name='quantity']";


    copyInpQuan(trParent, copy, copyTo);
});

