/* share42.com | 10.11.2013 | (c) Dimox */
(function($) {
    $(function() {
        $('div.share42init').each(function(idx) {
            var el = $(this), u = el.attr('data-url'), t = el.attr('data-title'), i = el.attr('data-image'), d = el.attr('data-description'), f = el.attr('data-path'), z = el.attr("data-zero-counter");
            if (!u)
                u = location.href;
            if (!z)
                z = 0;
            if (!f) {
                function path(name) {
                    var sc = document.getElementsByTagName('script'), sr = new RegExp('^(.*/|)(' + name + ')([#?]|$)');
                    for (var i = 0, scL = sc.length; i < scL; i++) {
                        var m = String(sc[i].src).match(sr);
                        if (m) {
                            if (m[1].match(/^((https?|file)\:\/{2,}|\w:[\/\\])/))
                                return m[1];
                            if (m[1].indexOf("/") == 0)
                                return m[1];
                            b = document.getElementsByTagName('base');
                            if (b[0] && b[0].href)
                                return b[0].href + m[1];
                            else
                                return document.location.pathname.match(/(.*[\/\\])/)[0] + m[1];
                        }
                    }
                    return null;
                }
                f = path('share42.js');
            }
            if (!t)
                t = document.title;
            if (!d) {
                var meta = $('meta[name="description"]').attr('content');
                if (meta !== undefined)
                    d = meta;
                else
                    d = '';
            }
            var uStr = u;
            u = encodeURIComponent(u);
            t = encodeURIComponent(t);
            t = t.replace(/\'/g, '%27');
            i = encodeURIComponent(i);
            d = encodeURIComponent(d);
            d = d.replace(/\'/g, '%27');
            var fbQuery = 'u=' + u;
            if (i != 'null' && i != '')
                fbQuery = 's=100&p[url]=' + u + '&p[title]=' + t + '&p[summary]=' + d + '&p[images][0]=' + i;
            var vkImage = '';
            if (i != 'null' && i != '')
                vkImage = '&image=' + i;
            var s = new Array(
                    '"http://my.ya.ru/posts_add_link.xml?URL=' + u + '&title=' + t + '&body=' + d + '" data-count="ya" title="Поделиться в Я.ру"',
                    '"#" data-count="vk" onclick="window.open(\'http://vk.com/share.php?url=' + u + '&title=' + t + vkImage + '&description=' + d + '\', \'_blank\', \'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0\');return false" title="Поделиться В Контакте"',
                    '"#" data-count="fb" onclick="window.open(\'http://www.facebook.com/sharer.php?' + fbQuery + '\', \'_blank\', \'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0\');return false" title="Поделиться в Facebook"',
                    '"#" data-count="twi" onclick="window.open(\'https://twitter.com/intent/tweet?text=' + t + '&url=' + u + '\', \'_blank\', \'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0\');return false" title="Добавить в Twitter"',
                    '"#" data-count="odkl" onclick="window.open(\'http://www.odnoklassniki.ru/dk?st.cmd=addShare&st._surl=' + u + '&title=' + t + '\', \'_blank\', \'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0\');return false" title="Добавить в Одноклассники"',
                    '"http://share.yandex.ru/go.xml?service=moikrug&url=' + u + '&title=' + t + '&description=' + d + '" title="Поделиться в Мой Круг"',
                    '"http://www.livejournal.com/update.bml?event=' + u + '&subject=' + t + '" title="Опубликовать в LiveJournal"',
                    '"http://share.yandex.ru/go.xml?service=moikrug&url=' + u + '&title=' + t + '&description=' + d + '" title="Поделиться в Мой Круг"',
                    '"#" onclick="window.open(\'https://plus.google.com/share?url=' + u + '\', \'_blank\', \'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0\');return false" title="Поделиться в Google+"');
                    var l = '<li class="share42-item share"> <a rel="nofollow" href=\'#\' target="_blank"></a></li>';
                    for (j = 0; j < s.length; j++)
                l += '<li class="share42-item" style="background:url(' + f + 'icons.png) -' + (126 + (21 * j)) + 'px -3px no-repeat"> <a rel="nofollow" style="display:block; width: 16px; height: 16px;"  href=' + s[j] + ' target="_blank"></a></li>';
            el.html('<ul class="social" id="share42">' + l + '</ul>' + '<div class="share_url">'+ uStr + '</div><div class="clear"></div>');
        })
    })
})(jQuery);

$(document).ready(function() {
   $("div.share42init li.share").click(function() {
      var hidden = $(this).parent().parent().children("div.share_url").is(":visible");
      if(hidden) {
          $(this).parent().parent().children("div.share_url").slideUp(300);
      }
      else {
        $(this).parent().parent().children("div.share_url").slideDown(300);  
        //alert($(this).parent().parent().children("div.share_url").width())
      }
      return false;
   });
});