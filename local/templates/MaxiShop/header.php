<?
	if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	IncludeTemplateLangFile(__FILE__);
	CJSCore::Init(array("jquery"));
?>
<html>
<head>
	<?$APPLICATION->ShowHead();?>
	<title><?$APPLICATION->ShowTitle()?></title>
	<?
	$APPLICATION->SetAdditionalCSS("/local/css/main/reset.css");
	$APPLICATION->SetAdditionalCSS("/local/css/main/bootstrap/bootstrap.min.css");
	?>
</head>
<body>
<div class="admin-panel"><?$APPLICATION->ShowPanel()?></div>
<header class="container header">
	<div class="l-header__top-menu">
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
	</div>
</header>
<main class="container content">