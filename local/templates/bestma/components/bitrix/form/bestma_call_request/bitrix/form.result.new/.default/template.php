<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
           
<div class="w_form"> 
    <a class="gray_button callback" href="#" ><span>Заказать обратный звонок</span></a> 
    <div class="clear"></div>
    <?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

    <?=$arResult["FORM_NOTE"]?>

    <?if ($arResult["isFormNote"] != "Y")
    {
    ?>
    <?=$arResult["FORM_HEADER"]?>
    <div class="clear"></div>
    <table>
    <?
    if ($arResult["isFormDescription"] == "Y" || $arResult["isFormTitle"] == "Y" || $arResult["isFormImage"] == "Y")
    {
    ?>
	    <tr>
		    <td><?
    /***********************************************************************************
					    form header
    ***********************************************************************************/
    if ($arResult["isFormTitle"])
    {
    ?>
	    <h3><?=$arResult["FORM_TITLE"]?></h3>
    <?
    } //endif ;

	    if ($arResult["isFormImage"] == "Y")
	    {
	    ?>
	    <a href="<?=$arResult["FORM_IMAGE"]["URL"]?>" target="_blank" alt="<?=GetMessage("FORM_ENLARGE")?>"><img src="<?=$arResult["FORM_IMAGE"]["URL"]?>" <?if($arResult["FORM_IMAGE"]["WIDTH"] > 300):?>width="300"<?elseif($arResult["FORM_IMAGE"]["HEIGHT"] > 200):?>height="200"<?else:?><?=$arResult["FORM_IMAGE"]["ATTR"]?><?endif;?> hspace="3" vscape="3" border="0" /></a>
	    <?//=$arResult["FORM_IMAGE"]["HTML_CODE"]?>
	    <?
	    } //endif
	    ?>

			    <p><?=$arResult["FORM_DESCRIPTION"]?></p>
		    </td>
	    </tr>
	    <?
    } // endif
	    ?>
    </table>
    <br />
    <?
    /***********************************************************************************
						    form questions
    ***********************************************************************************/
    ?>
    <div class="w_bg_callback">
        <div class="hidden_shadow"> 
            <a href="#" class="submit_callback" name="web_form_submit" value="">
                <span>Заказать обратный звонок</span>
            </a> 
        </div>
        <div class="head_inf"> Мы перезвоним Вам через 10 минут! С 9:00 до 19:00 </div>
	    <div class="w_fields">
            <div class="b_fields buyer_inf">
	            <?
	            foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) { 
                    if ($arQuestion["STRUCTURE"][0]["QUESTION_ID"] != 7) {
	                    ?>
			            <div class="w_input">
                            <div class="w_label">
				                <?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
				                <span class="error-fld" title="<?=$arResult["FORM_ERRORS"][$FIELD_SID]?>"></span>
				                <?endif;?>
				                <?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?>
				                <?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />".$arQuestion["IMAGE"]["HTML_CODE"] : ""?>
			                </div>
			                <div class="w_input_field <?= $arQuestion['STRUCTURE'][0]["FIELD_TYPE"] ?>"><?=$arQuestion["HTML_CODE"]?></div>
                        </div>
                <?  }
                }?>
                </div>
                <?
                foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) { 
                    if ($arQuestion["STRUCTURE"][0]["QUESTION_ID"] == 7) {?>
                        <div class="b_fields separator"></div>
                        <div class="b_fields contact_nubm">
                            <div class="b_fields w_switch hide_input">
                                <ul class="switch"> 
                                    <li class="case active"> 
                                      <div class="phone"> <input checked="checked" type="radio" value="3" name="form_radio_SIMPLE_QUESTION_147" /> </div>
                                     </li>
                                   
                                    <li class="case"> 
                                      <div class="skype"> <input type="radio" value="4" name="form_radio_SIMPLE_QUESTION_147" /> </div>
                                     </li>
                                   
                                    <li class="case"> 
                                      <div class="icq"> <input type="radio" value="5" name="form_radio_SIMPLE_QUESTION_147" /> </div>
                                     </li>
                                </ul>
                            </div>
                            <div class="b_fields">
                                <div class="w_input">
                                    <div class="w_input_field <?= $arQuestion['STRUCTURE'][0]["FIELD_TYPE"] ?> numb"><?=$arQuestion["HTML_CODE"]?></div>
                                </div>
                            </div>
                        </div>
                    <?}    
                    //endwhile
                }
	            ?>
    <?
    if($arResult["isUseCaptcha"] == "Y")
    {
    ?>
		    <div class="b_fields captcha">
                <div class="w_input">
                    <div class="w_label"><?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?><?=$arResult["REQUIRED_SIGN"];?></div>
                    <input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" /><img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="180" height="40" />
                    <div class="w_input_field captcha_field">
                        <input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" />
                    </div>
                </div>
            </div>
            
    <?
    } // isUseCaptcha
    ?>
    <input <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="Заказать звонок" />
    <?if ($arResult["F_RIGHT"] >= 15):?>
        &nbsp;<input type="hidden" name="web_form_apply" value="Y" />
    <?endif;?>
    </div>
    <?=$arResult["FORM_FOOTER"]?>
    <?
    } //endif (isFormNote)
    ?>
</div>
<script>
$(document).ready(function(){
    $(".w_form textarea").each(function(){
        if ($(this).attr("name") == "form_textarea_8") {
            $(this).addClass("question");
        } else if ($(this).attr("name") == "form_textarea_9") {
            $(this).addClass("numb");
        }
    })
})</script>