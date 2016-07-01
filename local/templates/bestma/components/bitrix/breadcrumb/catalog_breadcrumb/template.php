<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if (!empty($arResult)): ?>
    <? ob_start(); ?>
    <ul class="bread_crubs">
        <li><a href="/">Главная</a><span>/</span></li>
        <?
        $endPage = end($arResult);
        reset($arResult);
        foreach ($arResult as $page):
            ?>
            <? if ($page["LINK"] === $endPage["LINK"]): ?>
                <li><span><?= htmlspecialchars($page["TITLE"]); ?></span></li>
            <? else: ?>
                <li><a href="<?= $page["LINK"]; ?>"><?= htmlspecialchars($page["TITLE"]); ?></a><span>/</span></li>
            <? endif ?>
        <? endforeach; ?>
    </ul>
    <?
    $bread_crubs_str = ob_get_contents();
    ob_end_clean();
    $bread_crubs_str = preg_replace("'([\r\n])[\s]+'", "", $bread_crubs_str);//для списка с display: inline; удаляет лишние отступы.
    return $bread_crubs_str; 
    ?>
    <?
else:
    return "";
endif;
?>


