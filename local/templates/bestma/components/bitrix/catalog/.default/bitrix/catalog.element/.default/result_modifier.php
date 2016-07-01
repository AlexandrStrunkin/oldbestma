<?php
if($arParams['ADD_SECTIONS_CHAIN'] && !empty($arResult['NAME']))
{ 
   $arResult['SECTION']['PATH'][] = array(
   'NAME' => $arResult['NAME'], 
   'PATH' => ' '); 
   //$component = $this->__component; 
   //$component->arResult = $arResult; 
}
 if (CModule::IncludeModule("sale"))
      {

         $arBasketItems = array();

         $dbBasketItems = CSaleBasket::GetList(
                 array(
                         "NAME" => "ASC",
                         "ID" => "ASC"
                     ),
                 array(
                         "FUSER_ID" => CSaleBasket::GetBasketUserID(),
                         "LID" => SITE_ID,
                         "ORDER_ID" => "NULL",
						 "CAN_BUY"=>"Y"
                     ),
                 false,
                 false,
                 array("ID", "QUANTITY", "PRICE","DELAY","CAN_BUY")
             );
		$summ=0;
         while ($arItems = $dbBasketItems->Fetch())
         { 
             $arBasketItems[] = $arItems;
         }
		 foreach($arBasketItems as $arItem) {
			 $summ = $summ + $arItem["PRICE"]*$arItem["QUANTITY"];
		 }
		$arResult["allSum"]=$summ;
      }
?>
