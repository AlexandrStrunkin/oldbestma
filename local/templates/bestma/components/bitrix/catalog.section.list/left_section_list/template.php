<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?//arshow($arResult["SECTIONS"],true);
    /*
    echo "<pre>";
    print_r($arResult);
    echo "</pre>";
    // */
    /*
    * функции searchMainSection и searchLevel 
    * см. файл \bitrix\php_interface\functions.php
    * 
    */
    $getLev = intval($arResult["SECTION"]["DEPTH_LEVEL"]) + 1;
    $arMainSections = searchMainSection($arResult, $getLev);
    $arSections = &$arResult["SECTIONS"];
    //print_r($arMainSections);
?>
<? if (count($arMainSections) > 0): ?>
    <div class="block menu">
        <h6 class="name">КАТАЛОГ ТОВАРОВ:</h6>
        <ul class="">
            <li>
                <a href="/catalog/newproducts/" style="color: red;" class="main <? if ($trueActive): ?>active<? endif; ?>">НОВИНКИ</a>
            </li>
            <? foreach ($arMainSections as $item): ?>
                <? if ($arSections["$item"]["ELEMENT_CNT"]) {?>
                    <li>
                        <?
                            $temp = null;
                            $arLevels_0 = searchLevel($item, $arResult);
                            if ($APPLICATION->GetCurPage() === $arSections["$item"]["SECTION_PAGE_URL"]) {
                                $trueActive = TRUE;
                            } elseif (
                                $arLevels_0 !== null &&
                                is_array($arLevels_0) &&
                                (count($arLevels_0) > 0)) {
                                // print_r($arLevels_0); echo "test?";
                                foreach ($arLevels_0 as $itemLev_0) {
                                    if ($APPLICATION->GetCurPage() === $arSections["$itemLev_0"]["SECTION_PAGE_URL"]) {
                                        $trueActive = TRUE;
                                        $temp = $arSections["$itemLev_0"]["ID"];
                                        break;
                                    }
                                }
                            }
                        ?>
                        <a href="<?= $arSections["$item"]["SECTION_PAGE_URL"] ?>" class="main <? if ($trueActive): ?>active<? endif; ?>"><?= $arSections["$item"]["NAME"]; ?></a>
                        <ul <? if ($trueActive): ?>style="display: block;"<? endif; ?>>

                            <? $arLevels_0 = searchLevel($item, $arResult); ?>
                            <? if ($arLevels_0 !== null && is_array($arLevels_0) && (count($arLevels_0) > 0)): ?>
                                <? foreach ($arLevels_0 as $itemLev_0): ?>
                                    <?
                                        // $ar_res = CCatalogProduct::GetByID($arSections["$item"]["ID"]); 
                                        $arSelect = Array("ID", "NAME", "CATALOG_QUANTITY");
                                        $arFilter = array("IBLOCK_ID"=>$arSections["$itemLev_0"]["IBLOCK_ID"], "SECTION_ID" => $arSections["$itemLev_0"]["ID"], ">CATALOG_QUANTITY" => 0); 

                                        $arSubSect = array();
                                        $subSect = CIBlockSection::GetList(array(),array("IBLOCK_ID"=>$arSections["$item"]["IBLOCK_ID"],"SECTION_ID"=>$arSections["$itemLev_0"]["ID"]));
                                        while($arSubSecttion = $subSect->Fetch()) {
                                            $arSubSect[] = $arSubSecttion["ID"];  
                                        }   
                                        // arshow($arSubSect);
                                        if (count($arSubSect) > 0) {
                                            $arSubSect[] = $arSections["$item"]["ID"];
                                            $arFilter["SECTION_ID"] = $arSubSect;
                                        }

                                        $res = CIBlockElement::GetList(Array(), $arFilter, false, false , $arSelect); 
                                        while($arFields = $res->Fetch()) 
                                        { 
                                            $arSections["$itemLev_0"]["CATALOG_QUANTITY"] += $arFields["CATALOG_QUANTITY"];
                                            //arshow($arSections["$item"]["CATALOG_QUANTITY"]);
                                        } 
                                    ?>
                                    <? if ($arSections["$itemLev_0"]["CATALOG_QUANTITY"] > 0) {?>
                                    <li><a href="<?= $arSections["$itemLev_0"]["SECTION_PAGE_URL"] ?>" <? if ($temp == $arSections["$itemLev_0"]["ID"]): ?>style="text-decoration: underline;"<? endif; ?>><?= $arSections["$itemLev_0"]["NAME"]; ?></a></li>
                                    <?}?>
                                    <? endforeach; ?>
                                <? endif; ?>

                        </ul>
                    </li>
                    <?}?>
                <? unset($trueActive) ?>
                <? endforeach; ?>
            <?
                if ($APPLICATION->GetCurPage() === "/catalog/newproducts/") {
                    $trueActive = TRUE;
                }
            ?>
            <? unset($trueActive); ?>
        </ul>
    </div>
    <? endif; ?>
