<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
/*
  echo "<pre>";
  print_r($arResult);
  echo "</pre>";
  // */
?>
<div class="product_wrapp prod_parent_block_8dfd71c72ba4339630bf25e7445cf49a">
    <h1 class="name class_title_9364da414e1da2f6f7c9c67387176b1a"><?= $arResult["NAME"] ?></h1>

    <div class="slider_and_prices">
        <div class="imgs_wrapp">
            <? if ((is_null($arResult["MORE_PHOTO"]) || (count($arResult["MORE_PHOTO"]) == 0))): ?>
                <div class="center_img">
                    <? if (is_array($arResult["DETAIL_PICTURE"])): ?>
                        <a href="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>" data-lightbox="roadtrip"><img class="class_img_item_0620e44395b9ad45e489d15b3615c972 zoom_0620e44395b9ad45e489d15b3615c972" alt="<?= $arResult["NAME"] ?>" src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>" /></a>
                    <? elseif (is_array($arResult["PREVIEW_PICTURE"])): ?>
                        <a href="<?= $arResult["PREVIEW_PICTURE"]["SRC"] ?>" data-lightbox="roadtrip"><img class="class_img_item_0620e44395b9ad45e489d15b3615c972 zoom_0620e44395b9ad45e489d15b3615c972" alt="<?= $arResult["NAME"] ?>" src="<?= $arResult["PREVIEW_PICTURE"]["SRC"] ?>" /></a>
                    <? endif ?>
                </div>

            <? elseif (isset($arResult["MORE_PHOTO"]) && (count($arResult["MORE_PHOTO"]) > 0)): ?>
                <div id="my-folio-of-works" class="svwp">
                    <ul>
                        <? if (is_array($arResult["DETAIL_PICTURE"])): ?>
                            <li><a href="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>" data-lightbox="roadtrip"><img class="class_img_item_0620e44395b9ad45e489d15b3615c972 zoom_0620e44395b9ad45e489d15b3615c972" alt="<?= $arResult["NAME"] ?>" src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>" /></a></li>
                        <? elseif (is_array($arResult["PREVIEW_PICTURE"])): ?>
                            <li><a href="<?= $arResult["PREVIEW_PICTURE"]["SRC"] ?>" data-lightbox="roadtrip"><img class="class_img_item_0620e44395b9ad45e489d15b3615c972 zoom_0620e44395b9ad45e489d15b3615c972" alt="<?= $arResult["NAME"] ?>" src="<?= $arResult["PREVIEW_PICTURE"]["SRC"] ?>" /></a></li>
                        <? endif ?>

                        <? foreach ($arResult["MORE_PHOTO"] as $photo): ?>
                            <li><a href="<?= $photo["SRC"] ?>" data-lightbox="roadtrip"><img class="zoom_0620e44395b9ad45e489d15b3615c972" alt="<?= $arResult["NAME"] ?>" src="<?= $photo["SRC"] ?>" /></a></li>
                        <? endforeach; ?>
                    </ul>
                </div>
            <? endif; ?>
        </div>
        <script type="text/javascript">
         $(".zoom_0620e44395b9ad45e489d15b3615c972").elevateZoom({scrollZoom : true});
        </script>
        <div class="prices">
            <ul class="pricelist">

                <? if (is_array($arResult["PRICES"]["PRICE_WHS_1"]) && (count($arResult["PRICES"]["PRICE_WHS_1"]) > 0)): ?>
                    <li>
                        <span><?= $arResult["CAT_PRICES"]["PRICE_WHS_1"]["TITLE"] ?> при заказе от 5 000 руб.</span>
                        <span class="price">
                            <span><?= number_format($arResult["PRICES"]["PRICE_WHS_1"]["VALUE"], 0, "", " "); ?></span><span class = "currency">&nbsp;руб.</span>
                        </span>
                    </li>
                <? endif; ?>


                <? if (is_array($arResult["PRICES"]["PRICE_WHS_2"]) && (count($arResult["PRICES"]["PRICE_WHS_2"]) > 0)): ?>
                    <li>
                        <span><?= $arResult["CAT_PRICES"]["PRICE_WHS_2"]["TITLE"] ?> при заказе от 50 000 руб.</span>
                        <span class="price">
                            <span><?= number_format($arResult["PRICES"]["PRICE_WHS_2"]["VALUE"], 0, "", " "); ?></span><span class = "currency">&nbsp;руб.</span>
                        </span>
                    </li>
                <? endif; ?>

                <? if (is_array($arResult["PRICES"]["PRICE_WHS_3"]) && (count($arResult["PRICES"]["PRICE_WHS_3"]) > 0)): ?>
                    <li>
                        <span><?= $arResult["CAT_PRICES"]["PRICE_WHS_3"]["TITLE"] ?> при заказе от 100 000 руб.</span>
                        <span class="price">
                            <span><?= number_format($arResult["PRICES"]["PRICE_WHS_3"]["VALUE"], 0, "", " "); ?></span><span class = "currency">&nbsp;руб.</span>
                        </span>
                    </li>
                <? endif; ?>


            </ul>
            <p class="prices_info">
                *Более точные оптовые цены смотрите 
                в последних <a href="/about/prices/">прайс листах</a>.
                Оптовый заказ формируется там же.
            </p>
            <div class="form_buy">
                <? if (isset($arResult["CATALOG_QUANTITY"]) && $arResult["CATALOG_QUANTITY"] > 0): ?>
                    <div class="green_in_stock">В НАЛИЧИИ</div>
                <? endif; ?>
                <form action="" method="post">
                    <input type="hidden" name="action" value="BUY">
                    <input type="hidden" name="id" value="<?= $arResult["ID"] ?>">
                   <?/* <label>
                        
                        <input type="text" value="1" name="quantity" />
                        
                        <span>шт.</span>
                    </label> */?>
                    <label class="numbCounter">
                        <a class="minus" href="#">-</a>
                        <input type="text" value="1" name="quantity" />
                        <a class="plus" href="#">+</a>
                        <span>шт.</span>
                    </label>
                    <input type="submit" class="button_buy_f97668b00ffded31ba0e36016cf2ad1f" name="actionADD2BASKET" value="" />
                </form>
            </div>
            <div class="delivery_link"><a href="/about/terms/Dostavka.php">Подробнее о доставке</a></div>
            <div class="clear"></div>
              <div class="prior_to_joining">
              До перехода в ОПТ2 осталось 5 000 руб.
              </div>
            <div class="share42init"></div>
            <script type="text/javascript" src="<?= SITE_TEMPLATE_PATH ?>/js/share42/share42.js"></script> 
            <?/*<ul class="social">
                <li class="share"><a href="#"></a></li>
                <li class="yandex"><a href="#"></a></li>
                <li class="vk"><a href="#"></a></li>
                <li class="facebook"><a href="#"></a></li>
                <li class="twitter"><a href="#"></a></li>
                <li class="odnoklassniki"><a href="#"></a></li>
                <li class="mail"><a href="#"></a></li>
                <li class="lj"><a href="#"></a></li>
                <li class="flower"><a href="#"></a></li>
                <li class="google"><a href="#"></a></li>
            </ul>*/?>


        </div>

    </div>
    <div class="clear"></div>
    <div class="property">
        <div class="wrapp">
            <ul class="property_list">
                <?
                if (array_key_exists("DISPLAY_PROPERTIES", $arResult) && is_array($arResult["DISPLAY_PROPERTIES"])) {
                    foreach ($arResult["DISPLAY_PROPERTIES"] as $property) {
                        if (!($property["DISPLAY_VALUE"] == "") && !is_array($property["DISPLAY_VALUE"])) {
                            echo "<li><strong>" . $property["NAME"] . ":</strong> " . $property["DISPLAY_VALUE"] . "</li>";
                        } elseif (is_array($property["DISPLAY_VALUE"]) && $property["CODE"] !== "RECOMMEND") {
                            $endValueProperty = end($property["DISPLAY_VALUE"]);
                            echo "<li><strong>" . $property["NAME"] . ":</strong><ul>";
                            foreach ($property["DISPLAY_VALUE"] as $valueProperty) {
                                echo "<li>" . $valueProperty;
                                if (!($endValueProperty == $valueProperty)) {
                                    echo ", ";
                                }
                                echo "</li>";
                            }
                            echo "</ul></li>";
                        }
                    }
                }
                ?>
            </ul>

        </div>
        <div class="wrapp">
            <div class="description">
                <h6 class="header_d">Описание:</h6>
                <div class="p_wrapper">
                    <? if ($arResult["DETAIL_TEXT"]): ?>
                        <?= $arResult["DETAIL_TEXT"] ?>
                    <? elseif ($arResult["PREVIEW_TEXT"]): ?>
                        <?= $arResult["PREVIEW_TEXT"] ?>
                    <? endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>



