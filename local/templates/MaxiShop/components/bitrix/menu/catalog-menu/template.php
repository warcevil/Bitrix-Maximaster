<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

?>
<? if (!empty($arResult)): ?>
    <?

    $iPreviousLevel = 0;

    ?>
    <div class="catalog-menu">

        <? foreach ($arResult as $arItem): ?>

            <? if ($arItem['DEPTH_LEVEL'] > $iPreviousLevel): ?>

                <?if ($arItem['DEPTH_LEVEL'] <= 3):?>

                    <div class="catalog-menu__container catalog-menu__container_list-<?= $arItem['DEPTH_LEVEL'] ?>">
                        <ul class="container catalog-menu__list catalog-menu__list_list-<?= $arItem['DEPTH_LEVEL'] ?>">

                <?elseif ($arItem['DEPTH_LEVEL'] == 4):?>

                    <div>
                        <ul class="catalog-menu__list catalog-menu__list_list-4">

                <?endif?>

            <? elseif ($arItem['DEPTH_LEVEL'] < $iPreviousLevel): ?>

                <?if ($arItem['DEPTH_LEVEL'] <= 3):?>
                    <?= str_repeat("</li></ul></div>", ($iPreviousLevel - $arItem["DEPTH_LEVEL"])); ?>
                <?elseif ($arItem['DEPTH_LEVEL'] == 5):?>
                    </li></ul>

                <?endif?>

            <? elseif ($arItem['DEPTH_LEVEL'] == $iPreviousLevel): ?>
                </li>

            <? endif ?>

                <li class="catalog-menu__item catalog-menu__item_item-<?= ($arItem['DEPTH_LEVEL'] < 4) ? $arItem['DEPTH_LEVEL'] : 4;  ?>  <?=($arItem["SELECTED"])? 'catalog-menu__item_selected-'.$arItem['DEPTH_LEVEL'] : ''?>">
                    <a href="<?=$arItem['LINK']?>"><?= $arItem['TEXT'] ?></a>

            <? $iPreviousLevel = $arItem['DEPTH_LEVEL'] ?>
        <? endforeach ?>
        </li>
        <?if ($iPreviousLevel > 1)://close last item tags?>
            <?=str_repeat("</ul></div>", ($iPreviousLevel-1) );?>
        <?endif?>
    </div>
<? endif ?>