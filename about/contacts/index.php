<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?><div class="white_block">
	<div class="wrapp_tape">
		<div class="tape">
		</div>
		<div class="tape right">
		</div>
	</div>
	<div class="content_check">
		<div class="red">
			<div class="gray">
				 <? $APPLICATION->ShowTitle(); ?>
			</div>
			<div class="clear">
			</div>
		</div>
	</div>
	<div class="w_contacts">
		<div style="float: right;">
			 <script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=8epU0QQxzPlhaFn9cvi30eAlts72dU_-&width=300&height=300"></script>
		</div>
		<ul class="contacts_list">
			<li class="phone"> <strong><span style="font-size: 13px;">Телефон интернет магазина BESTMA.RU</span></strong><span style="font-size: 16px;">&nbsp; </span> <br>
 <span style="font-size: 13px;"> +7 (495) 729-20-25&nbsp; <br>
			 +7 (903) 729-20-25<b><span style="color: #ff0000;"> доступны WhatsApp, Viber</span></b></span></li>
		</ul>
		<div>
 <span style="font-size: 13px;"><b><span style="color: #ff0000;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span><span style="color: #000000;">Отдел реализации:</span></b></span>
		</div>
		<div>
 <span style="font-size: 13px;"><b><span style="color: #000000;"> <br>
 </span></b></span>
		</div>
		<div>
 <span style="font-size: 13px;"><b><span style="color: #000000;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Игорь</span></b></span>
		</div>
		<div>
 <span style="font-size: 13px;"><b><span style="color: #000000;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Skype: bestma.ru</span></b></span>
		</div>
		<div>
 <b><span style="color: #000000;"><span style="font-size: 13px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; icq: 705486623</span></span></b>
		</div>
		<div>
 <b><span style="color: #000000;"><span style="font-size: 13px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Почта: <a href="mailto:rasteryaev@bestma.ru">rasteryaev@bestma.ru</a></span></span></b>
		</div>
		<div>
 <b><span style="color: #000000;"><span style="font-size: 13px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Александра</span></span></b>
		</div>
		<div>
 <b><span style="color: #000000;"><span style="font-size: 13px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Skype: bestmaopt</span></span></b>
		</div>
		<div>
 <b><span style="color: #000000;"><span style="font-size: 13px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; icq: 622280006</span></span></b>
		</div>
		<div>
 <b><span style="color: #000000;"><span style="font-size: 13px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Почта: <a href="mailto:aleksandra@bestma.ru">aleksandra@bestma.ru</a></span></span></b>
		</div>
		<div>
 <b><span style="color: #000000;"><span style="font-size: 13px;"> <br>
 </span></span></b>
		</div>
		<ul class="contacts_list">
			<li class="mail"><span style="font-size: 13px;"><b style="font-weight: bold;">Для дополнительных вопросов</b> <br>
 <b> &nbsp;</b> <a href="mailto:bestma@inbox.ru">bestma@inbox.ru</a>&nbsp;</span></li>
			<li class="l_address"><span style="font-size: 13px;"><strong style="font-weight: bold;">Юридический адрес</strong> <br>
 <b> &nbsp;</b>ИП "Соломатина Екатерина Игоревна", &nbsp;111531, г. Москва, &nbsp;шоссе Энтузиастов д.94<b> &nbsp; &nbsp; &nbsp; &nbsp; </b> <br>
 <b> &nbsp;&nbsp;</b></span></li>
			<li class="office_address"> <span style="font-size: 13px;"><strong style="font-weight: bold;">Главный офис</strong> <br>
			 КОМПAНИЯ BESTMA <br>
			 (Оптовая продажа аксессуаров к сотовым телефонам) <br>
			 Aдрес: г.Москвa, ул. Докукинa, дом 10 <br>
 <br>
			<ul class="contacts_list" style="font-weight: bold;">
 <br>
			</ul>
 </span></li>
		</ul>
		<div class="w_contacts">
 <span style="color: #000000; font-size: small;"> </span>
		</div>
 <b style="color: #000000; font-size: small;"> </b> <br>
		 <?$APPLICATION->IncludeComponent(
	"bitrix:form",
	"bestma_call_request",
	Array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"COMPONENT_TEMPLATE" => "bestma_call_request",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"EDIT_ADDITIONAL" => "N",
		"EDIT_STATUS" => "Y",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"NOT_SHOW_FILTER" => array(0=>"",1=>"",),
		"NOT_SHOW_TABLE" => array(0=>"",1=>"",),
		"RESULT_ID" => $_REQUEST[RESULT_ID],
		"SEF_MODE" => "N",
		"SHOW_ADDITIONAL" => "N",
		"SHOW_ANSWER_VALUE" => "N",
		"SHOW_EDIT_PAGE" => "N",
		"SHOW_LIST_PAGE" => "N",
		"SHOW_STATUS" => "Y",
		"SHOW_VIEW_PAGE" => "N",
		"START_PAGE" => "new",
		"SUCCESS_URL" => "/callback/index.php",
		"USE_EXTENDED_ERRORS" => "N",
		"VARIABLE_ALIASES" => array("action"=>"action",),
		"WEB_FORM_ID" => "1"
	)
);?>
		<div class="contacts_image">
		</div>
 <span style="font-size: 13px;"> </span>
	</div>
</div>
 <br><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>