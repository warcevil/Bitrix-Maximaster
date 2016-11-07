<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

class MaximasterCatalogSection extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
        $arParams["SECTION_CODE"] = trim($arParams["SECTION_CODE"]);

        return $arParams;
    }

    public function GetItems() {
        $CIBlockElement = new \CIBlockElement();

        echo $this->arParams["SECTION_CODE"];

        $arFilter = Array(
            'IBLOCK_ID' => $this->arParams["IBLOCK_ID"],
            'SECTION_CODE' => $this->arParams["SECTION_CODE"],
            'INCLUDE_SUBSECTIONS' => 'Y'
        );
        CModule::IncludeModule('iblock');
        CModule::IncludeModule('sale');
        $oElements = $CIBlockElement->GetList([], $arFilter);

        while ($arElement = $oElements->GetNext()) {
            $arPrice = \CCatalogProduct::GetOptimalPrice($arElement['ID']);
            $arElement['DISCOUNT_PRICE'] = $arPrice['DISCOUNT_PRICE'];
            $arElement['VIEW_PRICE'] = SaleFormatCurrency($arPrice['DISCOUNT_PRICE'], $arPrice['PRICE']['CURRENCY']);


            if (!empty($arElement['PREVIEW_PICTURE'])) {
                $arElement['PICTURE'] = CFile::GetPath($arElement['PREVIEW_PICTURE']);
            } elseif (!empty($arElement['DETAIL_PICTURE'])) {
                $arElement['PICTURE'] = CFile::GetPath($arElement['DETAIL_PICTURE']);
            }

            $this->arResult['ITEMS'][$arElement['ID']] = $arElement;
        }
    }

    public function executeComponent()
    {
        $this->GetItems();
        $this->includeComponentTemplate();
    }
}