<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

if (is_set($_REQUEST['id'])) {
    $APPLICATION->IncludeComponent(
        "maximaster:cart.add",
        "",
        Array(
            'ID' => $_REQUEST['id']
        )
    );
}