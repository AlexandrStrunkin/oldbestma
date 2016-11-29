<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php $APPLICATION->ShowTitle() ?></title>
    <link href="<?= CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH . "/css/cssreset-min.css"); ?>" rel="stylesheet" type="text/css" />
    <?php $APPLICATION->ShowHead() ?>
    <link href="<?= CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH . "/css/news.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH . "/css/about.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH . "/css/terms.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH . "/css/contacts.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH . "/css/zoom_images.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH . "/css/contacts_form.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH . "/css/addCartWin.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH . "/css/SlidesJS/SlidesJS.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH . "/css/svwp_style.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH . "/css/lightbox.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH . "/css/scrollbar.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH . "/css/gradient.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH . "/css/normal.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH . "/fonts/myriad_pro/myriadpro-regular.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH . "/fonts/myriad_pro/myriadpro-bold.css"); ?>" rel="stylesheet" type="text/css" />
    <?php
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery-1.10.2.min.js");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/SlidesJS/jquery.slides.min.js");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.tinyscrollbar.min.js");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.timer.js");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.slideViewerPro.1.5.js");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/lightbox-2.6.min.js");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.elevateZoom-3.0.8.min.js");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/js.js");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/zoom_img.js");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/addToCart.js");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.maskedinput.min.js");
    ?>
</head>

<?
    // Определяем специальный фон //
    $background_image = "";
    $bi = func_current_background(16);
    if($bi) {
        $background_image = 'style="background-image: url('.$bi.');"';
    }
?>

<body <? echo $background_image; ?>>

<? //--ФормаФормаФормаФормаФормаФорма--?> 
<div id="blur_call_back"></div>
<div class="w_add_to_cart" id="windows_add_to_cart">
    <div class="wrapp_inf">
        <div class="image">
            <img class="class_img_item_0620e44395b9ad45e489d15b3615c972" src="" alt="" />
        </div>

        <div class="inf">
            <div class="red">
                Товар добавлен в корзину
            </div>
            <div class="name class_title_9364da414e1da2f6f7c9c67387176b1a">

            </div>


            <a href="/cart/" class="button_order"></a>
            <a href="#" class="continue">
                Продолжить покупки
            </a>
        </div>
    </div>
