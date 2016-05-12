<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Корзина товаров");
?>

<div class="cart_wrapp">
    <?
    $APPLICATION->IncludeComponent(
		"bitrix:sale.basket.basket",
		"bestma_cart",
		array(
			"COLUMNS_LIST" => array("NAME", "PRICE", "TYPE", "QUANTITY", "DELETE", "DELAY", "WEIGHT", "DISCOUNT"),
			"PATH_TO_ORDER" => "/cart/order/",
			"HIDE_COUPON" => "N",
			"QUANTITY_FLOAT" => "N",
			"PRICE_VAT_SHOW_VALUE" => "N",
			"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
			"USE_PREPAYMENT" => "N",
			"SET_TITLE" => "N"
		),
		false
	);
    ?>

    <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_TEMPLATE_PATH . "/include_documents/cart/cartText.php", "EDIT_TEMPLATE" => ""), false); ?>
</div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>