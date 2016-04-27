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
<html>
<head>
	<title>BizPay - PHP Basic Sample</title>
</head>
<body topmargin="0" leftmargin="0">

<br />&nbsp;<br />

<center>
	<h3>BizPay - PHP Basic Sample</h3>
	<br /><br />
	<form name="bptest" method="post" action="bizpayrequest.php">	
		<table>
			<tr>
				<td>Amount:</td>
				<td><input type="text" name="amount" value="3"/></td>
			</tr>
			
			<tr>
				<td>Reference No:</td>
				<td><input type="text" name="refnumber" value="000123"></td>
			</tr>
			
			<tr>
				<td>Cart Description:</td>
				<td><input type="text" name="description" value="3 Unit of Keyboards"></td>
			</tr>
			
			
			<tr>
				<td>Customer Name:</td>
				<td><input type="text" name="customer" value="My Customer"></td>
			</tr>
			
			<tr>
				<td>Customer Company Name:</td>
				<td><input type="text" name="company" value="My Customer Company (Pvt) Ltd"></td>
			</tr>
			
		<tr>
				<td>Customer Address:</td>
				<td><input type="text" name="address" value="My Customer Address, Colombo, Sri Lanka"></td>
			</tr>

				<tr>
				<td>Customer Email:</td>
				<td><input type="text" name="email" value="bizpay.dev"></td>
			</tr>
				<tr>
				<td>Customer Mobile:</td>
				<td><input type="text" name="mobile" value="0771171222"></td>
			</tr>
			
			
			
			<tr>
				<td align="center" colspan="2">
				<input type="submit" value=" Pay Now"/>
				</td>
			</tr>
		</table>
	</form>		
</center>

</body>
</html>