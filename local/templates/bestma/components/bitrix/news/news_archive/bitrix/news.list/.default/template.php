<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
    <? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
        <?= $arResult["NAV_STRING"] ?><br />
    <? endif; ?>
<?// echo "<pre>"; print_r($arResult); echo "</pre>"; ?>
    <div class="white_block">
        <div class="wrapp_tape">
            <div class="tape"></div>
            <div class="tape right"></div>
        </div>
        <div class="content_check">
            <div class="red">
                <div class="gray">
                    <?= mb_strtoupper($arResult["ELEMENTS_NAME"]); ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>

        <div class="wrapp_news_archive">
            <ul class="news_archive">
                <? foreach ($arResult["ITEMS"] as $arItem): ?>
                    <?$arWaterMark = Array(
                        array(
                            "name" => "watermark",
                            "position" => "center", // Положение
                            "type" => "image",
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
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <li id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                        <? if ($arParams["DISPLAY_DATE"] != "N" && $arItem["DISPLAY_ACTIVE_FROM"]): ?>
                            <div class="date"><? echo $arItem["DISPLAY_ACTIVE_FROM"] ?></div>
                        <? endif ?>

                        <div class="head"></div>
                        <div class="inf">
                            <h3 class="news_head">
                                <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><?= truncate_str($arItem["NAME"]); ?></a>
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
                            <? endif ?>
                        </div>
                        <div class="foot"></div>
                        <a class="gray_button image buy" href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                            <span>Подробнее</span>
                        </a>
                    </li>
                <? endforeach; ?>

            </ul>
        </div>



        <div class="news_archive_image"></div>
    </div>
    
<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <br /><?= $arResult["NAV_STRING"] ?>
<? endif; ?>
