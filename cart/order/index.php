<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Оформление заказа");
?> 
<div class="white_block gray_gradient catalog"> 
  <div class="wrapp_tape"> 
    <div class="tape"></div>
   
    <div class="tape right"></div>
   </div>
 <?$APPLICATION->IncludeComponent(
	"bitrix:sale.order.ajax",
	"template1",
	Array(
		"PAY_FROM_ACCOUNT" => "Y",
		"COUNT_DELIVERY_TAX" => "N",
		"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
		"ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
		"ALLOW_AUTO_REGISTER" => "Y",
		"SEND_NEW_USER_NOTIFY" => "N",
		"DELIVERY_NO_AJAX" => "N",
		"DELIVERY_NO_SESSION" => "N",
		"TEMPLATE_LOCATION" => ".default",
		"DELIVERY_TO_PAYSYSTEM" => "d2p",
		"USE_PREPAYMENT" => "N",
		"PATH_TO_BASKET" => "/cart/",
		"PATH_TO_PERSONAL" => "",
		"PATH_TO_PAYMENT" => "",
		"PATH_TO_AUTH" => "",
		"SET_TITLE" => "Y"
	)
);?> 
 </div>
 <? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>