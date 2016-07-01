<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?><?
echo ShowError($arResult["ERROR_MESSAGE"]);
echo GetMessage("STB_ORDER_PROMT");
?>
<?
$arItems = &$arResult["ITEMS"]["AnDelCanBuy"];
//print_r($arResult);
?>

<h1 class="name margin0px"><? $APPLICATION->showTitle(); ?></h1>
<!--
столбец
наименование
количество
ценовая категория
цена
всего
-->
<table class="cart_table">
    <colgroup>
        <col class="img" span="1"></col>
        <col class="name" span="1"></col>
        <col class="numb" span="1"></col>
        <col class="category" span="1"></col>
        <col class="price" span="1"></col>
        <col class="total" span="1"></col>
        <col class="del" span="1"></col>
    </colgroup>
    <thead>
        <tr>
            <th></th>
            <th class="name">Наименование</th>
            <th>Количество</th>
            <th>Ценовая категория</th>
            <th>Цена</th>
            <th>Всего</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <? foreach ($arItems as $item): ?>
            <?$arWaterMark = Array(
                array(
                    "name" => "watermark",
                    "position" => "center", // Положение
                    "size" => "real",
                    "file" => $_SERVER["DOCUMENT_ROOT"].'/upload/watermark_bestma30.png', // Путь к картинке
                )
            );
            $arFileTmp = CFile::ResizeImageGet(
                $item["IMAGES"]["ID"],
                array("width" => 'auto', "height" => 'auto'),
                BX_RESIZE_IMAGE_EXACT,
                true,
                $arWaterMark
            );
            ?>
            <? $pathImg = "/upload/" . $item["IMAGES"]["SUBDIR"] . "/" . $item["IMAGES"]["FILE_NAME"]; ?>
            <tr>
                <td class="forZoom">
                    <div class="w_zoom_img">
                        <a href="#"><img src="<?=$arFileTmp["src"] /*$pathImg*/ ?>" alt=""/></a>
                    </div>
                </td>
                <td class="name">
                    <a href="<?= $item["DETAIL_PAGE_URL"]; ?>"><?= $item["NAME"]; ?></a>
                </td>
                <td>
                    <div class="wrapp_numb numbCounter">
                        <a href="#" class="minus"></a>
                        <input type="text" name="QUANTITY_<?= $item["ID"] ?>" value="<?= $item["QUANTITY"]; ?>" />
                        <a href="#" class="plus"></a>
                    </div>
                </td>
                <td class="category">
                    <?= $item["NOTES"]; ?>
                    <? if (intval($arResult["allSum"]) >= 150000): ?>
                        <br /> <span style="color: #FF0000">Спец-цена</span>
                    <? endif; ?>
                </td>
                <td>
                    <b><?= round($item["PRICE"]); ?></b> руб.
                </td>
                <td>
                    <b><?= $item["QUANTITY"] * $item["PRICE"]; ?></b> руб.
                </td>
                <td><a href="#<? //= $APPLICATION->GetCurPageParam()."?DELETE_".$item["ID"]."=Y&BasketRefresh=Y";         ?>" class="del"></a><input type="checkbox" name="DELETE_<?= $item["ID"] ?>" value="Y" /></td>
            </tr>
        <? endforeach; ?>

    </tbody>
</table>
<? if (intval($arResult["allSum"]) >= 150000): ?>
<div class="content_text product_wrapp">
    <p class="prices_info" style="font-size: 100%"> 
        Ваш заказ подпадает под категорию <span style="color: #FF0000">"Cпециальная цена"</span>!
        После обращения к нам, наши менеджеры выставят для Вас
        специальные цены, которые будут еще ниже указанных в заказе.
    </p>
</div>
 <? endif; ?>
<input id="refresh_or_order" type="text" value="yes" name="BasketRefresh" />
<div class="wrapp_inf_wholesale">
    <div class="gray_block_31px">
        <div class="text">Сумма заказа по ценновой категории 
            <?= $arItems[0]["NOTES"]; ?>
        </div>
        <div class="price"><b class="big_price"><?= number_format($arResult["allSum"], 0, '', ' ') ?></b> руб.</div>
    </div>

    <?
    $replaceOPT = "%OPT%";
    $relacePrice = "%PRICES%";
    $typePrices = array(
        "ОПТ1", "ОПТ2", "ОПТ3",
    );
    $ordStr = <<<STRCATWHOLESALE
            <table class="wholesale">
        <tr>
            <td class="margin"></td>
            <td class="text"><div class="shadow_ie">*до перехода в $replaceOPT осталось $relacePrice руб.</div></td>
            <td class="margin"></td>
        </tr>
    </table>
STRCATWHOLESALE;
    //echo $ordStr;
    if (intval($arResult["allSum"]) < 30000) {
        $priceToDis = (30000 - intval($arResult["allSum"]));
        $catStr = str_replace($relacePrice, $priceToDis, $ordStr);
        $catStr = str_replace($replaceOPT, $typePrices[1], $catStr);
        echo $catStr;
    } elseif (intval($arResult["allSum"]) >= 30000 and intval($arResult["allSum"]) < 80000) {
        $priceToDis = (80000 - intval($arResult["allSum"]));
        $catStr = str_replace($relacePrice, $priceToDis, $ordStr);
        $catStr = str_replace($replaceOPT, $typePrices[2], $catStr);
        echo $catStr;
    }
    ?>

</div>
<div class="price_excluding_delivery">
    <div class="text">Общая стоимость без учета доставки: <b class="big_price"><?= $arResult["allSum"]; ?></b> руб.</div>
    <a href="#" class="gray_button">Пересчитать</a>
    <div class="clear"></div>
</div>
<div class="wrapp_menu_cart">
    <ul>
        <li><a href="/catalog/" class="gray_button image cart"><span>Продолжить покупки</span></a></li>
        <li><a href="#" class="gray_button image clear_cart"><span>Очистить корзину</span></a></li>
         <?if($arResult["allSum"] < 10000){?>
            <li><div class="gray_button image buy"><span>Оформление заказа</span></div></li> 
            <div class="red_text_sum">Обращаем ваше внимание на то, что минимальная сумма заказа в оптовом интернет-магазине BESTMA составляет 10.000р</div>
         <?}else{?>
        <li><a href="#" class="gray_button image buy"><span>Оформление заказа</span></a></li>
        <?}?>
    </ul>
    <div class="clear"></div>
</div>