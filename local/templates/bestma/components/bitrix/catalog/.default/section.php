<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? //echo "<pre>"; print_r($arResult); echo "</pre>";           ?>
<?
///*  // Elements sort
$arAvailableSort = array(
    "name" => Array("name", "asc"),
    "price" => Array('CATALOG_PRICE_1', "asc"),
    "date" => Array('TIMESTAMP_X', "desc"),
);

//проверяем был ли запрос на сортировку
if (array_key_exists("sort", $_REQUEST) && array_key_exists(toLower($_REQUEST["sort"]), $arAvailableSort)) {
    //если был, запрос на обратную сортировку?
    if ((isset($_SESSION["sort"]) &&
            ($_SESSION["sort"] === toLower($_REQUEST["sort"])) &&
            isset($_SESSION["sortOrder"]))) {
        $sort = $arAvailableSort[ToLower($_SESSION["sort"])][0];
        $linkSortOrd = & $_SESSION["sortOrder"];
        switch ($linkSortOrd) {
            case "asc":
                $_SESSION["sortOrder"] = $sortOrder = "desc";
                break;
            case "desc":
                $_SESSION["sortOrder"] = $sortOrder = "asc";
                break;
            case "rand":
                $_SESSION["sortOrder"] = $sortOrder = "asc";
                break;
            default:
                $_SESSION["sortOrder"] = $sortOrder = "asc";
        }
    } else {
        //по умолчанию - установка
        $sort = $arAvailableSort[ToLower($_REQUEST["sort"])][0];
        $_SESSION["sort"] = ToLower($_REQUEST["sort"]);
        $_SESSION["sortOrder"] = $sortOrder = $arAvailableSort[ToLower($_REQUEST["sort"])][1];
    }
    //берем из сессии
} elseif (isset($_SESSION["sort"]) && array_key_exists(ToLower($_SESSION["sort"]), $arAvailableSort)) {
    $sort = $arAvailableSort[ToLower($_SESSION["sort"])][0];
    $sortOrder = $_SESSION["sortOrder"];
    //сортировка по умолчанию
} else {
    $sort = "name";
    $sortOrder = "asc";
}

$arViewPage = array(
    "tile" => "tile",
    "list" => ""
);


//выбиралка шаблона
if (array_key_exists("view", $_REQUEST) && array_key_exists(ToLower($_REQUEST["view"]), $arViewPage)) {
    $view = $arViewPage[ToLower($_REQUEST["view"])];
} elseif (isset($_SESSION["view"]) && array_key_exists(ToLower($_SESSION["view"]), $arViewPage)) {
    $view = $arViewPage[ToLower($_SESSION["view"])];
} else {
    $view = "tile";
}
//$_SESSION["view"] = $view;

function addFilterDream($stringNameKey) {
    global $prFilter;
    if (array_key_exists($stringNameKey, $_REQUEST)) {
        if ($_REQUEST[$stringNameKey] !== "unset") {
            $filter = (int) $_REQUEST[$stringNameKey];
            $_SESSION[$stringNameKey] = $filter;
        } else {
            unset($_SESSION[$stringNameKey]);
        }
    } elseif (isset($_SESSION[$stringNameKey])) {
        $filter = (int) $_SESSION[$stringNameKey];
    }

    if (isset($filter)) {
        if ($filter >= 0) {
            $prFilter["PROPERTY_" . toUpper($stringNameKey)] = $filter;
        }
    }
}

