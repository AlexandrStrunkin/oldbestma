<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?><?
$ElementID = $APPLICATION->IncludeComponent(
        "bitrix:catalog.element", "", Array(
    "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
    "PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
    "META_KEYWORDS" => $arParams["DETAIL_META_KEYWORDS"],
    "META_DESCRIPTION" => $arParams["DETAIL_META_DESCRIPTION"],
    "BROWSER_TITLE" => $arParams["DETAIL_BROWSER_TITLE"],
    "BASKET_URL" => $arParams["BASKET_URL"],
    "ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
    "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
    "SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
    "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
    "PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
    "CACHE_TYPE" => $arParams["CACHE_TYPE"],
    "CACHE_TIME" => $arParams["CACHE_TIME"],
    "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
    "SET_TITLE" => $arParams["SET_TITLE"],
    "SET_STATUS_404" => $arParams["SET_STATUS_404"],
    "PRICE_CODE" => $arParams["PRICE_CODE"],
    "USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
    "SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
    "PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
    "PRICE_VAT_SHOW_VALUE" => $arParams["PRICE_VAT_SHOW_VALUE"],
    "USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
    "QUANTITY_FLOAT" => $arParams["QUANTITY_FLOAT"],
    "PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],
    "LINK_IBLOCK_TYPE" => $arParams["LINK_IBLOCK_TYPE"],
    "LINK_IBLOCK_ID" => $arParams["LINK_IBLOCK_ID"],
    "LINK_PROPERTY_SID" => $arParams["LINK_PROPERTY_SID"],
    "LINK_ELEMENTS_URL" => $arParams["LINK_ELEMENTS_URL"],
    "OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
    "OFFERS_FIELD_CODE" => $arParams["DETAIL_OFFERS_FIELD_CODE"],
    "OFFERS_PROPERTY_CODE" => $arParams["DETAIL_OFFERS_PROPERTY_CODE"],
    "OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
    "OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
    "OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
    "OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
    "ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
    "ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
    "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
    "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
    "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
    "DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["element"],
    'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
    'CURRENCY_ID' => $arParams['CURRENCY_ID'],
    'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
    'USE_ELEMENT_COUNTER' => $arParams['USE_ELEMENT_COUNTER'],
        ), $component
);
?>
<?
$APPLICATION->IncludeComponent(
        "bitrix:main.include", "", Array(
    "AREA_FILE_SHOW" => "file",
    "PATH" => SITE_TEMPLATE_PATH . "/include_documents/item/phones.php",
    "EDIT_TEMPLATE" => ""
        ), false
);
?>

<table class="header border">
    <tr>
        <td>&nbsp;</td>
        <td class="text">
            <div>ПОХОЖИЕ ПО ТИПУ АКСЕССУАРЫ</div>
        </td>
        <td>&nbsp;</td>
    </tr>
