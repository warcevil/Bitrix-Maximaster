<?
	if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	IncludeTemplateLangFile(__FILE__);
	CJSCore::Init(array("jquery"));
?>
<html>
<head>
	<?$APPLICATION->ShowHead();?>
	<title><?$APPLICATION->ShowTitle()?></title>
</head>
<body>
<div class="admin-panel"><?$APPLICATION->ShowPanel()?></div>
<header class="header">
	Шапка сайта
</header>
<main class="content">