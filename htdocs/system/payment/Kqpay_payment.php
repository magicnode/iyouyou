<?php

/* 模块的基本信息 */
if (isset($read_modules) && $read_modules == true)
{
    $module['class_name']    = 'KqPay';

    /* 名称 */
    $module['name']    = '块钱支付';
	
    $module['bank'] = 0; //非直连支付


    $module['config'] = $config;
    
    $module['lang'] = $payment_lang;
    return $module;
}

// 支付宝支付模型
require_once(APP_ROOT_PATH.'system/libs/payment.php');
class Kqpay_payment implements payment { 

	public function get_payment_code($user_data,$order_type,$order_sn,$subject,$money)
	{
		require_once APP_ROOT_PATH."system/libs/transaction.php";

		var_dump('check is in');

		$payment_notice_sn = Transaction::make_payment($user_data, $order_type, $order_sn, $money);
		
		$GLOBALS['db']->query("update ".DB_PREFIX."payment_notice set payment_class='kqPay',payment_name='快钱支付' where notice_sn = '".$payment_notice_sn."'");

		var_dump('check is db peo');
		
		$payment_notice = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."payment_notice where notice_sn = '".$payment_notice_sn."'");
		
		$money = format_price_to_display($payment_notice['money']);

		// $payment_info = $GLOBALS['db']->getRow("select id,config,logo from ".DB_PREFIX."payment where class_name = 'kqPay' ");

		// if(empty($payment_info))app_redirect(url("index"));
		
		// $payment_info['config'] = unserialize($payment_info['config']);

		$data_return_url = url("transaction#response",array("class_name"=>"kqPay"));
		$data_notify_url = url("transaction#notify",array("class_name"=>"kqPay"));
		
	  $kq_target = "https://www.99bill.com/msgateway/recvMsgatewayMerchantInfoAction.htm";
	  $kq_target="https://www.99bill.com/msgateway/recvMsgatewayMerchantInfoAction.htm";
	  $kq_inputCharset= "1";
	  $kq_pageUrl	    = "";
	  $kq_bgUrl		= "http://www.uu-club.com/index.php?ctl=kq&act=recieve";
	  $kq_version	    = "v2.0";
	  $kq_language	= "1";
	  $kq_signType	= "4"; 
	  $kq_payerName		 = "";
	  $kq_payerContactType = "1";
	  $kq_payerContact     = "2467254599@qq.com";
	  $kq_payeeContactType = "1";
	  $kq_payeeContact     = "235418433@qq.com";
	  // $kq_orderId		= date('YmdHis'); 
	  $kq_orderId		= $payment_notice_sn;
	  $kq_orderAmount	= $money * 100;
	  $kq_payeeAmount = $money * 3;
	  $kq_orderTime	= date('YmdHis');
	  $kq_productName	= "san";	
	  $kq_productNum	= "";	
	  $kq_productDesc	= "";
	  $kq_ext1		= "";
	  $kq_ext2		= "";	
	  $kq_payType		= "00";
	  $kq_bankId			= "";
	  $kq_sharingPayFlag = "1";
	  $fenmonry = $money * 97;

	  $kq_sharingData = "1^2209199484@qq.com^".$fenmonry."^0^test";
	  $kq_pid			= "10209906452";



		function kq_ck_null ($kq_va,$kq_na) {
		  if ($kq_va == "") {
		    $kq_va="";
		  } else {
		    return $kq_va=$kq_na.'='.$kq_va.'&';
		  }
		}


		$kq_all_para=kq_ck_null($kq_inputCharset,'inputCharset');
		$kq_all_para.=kq_ck_null($kq_pageUrl,"pageUrl");
		$kq_all_para.=kq_ck_null($kq_bgUrl,'bgUrl');
		$kq_all_para.=kq_ck_null($kq_version,'version');
		$kq_all_para.=kq_ck_null($kq_language,'language');
		$kq_all_para.=kq_ck_null($kq_signType,'signType');
		$kq_all_para.=kq_ck_null($kq_payeeContactType,'payeeContactType');
		$kq_all_para.=kq_ck_null($kq_payeeContact,'payeeContact');
		$kq_all_para.=kq_ck_null($kq_payerName,'payerName');
		$kq_all_para.=kq_ck_null($kq_payerContactType,'payerContactType');
		$kq_all_para.=kq_ck_null($kq_payerContact,'payerContact');
		$kq_all_para.=kq_ck_null($kq_orderId,'orderId');
		$kq_all_para.=kq_ck_null($kq_orderAmount,'orderAmount');
		$kq_all_para.=kq_ck_null($kq_payeeAmount,'payeeAmount');
		$kq_all_para.=kq_ck_null($kq_orderTime,'orderTime');
		$kq_all_para.=kq_ck_null($kq_productName,'productName');
		$kq_all_para.=kq_ck_null($kq_productNum,'productNum');
		$kq_all_para.=kq_ck_null($kq_productDesc,'productDesc');
		$kq_all_para.=kq_ck_null($kq_ext1,'ext1');
		$kq_all_para.=kq_ck_null($kq_ext2,'ext2');
		$kq_all_para.=kq_ck_null($kq_payType,'payType');
		$kq_all_para.=kq_ck_null($kq_bankId,'bankId');
		$kq_all_para.=kq_ck_null($kq_pid,'pid');
		$kq_all_para.=kq_ck_null($kq_sharingData,'sharingData');
		$kq_all_para.=kq_ck_null($kq_sharingPayFlag,'sharingPayFlag');

