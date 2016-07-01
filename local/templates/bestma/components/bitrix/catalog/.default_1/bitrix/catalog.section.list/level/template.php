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
//print_r($arMainSections);
?>

<div class="wrapp_category">
    <? if (count($arMainSections) > 0): ?>
        <div class="this">Все подкатегории:</div>
        <ul>
            <? foreach ($arMainSections as $item): ?>
                <li>
                    <a href="<?= $arSections["$item"]["SECTION_PAGE_URL"] ?>">
                        <span class="labeling">&nbsp;</span>
                        <span class="text"><?= $arSections["$item"]["NAME"]; ?></span>
                        <span class="number"><?= $arSections["$item"]["ELEMENT_CNT"] ?></span>
                    </a>
                </li>
            <? endforeach; ?>
        </ul>

    <? endif; ?>
</div>
