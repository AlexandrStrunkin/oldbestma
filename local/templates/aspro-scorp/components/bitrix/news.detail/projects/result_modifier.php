<?
$arPreviewSizeDefault = array('width' => 536, 'height' => 402);
$arPreviewSizeBig = array('width' => 668, 'height' => 501);

if(is_array($arResult['FIELDS']['DETAIL_PICTURE'])){
	$arResult['GALLERY'][] = array(
		'DETAIL' => $arResult['DETAIL_PICTURE'],
		'PREVIEW' => CFile::ResizeImageGet($arResult['DETAIL_PICTURE'] , ($arResult['DISPLAY_PROPERTIES']['FORM_QUESTION']['VALUE_XML_ID'] == 'YES' ? $arPreviewSizeDefault : $arPreviewSizeBig), BX_RESIZE_IMAGE_EXACT, true),
		'THUMB' => CFile::ResizeImageGet($arResult['DETAIL_PICTURE'] , array('width' => 98, 'height' => 75), BX_RESIZE_IMAGE_EXACT, true),
		'TITLE' => $arResult['DETAIL_PICTURE'],
	);
}

if(!empty($arResult['PROPERTIES']['PHOTOS']['VALUE'])){
	foreach($arResult['PROPERTIES']['PHOTOS']['VALUE'] as $img){
		$arResult['GALLERY'][] = array(
			'DETAIL' => CFile::GetFileArray($img),
			'PREVIEW' => CFile::ResizeImageGet($img, ($arResult['DISPLAY_PROPERTIES']['FORM_QUESTION']['VALUE_XML_ID'] == 'YES' ? $arPreviewSizeDefault : $arPreviewSizeBig), BX_RESIZE_IMAGE_EXACT, true),
			'THUMB' => CFile::ResizeImageGet($img , array('width' => 98, 'height' => 75), BX_RESIZE_IMAGE_EXACT, true),
			'TITLE' => CFile::GetFileArray($img),
		);
	}
}

if($arResult['DISPLAY_PROPERTIES']){
	$arResult['CHARACTERISTICS'] = array();
	foreach($arResult['DISPLAY_PROPERTIES'] as $PCODE => $arProp){
		if(!in_array($arProp['CODE'], array('DOCUMENTS', 'LINK_PROJECTS', 'FORM_QUESTION', 'FORM_PROJECT'))){
			if(strlen($arProp['VALUE'])){
				$arResult['CHARACTERISTICS'][$PCODE] = $arProp;
			}
		}
	}
}
?>