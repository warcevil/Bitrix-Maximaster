<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Квитанция</title>
	<meta http-equiv="Content-Type" content="text/html; charset=<?= LANG_CHARSET ?>">
	<style type="text/css">
		H1 {font-size: 12pt;}
		p, ul, ol, h1 {margin-top:6px; margin-bottom:6px}
		td {font-size: 9pt;}
		small {font-size: 7pt;}
		body {font-size: 10pt;}
	</style>
</head>
<body bgColor="#ffffff">
<?
$orderId = $GLOBALS["SALE_INPUT_PARAMS"]["ORDER"]["ID"];
 ?>
<table border="0" cellspacing="0" cellpadding="0" style="width:180mm; height:145mm;">
	<tr valign="top">
		<td style="width:50mm; height:70mm; border:1pt solid #000000; border-bottom:none; border-right:none;" align="center">
			<b>Извещение</b><br>
			<font style="font-size:53mm">&nbsp;<br></font>
			<b>Кассир</b>
		</td>
		<td style="border:1pt solid #000000; border-bottom:none;" align="center">
			<table border="0" cellspacing="0" cellpadding="0" style="width:122mm; margin-top:3pt;">
				<tr>
					<td style="border-bottom:1pt solid #000000;"><?=(CSalePaySystemAction::GetParamValue("COMPANY_NAME"))?></td>
				</tr>
				<tr>
					<td align="center"><small>(получатель платежа)</small></td>
				</tr>
			</table>

			<table border="0" cellspacing="0" cellpadding="0" style="width:122mm; margin-top:3pt;">
				<tr>
					<td style="width:37mm; border-bottom:1pt solid #000000;"><?=(CSalePaySystemAction::GetParamValue("INN"))."/".(CSalePaySystemAction::GetParamValue("KPP"))?></td>
					<td style="width:9mm;">&nbsp;</td>
					<td style="border-bottom:1pt solid #000000;"><?=(CSalePaySystemAction::GetParamValue("SETTLEMENT_ACCOUNT"))?></td>
				</tr>
				<tr>
					<td align="center"><small>(ИНН получателя)</small></td>
					<td><small>&nbsp;</small></td>
					<td align="center"><small>(номер счета получателя)</small></td>
				</tr>
			</table>
			<table border="0" cellspacing="0" cellpadding="0" style="width:122mm; margin-top:3pt;">
				<tr>
					<td>в&nbsp;</td>
					<td style="width:73mm; border-bottom:1pt solid #000000;"><?=(CSalePaySystemAction::GetParamValue("BANK_NAME"))?></td>
					<td align="right">БИК&nbsp;&nbsp;</td>
					<td style="width:33mm; border-bottom:1pt solid #000000;"><?=(CSalePaySystemAction::GetParamValue("BANK_BIC"))?></td>
				</tr>
				<tr>
					<td></td>
					<td align="center"><small>(банк получателя)</small></td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<table border="0" cellspacing="0" cellpadding="0" style="width:122mm; margin-top:3pt;">
				<tr>
					<td width="1%" nowrap>Номер кор./сч. банка получателя&nbsp;&nbsp;</td>
					<td width="100%" style="border-bottom:1pt solid #000000;"><?=(CSalePaySystemAction::GetParamValue("BANK_COR_ACCOUNT"))?></td>
				</tr>
			</table>
			<table border="0" cellspacing="0" cellpadding="0" style="width:122mm; margin-top:3pt;">
				<tr>
					<td style="width:60mm; border-bottom:1pt solid #000000;">Оплата заказа №
						<?=(CSalePaySystemAction::GetParamValue("ORDER_ID"))?>
						от
						<?=(CSalePaySystemAction::GetParamValue("DATE_INSERT"))?></td>
					<td style="width:2mm;">&nbsp;</td>
					<td style="border-bottom:1pt solid #000000;">&nbsp;</td>
				</tr>
				<tr>
					<td align="center"><small>(наименование платежа)</small></td>
					<td><small>&nbsp;</small></td>
					<td align="center"><small>(номер лицевого счета (код) плательщика)</small></td>
				</tr>
			</table>
			<table border="0" cellspacing="0" cellpadding="0" style="width:122mm; margin-top:3pt;">
				<tr>
					<td width="1%" nowrap>Ф.И.О. плательщика&nbsp;&nbsp;</td>
					<td width="100%" style="border-bottom:1pt solid #000000;"><?=(CSalePaySystemAction::GetParamValue("PAYER_CONTACT_PERSON"))?></td>
				</tr>
			</table>
			<table border="0" cellspacing="0" cellpadding="0" style="width:122mm; margin-top:3pt;">
				<tr>
					<td width="1%" nowrap>Адрес плательщика&nbsp;&nbsp;</td>
					<td width="100%" style="border-bottom:1pt solid #000000;"><?

						$sAddrFact = array();
						if(CSalePaySystemAction::GetParamValue("PAYER_ZIP_CODE") != '')
							$sAddrFact[] = CSalePaySystemAction::GetParamValue("PAYER_ZIP_CODE");

						if(CSalePaySystemAction::GetParamValue("PAYER_COUNTRY") != '')
							$sAddrFact[] = CSalePaySystemAction::GetParamValue("PAYER_COUNTRY");

						if(CSalePaySystemAction::GetParamValue("PAYER_REGION") != '')
							$sAddrFact[] = CSalePaySystemAction::GetParamValue("PAYER_REGION");

						if(CSalePaySystemAction::GetParamValue("PAYER_CITY") != '')
						{
							$g = substr(CSalePaySystemAction::GetParamValue("PAYER_CITY"), 0, 2);
							$sAddrFact[] = '<nobr>'.($g<>"г." && $g<>"Г."? "г. ":"").(CSalePaySystemAction::GetParamValue("PAYER_CITY")).'</nobr>';
						}

						if(CSalePaySystemAction::GetParamValue("PAYER_VILLAGE") != '')
							$sAddrFact[] = CSalePaySystemAction::GetParamValue("PAYER_VILLAGE");

						if(CSalePaySystemAction::GetParamValue("PAYER_STREET") != '')
							$sAddrFact[] = CSalePaySystemAction::GetParamValue("PAYER_STREET");

						if(CSalePaySystemAction::GetParamValue("PAYER_ADDRESS_FACT") != '')
							$sAddrFact[] = CSalePaySystemAction::GetParamValue("PAYER_ADDRESS_FACT");

						echo implode(', ', $sAddrFact);
						?>&nbsp;</td>
				</tr>
			</table>
			<table border="0" cellspacing="0" cellpadding="0" style="width:122mm; margin-top:3pt;">
				<tr>
					<td>Сумма платежа&nbsp;<?
						if(strpos(CSalePaySystemAction::GetParamValue("SHOULD_PAY"), ".")!==false)
						{
							$a = explode(".", (CSalePaySystemAction::GetParamValue("SHOULD_PAY")));

						}
						else
						{
							$a = explode(",", (CSalePaySystemAction::GetParamValue("SHOULD_PAY")));

						}
						if ($a[1] <= 9 && $a[1] > 0)
							$a[1] = $a[1]."0";
						elseif ($a[1] == 0)
							$a[1] = "00";

						echo "<font style=\"text-decoration:underline;\">&nbsp;".$a[0]."&nbsp;</font>&nbsp;руб.&nbsp;<font style=\"text-decoration:underline;\">&nbsp;".$a[1]."&nbsp;</font>&nbsp;коп.";
						?></td>
					<td align="right">&nbsp;&nbsp;Сумма платы за услуги&nbsp;&nbsp;_____&nbsp;руб.&nbsp;____&nbsp;коп.</td>
				</tr>
			</table>
			<table border="0" cellspacing="0" cellpadding="0" style="width:122mm; margin-top:3pt;">
				<tr>
					<td>Итого&nbsp;&nbsp;_______&nbsp;руб.&nbsp;____&nbsp;коп.</td>
					<td align="right">&nbsp;&nbsp;&laquo;______&raquo;________________ 201____ г.</td>
				</tr>
			</table>
			<br />
			<table border="0" cellspacing="0" cellpadding="0" style="width:122mm; margin-top:3pt;">
				<tr>
					<td align="right"><b>Подпись плательщика _____________________</b></td>
				</tr>
			</table>
		</td>
	</tr>



	<tr valign="top">
		<td style="width:50mm; height:70mm; border:1pt solid #000000; border-right:none;" align="center">
			<b>Извещение</b><br>
			<font style="font-size:53mm">&nbsp;<br></font>
			<b>Кассир</b>
		</td>
		<td style="border:1pt solid #000000;" align="center">
			<table border="0" cellspacing="0" cellpadding="0" style="width:122mm; margin-top:3pt;">
				<tr>
					<td style="border-bottom:1pt solid #000000;"><?=(CSalePaySystemAction::GetParamValue("COMPANY_NAME"))?></td>
				</tr>
				<tr>
					<td align="center"><small>(получатель платежа)</small></td>
				</tr>
			</table>

			<table border="0" cellspacing="0" cellpadding="0" style="width:122mm; margin-top:3pt;">
				<tr>
					<td style="width:37mm; border-bottom:1pt solid #000000;"><?=(CSalePaySystemAction::GetParamValue("INN"))."/".(CSalePaySystemAction::GetParamValue("KPP"))?></td>
					<td style="width:9mm;">&nbsp;</td>
					<td style="border-bottom:1pt solid #000000;"><?=(CSalePaySystemAction::GetParamValue("SETTLEMENT_ACCOUNT"))?></td>
				</tr>
				<tr>
					<td align="center"><small>(ИНН получателя)</small></td>
					<td><small>&nbsp;</small></td>
					<td align="center"><small>(номер счета получателя)</small></td>
				</tr>
			</table>
			<table border="0" cellspacing="0" cellpadding="0" style="width:122mm; margin-top:3pt;">
				<tr>
					<td>в&nbsp;</td>
					<td style="width:73mm; border-bottom:1pt solid #000000;"><?=(CSalePaySystemAction::GetParamValue("BANK_NAME"))?></td>
					<td align="right">БИК&nbsp;&nbsp;</td>
					<td style="width:33mm; border-bottom:1pt solid #000000;"><?=(CSalePaySystemAction::GetParamValue("BANK_BIC"))?></td>
				</tr>
				<tr>
					<td></td>
					<td align="center"><small>(банк получателя)</small></td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<table border="0" cellspacing="0" cellpadding="0" style="width:122mm; margin-top:3pt;">
				<tr>
					<td width="1%" nowrap>Номер кор./сч. банка получателя&nbsp;&nbsp;</td>
					<td width="100%" style="border-bottom:1pt solid #000000;"><?=(CSalePaySystemAction::GetParamValue("BANK_COR_ACCOUNT"))?></td>
				</tr>
			</table>
			<table border="0" cellspacing="0" cellpadding="0" style="width:122mm; margin-top:3pt;">
				<tr>
					<td style="width:60mm; border-bottom:1pt solid #000000;">Оплата заказа №
						<?=(CSalePaySystemAction::GetParamValue("ORDER_ID"))?>
						от
						<?=(CSalePaySystemAction::GetParamValue("DATE_INSERT"))?></td>
					<td style="width:2mm;">&nbsp;</td>
					<td style="border-bottom:1pt solid #000000;">&nbsp;</td>
				</tr>
				<tr>
					<td align="center"><small>(наименование платежа)</small></td>
					<td><small>&nbsp;</small></td>
					<td align="center"><small>(номер лицевого счета (код) плательщика)</small></td>
				</tr>
			</table>
			<table border="0" cellspacing="0" cellpadding="0" style="width:122mm; margin-top:3pt;">
				<tr>
					<td width="1%" nowrap>Ф.И.О. плательщика&nbsp;&nbsp;</td>
					<td width="100%" style="border-bottom:1pt solid #000000;"><?=(CSalePaySystemAction::GetParamValue("PAYER_CONTACT_PERSON"))?></td>
				</tr>
			</table>
			<table border="0" cellspacing="0" cellpadding="0" style="width:122mm; margin-top:3pt;">
				<tr>
					<td width="1%" nowrap>Адрес плательщика&nbsp;&nbsp;</td>
					<td width="100%" style="border-bottom:1pt solid #000000;"><?

						$sAddrFact = array();
						if(CSalePaySystemAction::GetParamValue("PAYER_ZIP_CODE") != '')
							$sAddrFact[] = CSalePaySystemAction::GetParamValue("PAYER_ZIP_CODE");

						if(CSalePaySystemAction::GetParamValue("PAYER_COUNTRY") != '')
							$sAddrFact[] = CSalePaySystemAction::GetParamValue("PAYER_COUNTRY");

						if(CSalePaySystemAction::GetParamValue("PAYER_REGION") != '')
							$sAddrFact[] = CSalePaySystemAction::GetParamValue("PAYER_REGION");

						if(CSalePaySystemAction::GetParamValue("PAYER_CITY") != '')
						{
							$g = substr(CSalePaySystemAction::GetParamValue("PAYER_CITY"), 0, 2);
							$sAddrFact[] = '<nobr>'.($g<>"г." && $g<>"Г."? "г. ":"").(CSalePaySystemAction::GetParamValue("PAYER_CITY")).'</nobr>';
						}

						if(CSalePaySystemAction::GetParamValue("PAYER_VILLAGE") != '')
							$sAddrFact[] = CSalePaySystemAction::GetParamValue("PAYER_VILLAGE");

						if(CSalePaySystemAction::GetParamValue("PAYER_STREET") != '')
							$sAddrFact[] = CSalePaySystemAction::GetParamValue("PAYER_STREET");

						if(CSalePaySystemAction::GetParamValue("PAYER_ADDRESS_FACT") != '')
							$sAddrFact[] = CSalePaySystemAction::GetParamValue("PAYER_ADDRESS_FACT");

						echo implode(', ', $sAddrFact);
						?>&nbsp;</td>
				</tr>
			</table>
			<table border="0" cellspacing="0" cellpadding="0" style="width:122mm; margin-top:3pt;">
				<tr>
					<td>Сумма платежа&nbsp;<?
						if(strpos(CSalePaySystemAction::GetParamValue("SHOULD_PAY"), ".")!==false)
							$a = explode(".", (CSalePaySystemAction::GetParamValue("SHOULD_PAY")));

						else
							$a = explode(",", (CSalePaySystemAction::GetParamValue("SHOULD_PAY")));


						if ($a[1] <= 9 && $a[1] > 0)
							$a[1] = $a[1]."0";
						elseif ($a[1] == 0)
							$a[1] = "00";

						echo "<font style=\"text-decoration:underline;\">&nbsp;".$a[0]."&nbsp;</font>&nbsp;руб.&nbsp;<font style=\"text-decoration:underline;\">&nbsp;".$a[1]."&nbsp;</font>&nbsp;коп.";
						?></td>
					<td align="right">&nbsp;&nbsp;Сумма платы за услуги&nbsp;&nbsp;_____&nbsp;руб.&nbsp;____&nbsp;коп.</td>
				</tr>
			</table>
			<table border="0" cellspacing="0" cellpadding="0" style="width:122mm; margin-top:3pt;">
				<tr>
					<td>Итого&nbsp;&nbsp;_______&nbsp;руб.&nbsp;____&nbsp;коп.</td>
					<td align="right">&nbsp;&nbsp;&laquo;______&raquo;________________ 201____ г.</td>
				</tr>
			</table>
			<br />
			<table border="0" cellspacing="0" cellpadding="0" style="width:122mm; margin-top:3pt;">
				<tr>
					<td align="right"><b>Подпись плательщика _____________________</b></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<br />

</body>
</html>