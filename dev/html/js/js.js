
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