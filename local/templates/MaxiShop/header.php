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
	Шапка сайта
</header>
<main class="container content">