<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?
function PrintPropsForm($arSource=Array(), $locationTemplate = ".default")
{
	if (!empty($arSource))
	{
		?>

		<?
		foreach($arSource as $arProperties)
		{
			if($arProperties["SHOW_GROUP_NAME"] == "Y")
			{
				?>
				<?
			}
if ($arProperties["FIELD_NAME"]!="ORDER_PROP_3"){
			?>
			<tr>
				<td align="right" valign="top">
					<?= $arProperties["NAME"] ?>:<?
					if($arProperties["REQUIED_FORMATED"]=="Y")
					{
						?><span class="sof-req">*</span><?
					}
					?>
				</td>
				<td>
					<?
					if($arProperties["TYPE"] == "CHECKBOX")
					{
						?>

						<input type="hidden" name="<?=$arProperties["FIELD_NAME"]?>" value="">
						<input type="checkbox" name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>" value="Y"<?if ($arProperties["CHECKED"]=="Y") echo " checked";?>>
						<?
					}
					elseif($arProperties["TYPE"] == "TEXT")
					{
						?>
						<input type="text" maxlength="250" size="<?=$arProperties["SIZE1"]?>" value="<?=$arProperties["VALUE"]?>" name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>">
						<?
					}
					elseif($arProperties["TYPE"] == "SELECT")
					{
						?>
						<select name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>" size="<?=$arProperties["SIZE1"]?>">
						<?
						foreach($arProperties["VARIANTS"] as $arVariants)
						{
							?>
							<option value="<?=$arVariants["VALUE"]?>"<?if ($arVariants["SELECTED"] == "Y") echo " selected";?>><?=$arVariants["NAME"]?></option>
							<?
						}
						?>
						</select>
						<?
					}
					elseif ($arProperties["TYPE"] == "MULTISELECT")
					{
						?>
						<select multiple name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>" size="<?=$arProperties["SIZE1"]?>">
						<?
						foreach($arProperties["VARIANTS"] as $arVariants)
						{
							?>
							<option value="<?=$arVariants["VALUE"]?>"<?if ($arVariants["SELECTED"] == "Y") echo " selected";?>><?=$arVariants["NAME"]?></option>
							<?
						}
						?>
						</select>
						<?
					}
					elseif ($arProperties["TYPE"] == "TEXTAREA")
					{
						?>
						<textarea rows="<?=$arProperties["SIZE2"]?>" cols="<?=$arProperties["SIZE1"]?>" name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>"><?=$arProperties["VALUE"]?></textarea>
						<?
					}
					elseif ($arProperties["TYPE"] == "LOCATION")
					{
						$value = 0;
						if (is_array($arProperties["VARIANTS"]) && count($arProperties["VARIANTS"]) > 0)
						{
							foreach ($arProperties["VARIANTS"] as $arVariant)
							{
								if ($arVariant["SELECTED"] == "Y")
								{
									$value = $arVariant["ID"];
									break;
								}
							}
						}

						$GLOBALS["APPLICATION"]->IncludeComponent(
							"bitrix:sale.ajax.locations",
							$locationTemplate,
							array(
								"AJAX_CALL" => "N",
								"COUNTRY_INPUT_NAME" => "COUNTRY",//.$arProperties["FIELD_NAME"],
								"REGION_INPUT_NAME" => "REGION",//.$arProperties["FIELD_NAME"],
								"CITY_INPUT_NAME" => $arProperties["FIELD_NAME"],
								"CITY_OUT_LOCATION" => "Y",
								"LOCATION_VALUE" => $value,
								"ORDER_PROPS_ID" => $arProperties["ID"],
								"ONCITYCHANGE" => ($arProperties["IS_LOCATION"] == "Y" || $arProperties["IS_LOCATION4TAX"] == "Y") ? "submitForm()" : "",
								"SIZE1" => $arProperties["SIZE1"],
							),
							null,
							array('HIDE_ICONS' => 'Y')
						);
					}
					elseif ($arProperties["TYPE"] == "RADIO")
					{
						foreach($arProperties["VARIANTS"] as $arVariants)
						{
							?>
							<input type="radio" name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>_<?=$arVariants["VALUE"]?>" value="<?=$arVariants["VALUE"]?>"<?if($arVariants["CHECKED"] == "Y") echo " checked";?>> <label for="<?=$arProperties["FIELD_NAME"]?>_<?=$arVariants["VALUE"]?>"><?=$arVariants["NAME"]?></label>
							<?
						}
					}

					if (strlen($arProperties["DESCRIPTION"]) > 0)
					{
						?><small><?echo $arProperties["DESCRIPTION"] ?></small><?
					}
					?>

				</td>
			</tr>
			<?
		}}
		?>
		<?
		return true;
	}
	return false;
}
?>
<li class="shmaiser active">
<div class="content_check">
    <div class="red">
        <div class="gray">
            КОНТАКТНЫЕ ДАННЫЕ
        </div>
        <div class="clear"></div>
    </div>
