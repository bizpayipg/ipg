<?php
	/**
	 * bizpay library
	 * this is main biz pay class perform all the actions of the payments
	 * @package bzpay_new
	 * @author BizPay (Pvt) Ltd | dev@bizpay.lk
	 * @copyright 2015
	 * @version $Id$
	 * @access public
	 */
	class bizpayapi {
         		  
		   /**
           * Set your default BizPay Settings here. 
		     If require, you can override those values during method calls.
       */ 
	         public $bizpayhost = "; // BizPay Service Host Address
           public $merchant =""; // BizPay Merchant ID
           public $apikey =""; //BizPay Merchant API Key
           public $apitoken =""; //BizPay Merchant API Token
           public $receipturl = ""; // Final Receipt Page URL of merchant web site
           public $currency = 'LKR'; // Currency type. For the moment only LKR payments supported
		       public $returnmode ='GET'; // Return mode to receipt page. It can be POST or GET.
		  
        /**
         * bizpay::payment_array()
         * this will return a payment array to pass it to biz pay gateway
         * @param mixed $form_array
         * @return
         */
        function payment_array($form_array, $override= null){
            extract($form_array);
                           
               if(is_array($override)){
                   foreach($override as $row=>$val) {
                        $this->$row = $val;
                   }
               }
               
            
            $data = array(
                    "merchant" => $this->merchant,
                    "apikey" => $this->apikey,
                    "apitoken" => $this->apitoken,
                    "amount" => $amount,
                    "refnumber" => $refnumber,
                    "description" => $description,
                    "customer" => $customer,
                    "company" => $company,
                    "address" => $address,
                    "email" => $email,
                    "mobile" => $mobile,
                    "receipturl" => $this->receipturl,
                    "currency" => $this->currency,
					"returnmode" => $this->returnmode
                    );
                return $data;
        }
        
        /**
         * bizpay::payment_redirect()
         * this fucntion will run when user has submitted the form to proceed for payment 
         * @return void
         */
        function payment_redirect($request_array, $override=null){
             $data_string = $this->payment_array($request_array, $override);
             $data_string = json_encode($data_string);
			 var_dump($data_string); // debug request
             $ch = curl_init($this->bizpayhost . '/BizPayApi/GetToken');
             curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
             curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
             curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length:' . strlen($data_string)));
            $result = curl_exec($ch);
            $jsonresult = json_decode($result, true);
            $status = $jsonresult['status'];
            $salesnumber = $jsonresult['salesnumber'];
            $token = $jsonresult['token'];
            $message = $jsonresult['message'];
			if($status=='error'){
				echo $message;
			}
			else {
				header('Location:'.$this->bizpayhost.'/IPG/Pay?token='.$token);
			}
        }
		
		 /**
         * bizpay::get_payment_url()
         * this fucntion will run when user has submitted the form to proceed for payment 
         * @return payment_url
         */
        function get_payment_url($request_array, $override=null){
             $data_string = $this->payment_array($request_array, $override);
             $data_string = json_encode($data_string);
             $ch = curl_init($this->bizpayhost . '/BizPayApi/GetToken');
             curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
             curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
             curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length:' . strlen($data_string)));
            $result = curl_exec($ch);
            $jsonresult = json_decode($result, true);
            $status = $jsonresult['status'];
            $salesnumber = $jsonresult['salesnumber'];
            $token = $jsonresult['token'];
            $message = $jsonresult['message'];
			$url = $jsonresult['url'];
				if($status=='error'){
					echo $message;
				}
				else {
            		return $url;
				}
        }
        
        
        /**
         * bizpay::in_response()
         * this function will only in the response from the the biz pay.
         * @return void
         */
        function in_response($override=null){			
			@$token = $_POST["token"];
            @$approval = $_POST["approval"];
			
					
			
			@$token = $_POST["token"];
            @$approval = $_POST["approval"];
            if(is_array($override)){
                   foreach($override as $row=>$val) {
                        $this->$row = $val;
                   }
            }
			
            if(is_array($override)){
                   foreach($override as $row=>$val) {
                        $this->$row = $val;
                   }
            }
			
			if($this->returnmode=="GET"){
				@$token = $_GET["token"];
				@$approval = $_GET["approval"];
			}
			
            $data = array("merchant" => $this->merchant, 
                          "apikey" => $this->apikey, 
                          "apitoken" =>$this->apitoken, 
                          "salestoken" =>$token, 
                          "approval" =>$approval); 
                                                                               
            $data_string = json_encode($data);                                                                                          
            $ch = curl_init($this->bizpayhost.'/BizPayApi/ValidateSale');                                                                      
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
                'Content-Type: application/json',                                                                                
                'Content-Length: ' . strlen($data_string))                                                                       
            );                                                                                            
            $result = curl_exec($ch);
            $jsonresult = json_decode($result, true);
            return $jsonresult;
        }
 }
?>
