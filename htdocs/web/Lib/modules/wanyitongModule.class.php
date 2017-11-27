<?php

class wanyitongModule extends BaseModule{
    
    public function __construct () {
        $this->callbackUrl = 'http://szqy.ffan.com/test/apiserver/notify';
        $this->clientId = 'pp00000587';
        $this->spotClientId = 'jf000066';
        $this->key = '092D9E4F2111C8592C0D2EA0CB43B471';
        // 卡卷 sign key值
        $this->kjKey = '092D9E4F2111C8592C0D2EA0CB43B471';
        // 积分 sign key值
        $this->jfKey = 'B7BD19D7CAC71337DD643723AF2DA360';
    }

    function index () {
        echo "string";
    }

    /**
    * 模拟post进行url请求
    * @param string $url
    * @param string $param
    */
    function request_post($url = '', $param = '') {
       if (empty($url) || empty($param)) {
           return false;
       }
       
       $postUrl = $url;
       $curlPost = $param;
       $ch = curl_init();//初始化curl
       curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
       curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
       curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
       curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
       $data = curl_exec($ch);//运行curl
       $status= curl_getinfo($ch, CURLINFO_HTTP_CODE);
       curl_close($ch);

       $returnData = array(
         'data'=> $data,
         'status'=> $status
       );
       
       return $returnData;
    }
    
    /**
     * [login description]
     * @return [type] [description]
     */
    function login () {
        $phone = floor($_REQUEST['phone']);        
        $backurl = strim($_REQUEST['backUrl']);
        $redirectUrl = strim($_REQUEST['redirectUrl']);
        $clientId = strim($_REQUEST['clientId']);
        $GLOBALS['tmpl']->assign("phone", $phone);
        $GLOBALS['tmpl']->assign("backurl", $backurl);
        $GLOBALS['tmpl']->assign("redirectUrl", $redirectUrl);
        $GLOBALS['tmpl']->assign("clientId", $clientId);
        $GLOBALS['tmpl']->display("wanyitong_login.html");
    }

    /**
     * [dologin description]
     * @return [type] [description]
     */
    public function dologin (){
        $ajax = 1;
        $user_key = strim($_REQUEST['user_key']);
        $user_pwd = strim($_REQUEST['user_pwd']);
        $backurl = strim($_REQUEST['backurl']);
        $clientId = strim($_REQUEST['clientId']);
        if (!$clientId) {
            $clientId = $this->clientId;
        }

        $result = User::mobile_login($user_key, $user_pwd);
        if($result['status']==4)
        {           
            $url = $backurl;
            $post_data['telNo'] = $user_key;
            $post_data['uid']  = $result['user']['id'];
            $post_data['clientId'] = $clientId;
            $post_data['timestamp'] = time();
            // 获取 sign
            // 根据clientid获取key
            $key = $clientId == 'pp00000587' ? $this->kjKey : $this->jfKey;
            $str = md5('clientId'.$post_data['clientId'].'telNo'.$post_data['telNo'].'timestamp'.$post_data['timestamp'].'uid'.$post_data['uid'].$key);
            $post_data['sign'] = $str;
            $resData = $this->request_post($url, $post_data);
            header("Content-Type:text/html; charset=utf-8");
            $res = json_decode($resData['data'], true);
            ajax_return(array("status"=>1,"info"=>$res['message'],"http"=>$resData['status'],"code"=>$res['code'],"jump"=>$res, "clientId"=>$clientId));
            exit;
        }
        elseif($result['status']==1)
        {
            if($result['user']['email']!="")$type="email";
            if($result['user']['mobile']!="")$type="mobile";

            showSuccess($result['message'],$ajax,url("user#doverify",array("un"=>$result['user']['user_name'],"t"=>$type, "clientId"=>$clientId)));
        }
        else
        {
            showErr($result['message'],$ajax);
        }
    }
    
    /**
     * [regist description]
     * @return [type] [description]
     */
    function regist () {
        $phone = strim($_REQUEST['phone']);        
        $backurl = strim($_REQUEST['backurl']);
        $redirectUrl = strim($_REQUEST['redirectUrl']);
        $clientId = strim($_REQUEST['clientId']);
        $GLOBALS['tmpl']->assign("phone", $phone);
        $GLOBALS['tmpl']->assign("backurl", $backurl);
        $GLOBALS['tmpl']->assign("redirectUrl", $redirectUrl);
        $GLOBALS['tmpl']->assign("clientId", $clientId);
        $GLOBALS['tmpl']->display("wanyitong_register.html");
    }