	  $kq_all_para=rtrim($kq_all_para,'&');

	  var_dump('is openssl_sign');

		$priv_key = file_get_contents("./99bill-rsa.pem");
		var_dump('not is openssl_sign');
		$pkeyid = openssl_get_privatekey($priv_key);
		openssl_sign($kq_all_para, $signMsg, $pkeyid,OPENSSL_ALGO_SHA1);
		openssl_free_key($pkeyid);
		$kq_sign_msg = base64_encode($signMsg);

		$param = "inputCharset=".urlencode($kq_inputCharset)."&pageUrl=".urlencode($kq_pageUrl)."&bgUrl=".urlencode($kq_bgUrl)."&version=".urlencode($kq_version)."&language=".urlencode($kq_language)."&signType=".urlencode($kq_signType)."&payeeContactType=".urlencode($kq_payeeContactType)."&payeeContactType=".urlencode($kq_payeeContactType)."&payeeContact=".urlencode($kq_payeeContact)."&payerName=".urlencode($kq_payerName)."&payerContactType=".urlencode($kq_payerContactType)."&payerContact=".urlencode($kq_payerContact)."&orderId=".urlencode($kq_orderId)."&orderAmount=".urlencode($kq_orderAmount)."&payeeAmount=".urlencode($kq_payeeAmount)."&orderTime=".urlencode($kq_orderTime)."&productName=".urlencode($kq_productName)."&productNum=".urlencode($kq_productNum)."&productDesc=".urlencode($kq_productDesc)."&ext1=".urlencode($kq_ext1)."&ext2=".urlencode($kq_ext2)."&payType=".urlencode($kq_payType)."&bankId=".urlencode($kq_bankId)."&pid=".urlencode($kq_pid)."&sharingData=".urlencode($kq_sharingData)."&sharingPayFlag=".urlencode($kq_sharingPayFlag)."&signMsg=".urlencode($kq_sign_msg);


		$payLinks = '<a style="font-size:12px; text-decoration:none; color:#000;" id="jump" href="https://www.99bill.com/msgateway/recvMsgatewayMerchantInfoAction.htm?'.$param. '&signMsg='.$kq_sign_msg.'">前往快钱在线支付</a>';
		
		$payLinks=$payLinks."<script>document.getElementById('jump').click();</script>";

