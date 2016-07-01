<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="search-page">
    <div class="search_form">
        <form action="" method="get" class="search">
            <?
            if ($arParams["USE_SUGGEST"] === "Y"):
                if (strlen($arResult["REQUEST"]["~QUERY"]) && is_object($arResult["NAV_RESULT"])) {
                    $arResult["FILTER_MD5"] = $arResult["NAV_RESULT"]->GetFilterMD5();
                    $obSearchSuggest = new CSearchSuggest($arResult["FILTER_MD5"], $arResult["REQUEST"]["~QUERY"]);
                    $obSearchSuggest->SetResultCount($arResult["NAV_RESULT"]->NavRecordCount);
                }
                ?>
                <?
                $APPLICATION->IncludeComponent(
                        "bitrix:search.suggest.input", "", array(
                    "NAME" => "q",
                    "VALUE" => $arResult["REQUEST"]["~QUERY"],
                    "INPUT_SIZE" => 40,
                    "DROPDOWN_SIZE" => 10,
                    "FILTER_MD5" => $arResult["FILTER_MD5"],
                        ), $component, array("HIDE_ICONS" => "Y")
                );
                ?>
            <? else: ?>
                <?$count_search=count($arResult["SEARCH"]);?>
                <div class="find_results">Найдено <?=$count_search;?> товар(ов/а) по слову : <?= $arResult["REQUEST"]["QUERY"] ?> </div>
<!--            <div class="w_input_field">-->


<!--                <input type="text" name="q" value="--><?//= $arResult["REQUEST"]["QUERY"] ?><!--" size="40" />-->
<!--            </div>-->
            <? endif; ?>
            <? if ($arParams["SHOW_WHERE"]): ?>
                &nbsp;<select style="display: none;" name="where">
                    <option value=""><?= GetMessage("SEARCH_ALL") ?></option>
                    <? foreach ($arResult["DROPDOWN"] as $key => $value): ?>
                        <option value="<?= $key ?>"<? if ($arResult["REQUEST"]["WHERE"] == $key) echo " selected" ?>><?= $value ?></option>
                    <? endforeach ?>
                </select>
            <? endif; ?>
