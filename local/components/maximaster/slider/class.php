<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

class SliderNews extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
        $arParams['PAGE_SIZE'] = (int)$arParams['PAGE_SIZE'] <= 0 ? 5 : (int)$arParams['PAGE_SIZE'];
        $arParams['AUTO_PLAY'] = (int)$arParams['TIMEOUT'] <= 0 ? false :  true;
        $arParams['TIMEOUT'] = (int)$arParams['TIMEOUT'];

        return $arParams;
    }

    public function getNews()
    {
        CModule::IncludeModule('iblock');
        $oCIBlockElement = new \CIBlockElement();

        $arResult = [];

        $arSelect = Array('ID', 'NAME', 'DETAIL_PICTURE', 'DETAIL_PAGE_URL', 'PREVIEW_TEXT');
        $arFilter = Array("IBLOCK_ID" => $this->arParams['IBLOCK_ID'], "ACTIVE" => "Y");
        $arElements = $oCIBlockElement->GetList(
            Array(), $arFilter, false,
            Array("nPageSize" => $this->arParams['PAGE_SIZE']), $arSelect
        );
        while ($oElements = $arElements->GetNextElement()) {
            $arElement = $oElements->GetFields();
            $arResult[$arElement['ID']] = $arElement;
            $arResult[$arElement['ID']]['PICTURE_URL'] = CFile::GetPath($arElement['DETAIL_PICTURE']);
        }

        $this->arResult['ELEMENTS'] = $arResult;
    }

    public function executeComponent()
    {

        if ($this->StartResultCache()) {

            $this->arResult['SLICK'] = htmlentities(json_encode(array_filter([
                'autoplay' => $this->arParams['AUTO_PLAY'],
                'autoplaySpeed' => $this->arParams['TIMEOUT'],
            ], 'strlen')));

            $c_test = 'CACHE';
            $this->getNews();
            $this->includeComponentTemplate();
        }

    }
}