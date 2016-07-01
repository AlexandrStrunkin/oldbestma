<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
    <div id="cart_line" class="cart_inf">
        <a href="<?= $arParams["PATH_TO_BASKET"] ?>" class="button"></a>
        <div class="inf">
            <?
            if (IntVal($arResult["NUM_PRODUCTS"]) > 0) {
                ?>
                <a href="<?= $arParams["PATH_TO_BASKET"] ?>">В корзине:</a>
                <?= str_replace("В вашей корзине", "", $arResult["PRODUCTS"]); ?>
                <?
            } else {
                ?>
                <a href="<?= $arParams["PATH_TO_BASKET"] ?>">В корзине:</a>
                пока пусто...
            <? } ?>
        </div>
    </div>
<? //print_r($arResult); ?>
    <?
    /*
      <table class="table-basket-line">
      <?
      if (IntVal($arResult["NUM_PRODUCTS"]) > 0) {
      ?>
      <tr>
      <td><a href="<?= $arParams["PATH_TO_BASKET"] ?>" class="basket-line-basket"></a></td>
      <td><a href="<?= $arParams["PATH_TO_BASKET"] ?>"><?= $arResult["PRODUCTS"]; ?></a></td>
      </tr>
      <?
      } else {
      ?><tr>
      <td><div class="basket-line-basket"></div></td>
      <td><?= $arResult["ERROR_MESSAGE"] ?></td>
      </tr><?
      }
      if ($arParams["SHOW_PERSONAL_LINK"] == "Y") {
      ?>
      <tr>
      <td><a href="<?= $arParams["PATH_TO_PERSONAL"] ?>" class="basket-line-personal"></a></td>
      <td><a href="<?= $arParams["PATH_TO_PERSONAL"] ?>"><?= GetMessage("TSB1_PERSONAL") ?></a></td>
      </tr>
      <?
      }
      ?>
      </table>
     * 
     */?>