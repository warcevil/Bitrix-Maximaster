<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<div class="catalog-sections">
	<?foreach($arResult['SECTIONS'] as $arSection):?>
		<div class="col-sm-1 col-md-2 catalog-sections__section">
			<a class="catalog-sections__section-url" href="<?=$arSection['SECTION_PAGE_URL']?>">
				<div class="catalog-sections__section-pic">
					<?if(false === $arSection['PICTURE']):?>
						<img class="catalog-sections__section-img" src="<?=$arSection['PICTURE']?>" alt="">
					<?else:?>
						<img class="catalog-sections__section-img" src="<?=$arSection['PICTURE']?>" alt="">
					<?endif?>
				</div>
				<div class="catalog-sections__section-title">
					<?=$arSection['NAME']?>
				</div>
			</a>
		</div>
	<?endforeach?>
</div>