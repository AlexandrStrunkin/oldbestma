<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?><?php
if(is_null($_GET[init_off])) {
    if(file_exists($_SERVER["DOCUMENT_ROOT"] . "/bitrix/php_interface/functions.php")) {
        require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/php_interface/functions.php");
    }
}
AddEventHandler("catalog", "OnGetOptimalPrice", "MyGetOptimalPrice");

function MyGetOptimalPrice($productID, $quantity = 1, $arUserGroups = array(), $renewal = "N", $arPrices = array(), $siteID = false, $arDiscountCoupons = false)
{
    global $LocalPrice;
    if($LocalPrice <= 0)
    {
        // Выведем актуальную корзину для текущего пользователя
        $dbBasketItems = CSaleBasket::GetList(false,
            array(
                "FUSER_ID" => CSaleBasket::GetBasketUserID(),
                "LID" => SITE_ID,
                "ORDER_ID" => "NULL"
                ),
            false,
            false,
            array("ID", "MODULE", "PRODUCT_ID", "CALLBACK_FUNC", "QUANTITY", "DELAY", "CAN_BUY", "PRICE")
        );
        while ($arItem = $dbBasketItems->Fetch())
        {
            if($arItem['DELAY'] == 'N' && $arItem['CAN_BUY'] == 'Y')
            {
                $LocalPrice += $arItem['PRICE']*$arItem['QUANTITY'];
            }
        }
    }

    //ОПТ 1 при сумме заказа до 5 000 рублей
    //ОПТ 2 при сумме заказа до 50 000 рублей
    //ОПТ 3 при сумме заказа более 50 000 рублей

    // получаем все типы цен, возможные для данного товара
    $arOptPrices = CCatalogProduct::GetByIDEx($productID);

    if($LocalPrice < 30000){
        $price = $arOptPrices['PRICES'][4]['PRICE'];
        $catalog_group_id = 4;
    }
    elseif($LocalPrice >= 30000 and $LocalPrice < 80000){
        $price = $arOptPrices['PRICES'][7]['PRICE'];
        $catalog_group_id = 7;
    }
    elseif($LocalPrice >= 80000){
        $price = $arOptPrices['PRICES'][8]['PRICE'];
        $catalog_group_id = 8;
    }

    return array(
        'PRICE' => array(
            "ID" => $productID,
            'CATALOG_GROUP_ID' => $catalog_group_id,
            'PRICE' => $price,
            'CURRENCY' => "RUB",
            'ELEMENT_IBLOCK_ID' => $productID,
            'VAT_INCLUDED' => "Y",
        ),
        'DISCOUNT' => array(
            'VALUE' => $discount,
            'CURRENCY' => "RUB",
        ),
    );
}


// Функция для отладки //
function print_rr($val) {
    echo '<pre>';
    print_r($val);
    echo '</pre>';
}

// Получение текущего фона //
function func_current_background($iblock_id) {

    if(!CModule::IncludeModule("iblock") || empty($iblock_id)) {
        return false;
    }

    $result = false;
    $arFilter = array("IBLOCK_ID" => $iblock_id, "ACTIVE" => "Y", "ACTIVE_DATE" => "Y");
    $arSelect = array("ID", "IBLOCK_ID", "NAME", "CODE", "DETAIL_PICTURE");
    $rsElement = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);

    if($obElement = $rsElement->GetNextElement()) {
        $arElement = $obElement->GetFields();
        if ($arElement["DETAIL_PICTURE"]) {
            $arElement["DETAIL_PICTURE"] = CFile::GetFileArray($arElement["DETAIL_PICTURE"]);
        }
    }

    if(!empty($arElement["DETAIL_PICTURE"]["SRC"])) {
        $result = $arElement["DETAIL_PICTURE"]["SRC"];
    }

    return $result;
}


AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("SVC", "OnAfterIBlockElementAddHandler"));
AddEventHandler("iblock", "OnAfterIBlockElementUpdate", Array("SVC", "OnAfterIBlockElementUpdateHandler"));

class SVC
{
    // для Новых продуктов
    function OnAfterIBlockElementAddHandler(&$arFields)
    {
        if($arFields["ID"]>0&&$arFields["IBLOCK_ID"]=="3") {
             CIBlockElement::SetPropertyValues($arFields['ID'], "3", "14", "119");
        }
    }
     function OnAfterIBlockElementUpdateHandler(&$arFields)
    {
         if($arFields["ID"]>0&&$arFields["IBLOCK_ID"]=="3") {

          $res = CIBlockElement::GetByID($arFields['ID']);
           $ar_res = $res->GetNext();
           if($ar_res['TIMESTAMP_X']!=$ar_res['DATE_CREATE']) {
                 CIBlockElement::SetPropertyValues($arFields['ID'], "3", "0", "119");
            }
        }
    }
}


    function arshow($array, $adminCheck = false){
        global $USER;
        $USER = new Cuser;
        if ($adminCheck) {
            if (!$USER->IsAdmin()) {
                return false;
            }
        }
        echo "<pre>";
            print_r($array);
        echo "</pre>";
    }

AddEventHandler("catalog", "OnBeforeProductUpdate", "QuantityAddHeandler");

// ������� ���������� ������� "OnBeforeProductUpdate"
function QuantityAddHeandler($ID, &$arFields) {

    $element_quantity = CCatalogProduct::GetList(
            array("QUANTITY" => "DESC"),
            array("ID" => $ID),
            false,
            false
        )->Fetch();
    $db_props = CIBlockElement::GetProperty($element_quantity["ELEMENT_IBLOCK_ID"], $ID, array("sort" => "asc"), Array("CODE"=>"SVEZHIE_POSTUPLENIYA"));
    $props_quantity = $db_props->Fetch();

    if($arFields["QUANTITY"] != ''){
        if(($element_quantity["QUANTITY"] <= 0 && $arFields["QUANTITY"] > $element_quantity["QUANTITY"]) ||
            ($element_quantity["QUANTITY"] > 0 && $element_quantity["QUANTITY"] == $arFields["QUANTITY"] && $props_quantity["VALUE"] == "Y")){

                $quantity_new = "Y";  // �������� "������ �����������" ����������� �������� "Y"

        } else if(($element_quantity["QUANTITY"] > 0 && $arFields["QUANTITY"] <= 0) ||
                ($element_quantity["QUANTITY"] > 0 && $arFields["QUANTITY"] > 0)) {

                $quantity_new = "";  // �������� "������ �����������" ����������� �������� "N"

        } else if(($element_quantity["QUANTITY"] <= 0 && $arFields["QUANTITY"] <= 0) ||
                ($element_quantity["QUANTITY"] > 0 && $element_quantity["QUANTITY"] < $arFields["QUANTITY"])) {
                $quantity_new = '';
        }
        CIBlockElement::SetPropertyValuesEx($ID, false, array("SVEZHIE_POSTUPLENIYA" => $quantity_new));  // ��������� �������
    }

}
    AddEventHandler('main', 'OnEpilog', '_Check404Error', 1);

    function _Check404Error(){
        if(defined('ERROR_404') && ERROR_404=='Y' || CHTTP::GetLastStatus() == "404 Not Found"){
            GLOBAL $APPLICATION;
            $APPLICATION->RestartBuffer();
            require $_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/header.php';
            require $_SERVER['DOCUMENT_ROOT'].'/404.php';
            require $_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/footer.php';
        }
    }

?>