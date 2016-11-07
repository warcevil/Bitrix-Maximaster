<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/**
 * Class MaximasterCartAjax
 *
 * @property int $nId   - asdasasads
 */

class MaximasterCartAjax extends CBitrixComponent
{
    protected $nId;

    public function onPrepareComponentParams($arParams)
    {
        $arParams['ID'] = intval($arParams['ID']);
        return $arParams;
    }

    public function AddProduct() {
        if (CModule::IncludeModule("catalog")) {
            $iProductId = Add2BasketByProductID(
                $this->arParams["ID"],
                1,
                array(),
                array()
            );
        };

        return $iProductId;
    }

    public function GetBasketProduct($ID)
    {
        $this->arResult['ADDED_PRODUCT'] = [];

        if (CModule::IncludeModule("sale")) {
            $dbBasketItems = CSaleBasket::GetList([], ['ID' => $ID]);
            $this->arResult['ADDED_PRODUCT'] = $dbBasketItems->Fetch();
        }
    }

    public function executeComponent()
    {
        $iAddedIdProduct = $this->AddProduct();
        $this->GetBasketProduct($iAddedIdProduct);
        $this->includeComponentTemplate();
    }
}