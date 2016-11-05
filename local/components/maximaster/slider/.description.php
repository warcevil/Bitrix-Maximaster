<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$arComponentDescription = array(
    "NAME" => "Новостной слайдер",
    "DESCRIPTION" => "Слайдер для размещения новостей",
    "ICON" => "/images/feedback.gif",
    "PATH" => array(
        "ID" => "maximaster",
        "NAME" => "Максимастер",
        "CHILD" => [
            "ID" => "general",
            "NAME" => "Общие"
        ]
    ),
);
