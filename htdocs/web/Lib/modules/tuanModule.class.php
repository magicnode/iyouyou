<?php
class tuanModule extends BaseModule {
    
    public function index() {
        
    	global_run();   	
    	init_app_page();
    	if(isset($_GET['keyword'])){$this->search();exit();}
    	$tuan_cate_id = intval($_GET['cid']);
		$tuan_area = strim($_GET['area']);
		$tuan_place = strim($_GET['place']);
    	$url_param = array();
    	if($tuan_cate_id > 0)$url_param['cid'] = $tuan_cate_id;
    	if($tuan_area != "")$url_param['area'] = $tuan_area;
    	if($tuan_place != "") $url_param['place'] = $tuan_place;
    	
    	require APP_ROOT_PATH."system/libs/tuan.php";    	
    	$filter_nav_data = load_auto_cache("tuan_list",$url_param);    	
    	
    	//print_r($filter_nav_data);   	
    	
    	$filter_area_match= "";
    	if($tuan_area=="inall"||$tuan_area=="outall"){
    		//大区				
			$area_list = load_auto_cache("tour_area_list");
			foreach($area_list as $k=>$v)
			{
				if($v['type']==1){
					$filter_in_area_match .= $v['py'].",";
				}elseif($v['type']==2){
					$filter_out_area_match .= $v['py'].",";
				}
			}
			if($tuan_area=="inall"){
				$filter_area_match = substr($filter_in_area_match,0,-1);
			}elseif($tuan_area=="outall"){
				$filter_area_match = substr($filter_out_area_match,0,-1);
			}
    	}
    	
    	$conidtion  = build_deal_filter_condition($url_param,$filter_area_match);
    	
    	
    	

    	//获取当前页面的团购列表
    	$p = intval($_GET['p']);    	
    	$page_size= 9;
	    //统计团购个数
	    $rs_count = $GLOBALS['db']->getOne("SELECT count(*) FROM ".DB_PREFIX."tuan where 1=1 ".$conidtion);
   		$total_count=$GLOBALS['db']->getOne("SELECT count(*) FROM ".DB_PREFIX."tuan where is_effect=1 and (begin_time<".NOW_TIME." or (is_pre=1 and begin_time>".NOW_TIME.") or begin_time=0) and (end_time>".NOW_TIME." or end_time=0) and (match(city_match) against('".format_fulltext_key($GLOBALS['city']['py'])."' IN BOOLEAN MODE))");
		
    	if($rs_count > 0){
    		require APP_ROOT_PATH.'web/Lib/right_page.php';
    		
	    	$page = new Page($rs_count,$page_size);   //初始化分页对象 		
			$pages  =  $page->show();
    		$right_page = new RightPage($rs_count,$page_size);
    	    $right_pages  =  $right_page->show(); 
            //print_r($pages);exit;   	    
    	    //排序
    	    $sort_url_param = $url_param;
	    	$sort_url_param['s']=1;
	    	$sort['s1'] = url("tuan",$sort_url_param);
	    	$sort_url_param['s']=2;
	    	$sort['s2'] = url("tuan",$sort_url_param);
	    	$sort_url_param['s']=3;
	    	$sort['s3'] = url("tuan",$sort_url_param);
	    	$sort_url_param['s']=4;
	    	$sort['s4'] = url("tuan",$sort_url_param);
	    	$sort_url_param['s']=5;
	    	$sort['s5'] = url("tuan",$sort_url_param);
	    	$sort_url_param['s']=6;
	    	$sort['s6'] = url("tuan",$sort_url_param);
    		if($p<=0)$p = 1;
    		$order="sale_total desc";
    		$current=array();
    		$current['s6']="on";
    		if($_GET['s']==1) {$order="discount asc";$current['s1']="on";$current['s6']="";}
    		if($_GET['s']==2) {$order="sale_total desc";$current['s2']="on";$current['s6']="";}
    		if($_GET['s']==3) {$order="create_time desc";$current['s3']="on";$current['s6']="";}
    		$price_up_on=3;
    		if($_GET['s']==4) {$order="sale_price asc";$price_up_on=2;$current['s6']="";}
    		if($_GET['s']==5) {$order="sale_price desc";$price_up_on=1;$current['s6']="";}	
    		if($_GET['s']==6) {$order="sale_total desc";$current['s6']="on";}
			$limit = (($p-1)*$page_size).",".$page_size;
			$sql="SELECT id,type,name,origin_price,sale_price,image,brief,sale_total,end_time,begin_time FROM ".DB_PREFIX."tuan where 1=1 ".$conidtion." order by ".$order." LIMIT $limit";
    		
    		$list = $GLOBALS['db']->getAll($sql);
    		
    		foreach($list as $k=>$v){
    			$list[$k]['remain_time'] = intval(($v['end_time']-NOW_TIME)/86400);
    			if($list[$k]['remain_time']<0)$list[$k]['remain_time']=0;
    			$list[$k]['remain_time']="剩余".$list[$k]['remain_time']."天";
    			if($list[$k]['end_time']==0)$list[$k]['remain_time']="抢购进行中";
    			if($list[$k]['begin_time']>NOW_TIME){$list[$k]['remain_time']="抢购即将开始";$list[$k]['sale_total']=0;}
    			$list[$k]['brief']=msubstr($list[$k]['brief'],0,35,'utf-8');
    			$list[$k]['sale_price']=format_price_to_display($list[$k]['sale_price']);
    			$list[$k]['origin_price']=format_price_to_display($list[$k]['origin_price']);
    			if($list[$k]['type']==1)$list[$k]['type']='bg_1';
    			if($list[$k]['type']==2)$list[$k]['type']='bg_2';
    			if($list[$k]['type']==3)$list[$k]['type']='bg_3';
    			$list[$k]['url']=url("tuan#detail",array("did"=>$v['id']));    			
    		}    		
	    			
   		 }else{
    		$is_empty=1;
    	 }
    	 
    	$GLOBALS['tmpl']->assign('is_empty',$is_empty); 
   		$GLOBALS['tmpl']->assign('tuan_index',1);
   		$GLOBALS['tmpl']->assign('price_up_on',$price_up_on);
   		$GLOBALS['tmpl']->assign('current',$current);
   		$GLOBALS['tmpl']->assign('sort',$sort);
	    $GLOBALS['tmpl']->assign("site_name","团购首页 - ".app_conf("SITE_NAME"));
		$GLOBALS['tmpl']->assign('list',$list);
		$GLOBALS['tmpl']->assign('page',$pages);
		$GLOBALS['tmpl']->assign('right_page',$right_pages);
		$GLOBALS['tmpl']->assign('total_count',$total_count);
		$GLOBALS['tmpl']->assign('filter_nav_data',$filter_nav_data);	
        $GLOBALS['tmpl']->display("tuan_index.html"); 
    }
    
