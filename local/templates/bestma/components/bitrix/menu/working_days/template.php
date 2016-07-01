<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>


<ul class="working_days">

<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($arItem["LINK"] == ""):?>
		<li><?=$arItem["TEXT"]?></li>
	<?else:?>
		<li class="false"><?=$arItem["TEXT"]?></li>
	<?endif?>
	
<?endforeach?>

</ul>
<?endif?>