<? /*
  echo "<pre>";
  //print_r($arResult);
  echo "</pre>";
  // */
?>

<? /*
  <div class="catalog-element">
  <table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
  <? if (is_array($arResult["PREVIEW_PICTURE"]) || is_array($arResult["DETAIL_PICTURE"])): ?>
  <td width="0%" valign="top">
  <? if (is_array($arResult["PREVIEW_PICTURE"]) && is_array($arResult["DETAIL_PICTURE"])): ?>
  <img border="0" src="<?= $arResult["PREVIEW_PICTURE"]["SRC"] ?>" width="<?= $arResult["PREVIEW_PICTURE"]["WIDTH"] ?>" height="<?= $arResult["PREVIEW_PICTURE"]["HEIGHT"] ?>" alt="<?= $arResult["NAME"] ?>" title="<?= $arResult["NAME"] ?>" id="image_<?= $arResult["PREVIEW_PICTURE"]["ID"] ?>" style="display:block;cursor:pointer;cursor: hand;" OnClick="document.getElementById('image_<?= $arResult["PREVIEW_PICTURE"]["ID"] ?>').style.display = 'none';
  document.getElementById('image_<?= $arResult["DETAIL_PICTURE"]["ID"] ?>').style.display = 'block'" />
  <img border="0" src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>" width="<?= $arResult["DETAIL_PICTURE"]["WIDTH"] ?>" height="<?= $arResult["DETAIL_PICTURE"]["HEIGHT"] ?>" alt="<?= $arResult["NAME"] ?>" title="<?= $arResult["NAME"] ?>" id="image_<?= $arResult["DETAIL_PICTURE"]["ID"] ?>" style="display:none;cursor:pointer; cursor: hand;" OnClick="document.getElementById('image_<?= $arResult["DETAIL_PICTURE"]["ID"] ?>').style.display = 'none';
  document.getElementById('image_<?= $arResult["PREVIEW_PICTURE"]["ID"] ?>').style.display = 'block'" />
  <? elseif (is_array($arResult["DETAIL_PICTURE"])): ?>
  <img border="0" src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>" width="<?= $arResult["DETAIL_PICTURE"]["WIDTH"] ?>" height="<?= $arResult["DETAIL_PICTURE"]["HEIGHT"] ?>" alt="<?= $arResult["NAME"] ?>" title="<?= $arResult["NAME"] ?>" />
  <? elseif (is_array($arResult["PREVIEW_PICTURE"])): ?>
  <img border="0" src="<?= $arResult["PREVIEW_PICTURE"]["SRC"] ?>" width="<?= $arResult["PREVIEW_PICTURE"]["WIDTH"] ?>" height="<?= $arResult["PREVIEW_PICTURE"]["HEIGHT"] ?>" alt="<?= $arResult["NAME"] ?>" title="<?= $arResult["NAME"] ?>" />
  <? endif ?>
  <? if (count($arResult["MORE_PHOTO"]) > 0): ?>
  <br /><a href="#more_photo"><?= GetMessage("CATALOG_MORE_PHOTO") ?></a>
  <? endif; ?>
  </td>
  <? endif; ?>
  <td width="100%" valign="top">
  <? foreach ($arResult["DISPLAY_PROPERTIES"] as $pid => $arProperty): ?>
  <?= $arProperty["NAME"] ?>:<b>&nbsp;<?
  if (is_array($arProperty["DISPLAY_VALUE"])):
  echo implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);
  elseif ($pid == "MANUAL"):
  ?><a href="<?= $arProperty["VALUE"] ?>"><?= GetMessage("CATALOG_DOWNLOAD") ?></a><?
  else:
  echo $arProperty["DISPLAY_VALUE"];
  ?>
  <? endif ?></b><br />
  <? endforeach ?>
  </td>
  </tr>
  </table>
  <? if (is_array($arResult["OFFERS"]) && !empty($arResult["OFFERS"])): ?>
  <? foreach ($arResult["OFFERS"] as $arOffer): ?>
  <? foreach ($arParams["OFFERS_FIELD_CODE"] as $field_code): ?>
  <small><? echo GetMessage("IBLOCK_FIELD_" . $field_code) ?>:&nbsp;<? echo $arOffer[$field_code]; ?></small><br />
  <? endforeach; ?>
  <? foreach ($arOffer["DISPLAY_PROPERTIES"] as $pid => $arProperty): ?>
  <small><?= $arProperty["NAME"] ?>:&nbsp;<?
  if (is_array($arProperty["DISPLAY_VALUE"]))
  echo implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);
  else
  echo $arProperty["DISPLAY_VALUE"];
  ?></small><br />
  <? endforeach ?>
  <? foreach ($arOffer["PRICES"] as $code => $arPrice): ?>
  <? if ($arPrice["CAN_ACCESS"]): ?>
  <p><?= $arResult["CAT_PRICES"][$code]["TITLE"]; ?>:&nbsp;&nbsp;
  <? if ($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]): ?>
  <s><?= $arPrice["PRINT_VALUE"] ?></s> <span class="catalog-price"><?= $arPrice["PRINT_DISCOUNT_VALUE"] ?></span>
  <? else: ?>
  <span class="catalog-price"><?= $arPrice["PRINT_VALUE"] ?></span>
  <? endif ?>
  </p>
  <? endif; ?>
  <? endforeach; ?>
  <p>
  <? if ($arParams["DISPLAY_COMPARE"]): ?>
  <noindex>
  <a href="<? echo $arOffer["COMPARE_URL"] ?>" rel="nofollow"><? echo GetMessage("CT_BCE_CATALOG_COMPARE") ?></a>&nbsp;
  </noindex>
  <? endif ?>
  <? if ($arOffer["CAN_BUY"]): ?>
  <? if ($arParams["USE_PRODUCT_QUANTITY"]): ?>
  <form action="<?= POST_FORM_ACTION_URI ?>" method="post" enctype="multipart/form-data">
  <table border="0" cellspacing="0" cellpadding="2">
  <tr valign="top">
  <td><? echo GetMessage("CT_BCE_QUANTITY") ?>:</td>
  <td>
  <input type="text" name="<? echo $arParams["PRODUCT_QUANTITY_VARIABLE"] ?>" value="1" size="5">
  </td>
  </tr>
  </table>
  <input type="hidden" name="<? echo $arParams["ACTION_VARIABLE"] ?>" value="BUY">
  <input type="hidden" name="<? echo $arParams["PRODUCT_ID_VARIABLE"] ?>" value="<? echo $arOffer["ID"] ?>">
  <input type="submit" name="<? echo $arParams["ACTION_VARIABLE"] . "BUY" ?>" value="<? echo GetMessage("CATALOG_BUY") ?>">
  <input type="submit" name="<? echo $arParams["ACTION_VARIABLE"] . "ADD2BASKET" ?>" value="<? echo GetMessage("CT_BCE_CATALOG_ADD") ?>">
  </form>
  <? else: ?>
  <noindex>
  <a href="<? echo $arOffer["BUY_URL"] ?>" rel="nofollow"><? echo GetMessage("CATALOG_BUY") ?></a>
  &nbsp;<a href="<? echo $arOffer["ADD_URL"] ?>" rel="nofollow"><? echo GetMessage("CT_BCE_CATALOG_ADD") ?></a>
  </noindex>
  <? endif; ?>
  <? elseif (count($arResult["CAT_PRICES"]) > 0): ?>
  <?= GetMessage("CATALOG_NOT_AVAILABLE") ?>
  <?
  $APPLICATION->IncludeComponent("bitrix:sale.notice.product", ".default", array(
  "NOTIFY_ID" => $arOffer['ID'],
  "NOTIFY_URL" => htmlspecialcharsback($arOffer["SUBSCRIBE_URL"]),
  "NOTIFY_USE_CAPTHA" => "N"
  ), $component
  );
  ?>
  <? endif ?>
  </p>
  <? endforeach; ?>
  <? else: ?>
  <? foreach ($arResult["PRICES"] as $code => $arPrice): ?>
  <? if ($arPrice["CAN_ACCESS"]): ?>
  <p><?= $arResult["CAT_PRICES"][$code]["TITLE"]; ?>&nbsp;
  <? if ($arParams["PRICE_VAT_SHOW_VALUE"] && ($arPrice["VATRATE_VALUE"] > 0)): ?>
  <? if ($arParams["PRICE_VAT_INCLUDE"]): ?>
  (<? echo GetMessage("CATALOG_PRICE_VAT") ?>)
  <? else: ?>
  (<? echo GetMessage("CATALOG_PRICE_NOVAT") ?>)
  <? endif ?>
  <? endif; ?>:&nbsp;
  <? if ($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]): ?>
  <s><?= $arPrice["PRINT_VALUE"] ?></s> <span class="catalog-price"><?= $arPrice["PRINT_DISCOUNT_VALUE"] ?></span>
  <? if ($arParams["PRICE_VAT_SHOW_VALUE"]): ?><br />
  <?= GetMessage("CATALOG_VAT") ?>:&nbsp;&nbsp;<span class="catalog-vat catalog-price"><?= $arPrice["DISCOUNT_VATRATE_VALUE"] > 0 ? $arPrice["PRINT_DISCOUNT_VATRATE_VALUE"] : GetMessage("CATALOG_NO_VAT") ?></span>
  <? endif; ?>
  <? else: ?>
  <span class="catalog-price"><?= $arPrice["PRINT_VALUE"] ?></span>
  <? if ($arParams["PRICE_VAT_SHOW_VALUE"]): ?><br />
  <?= GetMessage("CATALOG_VAT") ?>:&nbsp;&nbsp;<span class="catalog-vat catalog-price"><?= $arPrice["VATRATE_VALUE"] > 0 ? $arPrice["PRINT_VATRATE_VALUE"] : GetMessage("CATALOG_NO_VAT") ?></span>
  <? endif; ?>
  <? endif ?>
  </p>
  <? endif; ?>
  <? endforeach; ?>
  <? if (is_array($arResult["PRICE_MATRIX"])): ?>
  <table cellpadding="0" cellspacing="0" border="0" width="100%" class="data-table">
  <thead>
  <tr>
  <? if (count($arResult["PRICE_MATRIX"]["ROWS"]) >= 1 && ($arResult["PRICE_MATRIX"]["ROWS"][0]["QUANTITY_FROM"] > 0 || $arResult["PRICE_MATRIX"]["ROWS"][0]["QUANTITY_TO"] > 0)): ?>
  <td><?= GetMessage("CATALOG_QUANTITY") ?></td>
  <? endif; ?>
  <? foreach ($arResult["PRICE_MATRIX"]["COLS"] as $typeID => $arType): ?>
  <td><?= $arType["NAME_LANG"] ?></td>
  <? endforeach ?>
  </tr>
  </thead>
  <? foreach ($arResult["PRICE_MATRIX"]["ROWS"] as $ind => $arQuantity): ?>
  <tr>
  <? if (count($arResult["PRICE_MATRIX"]["ROWS"]) > 1 || count($arResult["PRICE_MATRIX"]["ROWS"]) == 1 && ($arResult["PRICE_MATRIX"]["ROWS"][0]["QUANTITY_FROM"] > 0 || $arResult["PRICE_MATRIX"]["ROWS"][0]["QUANTITY_TO"] > 0)): ?>
  <th nowrap>
  <?
  if (IntVal($arQuantity["QUANTITY_FROM"]) > 0 && IntVal($arQuantity["QUANTITY_TO"]) > 0)
  echo str_replace("#FROM#", $arQuantity["QUANTITY_FROM"], str_replace("#TO#", $arQuantity["QUANTITY_TO"], GetMessage("CATALOG_QUANTITY_FROM_TO")));
  elseif (IntVal($arQuantity["QUANTITY_FROM"]) > 0)
  echo str_replace("#FROM#", $arQuantity["QUANTITY_FROM"], GetMessage("CATALOG_QUANTITY_FROM"));
  elseif (IntVal($arQuantity["QUANTITY_TO"]) > 0)
  echo str_replace("#TO#", $arQuantity["QUANTITY_TO"], GetMessage("CATALOG_QUANTITY_TO"));
  ?>
  </th>
  <? endif; ?>
  <? foreach ($arResult["PRICE_MATRIX"]["COLS"] as $typeID => $arType): ?>
  <td>
  <?
  if ($arResult["PRICE_MATRIX"]["MATRIX"][$typeID][$ind]["DISCOUNT_PRICE"] < $arResult["PRICE_MATRIX"]["MATRIX"][$typeID][$ind]["PRICE"])
  echo '<s>' . FormatCurrency($arResult["PRICE_MATRIX"]["MATRIX"][$typeID][$ind]["PRICE"], $arResult["PRICE_MATRIX"]["MATRIX"][$typeID][$ind]["CURRENCY"]) . '</s> <span class="catalog-price">' . FormatCurrency($arResult["PRICE_MATRIX"]["MATRIX"][$typeID][$ind]["DISCOUNT_PRICE"], $arResult["PRICE_MATRIX"]["MATRIX"][$typeID][$ind]["CURRENCY"]) . "</span>";
  else
  echo '<span class="catalog-price">' . FormatCurrency($arResult["PRICE_MATRIX"]["MATRIX"][$typeID][$ind]["PRICE"], $arResult["PRICE_MATRIX"]["MATRIX"][$typeID][$ind]["CURRENCY"]) . "</span>";
  ?>
  </td>
  <? endforeach ?>
  </tr>
  <? endforeach ?>
  </table>
  <? if ($arParams["PRICE_VAT_SHOW_VALUE"]): ?>
  <? if ($arParams["PRICE_VAT_INCLUDE"]): ?>
  <small><?= GetMessage('CATALOG_VAT_INCLUDED') ?></small>
  <? else: ?>
  <small><?= GetMessage('CATALOG_VAT_NOT_INCLUDED') ?></small>
  <? endif ?>
  <? endif; ?><br />
  <? endif ?>
  <? if ($arResult["CAN_BUY"]): ?>
  <? if ($arParams["USE_PRODUCT_QUANTITY"] || count($arResult["PRODUCT_PROPERTIES"])): ?>
  <form action="<?= POST_FORM_ACTION_URI ?>" method="post" enctype="multipart/form-data">
  <table border="0" cellspacing="0" cellpadding="2">
  <? if ($arParams["USE_PRODUCT_QUANTITY"]): ?>
  <tr valign="top">
  <td><? echo GetMessage("CT_BCE_QUANTITY") ?>:</td>
  <td>
  <input type="text" name="<? echo $arParams["PRODUCT_QUANTITY_VARIABLE"] ?>" value="1" size="5">
  </td>
  </tr>
  <? endif; ?>
  <? foreach ($arResult["PRODUCT_PROPERTIES"] as $pid => $product_property): ?>
  <tr valign="top">
  <td><? echo $arResult["PROPERTIES"][$pid]["NAME"] ?>:</td>
  <td>
  <?
  if (
  $arResult["PROPERTIES"][$pid]["PROPERTY_TYPE"] == "L" && $arResult["PROPERTIES"][$pid]["LIST_TYPE"] == "C"
  ):
  ?>
  <? foreach ($product_property["VALUES"] as $k => $v): ?>
  <label><input type="radio" name="<? echo $arParams["PRODUCT_PROPS_VARIABLE"] ?>[<? echo $pid ?>]" value="<? echo $k ?>" <? if ($k == $product_property["SELECTED"]) echo '"checked"' ?>><? echo $v ?></label><br>
  <? endforeach; ?>
  <? else: ?>
  <select name="<? echo $arParams["PRODUCT_PROPS_VARIABLE"] ?>[<? echo $pid ?>]">
  <? foreach ($product_property["VALUES"] as $k => $v): ?>
  <option value="<? echo $k ?>" <? if ($k == $product_property["SELECTED"]) echo '"selected"' ?>><? echo $v ?></option>
  <? endforeach; ?>
  </select>
  <? endif; ?>
  </td>
  </tr>
  <? endforeach; ?>
  </table>
  <input type="hidden" name="<? echo $arParams["ACTION_VARIABLE"] ?>" value="BUY">
  <input type="hidden" name="<? echo $arParams["PRODUCT_ID_VARIABLE"] ?>" value="<? echo $arResult["ID"] ?>">
  <input type="submit" name="<? echo $arParams["ACTION_VARIABLE"] . "BUY" ?>" value="<? echo GetMessage("CATALOG_BUY") ?>">
  <input type="submit" name="<? echo $arParams["ACTION_VARIABLE"] . "ADD2BASKET" ?>" value="<? echo GetMessage("CATALOG_ADD_TO_BASKET") ?>">
  </form>
  <? else: ?>
  <noindex>
  <a href="<? echo $arResult["BUY_URL"] ?>" rel="nofollow"><? echo GetMessage("CATALOG_BUY") ?></a>
  &nbsp;<a href="<? echo $arResult["ADD_URL"] ?>" rel="nofollow"><? echo GetMessage("CATALOG_ADD_TO_BASKET") ?></a>
  </noindex>
  <? endif; ?>
  <? elseif ((count($arResult["PRICES"]) > 0) || is_array($arResult["PRICE_MATRIX"])): ?>
  <?= GetMessage("CATALOG_NOT_AVAILABLE") ?>
  <?
  $APPLICATION->IncludeComponent("bitrix:sale.notice.product", ".default", array(
  "NOTIFY_ID" => $arResult['ID'],
  "NOTIFY_PRODUCT_ID" => $arParams['PRODUCT_ID_VARIABLE'],
  "NOTIFY_ACTION" => $arParams['ACTION_VARIABLE'],
  "NOTIFY_URL" => htmlspecialcharsback($arResult["SUBSCRIBE_URL"]),
  "NOTIFY_USE_CAPTHA" => "N"
  ), $component
  );
  ?>
  <? endif ?>
  <? endif ?>
  <br />
  <? if ($arResult["DETAIL_TEXT"]): ?>
  <br /><?= $arResult["DETAIL_TEXT"] ?><br />
  <? elseif ($arResult["PREVIEW_TEXT"]): ?>
  <br /><?= $arResult["PREVIEW_TEXT"] ?><br />
  <? endif; ?>
  <? if (count($arResult["LINKED_ELEMENTS"]) > 0): ?>
  <br /><b><?= $arResult["LINKED_ELEMENTS"][0]["IBLOCK_NAME"] ?>:</b>
  <ul>
  <? foreach ($arResult["LINKED_ELEMENTS"] as $arElement): ?>
  <li><a href="<?= $arElement["DETAIL_PAGE_URL"] ?>"><?= $arElement["NAME"] ?></a></li>
  <? endforeach; ?>
  </ul>
  <? endif ?>
  <?
  // additional photos
  $LINE_ELEMENT_COUNT = 2; // number of elements in a row
  if (count($arResult["MORE_PHOTO"]) > 0):
  ?>
  <a name="more_photo"></a>
  <? foreach ($arResult["MORE_PHOTO"] as $PHOTO): ?>
  <img border="0" src="<?= $PHOTO["SRC"] ?>" width="<?= $PHOTO["WIDTH"] ?>" height="<?= $PHOTO["HEIGHT"] ?>" alt="<?= $arResult["NAME"] ?>" title="<?= $arResult["NAME"] ?>" /><br />
  <? endforeach ?>
  <? endif ?>
  <? if (is_array($arResult["SECTION"])): ?>
  <br /><a href="<?= $arResult["SECTION"]["SECTION_PAGE_URL"] ?>"><?= GetMessage("CATALOG_BACK") ?></a>
  <? endif ?>
  </div>// */ ?>
