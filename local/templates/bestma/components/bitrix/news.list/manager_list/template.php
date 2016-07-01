<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if(!empty($arResult["ITEMS"])) { ?>
<? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
    <?= $arResult["NAV_STRING"] ?><br />
<? endif; ?>
<div class="block news">
	<div class="arh_news manage-list">
        <a style="text-decoration: none;">ОТДЕЛ РЕАЛИЗАЦИИ</a>
    </div>
    <ul>
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <li>
                <div class="head"></div>
                <div class="inf">
                    <h3 class="news_head">
                        <a style="text-decoration: none;"><? echo truncate_str($arItem["NAME"]); ?></a>
                    </h3>
                    <? if (!empty($arItem['PREVIEW_TEXT'])): ?>
						<div class="manager-list-preview-text">
							<?=$arItem['PREVIEW_TEXT'];?>
						</div>
                    <? endif; ?>
                </div>
                <div class="foot"></div>
            </li>
        <? endforeach; ?>
    </ul>
</div>
<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <br /><?= $arResult["NAV_STRING"] ?>
<? endif; ?>
<?}?>