</table>
<? /*
<ul class="prod_tile">
    <li>
        <div class="name">
            <a href="#">Чехол Bunny Iphone5</a>
        </div>
        <div class="in_stock"></div>
        <a href="#" class="img" style="background-image: url('images/test_prod_top.png');"></a>
        <div class="inf">
            <div class="article">Art. 1234567890</div>
            <div class="prices">
                <div>
                    <span class="price">360р.</span>
                    <span>опт 1</span>
                </div>
                <div>
                    <span class="price">360р.</span>
                    <span>опт 2</span>
                </div>
                <div class="end">
                    <span class="price">360р.</span>
                    <span>опт 3</span>
                </div>
            </div>

            <div class="description"><a href="#">описание товара</a></div>
            <form method="post" action="">
                <input type="submit" value=""></input>
                <label>
                    <input name="number" type="text" value="1"></input>
                    <span>шт.</span> 

                </label>
            </form>
        </div>
    </li>
    <li>
        <div class="name">
            <a href="#">Чехол Bunny Iphone5</a>
        </div>
        <div class="in_stock"></div>
        <a href="#" class="img" style="background-image: url('images/test_prod_top.png');"></a>
        <div class="inf">
            <div class="article">Art. 1234567890</div>
            <div class="prices">
                <div>
                    <span class="price">360р.</span>
                    <span>опт 1</span>
                </div>
                <div>
                    <span class="price">360р.</span>
                    <span>опт 2</span>
                </div>
                <div class="end">
                    <span class="price">360р.</span>
                    <span>опт 3</span>
                </div>
            </div>

            <div class="description"><a href="#">описание товара</a></div>
            <form method="post" action="">
                <input type="submit" value=""></input>
                <label>
                    <input name="number" type="text" value="1"></input>
                    <span>шт.</span> 

                </label>
            </form>
        </div>
    </li>
    <li>
        <div class="name">
            <a href="#">Чехол Bunny Iphone5</a>
        </div>
        <div class="in_stock"></div>
        <a href="#" class="img" style="background-image: url('images/test_prod_top.png');"></a>
        <div class="inf">
            <div class="article">Art. 1234567890</div>
            <div class="prices">
                <div>
                    <span class="price">360р.</span>
                    <span>опт 1</span>
                </div>
                <div>
                    <span class="price">360р.</span>
                    <span>опт 2</span>
                </div>
                <div class="end">
                    <span class="price">360р.</span>
                    <span>опт 3</span>
                </div>
            </div>

            <div class="description"><a href="#">описание товара</a></div>
            <form method="post" action="">
                <input type="submit" value=""></input>
                <label>
                    <input name="number" type="text" value="1"></input>
                    <span>шт.</span> 

                </label>
            </form>
        </div>
    </li>
    <li>
        <div class="name">
            <a href="#">Чехол Bunny Iphone5</a>
        </div>
        <div class="in_stock"></div>
        <a href="#" class="img" style="background-image: url('images/test_prod_top.png');"></a>
        <div class="inf">
            <div class="article">Art. 1234567890</div>
            <div class="prices">
                <div>
                    <span class="price">360р.</span>
                    <span>опт 1</span>
                </div>
                <div>
                    <span class="price">360р.</span>
                    <span>опт 2</span>
                </div>
                <div class="end">
                    <span class="price">360р.</span>
                    <span>опт 3</span>
                </div>
            </div>

            <div class="description"><a href="#">описание товара</a></div>
            <form method="post" action="">
                <input type="submit" value=""></input>
                <label>
                    <input name="number" type="text" value="1"></input>
                    <span>шт.</span> 

                </label>
            </form>
        </div>
    </li>
    <li>
        <div class="name">
            <a href="#">Чехол Bunny Iphone5</a>
        </div>
        <div class="in_stock"></div>
        <a href="#" class="img" style="background-image: url('images/test_prod_top.png');"></a>
        <div class="inf">
            <div class="article">Art. 1234567890</div>
            <div class="prices">
                <div>
                    <span class="price">360р.</span>
                    <span>опт 1</span>
                </div>
                <div>
                    <span class="price">360р.</span>
                    <span>опт 2</span>
                </div>
                <div class="end">
                    <span class="price">360р.</span>
                    <span>опт 3</span>
                </div>
            </div>

            <div class="description"><a href="#">описание товара</a></div>
            <form method="post" action="">
                <input type="submit" value=""></input>
                <label>
                    <input name="number" type="text" value="1"></input>
                    <span>шт.</span> 

                </label>
            </form>
        </div>
    </li>
    <li>
        <div class="name">
            <a href="#">Чехол Bunny Iphone5</a>
        </div>
        <div class="in_stock"></div>
        <a href="#" class="img" style="background-image: url('images/test_prod_top.png');"></a>
        <div class="inf">
            <div class="article">Art. 1234567890</div>
            <div class="prices">
                <div>
                    <span class="price">360р.</span>
                    <span>опт 1</span>
                </div>
                <div>
                    <span class="price">360р.</span>
                    <span>опт 2</span>
                </div>
                <div class="end">
                    <span class="price">360р.</span>
                    <span>опт 3</span>
                </div>
            </div>

            <div class="description"><a href="#">описание товара</a></div>
            <form method="post" action="">
                <input type="submit" value=""></input>
                <label>
                    <input name="number" type="text" value="1"></input>
                    <span>шт.</span> 

                </label>
            </form>
        </div>
    </li>

</ul>
*/ ?>

<? if ($arParams["USE_REVIEW"] == "Y" && IsModuleInstalled("forum") && $ElementID): ?>
    <br />
    <?
    $APPLICATION->IncludeComponent(
            "bitrix:forum.topic.reviews", "", Array(
                "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "MESSAGES_PER_PAGE" => $arParams["MESSAGES_PER_PAGE"],
        "USE_CAPTCHA" => $arParams["USE_CAPTCHA"],
        "PATH_TO_SMILE" => $arParams["PATH_TO_SMILE"],
        "FORUM_ID" => $arParams["FORUM_ID"],
        "URL_TEMPLATES_READ" => $arParams["URL_TEMPLATES_READ"],
        "SHOW_LINK_TO_FORUM" => $arParams["SHOW_LINK_TO_FORUM"],
        "ELEMENT_ID" => $ElementID,
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "AJAX_POST" => $arParams["REVIEW_AJAX_POST"],
        "POST_FIRST_MESSAGE" => $arParams["POST_FIRST_MESSAGE"],
        "URL_TEMPLATES_DETAIL" => $arParams["POST_FIRST_MESSAGE"] === "Y" ? $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["element"] : "",
            ), $component
    );
    ?>
