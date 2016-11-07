<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult['ADDED_PRODUCT'])):?>
	<div class="add-basket-ajax">
		<div class="add-basket-ajax__text">
			Товар <b><?=$arResult['ADDED_PRODUCT']['NAME']?></b> успешно добавлен в корзину.</br>
			Количество данного товара в корзине: <?=$arResult['ADDED_PRODUCT']['QUANTITY']?>
		</div>
	</div>

<?else:?>
	<div class="add-basket-ajax">
		<div class="add-basket-ajax__text">
			Ошибка при добавлении товара в корзину
		</div>
	</div>
<?endif?>
