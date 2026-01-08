<?php
 class flutter{

 	public function __construct($db, $key,$pubk,$logo=""){
 		$this->db=$db;
 		$this->key=$key;
 		$this->pubk=$pubk;
		$this->logo=$logo;
    }

 	public function pay($amount,$cur,$email='',$txref="",$redirect_url,$phone,$name,$title="", $decr=""){
	    $curl = curl_init();
		curl_setopt_array($curl, [
		    CURLOPT_URL => "https://api.flutterwave.com/v3/payments",
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_CUSTOMREQUEST=> "POST",
		    CURLOPT_POSTFIELDS => json_encode([
		    	'amount'=>$amount,
		    	'currency'=>$cur,
		    	'tx_ref'=>$txref,
		    	'PBFPubKey'=>$this->pubk,
		    	'redirect_url'=>$redirect_url,
			    'payment_options' => 'card',
			    'customer' => [
			      'email'=>$email,
			      'phonenumber'=>$phone,
			      'name'=>$name
			   ],
			      "customizations"=>[
				      "title"=>$title,
				      "description"=>$decr,
				      "logo"=>BURL.'assets/'.$this->logo
				   ]
			]),
		    CURLOPT_HTTPHEADER => [
				"Accept: application/json",
		        "Content-Type: application/json",
		        "Authorization: Bearer ".$this->key
		    ],
		]);

		$response = curl_exec($curl);
		

		$err = curl_error($curl);
		if($err){
			
			$_SESSION["alert"]=$err; 
			$_SESSION["alert_t"]="danger";
			die(header('location:'.BURL.'dashboard'));
			

		}

		$transaction = json_decode($response);
		if(!$transaction->data && !$transaction->data->link){
			$_SESSION["alert"]=$transaction->message; 
			$_SESSION["alert_t"]="danger";
			header('location:'.BURL.'dashboard');
		}
		
		header('location:'.$transaction->data->link);

 		
 	}

 	public function response($amount,$cur="NGN",$txref,$tid=""){
 		sleep(10);
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/".$tid."/verify",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "Content-Type: application/json",
		    "Authorization: Bearer ".$this->key
		  ),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		$response = json_decode($response, true);
		$resp = $response['data'];
		
		$paymentTx_ref =  $resp['tx_ref'];
		$paymentStatus = $resp['status'];
		$chargeAmount = $resp['amount'];
		$paymentId = $resp['id'];	

		if(($chargeAmount == $amount) && ($paymentTx_ref == $txref) && ($paymentStatus=="successful") && ($paymentId == $tid) ){
			return $resp;
		}else{
			return 0;
		}
 	}

 	public function log($uid,$ref,$amount,$package_id=0){
 		$dater = time();
 		$this->db->query("INSERT INTO transactions(user_id,ref ,amount,package_id) VALUES('$uid','$ref','$ammout', '$package_id')");
 	}

 	public function  get_banks(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.flutterwave.com/v3/banks/ng",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "Content-Type: application/json",
		    "Authorization: Bearer ".$this->key
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$resp = json_decode($response, true);
		$resp = $resp['data'];
		?>
		<select class="form-control" name="banks">
			<option value="">Select Recipient Bank</option>
		<?php foreach ($resp as $key => $value): ?>
			<option value="<?=$value['code']?>"><?=$value['name']?></option>
		<?php endforeach; ?>
		</select>
<?php

 	}
 
 	public function payout($amount,$cur="NGN",$email='',$txref="",$redirect_url,$phone,$name,$account_bank,$account_number,$transaction_type,$setting){
	    $curl = curl_init();
		curl_setopt_array($curl, [
		    CURLOPT_URL => "https://api.flutterwave.com/v3/transfers",
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_CUSTOMREQUEST=> "POST",
		    CURLOPT_POSTFIELDS => json_encode([
		    	'account_bank'=> $account_bank,
		    	'account_number'=>$account_number,
		    	'amount'=>$amount,
		    	'currency'=>$cur,
		    	'reference'=>$txref,
		    	'callback_url'=>$redirect_url,
		    	'debit_currency'=>$cur,
			    'beneficiary_name'=>$name,
			    'narration'=>$setting->site_name.' '.ucfirst($transaction_type).' Payment',
			    'meta' => [
			      'email'=>$email,
			      'mobile_number'=>$phone

			   ]
			]),
		    CURLOPT_HTTPHEADER => [
				"Accept: application/json",
		        "Content-Type: application/json",
		        "Authorization: Bearer ".$this->key
		    ],
		]);

		$response = curl_exec($curl);
		

		$err = curl_error($curl);
		if($err){
			die('CURL returned error: '.$err);
		}

		$transaction = json_decode($response);
		return $transaction;

 	}

    public function get_payout($tid=""){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.flutterwave.com/v3/transfers/".$tid,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Authorization: Bearer ".$this->key
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response, true);
        return $response;
		
	}
}

?>