</div>
<!--    <pre>--><?//print_r($arResult['ORDER_PROP']);?><!--</pre>-->
    <ul class="shaiser_content hello_mozilla" >
        <li>
<div class="w_content">
<!--<table class="sale_order_full_table TEST">-->
<!--<tr><td>-->
<?
if(!empty($arResult))
{
	?>
	<?/*
    <div class="are_you_rabbit">
	<?=GetMessage("SOA_TEMPL_PROP_CHOOSE")?>
	<select name="PROFILE_ID" id="ID_PROFILE_ID" onChange="SetContact(this.value)">
		<option value="0"><?=GetMessage("SOA_TEMPL_PROP_NEW_PROFILE")?></option>
		<?
		foreach($arResult["ORDER_PROP"]["USER_PROFILES"] as $arUserProfiles)
		{
			?>
			<option value="<?= $arUserProfiles["ID"] ?>"<?if ($arUserProfiles["CHECKED"]=="Y") echo " selected";?>><?=$arUserProfiles["NAME"]?></option>
			<?
		}
		?>
	</select>
    </div> */?>
	<?
}

?>
<div style="display:none;">
<?
	$APPLICATION->IncludeComponent(
		"bitrix:sale.ajax.locations",
		$arParams["TEMPLATE_LOCATION"],
		array(
			"AJAX_CALL" => "N",
			"COUNTRY_INPUT_NAME" => "COUNTRY_tmp",
			"REGION_INPUT_NAME" => "REGION_tmp",
			"CITY_INPUT_NAME" => "tmp",
			"CITY_OUT_LOCATION" => "Y",
			"LOCATION_VALUE" => "",
			"ONCITYCHANGE" => "submitForm()",
		),
		null,
		array('HIDE_ICONS' => 'Y')
	);
?>
</div>

<div class="w_content get">
   <?/* <div class="wrapp_input_order">
        <div class="name">
            
        </div>
        <div class="field">
            <input type="text" id="ORDER_PROP_1" name="ORDER_PROP_1" value="test@bestma.ru" size="0" maxlength="250" />
        </div>
    </div>
    * 
    */?>
    <div class="person_data">

        <?foreach ($arResult["ORDER_PROP"]["USER_PROPS_N"] as $arPersonData):?>
            <div class="label_and_input" style="<?if ($arPersonData['ID']=='16'){echo('width:340px');};?>"  >

                <div class="label_of_input">
                    <?=$arPersonData["NAME"]?>:
                    <?if($arPersonData['REQUIED']=="Y"):?>
                        <span class="sof-req">*</span>
                    <?endif;?>
                </div>
                <div class="input_data">
                    <input type="text" maxlength="250" size="0" value="<?=$arPersonData['VALUE']?>" name="ORDER_PROP_<?=$arPersonData['ID']?>" id="ORDER_PROP_<?=$arPersonData['ID']?>">

                </div>
            </div>
        <?endforeach;?>


        <?

//        PrintPropsForm($arResult["ORDER_PROP"]["USER_PROPS_N"], $arParams["TEMPLATE_LOCATION"]);
//        PrintPropsForm($arResult["ORDER_PROP"]["USER_PROPS_Y"], $arParams["TEMPLATE_LOCATION"]);
        ?>
    </div>
<table class="sale_order_full_table_no_border get" style="width: 100%">
<?


?>
</table>
</div>
<!--</td></tr></table>-->
</div>
            </li>
    <li class="clean" style="clear: both"></li>

    </ul>

    </li>