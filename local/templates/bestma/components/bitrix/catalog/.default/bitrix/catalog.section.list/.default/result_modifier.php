<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
    //arshow($arResult["SECTIONS"],true);



    foreach ($arResult["SECTIONS"] as $id=>$section) {
        $arResult["SECTIONS"][$id]["ELEMENT_CNT"] = 0;
        // $ar_res = CCatalogProduct::GetByID($arSections["$item"]["ID"]); 
        $arSelect = Array("ID", "NAME", "CATALOG_QUANTITY");
        $arFilter = array("IBLOCK_ID"=>$arSections["$item"]["IBLOCK_ID"], "SECTION_ID" => $section["ID"], ">CATALOG_QUANTITY" => 0); 

        $arSubSect = array();
        $subSect = CIBlockSection::GetList(array(),array("IBLOCK_ID"=>$section["IBLOCK_ID"],"SECTION_ID"=>$section["ID"]));
        while($arSubSecttion = $subSect->Fetch()) {
            $arSubSect[] = $arSubSecttion["ID"];  
        }   
        // arshow($arSubSect);
        if (count($arSubSect) > 0) {
            $arSubSect[] = $arSections["$item"]["ID"];
            $arFilter["SECTION_ID"] = $arSubSect;
        }

        $res = CIBlockElement::GetList(Array(), $arFilter, false, false , $arSelect); 
        while($arFields = $res->Fetch()) 
        { 
            $arSections["$item"]["CATALOG_QUANTITY"] = $arFields["CATALOG_QUANTITY"];
            if($arFields["CATALOG_QUANTITY"] > 0){
                $arResult["SECTIONS"][$id]["ELEMENT_CNT"] += 1;  
            }

            //arshow($arSections["$item"]["QUANTITY"]);
        } 
    }
?>