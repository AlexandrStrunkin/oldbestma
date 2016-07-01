<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?
    /*
    * функции searchMainSection и searchLevel 
    * см. файл \bitrix\php_interface\functions.php
    * 
    */
    $arMainSections = searchMainSection($arResult);
    $arSections = &$arResult["SECTIONS"];
    //echo "<pre>"; print_r($arSections); echo "</pre>";
?>
<ul class="catalog_category">
    <? foreach ($arMainSections as $key => $item): ?>
        <li <? if($key === 0): ?>class="active"<?endif;?>>
            <div class="content_check">
                <div class="red">
                    <div class="gray">
                        <?= $arSections["$item"]["NAME"]; ?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <ul class="wrapp_level" <? if($key === 0): ?>style="display: block"<?endif;?>>
                <? $arLevels_0 = searchLevel($item, $arResult); ?>
                <?//arshow($arLevels_0)?>
                <? if ($arLevels_0 !== null && is_array($arLevels_0) && (count($arLevels_0) > 0)): ?>
                    <? foreach ($arLevels_0 as $itemLev_0): ?>
                        <? if($arSections["$itemLev_0"]["ELEMENT_CNT"]){?>
                            <li>
                                <a class="level" href="<?= $arSections["$itemLev_0"]["SECTION_PAGE_URL"] ?>">

                                    <span>
                                        <span class="labeling">&nbsp;</span>
                                        <span class="text"><?= $arSections["$itemLev_0"]["NAME"]; ?></span>
                                        <span class="numb"><?= $arSections["$itemLev_0"]["ELEMENT_CNT"] ?></span>
                                    </span>

                                </a>
                                <ul class="level">
                                    <? $arLevels_1 = searchLevel($itemLev_0, $arResult); ?>
                                    <?// print_r($itemLev_0); ?>
                                    <? if($arLevels_1 !== null && is_array($arLevels_0) && (count($arLevels_0) > 0)): ?>
                                        <? foreach ($arLevels_1 as $itemLev_1): ?>
                                            <li><a href="<?= $arSections["$itemLev_1"]["SECTION_PAGE_URL"] ?>"><?= $arSections["$itemLev_1"]["NAME"]; ?> (<?= $arSections["$itemLev_1"]["ELEMENT_CNT"] ?>)</a></li>
                                            <? endforeach ?>
                                        <? endif; ?>
                                </ul>
                            </li>
                            <?}?>
                        <? endforeach; ?>
                    <? endif; ?>
            </ul>
        </li>
        <? endforeach ?>
</ul>


