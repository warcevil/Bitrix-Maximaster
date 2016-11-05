<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CModule::IncludeModule("iblock");

$dbIBlockType = CIBlockType::GetList(
    array("sort" => "asc"),
    array("ACTIVE" => "Y")
);
while ($arIBlockType = $dbIBlockType->Fetch())
{
    if ($arIBlockTypeLang = CIBlockType::GetByIDLang($arIBlockType["ID"], LANGUAGE_ID))
        $arIblockType[$arIBlockType["ID"]] = "[".$arIBlockType["ID"]."] ".$arIBlockTypeLang["NAME"];
}

$arComponentParameters = array(
    "PARAMETERS" => array(
        "CACHE_TIME" => array(),

        "TIMEOUT" => array(
            "NAME" => "Время автоматического перелистывания(мс)",
            "DEFAULT" => "2000",
        ),
        "PAGE_SIZE" => array(
            'NAME' => "Количество слайдов",
            'DEFAULT' => "5",
        ),
        "ID_BLOCK" => array(
            'NAME' => "ID Инфоблока",
            'DEFAULT' => "2",
        ),
    )
);
?>