    /**
     * 往期团购
     */
    function history(){
    	global_run();
    	init_app_page();
    	//获取当前页面的团购列表
    	$p = intval($_GET['p']);    	
    	$page_size= 9;
	    //统计团购个数
	    $rs_count = $GLOBALS['db']->getOne("SELECT count(*) FROM ".DB_PREFIX."tuan where is_effect=1 and end_time<>0 and end_time<".NOW_TIME." and (match(city_match) against('".format_fulltext_key($GLOBALS['city']['py'])."' IN BOOLEAN MODE))");
        $total_count=$GLOBALS['db']->getOne("SELECT count(*) FROM ".DB_PREFIX."tuan where is_effect=1 and (begin_time<".NOW_TIME." or (is_pre=1 and begin_time>".NOW_TIME.")) and (end_time>".NOW_TIME." or end_time=0) and (match(city_match) against('".format_fulltext_key($GLOBALS['city']['py'])."' IN BOOLEAN MODE))");
    	if($rs_count > 0){
			require_once APP_ROOT_PATH."web/Lib/page.php";
			$page = new Page($rs_count,$page_size);   //初始化分页对象 	
			$pages  =  $page->show();
			if($p<=0)$p = 1;
			$limit = (($p-1)*$page_size).",".$page_size;
			$sql="SELECT id,type,name,origin_price,sale_price,image,brief,sale_total,end_time FROM ".DB_PREFIX."tuan where is_effect=1 and end_time<>0 and end_time<".NOW_TIME." and (match(city_match) against('".format_fulltext_key($GLOBALS['city']['py'])."' IN BOOLEAN MODE)) LIMIT $limit";	    		
			$list = $GLOBALS['db']->getAll($sql);	
			foreach($list as $k=>$v){				
				$list[$k]['remain_time']="抢购已结束";
				$list[$k]['brief']=msubstr($list[$k]['brief'],0,35,'utf-8');
				$list[$k]['sale_price']=format_price_to_display($list[$k]['sale_price']);
				$list[$k]['origin_price']=format_price_to_display($list[$k]['origin_price']);
				if($list[$k]['type']==1)$list[$k]['type']='bg_1';
				if($list[$k]['type']==2)$list[$k]['type']='bg_2';
				if($list[$k]['type']==3)$list[$k]['type']='bg_3';
				$list[$k]['url']=url("tuan#detail",array("did"=>$v['id']));    			
			}
			
			$GLOBALS['tmpl']->assign('list',$list);
			$GLOBALS['tmpl']->assign('page',$pages);				         
    	}else{
    		$is_empty=1;
    	}
    	    $GLOBALS['tmpl']->assign('is_empty',$is_empty);
    	    $GLOBALS['tmpl']->assign('tuan_index',3);
    	    $GLOBALS['tmpl']->assign("site_name","往期团购 - ".app_conf("SITE_NAME"));
    	    $GLOBALS['tmpl']->assign('total_count',$total_count);
    	    $GLOBALS['tmpl']->display("tuan_index.html");   		
    }
    