<!--                <div class="w_search_submit"> --><?//= GetMessage("SEARCH_GO") ?><!-- <input type="submit" value="" /></div>-->
            <input type="hidden" name="how" value="<? echo $arResult["REQUEST"]["HOW"] == "d" ? "d" : "r" ?>" />
            <? if ($arParams["SHOW_WHEN"]): ?>
                <script>
                    var switch_search_params = function()
                    {
                        var sp = document.getElementById('search_params');
                        var flag;

                        if (sp.style.display == 'none')
                        {
                            flag = false;
                            sp.style.display = 'block'
                        }
                        else
                        {
                            flag = true;
                            sp.style.display = 'none';
                        }

                        var from = document.getElementsByName('from');
                        for (var i = 0; i < from.length; i++)
                            if (from[i].type.toLowerCase() == 'text')
                                from[i].disabled = flag

                        var to = document.getElementsByName('to');
                        for (var i = 0; i < to.length; i++)
                            if (to[i].type.toLowerCase() == 'text')
                                to[i].disabled = flag

                        return false;
                    }
                </script>
                <br /><a class="search-page-params" href="#" onclick="return switch_search_params()"><? echo GetMessage('CT_BSP_ADDITIONAL_PARAMS') ?></a>
                <div id="search_params" class="search-page-params" style="display:<? echo $arResult["REQUEST"]["FROM"] || $arResult["REQUEST"]["TO"] ? 'block' : 'none' ?>">
                    <?
                    $APPLICATION->IncludeComponent(
                            'bitrix:main.calendar', '', array(
                        'SHOW_INPUT' => 'Y',
                        'INPUT_NAME' => 'from',
                        'INPUT_VALUE' => $arResult["REQUEST"]["~FROM"],
                        'INPUT_NAME_FINISH' => 'to',
                        'INPUT_VALUE_FINISH' => $arResult["REQUEST"]["~TO"],
                        'INPUT_ADDITIONAL_ATTR' => 'size="10"',
                            ), null, array('HIDE_ICONS' => 'Y')
                    );
                    ?>
                </div>
                <? endif ?>
        </form>
        <div class="clear"></div>
    </div>
    <br />
    <?$APPLICATION->IncludeComponent("bitrix:catalog", "template_search", array(
	"IBLOCK_TYPE" => "catalog",
	"IBLOCK_ID" => "3",
	"HIDE_NOT_AVAILABLE" => "N",
	"BASKET_URL" => "/cart/",
	"ACTION_VARIABLE" => "action",
	"PRODUCT_ID_VARIABLE" => "id",
	"SECTION_ID_VARIABLE" => "SECTION_ID",
	"PRODUCT_QUANTITY_VARIABLE" => "quantity",
	"PRODUCT_PROPS_VARIABLE" => "prop",
	"SEF_MODE" => "Y",
	"SEF_FOLDER" => "/catalog/",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "N",
	"SET_TITLE" => "Y",
	"SET_STATUS_404" => "N",
	"USE_ELEMENT_COUNTER" => "Y",
	"USE_FILTER" => "N",
	"USE_REVIEW" => "N",
	"USE_COMPARE" => "N",
	"PRICE_CODE" => array(
		0 => "PRICE_WHS_1",
		1 => "PRICE_WHS_2",
		2 => "PRICE_WHS_3",
	),
	"USE_PRICE_COUNT" => "N",
	"SHOW_PRICE_COUNT" => "1",
	"PRICE_VAT_INCLUDE" => "Y",
	"PRICE_VAT_SHOW_VALUE" => "N",
	"PRODUCT_PROPERTIES" => array(
	),
	"USE_PRODUCT_QUANTITY" => "Y",
	"CONVERT_CURRENCY" => "N",
	"QUANTITY_FLOAT" => "N",
	"SHOW_TOP_ELEMENTS" => "N",
	"SECTION_COUNT_ELEMENTS" => "Y",
	"SECTION_TOP_DEPTH" => "3",
	"PAGE_ELEMENT_COUNT" => "100500",
	"LINE_ELEMENT_COUNT" => "3",
	"ELEMENT_SORT_FIELD" => "name",
	"ELEMENT_SORT_ORDER" => "asc",
	"ELEMENT_SORT_FIELD2" => "id",
	"ELEMENT_SORT_ORDER2" => "asc",
	"LIST_PROPERTY_CODE" => array(
		0 => "ARTICLE",
		1 => "CML2_ARTICLE",
		2 => "SIMILAR",
		3 => "",
	),
	"INCLUDE_SUBSECTIONS" => "Y",
	"LIST_META_KEYWORDS" => "-",
	"LIST_META_DESCRIPTION" => "-",
	"LIST_BROWSER_TITLE" => "-",
	"DETAIL_PROPERTY_CODE" => array(
		0 => "CML2_ARTICLE",
		1 => "SIMILAR",
		2 => "MATERIAL",
		3 => "COLOR",
		4 => "",
	),
	"DETAIL_META_KEYWORDS" => "-",
	"DETAIL_META_DESCRIPTION" => "-",
	"DETAIL_BROWSER_TITLE" => "-",
	"LINK_IBLOCK_TYPE" => "catalog",
	"LINK_IBLOCK_ID" => "3",
	"LINK_PROPERTY_SID" => "SIMILAR",
	"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
	"USE_ALSO_BUY" => "Y",
	"ALSO_BUY_ELEMENT_COUNT" => "5",
	"ALSO_BUY_MIN_BUYES" => "2",
	"USE_STORE" => "Y",
	"USE_STORE_PHONE" => "N",
	"USE_STORE_SCHEDULE" => "N",
	"USE_MIN_AMOUNT" => "Y",
	"MIN_AMOUNT" => "10",
	"STORE_PATH" => "/store/#store_id#",
	"MAIN_TITLE" => "Наличие на складах",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "N",
	"PAGER_TITLE" => "Товары",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"AJAX_OPTION_ADDITIONAL" => "",
	"SEF_URL_TEMPLATES" => array(
		"sections" => "/catalog/",
		"section" => "#SECTION_CODE#/",
		"element" => "#SECTION_CODE#/#ELEMENT_CODE#/",
		"compare" => "compare/",
	)
	),
	false
);?>


</div>