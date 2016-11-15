<? $this->setFrameMode(true) ?>
<?if (!empty($arResult)):?>
<div class="news-slider js-news-slider" data-slick="<?= $arResult['SLICK'] ?>">
    <? foreach ($arResult['ELEMENTS'] as $arElement): ?>
        <div class="news-slider__slide">
            <img src="<?= $arElement['PICTURE_URL'] ?>" alt="" class="news-slider__pic">

            <div class="news-slider__title">
                <a class="news-slider__link" href="<?= $arElement['DETAIL_PAGE_URL'] ?>"><?= $arElement['NAME'] ?></a>
            </div>
            <div class="news-slider__text">
                <?= $arElement['PREVIEW_TEXT'] ?>
            </div>
        </div>
    <? endforeach; ?>
</div>
<?endif?>
