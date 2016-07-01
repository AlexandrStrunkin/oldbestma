$(document).ready(function() {
    //выбор количества товара
    var numbCounter = ".numbCounter";
    var plus = ".plus";
    var minus = ".minus";
    var buttonPlus = numbCounter + " " + plus;
    var buttonMinus = numbCounter + " " + minus;

    $(buttonPlus).click(function() {
        var value = $(this).parent().children("input[type=text]").val();
        value++;
        $(this).parent().children("input[type=text]").val(value);//attr("value", value);
        return false;
    });

    $(buttonMinus).click(function() {
        var value = $(this).parent().children("input[type=text]").val();
        if (value > 1) {
            value--;
            $(this).parent().children("input[type=text]").val(value);//.attr("value", value);
        }
        return false;
    });
});

$(document).ready(function() {

    // alert($('#scrollbar1 ul.prod_tile').length);
    var option = $('#scrollbar1 ul.prod_tile');
    var $countProdTile = $('#scrollbar1 ul.prod_tile').length;
    var width = null;
    if ($countProdTile > 0) {
        for (var i = 0; i < $countProdTile; i++) {
            $w = $(option[i]).width();
            //    alert($w);
            width += $w;
        }

    }
    //  alert(width);
    $('#scrollbar1 .overview').width(width);
    $(document).scroll(function() {
        $('div.root div.top').css({
            // top: $(document).scrollTop()
            left: -1 * $(document).scrollLeft()//ie...
        });
    });

    $('div.sidebar div.block.menu ul li a.main').click(function() {
        $('div.sidebar div.block.menu ul li a.main').removeClass('active');

        $(this).parent().prevAll().children('ul').slideUp(600);
        $(this).parent().nextAll().children('ul').slideUp(600);

        showOrHide = $(this).parent().children('ul').is(":visible");
        if (showOrHide === true) {
            $(this).removeClass('active');
            $(this).parent().children('ul').slideUp(300);
            ///alert('tic');
        }
        else {
            $(this).addClass('active');
            $(this).parent().children('ul').slideDown(300);
        }
        return false;
    });
    
    $('ul.catalog_category div.content_check').click(function() {

        showOrHide = $(this).parent().children('ul').is(":visible");
        if (showOrHide === true) {
            $(this).parent().removeClass('active');
            $(this).parent().children('ul').slideUp(300);
            ///alert('tic');
        }
        else {
            $(this).parent().addClass('active');
            $(this).parent().children('ul').slideDown(300);
        }
        return false;
    });
});



$(function() {
    $('#slides').slidesjs({
        width: 651,
        height: 264,
        navigation: false,
        play: {
            active: true,
            // [boolean] Generate the play and stop buttons.
            // You cannot use your own buttons. Sorry.
            effect: "slide",
            // [string] Can be either "slide" or "fade".
            interval: 5000,
            // [number] Time spent on each slide in milliseconds.
            auto: true,
            // [boolean] Start playing the slideshow on load.
            swap: true,
            // [boolean] show/hide stop and play buttons
            pauseOnHover: false,
            // [boolean] pause a playing slideshow on hover
            restartDelay: 2500
                    // [number] restart delay on inactive slideshow
        }
    });
});

$(document).ready(function() {
    $('#scrollbar1').tinyscrollbar({axis: 'x'});
    $("div#my-folio-of-works").slideViewerPro();
});

//для формы обратной связи
$(document).ready(function() {
   var containCallBack = "div.content div.w_form";
   var bodyForm = "div.content div.w_form div.w_bg_callback";
   var buttonFirstCallBack = "div.content div.white_block div.w_form a.gray_button.callback";
   var buttonSwitch = "div.content div.w_form div.b_fields ul.switch li";
   var formCallBack = "div.content div.w_form form.cont"
   var submitButton = "div.content div.w_bg_callback div.hidden_shadow a.submit_callback";
   var submitBotton_1 = "div.content div.w_form a.submit";
   
   $(submitButton).click( function () {
       $(this).closest("form").submit();
        return false;
   });
   
   $(submitBotton_1).click( function () {
       $(this).closest("form").submit();
        return false;
   });
   
    $(buttonFirstCallBack).click( function () {
      $(this).hide();
      $(formCallBack).slideDown(350);
      return false;
   });
   
   $(buttonSwitch).click( function() {
      $(buttonSwitch).removeClass("active");
      $(this).addClass("active");
      var radio = $(this).children().children("input:radio");
      $(radio).prop({"checked": true});
   });
});