</div>
<div id="float_call_back_form" class="w_form float">
    <?$APPLICATION->IncludeComponent("bitrix:form", "bestma_popup_call_request", Array(
    "AJAX_MODE" => "N",    // Включить режим AJAX
        "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
        "AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
        "AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
        "AJAX_OPTION_STYLE" => "Y",    // Включить подгрузку стилей
        "CACHE_TIME" => "3600",    // Время кеширования (сек.)
        "CACHE_TYPE" => "A",    // Тип кеширования
        "CHAIN_ITEM_LINK" => "",    // Ссылка на дополнительном пункте в навигационной цепочке
        "CHAIN_ITEM_TEXT" => "",    // Название дополнительного пункта в навигационной цепочке
        "COMPOSITE_FRAME_MODE" => "A",    // Голосование шаблона компонента по умолчанию
        "COMPOSITE_FRAME_TYPE" => "AUTO",    // Содержимое компонента
        "EDIT_ADDITIONAL" => "N",    // Выводить на редактирование дополнительные поля
        "EDIT_STATUS" => "Y",    // Выводить форму смены статуса
        "IGNORE_CUSTOM_TEMPLATE" => "N",    // Игнорировать свой шаблон
        "NOT_SHOW_FILTER" => array(    // Коды полей, которые нельзя показывать в фильтре
            0 => "",
            1 => "",
        ),
        "NOT_SHOW_TABLE" => array(    // Коды полей, которые нельзя показывать в таблице
            0 => "",
            1 => "",
        ),
        "RESULT_ID" => $_REQUEST[RESULT_ID],    // ID результата
        "SEF_MODE" => "N",    // Включить поддержку ЧПУ
        "SHOW_ADDITIONAL" => "N",    // Показать дополнительные поля веб-формы
        "SHOW_ANSWER_VALUE" => "N",    // Показать значение параметра ANSWER_VALUE
        "SHOW_EDIT_PAGE" => "N",    // Показывать страницу редактирования результата
        "SHOW_LIST_PAGE" => "N",    // Показывать страницу со списком результатов
        "SHOW_STATUS" => "Y",    // Показать текущий статус результата
        "SHOW_VIEW_PAGE" => "N",    // Показывать страницу просмотра результата
        "START_PAGE" => "new",    // Начальная страница
        "SUCCESS_URL" => "/callback/index.php",    // Страница с сообщением об успешной отправке
        "USE_EXTENDED_ERRORS" => "N",    // Использовать расширенный вывод сообщений об ошибках
        "WEB_FORM_ID" => "1",    // ID веб-формы
        "COMPONENT_TEMPLATE" => "bestma_call_request",
        "VARIABLE_ALIASES" => array(
            "action" => "action",
        )
    ),
    false
);?>
</div>
<? //ФормаФормаФормаФормаФормаФорма?>
<div class="root">
<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
<div class="header">
    <div class="top">
        <div class="wrapp_price">
            <div class="price_block">
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
            <div class="other">
                <?php
                    $APPLICATION->IncludeComponent("bitrix:menu", "top_header", Array("ROOT_MENU_TYPE" => "top_header", // Тип меню для первого уровня
                        "MAX_LEVEL" => "1", // Уровень вложенности меню
                        "CHILD_MENU_TYPE" => "", // Тип меню для остальных уровней
                        "USE_EXT" => "N", // Подключать файлы с именами вида .тип_меню.menu_ext.php
                        "DELAY" => "N", // Откладывать выполнение шаблона меню
                        "ALLOW_MULTI_SELECT" => "N", // Разрешить несколько активных пунктов одновременно
                        "MENU_CACHE_TYPE" => "A", // Тип кеширования
                        "MENU_CACHE_TIME" => "3600", // Время кеширования (сек.)
                        "MENU_CACHE_USE_GROUPS" => "Y", // Учитывать права доступа
                        "MENU_CACHE_GET_VARS" => "", // Значимые переменные запроса
                        ), false
                    );
                ?> 
            </div>
        </div>

        <div class="shop_info">
            <span>
                <?
                    $APPLICATION->IncludeComponent(
                        "bitrix:main.include", "", Array("AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_TEMPLATE_PATH . "/include_documents/header_block/top_shop_inf.php",
                            "EDIT_TEMPLATE" => ""
                        ), false
                    );
                ?>
            </span>
        </div>

        <div class="search">
            <form class="search" action="/search/" method="get">
                <input type="text" class="header_search" value="<?=$_GET["q"];?>"
                    name="q" placeholder="Поиск по каталогу" />
                <input type="submit" value="OK" 
                    name="search_submit" />
            </form>
        </div>
    </div>
    <div class="middle">
        <a href="/" class="logo"></a>
        <div class="schedule">
            <div class="wrapp">
                <div class="working_time">
                    <?
                        $APPLICATION->IncludeComponent(
                            "bitrix:main.include", "", Array("AREA_FILE_SHOW" => "file",
                                "PATH" => SITE_TEMPLATE_PATH . "/include_documents/header_block/working_time.php",
                                "EDIT_TEMPLATE" => ""
                            ), false
                        );
                    ?>
                </div>
                <?
                    ///*
                    $APPLICATION->IncludeComponent("bitrix:menu", "working_days", Array("ROOT_MENU_TYPE" => "working_days", // Тип меню для первого уровня
                        "MAX_LEVEL" => "1", // Уровень вложенности меню
                        "CHILD_MENU_TYPE" => "", // Тип меню для остальных уровней
                        "USE_EXT" => "N", // Подключать файлы с именами вида .тип_меню.menu_ext.php
                        "DELAY" => "N", // Откладывать выполнение шаблона меню
                        "ALLOW_MULTI_SELECT" => "N", // Разрешить несколько активных пунктов одновременно
                        "MENU_CACHE_TYPE" => "A", // Тип кеширования
                        "MENU_CACHE_TIME" => "3600", // Время кеширования (сек.)
                        "MENU_CACHE_USE_GROUPS" => "Y", // Учитывать права доступа
                        "MENU_CACHE_GET_VARS" => "", // Значимые переменные запроса
                        ), false
                    ); //*/
                ?>

            </div>
        </div>
        <div class="cart">
            <?
                $APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", ".default", array(
                    "PATH_TO_BASKET" => "/cart/",
                    "PATH_TO_PERSONAL" => "",
                    "SHOW_PERSONAL_LINK" => "N"
                    ), false
                );
            ?>
            <div class="phone">
                <?
                    $APPLICATION->IncludeComponent(
                        "bitrix:main.include", "", Array("AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_TEMPLATE_PATH . "/include_documents/header_block/phone_first.php",
                            "EDIT_TEMPLATE" => ""
                        ), false
                    );
                ?>
            </div>
            <div class="phone">
                <?
                    $APPLICATION->IncludeComponent(
                        "bitrix:main.include", "", Array("AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_TEMPLATE_PATH . "/include_documents/header_block/phone_second.php",
                            "EDIT_TEMPLATE" => ""
                        ), false
                    );
                ?>
            </div>
        </div>
    </div>


    <ul class="menu">
        <li>
            <?
                ///*
                $APPLICATION->IncludeComponent("bitrix:menu", "main_simple_menu", Array("ROOT_MENU_TYPE" => "main_menu", // Тип меню для первого уровня
                    "MAX_LEVEL" => "1", // Уровень вложенности меню
                    "CHILD_MENU_TYPE" => "", // Тип меню для остальных уровней
                    "USE_EXT" => "N", // Подключать файлы с именами вида .тип_меню.menu_ext.php
                    "DELAY" => "N", // Откладывать выполнение шаблона меню
                    "ALLOW_MULTI_SELECT" => "N", // Разрешить несколько активных пунктов одновременно
                    "MENU_CACHE_TYPE" => "A", // Тип кеширования
                    "MENU_CACHE_TIME" => "3600", // Время кеширования (сек.)
                    "MENU_CACHE_USE_GROUPS" => "Y", // Учитывать права доступа
                    "MENU_CACHE_GET_VARS" => "", // Значимые переменные запроса
                    ), false
                ); //*/
            ?>

        </li>
        <li class="phone">
            <a href="/about/contacts/">Заказать обратный звонок</a>
        </li>
    </ul>

