<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<li class="shmaiser active">
<div class="content_check">
                                <div class="red">
                                    <div class="gray">
                                        <?=GetMessage("SOA_TEMPL_SUM_TITLE")?>
                                    </div>
                                    <div class="clear"></div>
                                </div>
</div>
    <ul class="shaiser_content">
        <li>
<div class="w_content">
<table class="sale_order_full data-table full_order_table">
	<tr>
		<th class="product_block"><?=GetMessage("SOA_TEMPL_SUM_NAME")?></th>
		<?/*<th><?=GetMessage("SOA_TEMPL_SUM_PROPS")?></th>*/?>
		<th class="center"><?=GetMessage("SOA_TEMPL_SUM_PRICE_TYPE")?></th>
		<th class="center"><?=GetMessage("SOA_TEMPL_SUM_QUANTITY")?></th>
        <th class="center"><?=GetMessage("SOA_TEMPL_SUM_PRICE")?></th>
	</tr>
	<?
	foreach($arResult["BASKET_ITEMS"] as $arBasketItems)
	{
		?>
		<tr>
			<td class="product_block"><?=$arBasketItems["NAME"]?></td>
			<?/*<td>
				<?
				foreach($arBasketItems["PROPS"] as $val)
				{
					echo $val["NAME"].": ".$val["VALUE"]."";
				}
				?>
			</td>*/?>
                        <td class="center"><?=$arBasketItems["NOTES"]?></td>			<td class="center"><?=$arBasketItems["QUANTITY"]?></td>
			<td align="right"><?=$arBasketItems["PRICE_FORMATED"]?></td>
		</tr>
		<?
	}
	?>
	<tr>
<!--		<td align="right"><b>--><?//=GetMessage("SOA_TEMPL_SUM_SUMMARY")?><!--</b></td>-->
<!--		<td align="right" colspan="6">--><?//=$arResult["ORDER_PRICE_FORMATED"]?><!--</td>-->
	</tr>
	<?
	if (doubleval($arResult["DISCOUNT_PRICE"]) > 0)
	{
		?>
		<tr>
			<td align="right"><b><?=GetMessage("SOA_TEMPL_SUM_DISCOUNT")?><?if (strLen($arResult["DISCOUNT_PERCENT_FORMATED"])>0):?> (<?echo $arResult["DISCOUNT_PERCENT_FORMATED"];?>)<?endif;?>:</b></td>
			<td align="right" colspan="6"><?echo $arResult["DISCOUNT_PRICE_FORMATED"]?>
			</td>
		</tr>
		<?
	}
	/*
	if (doubleval($arResult["VAT_SUM_FORMATED"]) > 0)
	{
		?>
		<tr>
			<td align="right">
				<b><?=GetMessage("SOA_TEMPL_SUM_VAT")?></b>
			</td>
			<td align="right" colspan="6"><?=$arResult["VAT_SUM_FORMATED"]?></td>
		</tr>
		<?
	}
	*/
	if(!empty($arResult["arTaxList"]))
	{
		foreach($arResult["arTaxList"] as $val)
		{
			?>
			<tr>
				<td align="right"><?=$val["NAME"]?> <?=$val["VALUE_FORMATED"]?>:</td>
				<td align="right" colspan="6"><?=$val["VALUE_MONEY_FORMATED"]?></td>
			</tr>
			<?
		}
	}
	if (doubleval($arResult["DELIVERY_PRICE"]) > 0)
	{
		?>
		<tr>
			<td align="right">
				<b><?=GetMessage("SOA_TEMPL_SUM_DELIVERY")?></b>
			</td>
			<td align="right" colspan="6"><?=$arResult["DELIVERY_PRICE_FORMATED"]?></td>
		</tr>
		<?
	}
	?>
	<tr>

		<td align="right" colspan="6">
            <b><?=GetMessage("SOA_TEMPL_SUM_IT")?></b>
            <b class="itogo_numbers"><?=$arResult["ORDER_TOTAL_PRICE_FORMATED"]?></b>
		</td>
	</tr>
	<?
	if (strlen($arResult["PAYED_FROM_ACCOUNT_FORMATED"]) > 0)
	{
		?>
		<tr>
			<td align="right"><b><?=GetMessage("SOA_TEMPL_SUM_PAYED")?></b></td>
			<td align="right" colspan="6"><?=$arResult["PAYED_FROM_ACCOUNT_FORMATED"]?></td>
		</tr>
		<?
	}
	?>
</table>
</div>
            </li></ul>
</li>
<li class="shmaiser active">
    <div class="content_check">
                                <div class="red">
                                    <div class="gray">
                                        <?=GetMessage("SOA_TEMPL_SUM_COMMENTS")?>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
    <ul class="shaiser_content">
        <li>
<div class="w_content">
<table class="sale_order_full_table">
	<tr>
		<td width="50%" align="left" valign="top">
                    <div class="ORDER_DESCRIPTION"><textarea rows="4" cols="40" name="ORDER_PROP_3" id="ORDER_DESCRIPTION"><?=$arResult["USER_VALS"]["ORDER_DESCRIPTION"]?></textarea></div>
		</td>
	</tr>
</table>
</div>
    </li>
    </ul>
</li>