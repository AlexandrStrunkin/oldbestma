$(document).ready(function() {
    //удалялка товара
    var buttonDel = "table.cart_table a.del";
    var allSelectItems = "table.cart_table td input:checkbox";
    var buttonAllDel = "a.gray_button.image.clear_cart span";
    var nameFieldOrder = "BasketOrder";
    //var nameFieldRefresh = "BasketRefresh";
    var idFieldRefOrOrd = "#refresh_or_order";
    var buttonOrder = "a.gray_button.image.buy span";
    var buttonRef = "div.cart_wrapp div.price_excluding_delivery a.gray_button";

    $(buttonDel).click(function() {
        var checkbox = $(this).parent().children("input:checkbox");
        $(checkbox).prop({"checked": true});
        $(this).closest("form").submit();
        return false;
    });

    $(buttonAllDel).click(function() {
        var checkboxs = $(allSelectItems);
        $(checkboxs).prop({"checked": true});
        $(this).closest("form").submit();
        return false;
    });

    $(buttonOrder).click(function() {
        // alert("test knopki!");
        $(idFieldRefOrOrd).attr("name", nameFieldOrder);
        $(this).closest("form").submit();
        return false;
    });

    $(buttonRef).click(function() {
        $(this).closest("form").submit();
        return false;
    });
});

