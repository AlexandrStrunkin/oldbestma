<? if (count($arResult) > 0): ?>
    <div class="wrapp_manufactures">
        <div class="this">Фильтр по производителям:</div>
        <ul>
            <? foreach ($arResult as $listItem): ?>
                <li <?
                if (isset($_SESSION[$arParams["PROPERTY_NAME"]])) {
                    if ($_SESSION[$arParams["PROPERTY_NAME"]] == $listItem["ID"]) {
                        ?>class="active"<?
                        }
                    }
                    ?>>
                        <? $listItem["ID"]; ?>
                    <a 
                        href="<?= $APPLICATION->GetCurPageParam($arParams["PROPERTY_NAME"] . "=" . $listItem["ID"], array($arParams["PROPERTY_NAME"])); ?>">
                            <?= $listItem["VALUE"] ?>
                    </a>
                </li>
            <? endforeach; ?>
            <li <? if (!(isset($_SESSION[$arParams["PROPERTY_NAME"]])) || ($_SESSION[$arParams["PROPERTY_NAME"]] == "unset")): ?>class="active"<? endif ?>>
                <a href="<?= $APPLICATION->GetCurPageParam($arParams["PROPERTY_NAME"] . "=unset", array($arParams["PROPERTY_NAME"])); ?>">
                    Все</a> </li>

        </ul>
    </div>
<? endif; ?>
