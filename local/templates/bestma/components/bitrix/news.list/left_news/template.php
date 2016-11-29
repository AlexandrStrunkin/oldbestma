<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
    <?= $arResult["NAV_STRING"] ?><br />
<? endif; ?>
<div class="block news">
    <div class="check_news"></div>
    <ul>
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
                <?$arWaterMark = Array(
                    array(
                        "name" => "watermark",
                        "position" => "center", // Положение
                        "size" => "real",
                        "file" => $_SERVER["DOCUMENT_ROOT"].'/upload/watermark_bestma30.png', // Путь к картинке
                    )
                );
                $arFileTmp = CFile::ResizeImageGet(
                    $arItem["PREVIEW_PICTURE"]["ID"],
                    array("width" => 'auto', "height" => 'auto'),
                    BX_RESIZE_IMAGE_EXACT,
                    true,
                    $arWaterMark
                );?>
  
            <li>                                 
                <div class="head"></div>
                <div class="inf">
                    <h3 class="news_head">
                        <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><? echo truncate_str($arItem["NAME"]); ?></a>
                    </h3>
                    <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
                        <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="img"
                           title="Изменение условий доставки"
                           style="
                           background-image: url('<?=$arFileTmp["src"] /*$arItem["PREVIEW_PICTURE"]["SRC"]*/ ?>');
                           background-repeat: no-repeat;
                           background-position: center;
                           background-size: contain;">

                        </a>
                    <? endif; ?>
                </div>
                <div class="foot"></div>
            </li>
        <? endforeach; ?>
    </ul>
    <div class="arh_news">
        <a href="<?= str_replace("/", "",$arResult["LIST_PAGE_URL"]); ?>">АРХИВ НОВОСТЕЙ</a>
    </div>
</div>
<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <br /><?= $arResult["NAV_STRING"] ?>
<? endif; ?>
