<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/* show sort property */
$rsProp = CIBlockProperty::GetList(array('sort' => 'asc', 'name' => 'asc'), Array('ACTIVE' => 'Y', 'IBLOCK_ID' => (isset($arCurrentValues['IBLOCK_ID']) ? $arCurrentValues['IBLOCK_ID'] : $arCurrentValues['ID'])));
$arPropertySort = array();
$arPropertySort['name'] = GetMessage('V_NAME');
while($arr = $rsProp->Fetch()){
	$arPropertySort[$arr['CODE']] = $arr['NAME'];
}

/* show sort direction */
$arSortDirection = array('asc' => GetMessage('SD_ASC'), 'desc' => GetMessage('SD_DESC'));

$arTemplateParameters = array(
	'SHOW_DETAIL_LINK' => array(
		'PARENT' => 'LIST_SETTINGS',
		'NAME' => GetMessage('SHOW_DETAIL_LINK'),
		'TYPE' => 'CHECKBOX',
		'DEFAULT' => 'Y',
	),
	'SORT_PROP' => array(
		'PARENT' => 'LIST_SETTINGS',
		'NAME' => GetMessage('T_SORT_PROP'),
		'TYPE' => 'LIST',
		'VALUES' => $arPropertySort,
		'SIZE' => 3,
		'MULTIPLE' => 'Y'
	),
	'SORT_PROP_DEFAULT' => array(
		'PARENT' => 'LIST_SETTINGS',
		'NAME' => GetMessage('T_SORT_PROP_DEFAULT'),
		'TYPE' => 'LIST',
		'VALUES' => $arPropertySort
	),
	'SORT_DIRECTION' => array(
		'PARENT' => 'LIST_SETTINGS',
		'NAME' => GetMessage('T_SORT_DIRECTION'),
		'TYPE' => 'LIST',
		'VALUES' => $arSortDirection
	),
	'USE_SHARE' => array(
		'PARENT' => 'DETAIL_SETTINGS',
		'SORT' => 600,
		'NAME' => GetMessage('USE_SHARE'),
		'TYPE' => 'CHECKBOX',
		'DEFAULT' => 'N',
	),
	'S_ASK_QUESTION' => array(
		'SORT' => 700,
		'NAME' => GetMessage('S_ASK_QUESTION'),
		'TYPE' => 'TEXT',
		'DEFAULT' => '',
	),
	'S_ORDER_PRODUCT' => array(
		'SORT' => 701,
		'NAME' => GetMessage('S_ORDER_PRODUCT'),
		'TYPE' => 'TEXT',
		'DEFAULT' => '',
	),
	'T_GALLERY' => array(
		'SORT' => 702,
		'NAME' => GetMessage('T_GALLERY'),
		'TYPE' => 'TEXT',
		'DEFAULT' => '',
	),
	'T_DOCS' => array(
		'SORT' => 703,
		'NAME' => GetMessage('T_DOCS'),
		'TYPE' => 'TEXT',
		'DEFAULT' => '',
	),
	'T_PROJECTS' => array(
		'SORT' => 704,
		'NAME' => GetMessage('T_PROJECTS'),
		'TYPE' => 'TEXT',
		'DEFAULT' => '',
	),
	'T_CHARACTERISTICS' => array(
		'SORT' => 705,
		'NAME' => GetMessage('T_CHARACTERISTICS'),
		'TYPE' => 'TEXT',
		'DEFAULT' => '',
	)
);
?>