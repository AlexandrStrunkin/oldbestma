<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог");
?> <?
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
    $view = "";
}
$_SESSION["view"] = $view;

function addFilterDream1($stringNameKey) {
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

addFilterDream1("MANUFACTURER");
?> 
<h1 class="name">НОВИНКИ</h1>
 
<div class="filter_category_wrapp">
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
</div>
 <?
if (isset($_REQUEST['ELEMENT_CNT'])) {
$ELEMENT_CNT = $_REQUEST['ELEMENT_CNT'];
} else {
$ELEMENT_CNT = 30;
}
?> 

 <?
  /*  $arSelect = Array("ID", "NAME", "created");
    $arFilter = Array("IBLOCK_ID"=>3, "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
    while($ob = $res->GetNextElement())
    {
         $arFields = $ob->GetFields();
        $t = mktime($arFields["created"]); # Выразили нужную вам дату в секундах
        $t += 1209600; # прибавить 30 дней (выраженные в секундах)
        $date_new = date('Y.m.d G:i:s', $t); # 10-Aug-2004
        arshow($date_new,true);
    } */
  $curr_date = mktime(date('d.m.Y G:i:s'));
  $date_create_date = $curr_date - 1209600;
  $arrFilter[">DATE_CREATE"] = date('d.m.Y G:i:s', $date_create_date);
?> 

<div> <?$APPLICATION->IncludeComponent(
	"svc:catalog.section", 
	"view", 
	array(
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "3",
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"ELEMENT_SORT_FIELD" => $sort,
		"ELEMENT_SORT_ORDER" => $sortOrder,
		"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
		"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
		"FILTER_NAME" => "arrFilter",
		"INCLUDE_SUBSECTIONS" => "Y",
		"SHOW_ALL_WO_SECTION" => "Y",
		"SECTION_URL" => "",
		"DETAIL_URL" => "#SECTION_CODE#/#ELEMENT_CODE#/",
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
		"PAGE_ELEMENT_COUNT" => $ELEMENT_CNT,
		"LINE_ELEMENT_COUNT" => "9",
		"PROPERTY_CODE" => array(
			0 => "ARTICLE",
			1 => "CML2_ARTICLE",
			2 => "CML2_SIMILAR_GOODS",
			3 => "CML2_TRAITS",
			4 => "CML2_ATTRIBUTES",
			5 => "",
		),
		"OFFERS_LIMIT" => "5",
		"PRICE_CODE" => array(
			0 => "PRICE_WHS_1",
			1 => "PRICE_WHS_2",
			2 => "PRICE_WHS_3",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"BASKET_URL" => "/cart/",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"USE_PRODUCT_QUANTITY" => "N",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRODUCT_PROPERTIES" => array(
		),
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
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
		"HIDE_NOT_AVAILABLE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"COMPONENT_TEMPLATE" => "view",
		"AJAX_OPTION_ADDITIONAL" => "undefined"
	),
	false
);?> </div>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>