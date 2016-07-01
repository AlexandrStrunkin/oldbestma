<?
if($arResult['DISPLAY_PROPERTIES']['PHOTOS']['VALUE']){
	foreach($arResult['DISPLAY_PROPERTIES']['PHOTOS']['VALUE'] as $img){
		$arResult['GALLERY'][] = array(
			'DETAIL' => CFile::GetFileArray($img),
			'PREVIEW' => CFile::ResizeImageGet($img, array('width' => 600, 'height' => 400), BX_RESIZE_IMAGE_EXACT, true),
			'THUMB' => CFile::ResizeImageGet($img, array('width' => 75, 'height' => 75), BX_RESIZE_IMAGE_EXACT, true),
		);
	}
}
?>