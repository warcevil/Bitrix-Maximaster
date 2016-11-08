<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?><?
$psTitle = "PayMill";
$psDescription = "";

$arPSCorrespondence = array(
		"SHOP_CODE" => array(
				"NAME" => "Shop code",
				"DESCR" => "The Shop code obtained from the payment system",
				"VALUE" => "",
				"TYPE" => ""
			),
		"TEST_TRANSACTION" => array(
				"NAME" => "Test transaction",
				"DESCR" => "Indicates whether the transaction should be processed as a test transaction (any value)",
				"VALUE" => "",
				"TYPE" => ""
			),
		"SUCCESS_URL" => array(
			"NAME" => "Success url",
			"DESCR" => "Страница, на которую будет редирект после успешной оплаты",
			"VALUE" => "",
			"TYPE" => ""
		)
	);
?>