    /**
     * 团购预告
     */
    function advance(){
     	global_run();
     	init_app_page();
    	//获取当前页面的团购列表
    	$p = intval($_GET['p']);    	
    	$page_size= 9;
	    //统计团购个数
	    $rs_count = $GLOBALS['db']->getOne("SELECT count(*) FROM ".DB_PREFIX."tuan where is_effect=1 and is_pre=1 and begin_time>".NOW_TIME." and (match(city_match) against('".format_fulltext_key($GLOBALS['city']['py'])."' IN BOOLEAN MODE))");
   		$total_count=$GLOBALS['db']->getOne("SELECT count(*) FROM ".DB_PREFIX."tuan where is_effect=1 and (begin_time<".NOW_TIME." or (is_pre=1 and begin_time>".NOW_TIME.")) and (end_time>".NOW_TIME." or end_time=0) and (match(city_match) against('".format_fulltext_key($GLOBALS['city']['py'])."' IN BOOLEAN MODE))");
    	if($rs_count > 0){
			require_once APP_ROOT_PATH."web/Lib/page.php";
			$page = new Page($rs_count,$page_size);   //初始化分页对象 		
			$pages  =  $page->show();
			if($p<=0)$p = 1;
			$limit = (($p-1)*$page_size).",".$page_size;
			$sql="SELECT id,type,name,origin_price,sale_price,image,brief,sale_total,end_time FROM ".DB_PREFIX."tuan where is_effect=1 and is_pre=1 and begin_time>".NOW_TIME." and (match(city_match) against('".format_fulltext_key($GLOBALS['city']['py'])."' IN BOOLEAN MODE)) LIMIT $limit";	    		
			$list = $GLOBALS['db']->getAll($sql);
			foreach($list as $k=>$v){
				$list[$k]['remain_time']="抢购即将开始";
				$list[$k]['brief']=msubstr($list[$k]['brief'],0,35,'utf-8');
				$list[$k]['sale_price']=format_price_to_display($list[$k]['sale_price']);
				$list[$k]['origin_price']=format_price_to_display($list[$k]['origin_price']);
				if($list[$k]['type']==1)$list[$k]['type']='bg_1';
				if($list[$k]['type']==2)$list[$k]['type']='bg_2';
				if($list[$k]['type']==3)$list[$k]['type']='bg_3';
				$list[$k]['url']=url("tuan#detail",array("did"=>$v['id']));
				$list[$k]['sale_total']=0;    			
			}			
			$GLOBALS['tmpl']->assign('list',$list);
			$GLOBALS['tmpl']->assign('page',$pages); 
    	}else{
    		$is_empty=1;
    	}
    	    $GLOBALS['tmpl']->assign('is_empty',$is_empty);
    	    $GLOBALS['tmpl']->assign('tuan_index',2);
    	    $GLOBALS['tmpl']->assign("site_name","团购预告  - ".app_conf("SITE_NAME"));
    	    $GLOBALS['tmpl']->assign('total_count',$total_count);
    	    $GLOBALS['tmpl']->display("tuan_index.html");   		    		
    }
    