addFilterDream("MANUFACTURER");
?>
<div class="filter_category_wrapp">
    <h1 class="name"><? $APPLICATION->ShowTitle(false) ?></h1>
    <div class="filter_sort">
        <ul>
            <li>
                <span>Сортировать по:</span>
                <ul>
                    <li class="arrow"><a href="<?= $APPLICATION->GetCurPageParam("sort=" . "name", array("sort")); ?>">имени</a></li>
                    <li class="arrow"><a href="<?= $APPLICATION->GetCurPageParam("sort=" . "price", array("sort")); ?>">цене</a></li>
                    <li><a href="<?= $APPLICATION->GetCurPageParam("sort=" . "date", array("sort")); ?>">дате</a></li>
                </ul>
            </li>

            <li>
                <span>Вывод на экран:</span>
                <ul>
                    <li class="list">
                        <a href="<?= $APPLICATION->GetCurPageParam("view=" . "list", array("view")); ?>">списком</a>
                    </li>
                    <li class="tile">
                        <a href="<?= $APPLICATION->GetCurPageParam("view=" . "tile", array("view")); ?>">
                            картинками
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
<?
$APPLICATION->IncludeComponent(
        "bitrix:catalog.section.list", "level", Array(
    "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
    "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
    "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
    "CACHE_TYPE" => $arParams["CACHE_TYPE"],
    "CACHE_TIME" => $arParams["CACHE_TIME"],
    "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
    "COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
    "TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
    "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
        ), $component
);
?>

    <?
    $APPLICATION->IncludeComponent("dream:destination", ".default", array(
        "PROPERTY_NAME" => "CML2_MANUFACTURER",
        //"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"]
            ), false);
    ?>
</div>
    <? if ($arParams["USE_FILTER"] == "Y"): ?>
    <?
    $APPLICATION->IncludeComponent(
            "bitrix:catalog.filter", "", Array(
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "FILTER_NAME" => $arParams["FILTER_NAME"],
        "FIELD_CODE" => $arParams["FILTER_FIELD_CODE"],
        "PROPERTY_CODE" => $arParams["FILTER_PROPERTY_CODE"],
        "PRICE_CODE" => $arParams["FILTER_PRICE_CODE"],
        "OFFERS_FIELD_CODE" => $arParams["FILTER_OFFERS_FIELD_CODE"],
        "OFFERS_PROPERTY_CODE" => $arParams["FILTER_OFFERS_PROPERTY_CODE"],
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
            ), $component
    );
    ?>
    <br />
<? endif ?>
<? if ($arParams["USE_COMPARE"] == "Y"): ?>
    <?
    $APPLICATION->IncludeComponent(
            "bitrix:catalog.compare.list", "", Array(
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "NAME" => $arParams["COMPARE_NAME"],
        "DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["element"],
        "COMPARE_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["compare"],
            ), $component
    );
    ?>
    <br />
<? endif ?>
<?
$APPLICATION->IncludeComponent(
        "bitrix:catalog.section", "$view", Array(
    "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
    "ELEMENT_SORT_FIELD" => $sort, //["ELEMENT_SORT_FIELD"],
    "ELEMENT_SORT_ORDER" => $sortOrder, //$arParams["ELEMENT_SORT_ORDER"],
    "ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
    "ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
    "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
    "META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
    "META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
    "BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
    "INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
    "BASKET_URL" => $arParams["BASKET_URL"],
    "ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
    "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
    "SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
    "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
    "PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
    "FILTER_NAME" => "prFilter", //$arParams["FILTER_NAME"],
    "CACHE_TYPE" => $arParams["CACHE_TYPE"],
    "CACHE_TIME" => $arParams["CACHE_TIME"],
    "CACHE_FILTER" => $arParams["CACHE_FILTER"],
    "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
    "SET_TITLE" => $arParams["SET_TITLE"],
    "SET_STATUS_404" => $arParams["SET_STATUS_404"],
    "DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
    "PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
    "LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
    "PRICE_CODE" => $arParams["PRICE_CODE"],
    "USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
    "SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
    "PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
    "USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
    "QUANTITY_FLOAT" => $arParams["QUANTITY_FLOAT"],
    "PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],
    "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
    "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
    "PAGER_TITLE" => $arParams["PAGER_TITLE"],
    "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
    "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
    "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
    "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
    "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
    "OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
    "OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
    "OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
    "OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
    "OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
    "OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
    "OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
    "OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],
    "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
    "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
    "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
    "DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["element"],
    'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
    'CURRENCY_ID' => $arParams['CURRENCY_ID'],
    'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
        ), $component
);
?>