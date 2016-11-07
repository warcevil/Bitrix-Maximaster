<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult['ITEMS'])):?>
	<div class="row catalog-products">
		<?foreach ($arResult['ITEMS'] as $arItem):?>
			<div class="col-sm-4 col-md-3 catalog-product">
				<div class="catalog-product__pic">
					<img src="<?=$arItem['PICTURE']?>" alt="" class="catalog-product__img">
				</div>
				<div class="catalog-product__info">
					<a href="<?=$arItem['DETAIL_PAGE_URL']?>"><div class="catalog-product__title"><?=$arItem['NAME']?></div></a>
					<div class="catalog-product__price"><?=$arItem['VIEW_PRICE']?></div>
				</div>
				<a href="javascript:void(0);" data-id="<?=$arItem['ID']?>" class="js-add-to-basket catalog-product__buy-link">
					<div class="catalog-product__buy-btn">
						<?=GetMessage('CATALOG_ADD');?>
					</div>
				</a>
			</div>
		<?endforeach?>
	</div>
<?endif?>