</div>

<div class="body">
<div class="body_wrapper">
<div class="sidebar">
    <?
        $APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"left_section_list", 
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "3",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_CODE" => "",
		"COUNT_ELEMENTS" => "Y",
		"TOP_DEPTH" => "4",
		"SECTION_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SECTION_URL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"COMPONENT_TEMPLATE" => "left_section_list",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);
    ?>
    <?
        $APPLICATION->IncludeComponent("bitrix:news.list", "left_news", array(
            "IBLOCK_TYPE" => "-",
            "IBLOCK_ID" => "2",
            "NEWS_COUNT" => "3",
            "SORT_BY1" => "ACTIVE_FROM",
            "SORT_ORDER1" => "DESC",
            "SORT_BY2" => "SORT",
            "SORT_ORDER2" => "ASC",
            "FILTER_NAME" => "",
            "FIELD_CODE" => array(
                0 => "",
                1 => "",
            ),
            "PROPERTY_CODE" => array(
                0 => "",
                1 => "",
            ),
            "CHECK_DATES" => "Y",
            "DETAIL_URL" => "",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "AJAX_OPTION_HISTORY" => "N",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "36000000",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "Y",
            "PREVIEW_TRUNCATE_LEN" => "",
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "SET_TITLE" => "N",
            "SET_STATUS_404" => "N",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "ADD_SECTIONS_CHAIN" => "N",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "INCLUDE_SUBSECTIONS" => "N",
            "DISPLAY_TOP_PAGER" => "N",
            "DISPLAY_BOTTOM_PAGER" => "N",
            "PAGER_TITLE" => "Новости",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => "",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "DISPLAY_DATE" => "N",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "N",
            "AJAX_OPTION_ADDITIONAL" => ""
            ), false
        );
    ?>
    <div class="manager-list">
        <?
            $APPLICATION->IncludeComponent("bitrix:news.list", "manager_list", array(
                "IBLOCK_TYPE" => "-",
                "IBLOCK_ID" => "17",
                "NEWS_COUNT" => "3",
                "SORT_BY1" => "ACTIVE_FROM",
                "SORT_ORDER1" => "DESC",
                "SORT_BY2" => "SORT",
                "SORT_ORDER2" => "ASC",
                "FILTER_NAME" => "",
                "FIELD_CODE" => array(
                    0 => "",
                    1 => "",
                ),
                "PROPERTY_CODE" => array(
                    0 => "",
                    1 => "",
                ),
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "AJAX_OPTION_HISTORY" => "N",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000000",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "PREVIEW_TRUNCATE_LEN" => "",
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "SET_TITLE" => "N",
                "SET_STATUS_404" => "N",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "INCLUDE_SUBSECTIONS" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "PAGER_TITLE" => "Новости",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => "",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "DISPLAY_DATE" => "N",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "N",
                "AJAX_OPTION_ADDITIONAL" => ""
                ), false
            );
        ?>
    </div>
    <div style="width: 100%; height: 150px; background: none repeat scroll 0% 0% rgb(255, 255, 255); border-radius: 15px; position:relative;margin-top:10px;">
        <form class="cont" method="post" action="/subscribe/" name="SIMPLE_FORM_2" enctype="multipart/form-data">
            <?= bitrix_sessid_post(); ?>
            <input type="hidden" value="2" name="WEB_FORM_ID" />
            <input type="hidden" value="Сохранить" name="web_form_submit" />
            <div style="position:absolute; left:10px; top:80px">Email: <input type="text" name="form_text_10" value="" /></div>
            <div style="position:absolute; left:10px; top:60px">Рассылка прайс-листа</div>
            <div style="width:100%; position:absolute; bottom:0px;background-image: url(/bitrix/templates/bestma/images/arh_news_bg.png); height:30px; text-align:center;border-radius: 0 0 10px 10px; padding-top:5px;">
                <input type="submit" value="ПОДПИСАТЬСЯ">
            </div>
        </form>


    </div>
                    </div>
                    


                    <div class="content">