    return $payLinks;
	}
	
	public function response($request)
	{
        
		$return_res = array(
			'info'=>'',
			'status'=>false,
		);
		$payment = $GLOBALS['db']->getRow("select id,config from ".DB_PREFIX."payment where class_name='Alipay'");  
    	$payment['config'] = unserialize($payment['config']);
    	
    	
        /* 检查数字签名是否正确 */
        ksort($request);
        reset($request);
	
        foreach ($request AS $key=>$val)
        {
            if ($key != 'sign' && $key != 'sign_type' && $key != 'code' && $key!='class_name' && $key!='act'&& $key!='ctl'&& $key!='city' )
            {
                $sign .= "$key=$val&";
            }
        }

        $sign = substr($sign, 0, -1) . $payment['config']['alipay_key'];

		if (md5($sign) != $request['sign'])
        {
            showErr($GLOBALS['payment_lang']["VALID_ERROR"]);
        }
		
        $payment_notice_sn = $request['out_trade_no'];
        
    	$money = $request['total_fee'];
		
    	$outer_notice_sn = $request['trade_no'];
		
		if ($request['trade_status'] == 'TRADE_SUCCESS' || $request['trade_status'] == 'TRADE_FINISHED' || $request['trade_status'] == 'WAIT_SELLER_SEND_GOODS'|| $request['trade_status'] == 'WAIT_BUYER_CONFIRM_GOODS'){
			
			require_once APP_ROOT_PATH."system/libs/transaction.php";
			$payment_notice = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."payment_notice where notice_sn = '".$payment_notice_sn."'");
			if(empty($payment_notice))
			{
				$logstr = "内部单号：".$payment_notice_sn."的支付单丢失，外部单号：".$outer_notice_sn." 支付时间：".to_date(NOW_TIME);
				logger::write($logstr,logger::ERR,logger::FILE,"payment");				
				//支付单号不存在，被删除或者是非法的支付单号,提供日志类，记录日志
				showErr("支付单不存在，非法的支付单号");
			}
			$pay_result = Transaction::pay_payment($payment_notice, $outer_notice_sn,"Alipay");
			if($pay_result['status']==1)
			{
				//支付成功，为订单充值，不同的支付单对同一个订单的多次支付，都要更新到订单表的online_pay中
				//此处需要根据payment_notice的实际内容，调用不同的order处理函数，并根据不同的类型作页面跳转
				//order_type:订单类型1.线路2.门票3.酒店 4.充值单 ...后续可扩展
				if($payment_notice['order_type']==4)//用户充值单
				{
					require_once APP_ROOT_PATH."system/libs/user.php";
					$result = User::doincharge($payment_notice);
					if(!$result['status'])
					{
						logger::write($result['message'],logger::ERR,logger::FILE,"payment");
					}
					app_redirect(url("transaction#done",array("sn"=>$payment_notice['order_sn'],"ot"=>4))); //跳转到支付成功页面
				}else if ($payment_notice['order_type']==1){
					require_once APP_ROOT_PATH."system/libs/tourline.php";					
					tourline_order_paid($payment_notice['order_sn'],$payment_notice['money']);
					app_redirect(url("transaction#done",array("sn"=>$payment_notice['order_sn'],"ot"=>1)));
				}	
				else if($payment_notice['order_type']==2){
					require_once APP_ROOT_PATH."system/libs/spot.php";					
					ticket_order_online_pay($payment_notice['order_sn'],$payment_notice['money']);					
					app_redirect(url("transaction#done",array("sn"=>$payment_notice['order_sn'],"ot"=>2)));
				}					
			}
			elseif($pay_result['status']==2)
			{
				//已经通知并支付过的支付号，无需处理，但需根据不同的类型作页面跳转
				app_redirect(url("transaction#done",array("sn"=>$payment_notice['order_sn'],"ot"=>4))); //跳转到支付成功页面
			}
			else 
			{
				//status==3，数据库更新失败，提供日志类，记录日志
				$logstr = "内部单号：".$payment_notice_sn."的支付单数据库更新出错，外部单号：".$outer_notice_sn." 支付时间：".to_date(NOW_TIME)." ".$pay_result['message'];
				logger::write($logstr,logger::ERR,logger::FILE,"payment");				
				showErr("系统繁忙，请联系客服");
			}
			
		}else{
		    showErr($GLOBALS['payment_lang']["PAY_FAILED"]);
		}   
	}
	
	public function notify($request)
	{
		$return_res = array(
			'info'=>'',
			'status'=>false,
		);
		$payment = $GLOBALS['db']->getRow("select id,config from ".DB_PREFIX."payment where class_name='Alipay'");  
    	$payment['config'] = unserialize($payment['config']);
    	
    	
        /* 检查数字签名是否正确 */
        ksort($request);
        reset($request);
	
        foreach ($request AS $key=>$val)
        {
            if ($key != 'sign' && $key != 'sign_type' && $key != 'code' && $key!='class_name' && $key!='act'&& $key!='ctl'&& $key!='city'  )
            {
                $sign .= "$key=$val&";
            }
        }

        $sign = substr($sign, 0, -1) . $payment['config']['alipay_key'];

		if (md5($sign) != $request['sign'])
        {
            echo "fail";
        }
		
        $payment_notice_sn = $request['out_trade_no'];
        
    	$money = $request['total_fee'];
		$outer_notice_sn = $request['trade_no'];

		if ($request['trade_status'] == 'TRADE_SUCCESS' || $request['trade_status'] == 'TRADE_FINISHED' || $request['trade_status'] == 'WAIT_SELLER_SEND_GOODS' || $request['trade_status'] == 'WAIT_BUYER_CONFIRM_GOODS'){
			
			
			require_once APP_ROOT_PATH."system/libs/transaction.php";
			$payment_notice = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."payment_notice where notice_sn = '".$payment_notice_sn."'");
			if(empty($payment_notice))
			{
				//支付单号不存在，被删除或者是非法的支付单号,提供日志类，记录日志，无需再次通知
				echo "success";
			}
			$pay_result = Transaction::pay_payment($payment_notice, $outer_notice_sn,"Alipay");
			
			if($pay_result['status']==1)
			{
				//支付成功，为订单充值，不同的支付单对同一个订单的多次支付，都要更新到订单表的online_pay中
				//此处需要根据payment_notice的实际内容，调用不同的order处理函数
				if($payment_notice['order_type']==4)//用户充值单
				{
					require_once APP_ROOT_PATH."system/libs/user.php";
					$result = User::doincharge($payment_notice);
					if(!$result['status'])
					{
						logger::write($result['message'],logger::ERR,logger::FILE,"payment");
					}
				}
				else if($payment_notice['order_type']==2){
					require_once APP_ROOT_PATH."system/libs/spot.php";					
					$pay_status = ticket_order_online_pay($payment_notice['order_sn'],$payment_notice['money']);
					
				}else if ($payment_notice['order_type']==1){
					require_once APP_ROOT_PATH."system/libs/tourline.php";					
					$pay_status = tourline_order_paid($payment_notice['order_sn'],$payment_notice['money']);
				}		
				
				//订单支付成功后，针对虚拟即非配送商品，通知自动发货，发货单号可自行定义
				//$this->do_send_goods($payment_notice, $invoice_no);
				echo "success";
			
			}
			elseif($pay_result['status']==2)
			{
				//已经通知并支付过的支付号，无需处理
				echo "success";
			}
			else
			{
				//status==3，数据库更新失败，提供日志类，记录日志，返回失败，等待再次通知
				echo "fail";
			}
			
		}else{
		   echo "fail";
		}   
	}
	
	public function get_display_code()
	{
		$payment_item = $GLOBALS['db']->getRow("select id,logo,name,class_name from ".DB_PREFIX."payment where class_name='Alipay'");
		if($payment_item)
		{	
			return $payment_item;
		}
		else
		{
			return '';
		}
	}
	
	
	/**
	 *  针对担保交易开放的自动发货功能，表示为虚拟商品，即无需配置的商品交易成功后调用，或者实体商品发货时调用。
	 *  $payment_notice 系统内的支付单数据
	 *  $invoice_no  快递单号
	 */
	public function do_send_goods($payment_notice,$invoice_no)
	{
		require_once APP_ROOT_PATH."system/utils/XmlBase.php"; 		
		$payment = $GLOBALS['db']->getRow("select class_name,id,config from ".DB_PREFIX."payment where class_name='Alipay'");  
    	$payment['config'] = unserialize($payment['config']);

    	
		$gateway = "https://mapi.alipay.com/gateway.do";
			
		$parameter = array(
			'service'	=>	'send_goods_confirm_by_platform',
			'partner'	=>	$payment['config']['alipay_partner'],
			'_input_charset'	=>	'utf-8',
			'invoice_no'	=>	$invoice_no,
			'transport_type'	=>	'EXPRESS',
			'logistics_name'	=>	'NONE',
			'trade_no'	=>	$payment_notice['outer_notice_sn']
		);
		
		ksort($parameter);
        reset($parameter);

        $sign  = '';
        $param = '';

        foreach ($parameter AS $key => $val)
        {
            $sign  .= "$key=$val&";
            $param .= "$key=" .urlencode($val). "&";
        }

        $param  = substr($param, 0, -1);
        $sign  = substr($sign, 0, -1).$payment['config']['alipay_key'];
        $sign_md5 = md5($sign);
        
        
		$param.="&sign=".$sign_md5."&sign_type=MD5";
        
        $curl_exists = function_exists('curl_init');
        
        if($curl_exists)
        {
	        $ch = curl_init();
	        //curl_setopt($ch, CURLOPT_POST, 1);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	        curl_setopt($ch, CURLOPT_URL,$gateway);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	        //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	        $result = curl_exec ($ch);
	        curl_close ($ch);
        }
        else
        {
        	$result = file_get_contents($gateway."?".$param);
        }
		
        if($result)
		$result = toArray($result,"alipay");
        else
        {
        	return "同步发货失败，请检查服务器是否开启了curl支持";
        }

		if($result['is_success'][0]=='T')
		{
			return "支付宝发货成功";
		}
		else
		{
			if($result['error']=='ILLEGAL_ARGUMENT')
			{
				return $result['error'].' 参数不正确';
			}
			elseif($result['error']=='TRADE_NOT_EXIST')
			{
				return $result['error'].' 交易单号有误';
			}
			elseif($result['error']=='GENERIC_FAILURE')
			{
				return $result['error'].' 执行命令错误';
			}
			else
			{
				return $result['error'];
			}			
		}
	}
}
?>