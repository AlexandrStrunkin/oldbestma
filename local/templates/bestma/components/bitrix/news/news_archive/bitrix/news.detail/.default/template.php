<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? //echo "<pre>"; print_r($arResult["IBLOCK"]["ELEMENTS_NAME"]); echo "</pre>"; ?>
<div class="white_block">
    <div class="wrapp_tape">
        <div class="tape"></div>
        <div class="tape right"></div>
    </div>
    <div class="content_check">
        <div class="red">
            <div class="gray">
               <?= mb_strtoupper($arResult["IBLOCK"]["ELEMENTS_NAME"]); ?>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="wrapp_news">
        <div class="news_header">
        </div>
        <?$arWaterMark = Array(
            array(
                "name" => "watermark",
                "position" => "center", // Положение
                "size" => "real",
                "file" => $_SERVER["DOCUMENT_ROOT"].'/upload/watermark_bestma30.png', // Путь к картинке
            )
        );
        $arFileTmp = CFile::ResizeImageGet(
            $arResult["DETAIL_PICTURE"]["ID"],
            array("width" => 'auto', "height" => 'auto'),
            BX_RESIZE_IMAGE_EXACT,
            true,
            $arWaterMark
        );?>
        <div class="news_body">
            <div class="news">
                <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arResult["DETAIL_PICTURE"])): ?>
                    <img class="detail_img" alt="" src="<?=$arFileTmp["src"] /*$arResult["DETAIL_PICTURE"]["SRC"]*/ ?>" />
                <? endif ?>
                <? if ($arParams["DISPLAY_DATE"] != "N" && $arResult["DISPLAY_ACTIVE_FROM"]): ?>
                    <p class="date"><?= $arResult["DISPLAY_ACTIVE_FROM"] ?></p>
                <? endif; ?>
                <? if ($arParams["DISPLAY_NAME"] != "N" && $arResult["NAME"]): ?>
                    <h1><?= $arResult["NAME"] ?></h1>
                <? endif; ?>
                <? if (strlen($arResult["DETAIL_TEXT"]) > 0): ?>
                    <? echo $arResult["DETAIL_TEXT"]; ?>
                <? elseif (strlen($arResult["PREVIEW_TEXT"]) > 0): ?>
                    <? echo $arResult["PREVIEW_TEXT"]; ?>
                <? endif; ?>
            </div>
        </div>
        <div class="news_footer"></div>
    </div>




    <div class="news_archive_image"></div>
</div>
<?
if (array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y") {
    ?>
    <div class="news-detail-share">
        <noindex>
            <?
            $APPLICATION->IncludeComponent("bitrix:main.share", "", array(
                "HANDLERS" => $arParams["SHARE_HANDLERS"],
                "PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
                "PAGE_TITLE" => $arResult["~NAME"],
                "SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
                "SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
                "HIDE" => $arParams["SHARE_HIDE"],
                    ), $component, array("HIDE_ICONS" => "Y")
            );
            ?>
        </noindex>
    </div>
    <?
}
?>