    /**
    * 团购搜索
    */
    public function search(){
     	global_run();
     	init_app_page();
     	$keywords = strim($_GET['keyword']);     	
    	//获取当前页面的团购列表
    	$p = intval($_GET['p']);    	
    	$page_size= 9;
	    //统计团购个数
	    $rs_count = $GLOBALS['db']->getOne("SELECT count(*) FROM ".DB_PREFIX."tuan where name like '%".$keywords."%' and is_effect=1 and (begin_time<".NOW_TIME." or (is_pre=1 and begin_time>".NOW_TIME.")) and (end_time>".NOW_TIME." or end_time=0) and (match(city_match) against('".format_fulltext_key($GLOBALS['city']['py'])."' IN BOOLEAN MODE))");
   		$total_count=$GLOBALS['db']->getOne("SELECT count(*) FROM ".DB_PREFIX."tuan where is_effect=1 and (begin_time<".NOW_TIME." or (is_pre=1 and begin_time>".NOW_TIME.")) and (end_time>".NOW_TIME." or end_time=0) and (match(city_match) against('".format_fulltext_key($GLOBALS['city']['py'])."' IN BOOLEAN MODE))");
    	if($rs_count > 0){
			require_once APP_ROOT_PATH."web/Lib/page.php";
			$page = new Page($rs_count,$page_size);   //初始化分页对象 		
			$pages  =  $page->show();
			if($p<=0)$p = 1;
			$limit = (($p-1)*$page_size).",".$page_size;
			$sql="SELECT id,type,name,origin_price,sale_price,image,brief,sale_total,end_time,begin_time FROM ".DB_PREFIX."tuan where is_effect=1 and name like '%".$keywords."%' and (begin_time<".NOW_TIME." or (is_pre=1 and begin_time>".NOW_TIME.")) and (end_time>".NOW_TIME." or end_time=0) and (match(city_match) against('".format_fulltext_key($GLOBALS['city']['py'])."' IN BOOLEAN MODE)) LIMIT $limit";	    		
			$list = $GLOBALS['db']->getAll($sql);
			foreach($list as $k=>$v){
    			$list[$k]['remain_time'] = intval(($v['end_time']-NOW_TIME)/86400);
    			if($list[$k]['remain_time']<0)$list[$k]['remain_time']=0;
    			$list[$k]['remain_time']="剩余".$list[$k]['remain_time']."天";
    			if($list[$k]['end_time']==0)$list[$k]['remain_time']="抢购进行中";
    			if($list[$k]['begin_time']>NOW_TIME){$list[$k]['remain_time']="抢购即将开始";$list[$k]['sale_total']=0;}
				$list[$k]['brief']=msubstr($list[$k]['brief'],0,35,'utf-8');
				$list[$k]['sale_price']=format_price_to_display($list[$k]['sale_price']);
				$list[$k]['origin_price']=format_price_to_display($list[$k]['origin_price']);
				if($list[$k]['type']==1)$list[$k]['type']='bg_1';
				if($list[$k]['type']==2)$list[$k]['type']='bg_2';
				if($list[$k]['type']==3)$list[$k]['type']='bg_3';
				$list[$k]['url']=url("tuan#detail",array("did"=>$v['id']));				    			
			}			
			$GLOBALS['tmpl']->assign('list',$list);
			$GLOBALS['tmpl']->assign('page',$pages); 
    	}else{
    		$is_empty=2;
    	}
    	    $GLOBALS['tmpl']->assign('is_empty',$is_empty);
    	    $GLOBALS['tmpl']->assign('tuan_index',2);
    	    $GLOBALS['tmpl']->assign("site_name","团购预告  - ".app_conf("SITE_NAME"));
    	    $GLOBALS['tmpl']->assign('total_count',$total_count);
    	    $GLOBALS['tmpl']->display("tuan_index.html");   		    		
    }
    
