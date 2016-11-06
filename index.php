<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetPageProperty("TITLE", "Maxi Shop");
$APPLICATION->SetTitle("Главная");
?>
<div class="l-main-slider">
	<?$APPLICATION->IncludeComponent(
		"maximaster:slider",
		"",
		Array(
			"CACHE_TIME" => "0",
			"CACHE_TYPE" => "A",
			"IBLOCK_ID" => "1",
			"PAGE_SIZE" => "5",
			"TIMEOUT" => "2000"
		)
	);?>
</div>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>