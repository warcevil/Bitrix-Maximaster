<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

class SliderNews extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {

        echo $arParams['SECTION_ID'];
        if(!isset($arParams["CACHE_TIME"]))
            $arParams["CACHE_TIME"] = 36000000;

        $arParams["IBLOCK_TYPE"] = trim($arParams["IBLOCK_TYPE"]);
        $arParams["IBLOCK_ID"] = intval($arParams["IBLOCK_ID"]);
        $arParams["SECTION_ID"] = intval($arParams["SECTION_ID"]);
        $arParams["SECTION_CODE"] = trim($arParams["SECTION_CODE"]);

        $arParams["SECTION_URL"]=trim($arParams["SECTION_URL"]);

        $arParams["TOP_DEPTH"] = intval($arParams["TOP_DEPTH"]);
        if($arParams["TOP_DEPTH"] <= 0)
            $arParams["TOP_DEPTH"] = 2;
        $arParams["COUNT_ELEMENTS"] = $arParams["COUNT_ELEMENTS"]!="N";
        $arParams["ADD_SECTIONS_CHAIN"] = $arParams["ADD_SECTIONS_CHAIN"]!="N"; //Turn on by default
        return $arParams;
    }

    public function GetSections()
    {
        $arSections = array();

        $arFilter["ID"] = $this->arParams["SECTION_ID"];
        $arFilter = Array('IBLOCK_ID' => $this->arParams["IBLOCK_ID"], 'SECTION_ID' => $this->arParams['SECTION_ID']);
        $oSections = CIBlockSection::GetList(
            [],
            $arFilter
        );

        while ($arSection = $oSections->GetNext()) {
            $arSections[$arSection['ID']]['ID'] = $arSection['ID'];
            $arSections[$arSection['ID']]['EDIT_LINK'] = $arSection['EDIT_LINK'];
            $arSections[$arSection['ID']]['NAME'] = $arSection['NAME'];
            $arSections[$arSection['ID']]['SECTION_PAGE_URL'] = $arSection['SECTION_PAGE_URL'];
            $arSections[$arSection['ID']]['PICTURE'] = CFile::GetPath($arSection['PICTURE']);
        }

        $this->arResult['SECTIONS'] = $arSections;
    }

    public function executeComponent()
    {
        if($this->startResultCache()) {
            $this->GetSections();
            $this->includeComponentTemplate();
        };
    }
}