    /**
     * [doregist description]
     * @return [type] [description]
     */
    public function doregist () {
        $user_name = strim($_POST['user_name']);
        $mobile = strim($_POST['mobile']);
        $user_pwd  = strim($_POST['user_pwd']);
        $cfm_user_pwd  = strim($_POST['cfm_user_pwd']);
        $backurl = strim($_REQUEST['backurl']);
        $ck = User::checkfield("user_name", $user_name);
        $clientId = strim($_REQUEST['clientId']);
        if (!$clientId) {
            $clientId = $this->clientId;
        }

        if($ck['status']==0)
        {
            ajax_return(array("status"=>0,"info"=>$ck['info'],"field"=>"user_name"));
        }
        
        if($mobile=="")
        {
            ajax_return(array("status"=>0,"info"=>"请输入手机号码","field"=>"mobile"));
        }
        $ck = User::checkfield("mobile", $mobile);
        if($ck['status']==0)
        {
            ajax_return(array("status"=>0,"info"=>$ck['info'],"field"=>"mobile"));
        }

        if($user_pwd == "")
        {
            ajax_return(array("status"=>0,"info"=>"密码不能为空","field"=>"user_pwd"));
        }
        
        if($user_pwd != $cfm_user_pwd)
        {
            ajax_return(array("status"=>0,"info"=>"密码确认失败","field"=>"cfm_user_pwd"));
        }
        
        //会员注册时通知uc添加用户
        $integrate  = $GLOBALS['db']->getRow("select class_name from ".DB_PREFIX."integrate");
        if($integrate)
        {
            $directory = APP_ROOT_PATH."system/integrate/";
            $file = $directory.$integrate['class_name']."_integrate.php";
            if(file_exists($file))
            {
                require_once($file);
                $integrate_class = $integrate['class_name']."_integrate";
                $integrate_item = new $integrate_class;
                $ck = $integrate_item->add_user($user_name,$user_pwd,$email);
                if($ck['status']==0)
                {
                    ajax_return(array("status"=>0,"info"=>$ck['info'],"field"=>$ck['field']));
                }
            }
        }
        
        $user_data = array();
        $user_data['user_name'] = $user_name;
        
        $user_data['mobile'] = $mobile;
        
        $user_data['salt'] = USER_SALT;
        $user_data['user_pwd'] = md5($user_pwd.$user_data['salt']);
        $user_data['is_effect'] = 1;
        $user_data['create_time'] = NOW_TIME;
        $user_data['integrate_id'] = intval($ck['data']);
        $user_data['is_verify'] = 1;
        
        $user_data['source'] = empty($GLOBALS['ref'])?"native":$GLOBALS['ref'];  //来路
        $user_data['pid'] = intval($GLOBALS['ref_pid']); //推荐人
        $user_data['nickname'] = $user_data['user_name'];
        $user_data['regist_ip'] = CLIENT_IP;
        require_once APP_ROOT_PATH."system/libs/city.php";
        $user_data['regist_city'] = City::locate_city_name(CLIENT_IP);
        $GLOBALS['db']->autoExecute(DB_PREFIX."user",$user_data,"INSERT","","SILENT");
        if($GLOBALS['db']->error()=="")
        {
            $user_id = $GLOBALS['db']->insert_id();
            $user_data['id'] = $user_id;
            //发放注册奖劢
            if(app_conf("USER_REG_MONEY")>0)
            {
                USER::modify_account($user_id, 1, app_conf("USER_REG_MONEY"), "注册获赠现金");
            }
            if(app_conf("USER_REG_SCORE")>0)
            {
                USER::modify_account($user_id, 2, app_conf("USER_REG_SCORE"), "注册获赠积分");
            }
            if(app_conf("USER_REG_EXP")>0)
            {
                USER::modify_account($user_id, 3, app_conf("USER_REG_EXP"), "注册获赠经验");
            }
            if(app_conf("USER_REG_VOUCHER")>0)
            {
                require_once APP_ROOT_PATH."system/libs/voucher.php";
                $voucher_data = Voucher::gen(app_conf("USER_REG_VOUCHER"), $user_data);
                if($voucher_data['status'])
                USER::modify_account($user_id, 4, $voucher_data['data']['money'], "注册获赠代金券");
            }
            User::user_level_locate($user_id);
            //数据生成成功
            $url = $backurl;
            $post_data['telNo'] = $mobile;
            $post_data['uid']  = $user_id;
            $post_data['clientId'] = $clientId;
            $post_data['timestamp'] = time();
            // 获取 sign
            // 根据clientid获取key
            $key = $clientId == 'pp00000587' ? $this->kjKey : $this->jfKey;
            $str = md5('clientId'.$post_data['clientId'].'telNo'.$post_data['telNo'].'timestamp'.$post_data['timestamp'].'uid'.$post_data['uid'].$key);
            $post_data['sign'] = $str;
            $resData = $this->request_post($url, $post_data);
            header("Content-Type:text/html; charset=utf-8");
            $res = json_decode($res['data'], true);
            ajax_return(array("status"=>1,"info"=>$res['message'],"jump"=>get_gopreview(),"http"=>$resData['status']));
        }
        else
        {
            ajax_return(array("status"=>0,"info"=>"服务器繁忙，请重试","field"=>"","jump"=>""));
        }
    }