<? endif ?>
<? if ($arParams["USE_ALSO_BUY"] == "Y" && IsModuleInstalled("sale") && $ElementID): ?>
    <?
    $APPLICATION->IncludeComponent("bitrix:sale.recommended.products", ".default", array(
        "ID" => $ElementID,
        "MIN_BUYES" => $arParams["ALSO_BUY_MIN_BUYES"],
        "ELEMENT_COUNT" => $arParams["ALSO_BUY_ELEMENT_COUNT"],
        "LINE_ELEMENT_COUNT" => $arParams["ALSO_BUY_ELEMENT_COUNT"],
        "DETAIL_URL" => $arParams["DETAIL_URL"],
        "BASKET_URL" => $arParams["BASKET_URL"],
        "ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
        "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
        "SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "PRICE_CODE" => $arParams["PRICE_CODE"],
        "USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
        "SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
        "PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
        'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
        'CURRENCY_ID' => $arParams['CURRENCY_ID'],
        'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
            ), $component
    );
    ?>
<? endif ?>
<?// Вариант 2 
$section_name = str_replace('/catalog/','', $APPLICATION->GetCurPage());
$section_name = substr($section_name, 0, strpos($section_name, '/'));
$YourID = $ElementID;$res = CIBlockElement::GetList(array(), array("ID" => $YourID), false, false, array("SECTION_ID"));{   $res = CIBlockSection::GetList(array(), array("ID" => $arRes["SECTION_ID"]), false, array("CODE"));   if($arRes = $res->GetNext())   {        }}?>
<br />
 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section",
	"",
	Array(
		"TEMPLATE_THEME" => "blue",
		"ADD_PICT_PROP" => "-",
		"LABEL_PROP" => "-",
		"PRODUCT_SUBSCRIPTION" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "N",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "3",
		"SECTION_ID" => "",
		"SECTION_CODE" => $section_name,
		"SECTION_USER_FIELDS" => array(),
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FILTER_NAME" => "arrFilter",
		"INCLUDE_SUBSECTIONS" => "Y",
		"SHOW_ALL_WO_SECTION" => "N",
		"SECTION_URL" => "",
		"DETAIL_URL" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SET_META_KEYWORDS" => "Y",
		"META_KEYWORDS" => "-",
		"SET_META_DESCRIPTION" => "Y",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"ADD_SECTIONS_CHAIN" => "N",
		"DISPLAY_COMPARE" => "N",
		"SET_TITLE" => "Y",
		"SET_STATUS_404" => "N",
		"PAGE_ELEMENT_COUNT" => "0",
		"LINE_ELEMENT_COUNT" => "3",
		"PROPERTY_CODE" => array("ARTICLE","CML2_ARTICLE","SIMILAR"),
		"OFFERS_LIMIT" => "5",
		"PRICE_CODE" => array("PRICE_WHS_1", "PRICE_WHS_2", "PRICE_WHS_3"),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"BASKET_URL" => "/personal/basket.php",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"USE_PRODUCT_QUANTITY" => "N",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRODUCT_PROPERTIES" => array("ARTICLE","CML2_ARTICLE","SIMILAR"),
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_NOTES" => "",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"HIDE_NOT_AVAILABLE" => "N",
		"CONVERT_CURRENCY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N"
	)
);?> 
<br />


<? if ($arParams["USE_STORE"] == "Y" && IsModuleInstalled("catalog") && $ElementID): ?>
    <? /*
    $APPLICATION->IncludeComponent("bitrix:catalog.store.amount", ".default", array(
        "PER_PAGE" => "10",
        "USE_STORE_PHONE" => $arParams["USE_STORE_PHONE"],
        "SCHEDULE" => $arParams["USE_STORE_SCHEDULE"],
        "USE_MIN_AMOUNT" => $arParams["USE_MIN_AMOUNT"],
        "MIN_AMOUNT" => $arParams["MIN_AMOUNT"],
        "ELEMENT_ID" => $ElementID,
        "STORE_PATH" => $arParams["STORE_PATH"],
        "MAIN_TITLE" => $arParams["MAIN_TITLE"],
            ), $component
    );*/
    ?>
    <?
endif?>