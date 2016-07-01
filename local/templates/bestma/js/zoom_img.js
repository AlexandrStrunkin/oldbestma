$(document).ready(function() {
    var timeout;
    //var zoomWidth = 35;
    //var timeAnimate = 200;
    var timeTimeout = 300;
    var contain = "table.items_list tbody td.first";
    var contain1 = "table.cart_table td.forZoom";
    zoomImg(contain, 100);
    zoomImg(contain1, 100);

    function zoomImg(contain, zoomWidth, timeAnimate, timeTimeout) {

        zoomWidth = (zoomWidth === undefined) ? 35 : zoomWidth;
        timeAnimate = (timeAnimate === undefined) ? 200 : timeAnimate;
        timeTimeout = (timeTimeout === undefined) ? 300 : timeTimeout;

        $(contain).hover(function() {
            var img = $(this).children().children().children('img');
            if (!($(this).children("div.w_zoom_img").attr("style"))) {
                var tempW = $(img).width();
                var tempH = $(img).height();
            }
            else {
                var tempW = $(this).children("div.w_zoom_img").width();
                var tempH = $(this).children("div.w_zoom_img").height();
            }
            var styleStr = "width:" + tempW + "px;" + "max-width: none; max-height: none;";
            $(this).children("div.w_zoom_img").children().addClass("bgWhite");
            $(this).children("div.w_zoom_img").height(tempH);
            $(this).children("div.w_zoom_img").width(tempW);
            $(img).attr("style", styleStr);
            timeout = setTimeout(function() {
                $(img).parent().addClass("border");
                $(img).parent().css("position", "absolute");
                $(img).animate({
                    width: zoomWidth,
                    'margin-top': 7,
                    'margin-right': 9,
                    'margin-bottom': 10,
                    'margin-left': 10
                }, timeAnimate);

                $(img).parent().animate({
                    left: 25,
                    top: -18
                }, timeAnimate);

            }, timeTimeout);

        },
                function() {
                    var saveSizeW = $(this).children("div.w_zoom_img").width();
                    var img = $(this).children().children().children('img');
                    $(img).parent().removeClass("border");
                    $(img).stop(true, true).animate({
                        width: saveSizeW,
                        margin: 0
                    }, timeAnimate);
                    $(img).parent().animate({
                        left: 0,
                        top: 0
                    }, timeAnimate);
                    clearTimeout(timeout);
                });
    }

});