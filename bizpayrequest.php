<?php
/*******************************************************
 * Copyright (C) 2016 BIZPAY (PVT) LTD <dev@bizpay.lk>
 * 
 * This file is part of  BIZPAY API Kit.
 * Version 3.0
 * 
 * This can not be copied and/or distributed without the express
 * permission of  BIZPAY (PVT) LTD 
 *******************************************************/
 ?>
<?php include("bizpay/bizpayapi.php"); ?>
<html>
<?php

$bizpay  = new bizpayapi();

/* Example, How you can set the request parameters */

/*  $payment_array = array(
        'amount' => 15,
        'refnumber' => 1231312312,
        'description' => 'description About line items',
        'customer' => 'My Customer',
        'company' => 'Test Company',
        'address' => 'Some test address',
        'email' => 'bizpay@gmail.com',
        'mobile' => '94771171222'
     );
*/


$payment_array = array(
        'amount' => $_POST["amount"],
        'refnumber' => $_POST["refnumber"],
        'description' => $_POST["description"],
        'customer' => $_POST["customer"],
        'company' => $_POST["company"],
        'address' => $_POST["address"],
        'email' => $_POST["email"],
        'mobile' => $_POST["mobile"]
);


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
       
$bizpay->payment_redirect($payment_array, @$overrides);

// this will take user to BizPay Payment Page

?>