    /**
     * [checkVoucher 卡券查询接口]
     * @param  [String] $appId [必填] [商户编号:商户分配给万益通唯一性商户编号]
     * @param  [String] $cardExCode [必填] [卡券商品代码:如果商户存在多种卡券类型，则需要该参数] [1: 100元代金券]
     * @param  [String] $sign [必填] [签名:根据参数名称进行倒序，然后再进行签名的生成，可以采用 SHA、MD5 等相关方案]
     * @param  [String] $timestamp [必填] [时间戳:每次请求的时间戳，格式化为：yyyyMMddHHmmss]
     * @return [String] $code [必填] [返回代码: 00 表示成功，其他的都表示失败]
     * @return [String] $data [必填] [数据集合: 以下为为Data对象内容]
     * @return [Int] $balance [必填] [卡券余额: 用户可用卡券余额]
     */
    public function checkVoucher() {
        $appId = strim($_POST['appId']);
        $cardExCode = $cardExCode ? strim($_POST['cardExCode']) : 1;
        $sign  = strim($_POST['sign']);
        $timestamp  = strim($_POST['timestamp']);

        $voucher = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."voucher_type where id = '".$cardExCode."'");

        if($GLOBALS['db']->error()==""&&$voucher)
        {
            $voucher_count = $voucher['deliver_limit'] == 0 ? 999999 : $voucher['deliver_limit'];
            ajax_return(array(
                'code'=> '00',
                'data'=> array(
                  'balance'=> $voucher_count
                )
            ));
        } else {
            ajax_return(array(
                'code'=> '01',
                'msg'=> '查询失败'
            ));
        }
    }

    /**

     * [checkVoucher 帐号余额查询接口可以根据单个卡券id查询]
     * @param  [String] $appId [必填] [商户编号:商户分配给万益通唯一性商户编号]
     * @param  [String] $uid [必填] [用户唯一性代号:用户在商家端唯一性代号]
     * @param  [String] $cardExCode [必填] [卡券商品代码:如果商户存在多种卡券类型，则需要该参数] [1: 100元代金券]
     * @param  [String] $sign [必填] [签名:根据参数名称进行倒序，然后再进行签名的生成，可以采用 SHA、MD5 等相关方案]
     * @param  [String] $timestamp [必填] [时间戳:每次请求的时间戳，格式化为：yyyyMMddHHmmss]
     * @return [String] $code [必填] [返回代码: 00 表示成功，其他的都表示失败]
     * @return [String] $msg [必填] [返回信息:接口返回的各种信息]
     * @return [Array] $data [必填] [数据集合: 以下为为Data对象内容]
     * @return [Array] $coupon [必填] [卡券对象: 以下卡券对象信息]
     * @return [Int] $balance [必填] [卡券余额: 用户可用卡券余额]
     * @return [String] $cardExCode [必填] [卡券编号: 商户端卡券编号]
     * @return [String] $expireDate [必填] [卡券有效期: 卡券过期截止日]
     * @return [String] $couponName [必填] [卡券名称: 卡券名称]
     * @return [String] $couponDesc [必填] [卡券描述: 卡券使用信息描述]
     */
    public function checkUserVoucherBalanceBycard () {
        $appId = strim($_POST['appId']);
        $uid = strim($_POST['uid']);
        $sign  = strim($_POST['sign']);
        $cardExCode  = intval($_POST['cardExCode']);
        $timestamp  = strim($_POST['timestamp']);
        $voucherData = $GLOBALS['db']->getAll("select SUM(is_effect) as balance,voucher_type_id, end_time, voucher_name from ".DB_PREFIX."voucher where voucher_type_id = ".$cardExCode." and user_id = '".$uid."' and is_used = 0  and is_effect = 1 GROUP BY voucher_type_id");
        $voucher = $voucherData['0'];
        $coupon = array();
        $voucher_type = array(
            '1' =>'线路优惠',
            '2' =>'门票优惠',
            '3' =>'酒店优惠',
            '4' => '所有优惠',
            '5' => '所有优惠'
        );

        $coupon['balance'] = $voucher['balance'];
        $coupon['cardExCode'] = $voucher['voucher_type_id'];
        $coupon['expireDate'] = $voucher['end_time'];
        $coupon['couponName'] = $voucher['voucher_name'];
        $coupon['couponDesc'] = $voucher_type[$voucher['voucher_type_id']];

        if($GLOBALS['db']->error()=="")
        {
            $result = empty($coupon['balance']);
            if ($result) {
               $coupon = json_decode('{}');
            }
            ajax_return(array(
                'code'=> '00',
                'msg'=> '请求成功',
                'data'=> $coupon
            ));
        } else {
            ajax_return(array(
                'code'=> '01',
                'msg'=> '查询失败'
            ));
        }
    }

    /**
     * [checkVoucher 帐号余额查询接口]
     * @param  [String] $appId [必填] [商户编号:商户分配给万益通唯一性商户编号]
     * @param  [String] $uid [必填] [用户唯一性代号:用户在商家端唯一性代号]
     * @param  [String] $sign [必填] [签名:根据参数名称进行倒序，然后再进行签名的生成，可以采用 SHA、MD5 等相关方案]
     * @param  [String] $timestamp [必填] [时间戳:每次请求的时间戳，格式化为：yyyyMMddHHmmss]
     * @return [String] $code [必填] [返回代码: 00 表示成功，其他的都表示失败]
     * @return [String] $msg [必填] [返回信息:接口返回的各种信息]
     * @return [Array] $data [必填] [数据集合: 以下为为Data对象内容]
     * @return [Array] $coupon [必填] [卡券对象: 以下卡券对象信息]
     * @return [Int] $balance [必填] [卡券余额: 用户可用卡券余额]
     * @return [String] $cardExCode [必填] [卡券编号: 商户端卡券编号]
     * @return [String] $expireDate [必填] [卡券有效期: 卡券过期截止日]
     * @return [String] $couponName [必填] [卡券名称: 卡券名称]
     * @return [String] $couponDesc [必填] [卡券描述: 卡券使用信息描述]
     */
    public function checkUserVoucherBalance () {
        $appId = strim($_POST['appId']);
        $uid = strim($_POST['uid']);
        $sign  = strim($_POST['sign']);
        $timestamp  = strim($_POST['timestamp']);
        $voucher = $GLOBALS['db']->getAll("select SUM(is_effect) as balance,voucher_type_id, end_time, voucher_name from ".DB_PREFIX."voucher where user_id = '".$uid."' and is_used = 0  and is_effect = 1 GROUP BY voucher_type_id");

        $coupon = array(
            array()
        );

        $voucher_type = array(
            '1' =>'线路优惠',
            '2' =>'门票优惠',
            '3' =>'酒店优惠',
            '4' => '所有优惠',
            '5' => '所有优惠'
        );

        foreach ($voucher as $key => $value) {
          $same = false;
          $coupon[$key]['balance'] = $value['balance'];
          $coupon[$key]['cardExCode'] = $value['voucher_type_id'];
          $coupon[$key]['expireDate'] = $value['end_time'];
          $coupon[$key]['couponName'] = $value['voucher_name'];
          $coupon[$key]['couponDesc'] = $voucher_type[$value['voucher_type_id']];
        }

        if($GLOBALS['db']->error()=="")
        {
            $result = empty($coupon[0]);
            if ($result) {
               $coupon = array();
            }
            ajax_return(array(
                'code'=> '00',
                'msg'=> '请求成功',
                'data'=> array(
                  'coupon'=> $coupon
                )
            ));
        } else {
            ajax_return(array(
                'code'=> '01',
                'msg'=> '查询失败'
            ));
        }
    }

    /**
     * [checkVoucher 卡券冻结]
     * @param  [String] $appId [必填] [商户编号:商户分配给万益通唯一性商户编号]
     * @param  [String] $uid [必填] [用户唯一性代号:用户在商家端唯一性代号]
     * @param  [String] $cardExCode [必填] [卡券 Id:商户端用户账户内卡券编号]
     * @param  [String] $quantity [必填] [冻结卡券数量:交易数量，整数]
     * @param  [String] $sign [必填] [签名:根据参数名称进行倒序，然后再进行签名的生成，可以采用 SHA、MD5 等相关方案]
     * @param  [String] $timestamp [必填] [时间戳:每次请求的时间戳，格式化为：yyyyMMddHHmmss]
     * @return [String] $code [必填] [返回代码: 00 表示成功，其他的都表示失败]
     * @return [String] $msg [必填] [返回信息:接口返回的各种信息]
     */
    public function userVoucherFrozen () {
        $appId = strim($_POST['appId']);
        $uid = strim($_POST['uid']);
        $quantity = strim($_POST['quantity']);
        $cardExCode = strim($_POST['cardExCode']);
        $sign  = strim($_POST['sign']);
        $timestamp  = strim($_POST['timestamp']);

        $GLOBALS['db']->query("update ".DB_PREFIX."voucher set is_effect = 0 where user_id = '".$uid."' and voucher_type_id = '".$cardExCode."' and is_used = 0 and is_effect = 1 limit ".$quantity."");

        if($GLOBALS['db']->error()=="") 
        {
            ajax_return(array(
                'code'=> '00',
                'msg'=> '请求成功'
            ));
        } else {
            ajax_return(array(
                'code'=> '01',
                'msg'=> '冻结失败'
            ));
        }
    }

    /**
     * [checkVoucher 卡券转账(换券)]
     * @param  [String] $appId [必填] [商户编号:商户分配给万益通唯一性商户编号]
     * @param  [String] $buyUid [必填] [买方用户唯一标识:唯一标识用户的字符串]
     * @param  [String] $sellUid [必填] [卖方用户唯一标识:唯一标识用户的字符串]
     * @param  [String] $cardExCode [必填] [卡券 Id:商户端用户账户内卡券编号]
     * @param  [String] $quantity [必填] [转账卡券数量:转账的卡券数量]
     * @param  [String] $txnId [必填] [万益通流水号:唯一标识本次请求的流水号也可以是订单号，用户后续对账]
     * @param  [String] $sign [必填] [签名:根据参数名称进行倒序，然后再进行签名的生成，可以采用 SHA、MD5 等相关方案]
     * @param  [String] $timestamp [必填] [时间戳:每次请求的时间戳，格式化为：yyyyMMddHHmmss]
     * @return [String] $code [必填] [返回代码: 00 表示成功，其他的都表示失败]
     * @return [String] $msg [必填] [返回信息:接口返回的各种信息]
     * @return [Data] $data [必填] [数据集合:以下为 Data 对象内容]
     * @return [String] $txnId [必填] [万益通流水号:唯一标识本次请求的流水号也可以是订单号，用户后续对账]
     * @return [String] $transId [必填] [第三方流水号:第三方的唯一流水号]
     */
    public function userVoucherTransfer () {
        $appId = strim($_POST['appId']);
        $buyUid = strim($_POST['buyUid']);
        $sellUid = strim($_POST['sellUid']);
        $cardExCode = strim($_POST['cardExCode']);
        $quantity = strim($_POST['quantity']);
        $txnId = strim($_POST['txnId']);
        $sign  = strim($_POST['sign']);
        $timestamp  = strim($_POST['timestamp']);

        $voucherTransfer = $GLOBALS['db']->getOne("select txnId, transId from ".DB_PREFIX."voucher_transfer where txnId = '".$txnId."'");

        if ($voucherTransfer) {
            ajax_return(array(
                'code'=> '04',
                'msg'=> '请勿重复交易'
            ));
            exit;
        }

        $voucher = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."voucher where user_id = '".$sellUid."' and voucher_type_id = '".$cardExCode."' and is_used = 0 and is_effect = 0");
        if (!$voucher) {
            ajax_return(array(
                'code'=> '01',
                'msg'=> '查询失败'
            ));
            exit;
        }

        if (count($voucher) < $quantity) {
            ajax_return(array(
                'code'=> '02',
                'msg'=> '交易数额大于余额'
            ));
            exit;
        }

        for($i=0; $i<$quantity; $i++){
            $GLOBALS['db']->query("update ".DB_PREFIX."voucher set user_id = '".$buyUid."' , is_effect = 1 where user_id = '".$sellUid."' and voucher_type_id = '".$cardExCode."' and is_used = 0 and is_effect = 0 limit 1");
            if($GLOBALS['db']->error()!="")
            {
              showErr('请求失败',$ajax);
            }
        }

        if($GLOBALS['db']->error()=="")
        {
            $voucher_transfer_data = array();
            $voucher_transfer_data['buyUid'] = $buyUid;
            $voucher_transfer_data['sellUid'] = $sellUid;
            $voucher_transfer_data['cardExCode'] = $cardExCode;
            $voucher_transfer_data['quantity'] = $quantity;
            $voucher_transfer_data['txnId'] = $txnId;
            $voucher_transfer_data['status'] = 1;
            $voucher_transfer_data['transId'] = 'W'.time();
            $GLOBALS['db']->autoExecute(DB_PREFIX."voucher_transfer",$voucher_transfer_data,"INSERT","","SILENT");
            ajax_return(array(
                'code'=> '00',
                'msg'=> '请求成功',
                'data'=> array(
                    'txnId'=> $txnId,
                    'transId'=> $voucher_transfer_data['transId']
                )
            ));
        } else {
            ajax_return(array(
                'code'=> '03',
                'msg'=> '交易失败'
            ));
        }
    }

    /**
     * [checkVoucher 卡券转账查询交易]
     * @param  [String] $appId [必填] [商户编号:商户分配给万益通唯一性商户编号]
     * @param  [String] $txnId [必填] [万益通流水号:唯一标识本次请求的流水号也可以是订单号，用户后续对账]
     * @param  [String] $sign [必填] [签名:根据参数名称进行倒序，然后再进行签名的生成，可以采用 SHA、MD5 等相关方案]
     * @param  [String] $timestamp [必填] [时间戳:每次请求的时间戳，格式化为：yyyyMMddHHmmss]
     * @return [String] $code [必填] [返回代码: 00 表示成功，其他的都表示失败]
     * @return [String] $msg [必填] [返回信息:接口返回的各种信息]
     * @return [Data] $data [必填] [数据集合:以下为 Data 对象内容]
     * @return [String] $txnId [必填] [万益通流水号:唯一标识本次请求的流水号也可以是订单号，用户后续对账]
     * @return [String] $transId [必填] [第三方流水号:第三方的唯一流水号]
     */
    public function checkUserVoucherTransfer () {
        $appId = strim($_POST['appId']);
        $txnId = strim($_POST['txnId']);
        $sign  = strim($_POST['sign']);
        $timestamp  = strim($_POST['timestamp']);

        $voucherTransfer = $GLOBALS['db']->getRow("select txnId, transId from ".DB_PREFIX."voucher_transfer where txnId = '".$txnId."'");

        if($GLOBALS['db']->error()=="")
        {
            ajax_return(array(
                'code'=> '00',
                'msg'=> '请求成功',
                'data'=> array(
                    'txnId'=> $txnId,
                    'transId'=> $voucherTransfer['transId']
                )
            ));
        } else {
            ajax_return(array(
                'code'=> '01',
                'msg'=> '查询失败'
            ));
        }
    }

    /**
     * [checkScore 查询用户积分等信息]
     * @param  [String] $uid [必填] [用户唯一标识:唯一标识用户的字符串]
     * @param  [String] $exCode [必填] [积分品种代码:如果商户存在多种积分,类型则需要该参数]
     * @param  [String] $sign [必填] [签名:根据参数名称进行倒序，然后再进行签名的生成，可以采用 SHA、MD5 等相关方案]
     * @param  [String] $timestamp [必填] [时间戳:每次请求的时间戳，格式化为：yyyyMMddHHmmss]
     * @return [String] $code [必填] [返回代码: 00 表示成功，其他的都表示失败]
     * @return [String] $msg [必填] [返回信息:接口返回的各种信息]
     * @return [Data] $data [必填] [数据集合:以下为 Data 对象内容]
     * @return [String] $balance [必填] [积分余额:用户可用积分余额]
     * @return [String] $gender [必填] [性别:用户性别:M/F]
     * @return [String] $age [必填] [年龄:用户年龄]
     * @return [String] $birthday [必填] [生日:用户生日]
     * @return [String] $custLevel [必填] [用户等级]
     * @return [String] $endDate [必填] [有效等级结束日:当前有效等级结束日格式：yyyyMMdd]
     */
    public function checkUserInfo () {
        $uid = strim($_POST['uid']);
        if (!$uid) {
            ajax_return(array(
                'code'=> '01',
                'msg'=> '查询失败'
            ));
            exit;
        }

        $userData = $GLOBALS['db']->getRow("select score, sex, birthday, level_id from ".DB_PREFIX."user where id = ".$uid);

        if($GLOBALS['db']->error()=="")
        {
            ajax_return(array(
                'code'=> '00',
                'msg'=> '请求成功',
                'data'=> array(
                    'balance'=> $userData['score'],
                    'gender'=> $userData['sex'] === "-1" ? "F" : "M",
                    'age'=> '21',
                    'birthday'=> $userData['birthday'],
                    'custLevel'=> $userData['level_id'] === "1" ? "新手上路" : "初入江湖",
                    'endDate'=> "2090-09-10",
                    'uid'=> $uid
                )
            ));
        } else {
            ajax_return(array(
                'code'=> '01',
                'msg'=> '查询失败'
            ));
        }
    }

    /**
     * [checkScore 中间账户+积分转账模式 中间人账号id 39]
     * @param  [String] $buyUid [必填] [买方用户唯一标识:唯一标识用户的字符串]
     * @param  [String] $sellUid [必填] [卖方用户唯一标识:唯一标识用户的字符串]
     * @param  [String] $exCode [必填] [积分品种代码:如果商户存在多种积分类型，则需要该参数默认为1]
     * @param  [String] $quantity [必填] [积分数量:转账的积分数量]
     * @param  [String] $txnId [必填] [万益通流水号:唯一标识本次请求的流水号也可以是订单号，用户后续对账]
     * @param  [String] $sign [必填] [签名:根据参数名称进行倒序，然后再进行签名的生成，可以采用 SHA、MD5 等相关方案]
     * @param  [String] $timestamp [必填] [时间戳:每次请求的时间戳，格式化为：yyyyMMddHHmmss]
     * @return [String] $code [必填] [返回代码: 00 表示成功，其他的都表示失败]
     * @return [String] $msg [必填] [返回信息:接口返回的各种信息]
     * @return [Data] $data [必填] [数据集合:以下为 Data 对象内容]
     * @return [String] $txnId [必填] [万益通流水号:唯一标识本次请求的流水号也可以是订单号，用户后续对账]
     * @return [String] $transId [必填] [第三方流水号:第三方的唯一流水号]
     */
    public function userScoreTransfer () {
        $buyUid = strim($_POST['buyUid']);
        $sellUid = strim($_POST['sellUid']);
        $exCode = strim($_POST['exCode']);
        $quantity = strim($_POST['quantity']);
        $txnId = strim($_POST['txnId']);
        $sign  = strim($_POST['sign']);
        $timestamp  = strim($_POST['timestamp']);

        $scoreTransfer = $GLOBALS['db']->getOne("select txnId from ".DB_PREFIX."score_transfer where txnId = '".$txnId."'");

        if ($scoreTransfer) {
            ajax_return(array(
                'code'=> '04',
                'msg'=> '请勿重复交易'
            ));
            exit;
        }

        $scoreData = $GLOBALS['db']->getRow("select score from ".DB_PREFIX."user where id = '".$sellUid."'");
        if (!$scoreData) {
            ajax_return(array(
                'code'=> '01',
                'msg'=> '查询失败'
            ));
            exit;
        }

        $score = $scoreData['score'];

        if ($score < $quantity) {
            ajax_return(array(
                'code'=> '02',
                'msg'=> '交易数额大于余额'
            ));
            exit;
        }

        // 减少卖方user记录中score数
        $reduceScore = $score - $quantity;
        $GLOBALS['db']->query("update ".DB_PREFIX."user set score = '".$reduceScore."' where id = '".$sellUid."' limit 1");
        if($GLOBALS['db']->error()!="")
        {
          ajax_return(array(
              'code'=> '03',
              'msg'=> '交易失败,服务器错误'
          ));
        }
        // 增加买方user记录中score数
        $buyScoreData = $GLOBALS['db']->getRow("select score from ".DB_PREFIX."user where id = '".$buyUid."'");
        $increaseScore = $buyScoreData['score'] + $quantity;
        $GLOBALS['db']->query("update ".DB_PREFIX."user set score = '".$increaseScore."' where id = '".$buyUid."' limit 1");

        if($GLOBALS['db']->error()=="")
        {
            $transfer_data = array();
            $transfer_data['buyUid'] = $buyUid;
            $transfer_data['sellUid'] = $sellUid;
            $transfer_data['exCode'] = $exCode;
            $transfer_data['quantity'] = $quantity;
            $transfer_data['txnId'] = $txnId;
            $transfer_data['status'] = 1;
            $transfer_data['transId'] = 'W'.time();
            $GLOBALS['db']->autoExecute(DB_PREFIX."score_transfer",$transfer_data,"INSERT","","SILENT");
            ajax_return(array(
                'code'=> '00',
                'msg'=> '请求成功',
                'data'=> array(
                    'txnId'=> $txnId,
                    'transId'=> $transfer_data['transId']
                )
            ));
        } else {
            ajax_return(array(
                'code'=> '03',
                'msg'=> '交易失败,服务器错误'
            ));
        }
    }

    /**
     * [checkScore 积分交易查询交易]
     * @param  [String] $txnId [必填] [万益通流水号:唯一标识本次请求的流水号也可以是订单号，用户后续对账]
     * @param  [String] $sign [必填] [签名:根据参数名称进行倒序，然后再进行签名的生成，可以采用 SHA、MD5 等相关方案]
     * @param  [String] $timestamp [必填] [时间戳:每次请求的时间戳，格式化为：yyyyMMddHHmmss]
     * @return [String] $code [必填] [返回代码: 00 表示成功，其他的都表示失败]
     * @return [String] $msg [必填] [返回信息:接口返回的各种信息]
     * @return [Data] $data [必填] [数据集合:以下为 Data 对象内容]
     * @return [String] $txnId [必填] [万益通流水号:唯一标识本次请求的流水号也可以是订单号，用户后续对账]
     * @return [String] $transId [必填] [第三方流水号:第三方的唯一流水号]
     */
    public function checkUserScoreTransfer () {
        $txnId = strim($_POST['txnId']);
        $sign  = strim($_POST['sign']);
        $timestamp  = strim($_POST['timestamp']);

        $scoreTransfer = $GLOBALS['db']->getRow("select txnId, transId from ".DB_PREFIX."score_transfer where txnId = '".$txnId."'");

        if($GLOBALS['db']->error()=="")
        {
            ajax_return(array(
                'code'=> '00',
                'msg'=> '请求成功',
                'data'=> array(
                    'txnId'=> $txnId,
                    'transId'=> $scoreTransfer['transId']
                )
            ));
        } else {
            ajax_return(array(
                'code'=> '01',
                'msg'=> '查询失败'
            ));
        }
    }

    /**
     * [积分退回接口]
     * @param  [String] $txnId [必填] [万益通流水号:唯一标识本次请求的流水号也可以是订单号，用户后续对账]
     * @param  [String] $origTxnId [必填] [原下单流水号:原挂单时扣分请求万益通流水号]
     * @param  [String] $quantity [必填] [退还的数量:退还积分数量]
     * @param  [String] $cancelType [必填] [退还类型:类型如下：全额退还、部分退还]
     * @param  [String] $sign [必填] [签名:根据参数名称进行倒序，然后再进行签名的生成，可以采用 SHA、MD5 等相关方案]
     * @param  [String] $timestamp [必填] [时间戳:每次请求的时间戳，格式化为：yyyyMMddHHmmss]
     * @return [String] $code [必填] [返回代码: 00 表示成功，其他的都表示失败]
     * @return [String] $msg [必填] [返回信息:接口返回的各种信息]
     * @return [Data] $data [必填] [数据集合:以下为 Data 对象内容]
     * @return [String] $txnId [必填] [万益通流水号:唯一标识本次请求的流水号也可以是订单号，用户后续对账]
     * @return [String] $transId [必填] [第三方流水号:第三方的唯一流水号]
     */
    public function giveBackScore () {
        $txnId = strim($_POST['txnId']);
        $origTxnId = strim($_POST['origTxnId']);
        $quantity = strim($_POST['quantity']);

        $checkTransfer = $GLOBALS['db']->getOne("select txnId, transId from ".DB_PREFIX."score_transfer where txnId = '".$txnId."'");

        if ($checkTransfer) {
            ajax_return(array(
                'code'=> '04',
                'msg'=> '请勿重复交易'
            ));
            exit;
        }

        $scoreTransfer = $GLOBALS['db']->getRow("select id, sellUid, buyUid, quantity, txnId, transId, isBack from ".DB_PREFIX."score_transfer where txnId = '".$origTxnId."'");

        if (!$scoreTransfer) {
            ajax_return(array(
                'code'=> '05',
                'msg'=> '交易不存在'
            ));
            exit;
        }

        if ($scoreTransfer['isBack'] == 1) {
            ajax_return(array(
                'code'=> '06',
                'msg'=> '积分已被撤回'
            ));
            exit;
        }

        if ($scoreTransfer['quantity'] < $quantity) {
            ajax_return(array(
                'code'=> '02',
                'msg'=> '退还数额大于原本交易数额'
            ));
            exit;
        }

        // 减少原本买方user记录中score数
        $buyUid = $scoreTransfer['buyUid'];
        $buyData = $GLOBALS['db']->getRow("select score from ".DB_PREFIX."user where id = '".$buyUid."'");
        $reduceScore = $buyData['score'] - $quantity;
        $GLOBALS['db']->query("update ".DB_PREFIX."user set score = '".$reduceScore."' where id = '".$buyUid."' limit 1");
        // 增加原本卖方user记录中score数
        $sellUid = $scoreTransfer['sellUid'];
        $sellData = $GLOBALS['db']->getRow("select score from ".DB_PREFIX."user where id = '".$sellUid."'");
        $increaseScore = $sellData['score'] + $quantity;
        $GLOBALS['db']->query("update ".DB_PREFIX."user set score = '".$increaseScore."' where id = '".$sellUid."' limit 1");
        // 这是原来记录中isBack为1
        $GLOBALS['db']->query("update ".DB_PREFIX."score_transfer set isBack = 1 where id = '".$scoreTransfer['id']."' limit 1");

        if($GLOBALS['db']->error()=="")
        {
            $transfer_data = array();
            $transfer_data['exCode'] = 1;
            $transfer_data['quantity'] = $quantity;
            $transfer_data['txnId'] = $txnId;
            $transfer_data['type'] = 2;
            $transfer_data['status'] = 1;
            $transfer_data['transId'] = 'W'.time();
            $GLOBALS['db']->autoExecute(DB_PREFIX."score_transfer",$transfer_data,"INSERT","","SILENT");
            ajax_return(array(
                'code'=> '00',
                'msg'=> '请求成功',
                'data'=> array(
                    'txnId'=> $txnId,
                    'transId'=> $transfer_data['transId'],
                )
            ));
        } else {
            ajax_return(array(
                'code'=> '01',
                'msg'=> '查询失败'
            ));
        }
    }
}
?>