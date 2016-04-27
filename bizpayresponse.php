<?php
/*******************************************************
 * Copyright (C) 2015 BIZPAY (PVT) LTD <dev@bizpay.lk>
 * 
 * This file is part of  BIZPAY API Kit.
 * 
 * This can not be copied and/or distributed without the express
 * permission of  BIZPAY (PVT) LTD 
 *******************************************************/
 ?>
<?php include("bizpay/bizpayapi.php"); ?>
<html>
<head>
	<title>BizPay Test</title>
</head>
<?php 

$bizpay= new bizpayapi();

/* Example, How you can ovrride settings */
	 
/* $overrides = array(
               'bizpayhost' => "http://bizpay-dev.invoice.lk",
               'merchant' =>0000, 
               'apikey' => "ABCD", 
			   'apitoken' => "1dcbc9ca-1dcbc9ca-1dcbc9ca-1dcbc9ca",
               'receipturl' => "http://localhost:8080/demo/response.php", 
               'currency' => 'LKR'); // using this array you can overrude default credentials of the api according to your desire in runtime
   // this will ovrride values in BizPay config file
*/
    $response        = $bizpay->in_response(@$overrides); // this function will return a json response against your payment
    $status          = $response['status'];
    $ispaid          = $response['ispaid'];
    $salesnumber     = $response['salesnumber'];
    $bizpayrefnumber = $response['bizpayrefnumber'];
    $paymentmethod   = $response['paymentmethod'];
    $transaction     = $response['transaction'];
    $message         = $response['message'];
    $paidon          = $response['paidon'];
    $amount          = $response['amount'];
	
/* uncomment this to see JSON format response */
//   var_dump( $response );

?>
<body topmargin="0" leftmargin="0">
<br />
<center>
	<h3>BizPay - Test - PHP</h3>
	<br />
	<table>
	<tr> 
		<td valign="top" align="center">
			<?php
				if($ispaid == "true") {
					?><font color="#339900"><b>Transaction Passed</b></font><?php
				
				} else {
					?><font color="#FF0000"><b>Transaction Failed</b></font><?php
				}
			?>
		</td>
	</tr>
	<tr> 
		<td valign="top" class="mainText">
			<table border="1" width="400" align="center">	
			
			<tr>
				<td align="right">PAID</td>
				<td align="left">: <?php echo $ispaid?></td>
			</tr>
			
			<tr>
				<td align="right">BizPay Sale #</td>
				<td align="left">: <?php echo $salesnumber?></td>
			</tr>
			
			<tr>
				<td align="right">Payment Method</td>
				<td align="left">: <?php echo $paymentmethod?></td>
			</tr>

			<tr>
				<td align="right">Transaction Amount</td>
				<td align="left">: <?php echo $amount;?></td>
			</tr>
			<tr>
				<td align="right">Transaction Id</td>
				<td align="left">: <?php echo $transaction;?></td>
			</tr>

		
			<tr>
				<td align="right">Message</td>
				<td align="left">: <?php echo $message;?></td>
			</tr>
			
			
<tr>
				<td align="right">Date</td>
				<td align="left">: <?php echo $paidon;?></td>
			</tr>

								 
			</table>
		</td>
	</tr>
	<tr> 
		<td valign="top" align="center">
			<a href="index.php">Pay Again</a>
		</td>
	</tr>
	</table>
</center>
</body>
</html>
?>

