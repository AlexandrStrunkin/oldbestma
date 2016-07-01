<?php
for ($i=0; $i<count($arResult["ITEMS"]["AnDelCanBuy"]); $i++) {
    $item = $arResult["ITEMS"]["AnDelCanBuy"][$i];
    $res = CIBlockElement::GetByID($item["PRODUCT_ID"]);
    if($ar_res = $res->GetNextElement()) {
        $fields = $ar_res->GetFields();
        $rsFile = CFile::GetByID($fields["DETAIL_PICTURE"]);
        $arFile = $rsFile->Fetch();
        $arResult["ITEMS"]["AnDelCanBuy"][$i]["IMAGES"] = $arFile;
    }
}
