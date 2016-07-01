<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?//= $arResult["SECTION"]["DEPTH_LEVEL"] ?>
<? //echo "<pre>"; print_r($arResult); echo "</pre>";  ?>
<?
    /*
    * функции searchMainSection и searchLevel
    * см. файл \bitrix\php_interface\functions.php
    *
    */
    $getLev = intval($arResult["SECTION"]["DEPTH_LEVEL"]) + 1;
    $arMainSections = searchMainSection($arResult, $getLev);
    $arSections = &$arResult["SECTIONS"];
    //arshow($arResult["SECTIONS"]);
?>

<div class="wrapp_category">
    <? if (count($arMainSections) > 0): ?>
    <?$number_section = round(count($arMainSections) / 2) - 1?>
        <div class="this">Все подкатегории:</div>
        <ul style="float: left;">
            <? foreach ($arMainSections as $key => $item): ?>
                <?if($key <= $number_section){?>
                <?
                    // $ar_res = CCatalogProduct::GetByID($arSections["$item"]["ID"]);
                    $arSelect = Array("ID", "NAME", "CATALOG_QUANTITY");
                    $arFilter = array("IBLOCK_ID"=>$arSections["$item"]["IBLOCK_ID"], "SECTION_ID" => $arSections["$item"]["ID"], ">CATALOG_QUANTITY" => 0);

                    $arSubSect = array();
                    $subSect = CIBlockSection::GetList(array(),array("IBLOCK_ID"=>$arSections["$item"]["IBLOCK_ID"],"SECTION_ID"=>$arSections["$item"]["ID"]));
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
                        $arSections["$item"]["CATALOG_QUANTITY"] = $arFields["CATALOG_QUANTITY"];
                        if($arFields["CATALOG_QUANTITY"] > 0){
                            $arSections["$item"]["QUANTITY"] += 1;
                        }

                        //arshow($arSections["$item"]["QUANTITY"]);
                    }
                ?>
                <? if ($arSections["$item"]["CATALOG_QUANTITY"] > 0) {?>
                    <li>
                        <a href="<?= $arSections["$item"]["SECTION_PAGE_URL"] ?>">
                            <span class="labeling">&nbsp;</span>
                            <span class="text"><?= $arSections["$item"]["NAME"]; ?></span>
                            <span class="number"><?= $arSections["$item"]["QUANTITY"] ?></span>
                        </a>

                    </li>
                    <?}?>
                <?}?>
                <? endforeach; ?>
        </ul>
        <ul style="float: right;">
            <? foreach ($arMainSections as $key => $item): ?>
                <?if($key > $number_section){?>
                <?
                    // $ar_res = CCatalogProduct::GetByID($arSections["$item"]["ID"]);
                    $arSelect = Array("ID", "NAME", "CATALOG_QUANTITY");
                    $arFilter = array("IBLOCK_ID"=>$arSections["$item"]["IBLOCK_ID"], "SECTION_ID" => $arSections["$item"]["ID"], ">CATALOG_QUANTITY" => 0);

                    $arSubSect = array();
                    $subSect = CIBlockSection::GetList(array(),array("IBLOCK_ID"=>$arSections["$item"]["IBLOCK_ID"],"SECTION_ID"=>$arSections["$item"]["ID"]));
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
                        $arSections["$item"]["CATALOG_QUANTITY"] = $arFields["CATALOG_QUANTITY"];
                        if($arFields["CATALOG_QUANTITY"] > 0){
                            $arSections["$item"]["QUANTITY"] += 1;
                        }

                        //arshow($arSections["$item"]["QUANTITY"]);
                    }
                ?>
                <? if ($arSections["$item"]["CATALOG_QUANTITY"] > 0) {?>
                    <li>
                        <a href="<?= $arSections["$item"]["SECTION_PAGE_URL"] ?>">
                            <span class="labeling">&nbsp;</span>
                            <span class="text"><?= $arSections["$item"]["NAME"]; ?></span>
                            <span class="number"><?= $arSections["$item"]["QUANTITY"] ?></span>
                        </a>

                    </li>
                    <?}?>
                <?}?>
                <? endforeach; ?>
        </ul>
        <? endif; ?>
</div>
