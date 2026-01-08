<?php 
session_start();
require_once('config/settings.php');
require_once('core/classes/alert.php');


require_once('classes/flutter.php');
require_once('core/classes/setting.php');
require_once('core/classes/auth.php');
require_once('core/classes/user.php');
$db = new mysqli(DBHOST,DBUSR,DBPASS,DB);
$flutter = new flutter($db, FLUTTERKEY, FLUTTERPUBLIC);


function set_alert($msg,$type="danger"){
	$_SESSION["er_msg"]= $msg;
	$_SESSION["er_type"]= $type;
}

 
$setting = new setting($db);
$auth = new auth($db);
$alert = new alert();


	if(isset($_GET['transaction_id']) && isset($_GET['tx_ref'])){
		$tid =  $_GET['transaction_id'];
		$txref = $_GET['tx_ref'];
    $flutter_transaction = $db->query("SELECT * FROM transactions WHERE ref = '$txref'");
 		if($flutter_transaction->num_rows>0){
	 		$flutter_transaction = $flutter_transaction->fetch_assoc();
	 		$status= $flutter_transaction['status'];
	 		$user_id = $flutter_transaction['user_id'];
			$package_id=$flutter_transaction['package_id'];
			$package_qry = $db->query("SELECT * FROM packages WHERE pid ='$package_id'");
			if($package_qry->num_rows>0){
				$package_qry = $package_qry->fetch_assoc();
				$package_amount = $package_qry['price'];
			}else{
				$alert->set("Invalid Package",'danger');
				header('location:'.BURL.'payments/make_payments');
			}
			$db->query("UPDATE transactions SET flutter_id = '$tid' WHERE ref = '$txref' ");

	 		

      if ($status==0){
        $response = $flutter->response($flutter_transaction['amount'],$cur="NGN",$txref,$tid);
        if($response==0){
          $alert->set("Transaction Failed ".$txref." ".$tid ,'danger');
          header('location:'.BURL.'payments/make_payments');
        }else{
          $paymentTx_ref =  $response['tx_ref'];
          $chargeAmount = $response['amount'];
          if ($package_amount  == $chargeAmount) {
            
            $db->query("UPDATE users SET type = 5 WHERE user_id = '$user_id' ");
            $db->query("UPDATE transactions SET status = 1 WHERE ref = '$txref' ");


            $alert->set("Activation Successful","success");
            header('location:'.BURL.'dashboard');
          }else{
            $alert->set("Incorrect Amount Paid",'danger');
            header('location:'.BURL.'payments/make_payments');
          }
        }
      }else{
        $alert->set("Payment already confirmed",'danger');
        header('location:'.BURL.'payments/make_payments');
      }
		 	

		}else{
			$alert->set("Cant find your tansaction",'danger');
		 header('location:'.BURL.'payments/make_payments');
	 }
	}else{
		$alert->set("No Transaction Occured",'danger');
		header('location:'.BURL.'payments/make_payments');
	}
?>