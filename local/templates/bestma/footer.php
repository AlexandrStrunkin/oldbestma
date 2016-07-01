</div>

</div>
</div>

</div>
<div class="footer">
 <!--Ucall.im-->
    <script src="//ucall.im/callback/js/jquery.lib.js" type="text/javascript"></script>
    <a id="callback" data-token="56b35c17aa1d4e7bb79d0f3dfb8bae94" href="#ucall" style="display:none;">???????? ??????</a>
    <script src="//ucall.im/callback/js/callback.js" type="text/javascript"></script>
<!--Ucall.im--> 
    <div class="footer">
        <div class="liveinternet">
            <!--LiveInternet counter--><script type="text/javascript"><!--
            document.write("<a href='//www.liveinternet.ru/click' "+
            "target=_blank><img src='//counter.yadro.ru/hit?t52.6;r"+
            escape(document.referrer)+((typeof(screen)=="undefined")?"":
            ";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
            screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
            ";"+Math.random()+
            "' alt='' title='LiveInternet: показано число просмотров и"+
            " посетителей за 24 часа' "+
            "border='0' width='88' height='31'><\/a>")
            //--></script><!--/LiveInternet-->
        </div>
        <div class="block price">
            <?
            $APPLICATION->IncludeComponent(
                    "bitrix:main.include", "", Array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => SITE_TEMPLATE_PATH . "/include_documents/footer_block/download_price.php",
                "EDIT_TEMPLATE" => ""
                    ), false
            );
            ?>
        </div>
        <div class="block social">
            <?
            $APPLICATION->IncludeComponent(
                    "bitrix:main.include", "", Array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => SITE_TEMPLATE_PATH . "/include_documents/footer_block/social.php",
                "EDIT_TEMPLATE" => ""
                    ), false
            );
            ?>
        </div>
        <div class="block contacts">
            <?
            $APPLICATION->IncludeComponent(
                    "bitrix:main.include", "", Array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => SITE_TEMPLATE_PATH . "/include_documents/footer_block/info.php",
                "EDIT_TEMPLATE" => ""
                    ), false
            );
            ?>
        </div>

    </div>
</div>
</body>
</html>