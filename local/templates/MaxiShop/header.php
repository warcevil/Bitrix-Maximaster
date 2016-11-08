<?
	if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	IncludeTemplateLangFile(__FILE__);
	CJSCore::Init(array("jquery"));
	use Bitrix\Main\Page\Asset;
?>
<html>
<head>
	<?$APPLICATION->ShowHead();?>
	<title><?$APPLICATION->ShowTitle()?></title>
	<?
	$APPLICATION->SetAdditionalCSS("/local/css/main/reset.css");
	$APPLICATION->SetAdditionalCSS("/local/css/main/bootstrap/bootstrap.min.css");
	Asset::getInstance()->addJs('/local/js/slick/slick.min.js');
	Asset::getInstance()->addJs("/local/js/fancybox/lib/jquery.mousewheel-3.0.6.pack.js");
	Asset::getInstance()->addJs("/local/js/fancybox/source/jquery.fancybox.js");
	Asset::getInstance()->addJs("/local/js/fancybox/source/jquery.fancybox.pack.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/basket_ajax.js");

	Asset::getInstance()->addCss('/local/js/fancybox/source/jquery.fancybox.css');
	Asset::getInstance()->addCss('/local/js/slick/slick.css');
	Asset::getInstance()->addCss('/local/js/slick/slick-theme.css');
	?>
</head>
<body>
<div class="admin-panel"><?$APPLICATION->ShowPanel()?></div>
<header class="container header">
	<nav class="l-header__top-menu">
		<?$APPLICATION->IncludeComponent(
			"bitrix:menu",
			"top-menu",
			Array(
				"ALLOW_MULTI_SELECT" => "N",
				"CHILD_MENU_TYPE" => "left",
				"DELAY" => "N",
				"MAX_LEVEL" => "1",
				"MENU_CACHE_GET_VARS" => array(""),
				"MENU_CACHE_TIME" => "3600",
				"MENU_CACHE_TYPE" => "N",
				"MENU_CACHE_USE_GROUPS" => "Y",
				"ROOT_MENU_TYPE" => "top",
				"USE_EXT" => "N"
			)
		);?>
	</nav>
	<nav>
		<?$APPLICATION->IncludeComponent(
			"bitrix:menu",
			"catalog-menu",
			Array(
				"ALLOW_MULTI_SELECT" => "N",
				"CHILD_MENU_TYPE" => "",
				"DELAY" => "N",
				"MAX_LEVEL" => "1",
				"MENU_CACHE_GET_VARS" => array(""),
				"MENU_CACHE_TIME" => "3600",
				"MENU_CACHE_TYPE" => "N",
				"MENU_CACHE_USE_GROUPS" => "Y",
				"ROOT_MENU_TYPE" => "catalog",
				"USE_EXT" => "Y"
			)
		);?>
	</nav>
</header>
<main class="container content">