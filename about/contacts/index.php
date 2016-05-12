<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?> 
<div class="white_block"> 
  <div class="wrapp_tape"> 
    <div class="tape"></div>
   
    <div class="tape right"></div>
   </div>
 
  <div class="content_check"> 
    <div class="red"> 
      <div class="gray"> <? $APPLICATION->ShowTitle(); ?> </div>
     
      <div class="clear"></div>
     </div>
   </div>
 
  <div class="w_contacts"> 
    <div style="float: right;"> 
<script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=8epU0QQxzPlhaFn9cvi30eAlts72dU_-&width=300&height=300"></script>
 </div>
   
    <ul class="contacts_list"> 
      <li class="phone"> <strong><font size="2">Телефон интернет магазина BESTMA.RU</font></strong><font size="3">  </font> 
        <br />
       <font size="2"> +7 (495) 729-20-25  
          <br />
         +7 (903) 729-20-25<b><font color="#ff0000"> доступны WhatsApp, Viber</font></b></font></li>
     </ul>
   
    <div><font size="2"><b><font color="#ff0000">          </font><font color="#000000">Отдел реализации:</font></b></font></div>
   
    <div><font size="2"><b><font color="#000000"> 
            <br />
           </font></b></font></div>
   
    <div><font size="2"><b><font color="#000000">          Екатерина</font></b></font></div>
   
    <div><font size="2"><b><font color="#000000">            Skype: bestma.ru</font></b></font></div>
   
    <div><b><font color="#000000"><font size="2">            icq: 385030385</font></font></b></div>
   
    <div><b><font color="#000000"><font size="2">            Почта: finityopt@mail.ru</font></font></b></div>
   
    <div><b><font color="#000000"><font size="2">          Евгения</font></font></b></div>
   
    <div><b><font color="#000000"><font size="2">            Skype: bestmaopt</font></font></b></div>
   
    <div><b><font color="#000000"><font size="2">            icq: 622280006</font></font></b></div>
   
    <div><b><font color="#000000"><font size="2">            Почта: infinityopt@mail.ru</font></font></b></div>
   
    <div><b><font color="#000000"><font size="2"> 
            <br />
           </font></font></b></div>
   
    <ul class="contacts_list"> 
      <li class="mail"><font size="2"><b style="font-weight: bold;">Для дополнительных вопросов</b> 
          <br />
         <b>  </b> bestma@inbox.ru </font></li>
     
      <li class="l_address"><font size="2"><strong style="font-weight: bold;">Юридический адрес</strong> 
          <br />
         <b>  </b>ИП &quot;Соломатина Екатерина Игоревна&quot;,  111531, г. Москва,  шоссе Энтузиастов д.94<b>         </b> 
          <br />
         <b>   </b></font></li>
     
      <li class="office_address"> <font size="2"><strong style="font-weight: bold;">Главный офис</strong> 
          <br />
         КОМПAНИЯ BESTMA 
          <br />
         (Оптовая продажа аксессуаров к сотовым телефонам) 
          <br />
         Aдрес: г.Москвa, ул. Докукинa, дом 10 
          <br />
         
          <br />
         
          <ul class="contacts_list" style="font-weight: bold;"> 
            <br />
           </ul>
         </font></li>
     </ul>
   
    <div class="w_contacts"><span style="color: rgb(0, 0, 0); font-size: small;"> </span></div>
   <b style="color: rgb(0, 0, 0); font-size: small;"> <font size="2"> 
        <br />
       
        <div class="w_form"> <a class="gray_button callback" href="#" ><span>Заказать обратный звонок</span></a> 
          <div class="clear"></div>
         <form class="cont" method="post" action="/callback/" name="SIMPLE_FORM_1" enctype="multipart/form-data"> <?= bitrix_sessid_post(); ?> <input type="hidden" value="1" name="WEB_FORM_ID" /> <input type="hidden" value="Сохранить" name="web_form_submit" /> <a class="submit_callback" href="#" ><span>Заказать обратный звонок</span></a> 
            <div class="clear"></div>
           
            <div class="w_bg_callback"> 
              <div class="hidden_shadow"> <a class="submit_callback" href="#" ><span>Заказать обратный звонок</span></a> </div>
             
              <div class="head_inf"> Мы перезвоним Вам через 10 минут! С 9:00 до 19:00 </div>
             
              <div class="w_fields"> 
                <div class="b_fields buyer_inf"> 
                  <div class="w_input"> 
                    <div class="w_label"> Как Вас зовут? </div>
                   
                    <div class="w_input_field name"> <input type="text" name="form_text_1" value="" /> </div>
                   </div>
                 
                  <div class="w_input"> 
                    <div class="w_label"> Вопрос или комментарий </div>
                   
                    <div class="w_input_field textarea"> <textarea class="question" name="form_textarea_6" cols="1" rows="1"></textarea> </div>
                   </div>
                 </div>
               
                <div class="b_fields separator"> </div>
               
                <div class="b_fields contact_nubm"> 
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
                        <div class="w_input_field textarea numb"> <textarea class="numb" name="form_text_2" cols="1" rows="1"></textarea> </div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             <a class="submit" href="#" >Заказать звонок</a> </div>
           </form> </div>
       
        <div class="contacts_image"></div>
       </font> <font size="2"> </font> </b></div>
 </div>
 <? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>