   	public function detail(){   		
   		if(intval($_GET['did'])>0 || $_REQUEST['sid'] >0){
   			$detailid=intval($_GET['did']);
   			$sid=intval($_REQUEST['sid']);
   			$preview=intval($_REQUEST['preview']);
   			$type=intval($_REQUEST['type']);
   			global_run();		
    		init_app_page();
    		if($detailid >0)
    		{
    			$tuan_result = $GLOBALS['db']->getRow("SELECT rel_id,type,image,is_pre,is_effect,is_history FROM ".DB_PREFIX."tuan where id=".$detailid." LIMIT 1");
    		}
    		
    		if(empty($tuan_result))
    		{
    			app_redirect(url("tuan"));
    		}
    		//线路
    		if(($tuan_result['type']!=""&&$tuan_result['type']==1) || $type ==1){
    			require APP_ROOT_PATH."system/libs/tourline.php";
    			if($sid >0)
		    	{
		    		$result=get_tourline_supplier($sid);
		    		$tourline_id=intval($result['tourline_id']);
		    	}
		    	else
		    	{
		    		$result=get_tourline($tuan_result['rel_id']);
		    		$tourline_id=intval($result['id']);
		    	}
    			//$result=$GLOBALS['db']->getRow("SELECT id,name,origin_price,price,image,sale_virtual_total,brief,tour_desc,appoint_desc,tour_desc_1,tour_desc_1_name,tour_desc_2,tour_desc_2_name,tour_desc_3,tour_desc_3_name,tour_desc_4,tour_desc_4_name,tuan_begin_time,tuan_end_time,child_norm,satify,is_review_return,review_return_money,review_return_score,review_return_exp,seo_title,seo_description,seo_keywords,show_sale_list FROM ".DB_PREFIX."tourline where id=".$tuan_result['rel_id']." LIMIT 1");
    			$result['brief_full']=$result['brief'];
    			$result['brief']=msubstr($result['brief'],0,110,'utf-8');
    			$result['save']=$result['origin_price']-$result['price'];
    			$result['discount']=round($result['price']/$result['origin_price'],2)*10;
    			$result['appointment_desc']=$result['appoint_desc'];
    			if($tourline_id >0)
    				$result['review_num']=$GLOBALS['db']->getOne("SELECT count(*) FROM ".DB_PREFIX."review where review_type=1 and review_rel_id=".$tourline_id );
    			else
    				$result['review_num']=0;
    			$result['sub_url']=url("tourline_order#index");
    			$tourline_item=$result['tourline_item'];

                // 获取商家id
                $supplier_id = $result['supplier_id'];

    			//print_r($result);
    			//日历内容
    			$json_item=array();
    			foreach($tourline_item as $k=>$v){
    				$title= "位置> 9";
    				if($v['adult_limit'] >0 || $v['child_limit']>0){
    					$position_num=($v['adult_limit']+$v['child_limit'])-($v['child_sale_total']+$v['adult_sale_total']);
    				    $position_num=$position_num<0?0:$position_num;
    					if($position_num <=9)
    		    			$title= "位置 ".$position_num;
    				}else{
    					$position_num=9;
    				}
    				if($position_num>0){
					    $json_item[]=array(
							'id' => $v['id_start_time'],
							'title' => "".$v['adult_price']."元",
							'start' => $v['start_time'],
							'textColor' => "red"
					    );
					    $json_item[]=array(
							'id' => $v['id'],
							'title' => $title,
							'start' => $v['start_time'],
							'textColor' => "#999",
							'content'=> $v['brief']					
					    );    					
    				}
		        }
		        //购买人数选择
    			$select_num =array();
		    	for($i=0; $i<50; $i++)
		    	{
		    		$select_num[$i]['value']=$i+1;
		    	}			
		        $GLOBALS['tmpl']->assign("tourline_item",$tourline_item);
		        $GLOBALS['tmpl']->assign("select_num",$select_num);		            			
				$GLOBALS['tmpl']->assign('type',1);
    			    			
    		//门票	
    		}elseif($tuan_result['type']!=""&&$tuan_result['type']==2){
    			$result=$GLOBALS['db']->getRow("SELECT t.name,t.origin_price,t.sale_price,t.spot_id,t.sale_virtual_total,t.tuan_begin_time,t.tuan_end_time,t.is_review_return,t.review_return_money,t.review_return_score,t.review_return_exp,t.sale_total,t.sale_max,s.brief,s.description,s.appointment_desc,s.spot_desc_1_name,s.spot_desc_1,s.spot_desc_2_name,s.spot_desc_2,s.spot_desc_3_name,s.spot_desc_3,s.spot_desc_4_name,s.spot_desc_4,s.satify,s.seo_title,s.seo_description,s.seo_keywords,s.show_sale_list FROM ".DB_PREFIX."ticket t left join ".DB_PREFIX."spot s on t.spot_id=s.id where t.id=".$tuan_result['rel_id']." LIMIT 1");
    			$result['brief_full']=$result['description'];
    			
    			$result['brief_full'] = format_html_content_image($result['brief_full'], 750);
				$result['appoint_desc'] = format_html_content_image($result['appoint_desc'], 750,0);
				$result['tour_desc_1'] = format_html_content_image($result['tour_desc_1'], 750,0);
				$result['tour_desc_2'] = format_html_content_image($result['tour_desc_2'], 750,0);
				$result['tour_desc_3'] = format_html_content_image($result['tour_desc_3'], 750,0);
				$result['tour_desc_4'] = format_html_content_image($result['tour_desc_4'], 750,0);
				
				
    			$result['id']=$result['spot_id'];
    			if(!isset($result['satify']))$result['satify']=0;
    			$result['brief']=msubstr($result['brief'],0,110,'utf-8');
    			$result['origin_price']=format_price_to_display($result['origin_price']);
    			$result['price']=format_price_to_display($result['sale_price']);
    			$result['save']=$result['origin_price']-$result['price'];
    			$result['discount']=round($result['price']/$result['origin_price'],2)*10;				
				$result['ticket_id']=$tuan_result['rel_id'];
				$result['review_num']=$GLOBALS['db']->getOne("SELECT count(*) FROM ".DB_PREFIX."review where review_type=2 and review_rel_id=".$result['spot_id'] );
				$result['sub_url']=url("tuan#ticket_ajax");		

                // 获取商家id
                $supplier_id = $result['supplier_id'];

				$GLOBALS['tmpl']->assign('type',2);      			
    			
    		}
    		//团购状态判断
    		if($tuan_result['is_effect']==1 || $preview ==1){
    			if($result['tuan_begin_time']>0 && $result['tuan_begin_time']>NOW_TIME &&($tuan_result['is_pre']==1 || ($result['is_pre'] ==1 && $preview ==1)) ){
	    			$result['state']=2;
	    			$result['button_name']="即将开始";
	    			$result['tuan_end_time']=$result['tuan_begin_time'];
	    			$result['sale_virtual_total']=0;
	    			$result['count_down']='距开始还有：<span class="dd">0</span> 天 <span class="hh">0</span> 小时 <span class="mm">0</span> 分 <span class="ss">0</span> 秒';
	    		}elseif($result['tuan_end_time']>0&&$result['tuan_end_time']<NOW_TIME){
	    			$result['state']=3;
	    			$result['button_name']="已结束";
	    			$result['count_down']="团购已结束";
	    		}elseif($result['sale_max']>0&&$result['sale_total']+1>$result['sale_max']){
	    			$result['state']=4;
	    			$result['button_name']="已卖光";
	    			$result['count_down']='该产品已卖光';
	    		}elseif($result['tuan_end_time']>NOW_TIME&&$result['tuan_begin_time']<NOW_TIME){
	    			$result['state']=1;
	    			$result['button_name']="马上抢";
	    			$result['count_down']='还剩：<span class="dd">0</span> 天 <span class="hh">0</span> 小时 <span class="mm">0</span> 分 <span class="ss">0</span> 秒';
	    		}elseif($result['tuan_end_time']==0&&$result['tuan_begin_time']<NOW_TIME){
	    			$result['state']=1;
	    			$result['button_name']="马上抢";
	    			$result['count_down']='抢购进行中';
	    		}else{
	    			$result['state']=5;
	    		}
	    		
    		}else{
    			$result['state']=5;
    		}
    		//只有在团购状态为1时日历才显示东西
    		if(($tuan_result['type']==1 || $type ==1)&&$result['state']==1){
    			$GLOBALS['tmpl']->assign("json_item",json_encode($json_item));
    		}else{
    			unset($json_item);
    		}
    		
    		//点评返还
     		if($result['review_return_money']!=0){
    			$result['review_return_money']=$result['review_return_money']/100;
    			$result['review_return']="返现".$result['review_return_money']."元";
    		}elseif($result['review_return_score']!=0){
    			$result['review_return']="返".$result['review_return_score']."积分";
    		}elseif($result['review_return_exp']!=0){
    			$result['review_return']="返".$result['review_return_exp']."经验";
    		}else{
    			$result['is_review_return']=0;
    		}
   		    //点击收藏URL
    		$add_url=url("tuan#detail",array("did"=>$detailid));    		
    		$result['add_url']=$add_url;    	
			//seo
			if(!isset($result['seo_title']))$result['seo_title']=$result['name'];
			if(!isset($result['seo_keywords']))$result['seo_keywords']=$result['name'];
			if(!isset($result['seo_description']))$result['seo_description']=$result['name'];

    		//右侧热卖
    		$hot_sell = $GLOBALS['db']->getAll("SELECT id,brief,sale_price,image FROM ".DB_PREFIX."tuan where is_effect=1 and begin_time<".NOW_TIME." and (end_time>".NOW_TIME." or end_time=0) and (match(city_match) against('".format_fulltext_key($GLOBALS['city']['py'])."' IN BOOLEAN MODE)) order by sale_total desc LIMIT 7");
    		if($hot_sell!=""){
    			foreach($hot_sell as $k=>$v){
	    			$hot_sell[$k]['sale_price']=format_price_to_display($hot_sell[$k]['sale_price']);
	    		    $hot_sell[$k]['brief']=msubstr($hot_sell[$k]['brief'],0,25,'utf-8');
	    		    $hot_sell[$k]['url']=url("tuan#detail",array("did"=>$v['id']));	    			
    			}
    			$hot_sell[0]['current']=1;
    			$GLOBALS['tmpl']->assign('hot_sell',$hot_sell);
    		}     
    		if($detailid >0)
    		{		
	 			//点评
	    		require_once APP_ROOT_PATH.'system/libs/review.php';
		        $review_html = Review::init_review($tuan_result['type'],$tuan_result['rel_id']);
		        $GLOBALS['tmpl']->assign('review_html',$review_html);
	    		//成交记录
		    	if($result['show_sale_list']){
		    		$sale_result = $this->ajax_sale_list($result['id'],$tuan_result['type']);
		    		$GLOBALS['tmpl']->assign("sale_result",$sale_result);
		    		unset($sale_result);
		    	}
    		}
    		$result['is_history'] = $tuan_result['is_history'];
    		
   			$total_count=$GLOBALS['db']->getOne("SELECT count(*) FROM ".DB_PREFIX."tuan where is_effect=1 and (begin_time<".NOW_TIME." or (is_pre=1 and begin_time>".NOW_TIME.")) and (end_time>".NOW_TIME." or end_time=0) and (match(city_match) against('".format_fulltext_key($GLOBALS['city']['py'])."' IN BOOLEAN MODE))");

            // 根据supplier id获取商家信息
            $supplier=$GLOBALS['db']->getRow("SELECT * FROM ".DB_PREFIX."supplier where id=".$supplier_id." LIMIT 1");

            $GLOBALS['tmpl']->assign('supplier',$supplier);
   			$GLOBALS['tmpl']->assign('result',$result);
   			$GLOBALS['tmpl']->assign('image_url',$tuan_result['image']);
   			$GLOBALS['tmpl']->assign('total_count',$total_count);
   			/*输出SEO元素*/
   			$GLOBALS['tmpl']->assign("site_name","团购详情页 - ".$result['name'].app_conf("SITE_NAME"));
		    $GLOBALS['tmpl']->assign("site_keyword",$result['seo_keywords'].",".app_conf("SITE_KEYWORD"));
		    $GLOBALS['tmpl']->assign("site_description",$result['seo_description'].",".app_conf("SITE_DESCRIPTION"));
   			
   			$GLOBALS['tmpl']->display("tuan_detail.html");
   		}
   		   		
   		
   	}
   
   
    
