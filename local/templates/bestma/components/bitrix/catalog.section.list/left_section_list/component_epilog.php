<?php
$url = explode("/",$APPLICATION->GetCurPage());
$cur_section = $url[2];

//получаем родителя первого уровня
$section =  CIBlockSection::GetList(array('left_margin' => 'asc'), array('CODE' => $cur_section));
if ($arSection = $section->Fetch()) {
    if(empty($arSection["IBLOCK_SECTION_ID"])) {
        $trueActive = $arSection["ID"];
    } else{
        $trueActive = $arSection["IBLOCK_SECTION_ID"];
        $trueActive_link = $arSection["ID"];
    }
}

?>
<script>
$(function(){
    $('#s' + '<?=$trueActive?> > a').addClass('active');
    $('#s' + '<?=$trueActive?> > ul').show();
    $('#s' + '<?=$trueActive_link?> > a').css('text-decoration', 'underline');
});
</script>