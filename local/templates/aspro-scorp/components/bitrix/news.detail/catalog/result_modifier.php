<?
if($arParams['DISPLAY_PICTURE'] != 'N'){
	if(is_array($arResult['DETAIL_PICTURE'])){
		$arResult['GALLERY'][] = array(
			'DETAIL' => $arResult['DETAIL_PICTURE'],
			'PREVIEW' => CFile::ResizeImageGet($arResult['DETAIL_PICTURE'] , array('width' => 310, 'height' => 285), BX_RESIZE_PROPORTIONAL, true),
			'THUMB' => CFile::ResizeImageGet($arResult['DETAIL_PICTURE'] , array('width' => 75, 'height' => 75), BX_RESIZE_IMAGE_EXACT, true),
			'TITLE' => $arResult['DETAIL_PICTURE'],
		);
	}
	
	if(!empty($arResult['PROPERTIES']['PHOTOS']['VALUE'])){
		foreach($arResult['PROPERTIES']['PHOTOS']['VALUE'] as $img){
			$arResult['GALLERY'][] = array(
				'DETAIL' => CFile::GetFileArray($img),
				'PREVIEW' => CFile::ResizeImageGet($img, array('width' => 310, 'height' => 285), BX_RESIZE_PROPORTIONAL, true),
				'THUMB' => CFile::ResizeImageGet($img , array('width' => 75, 'height' => 75), BX_RESIZE_IMAGE_EXACT, true),
				'TITLE' => CFile::GetFileArray($img),
			);
		}
	}
}

if($arResult['DISPLAY_PROPERTIES']){
	$arResult['CHARACTERISTICS'] = array();
	foreach($arResult['DISPLAY_PROPERTIES'] as $arProp){
		if(!in_array($arProp['CODE'], array('PERIOD', 'PHOTOS', 'PRICE', 'PRICEOLD', 'ARTICLE', 'STATUS', 'DOCUMENTS', 'LINK_GOODS', 'LINK_STAFF', 'LINK_REVIEWS', 'LINK_PROJECTS', 'LINK_SERVICES', 'FORM_ORDER', 'FORM_QUESTION', 'PHOTOPOS'))){
			if(strlen($arProp['VALUE'])){
				$arResult['CHARACTERISTICS'][] = $arProp;
			}
		}
	}
}
?>