    //成交记录
    function ajax_sale_list($id,$type){
    	$page=intval($_REQUEST['p']);
    	$is_ajax =intval($_REQUEST['is_ajax']);
    	if($page==0)$page=1;    		
		$pagesize = 5;
		$bargain_id = intval($id);
		if($bargain_id == 0)exit();
		$limit  = (($page - 1) *$pagesize) .",$pagesize";
		if($type==1){
			$rs = get_tourline_sale_list($bargain_id,$limit);
		}elseif($type==2){
			require APP_ROOT_PATH . "system/libs/spot.php";
			$rs = get_sale_list($bargain_id,$limit);
		}	
		
		$pager = buildPage("tuan#ajax_sale_list",array('id'=>$bargain_id,"is_ajax"=>1),$rs['rs_count'],$page,$pagesize,1);
      
        $GLOBALS['tmpl']->assign('pager',$pager);
        $result['pager'] = $GLOBALS['tmpl']->fetch("inc/pages.html");
		
		$GLOBALS['tmpl']->assign("is_ajax",$is_ajax);
		
		$GLOBALS['tmpl']->assign("sale_list",$rs['list']);
		if($type==1){
			$result['html'] = $GLOBALS['tmpl']->fetch("inc/tourline/sale_list.html");
		}elseif($type==2){
			$result['html'] = $GLOBALS['tmpl']->fetch("inc/spot/sale_list.html");
		}    	
    	if($is_ajax == 1){
    		ajax_return($result);
    	}
    	else{
    		return $result;
    	}
    }
 
 	public function ticket_ajax(){
 		global_run();
 		$ticket_id=intval($_REQUEST['id']);
 		if(!$GLOBALS['user']){    		
    		$return['status'] = 2;
			$return['jump'] = url("user#login");
			ajax_return($return);
    	}
 		$ticket_result=$GLOBALS['db']->getRow("SELECT sale_virtual_total,tuan_begin_time,tuan_end_time,sale_total,sale_max FROM ".DB_PREFIX."ticket where id=".$ticket_id." and is_effect=1 and is_tuan=1 LIMIT 1");
 		if(!$ticket_result)showErr("没有找到该团品或已下架",1);
 		if($ticket_result['tuan_begin_time'] > NOW_TIME && $ticket_result['tuan_begin_time'] >0)showErr("团购未开始",1);	    	
	    if($ticket_result['tuan_end_time'] < NOW_TIME && $ticket_result['tuan_end_time'] >0)showErr("团购已结束",1);
 		if($ticket_result['sale_max']>0&&$ticket_result['sale_total']+1>$ticket_result['sale_max'])showErr("该团品已卖完",1);
		$return['status'] = 1;
		$return['jump'] = url("ticket_order",array("id"=>$ticket_id));
		ajax_return($return);
 	}
 
 
   
}
?>