<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
        <? if (count($arResult["ITEMS"]) > 0): ?>
            <div class="container"> 
                <div id="slides"> 
                    <? foreach ($arResult["ITEMS"] as $arItem): ?>
                        <div><a class="img" href="<?= $arItem["DISPLAY_PROPERTIES"]["URL"]["VALUE"] ?>" style="background-image: url('<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>');"></a></div>
                        <? endforeach; ?>
                </div>
            </div>
        <? endif; ?>
