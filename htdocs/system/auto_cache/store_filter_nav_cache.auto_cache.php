<?php
//该演示为fanweo2o的商家导航菜单的缓存示例，使用到DB
class store_filter_nav_cache_auto_cache extends auto_cache{
	public function load($param)
	{
		$key = $this->build_key(__CLASS__,$param);
		//传入参数 city_id(城市)  cid(分类ID) tid(子分类ID) aid(行政区) qid(商圈ID)
//		$GLOBALS['fcache']->set_dir(APP_ROOT_PATH."public/runtime/data/".__CLASS__."/");
		$end_time = get_gmtime()-(3600*24);
		$result = unserialize($GLOBALS['db']->getOne("select cache_data from ".DB_PREFIX."auto_cache where cache_type = '".__CLASS__."' and cache_key = '".$key."' and cache_time > ".$end_time));
		if($result===false)
		{			
			$GLOBALS['db']->query("delete from ".DB_PREFIX."auto_cache where cache_type = '".__CLASS__."' and cache_key = '".$key."'");
			$city_id = intval($param['city_id']);
			$url_param = $param;
			unset($url_param['city_id']);
			$area_id = intval($param['aid']);
			$quan_id = intval($param['qid']);
			$cate_id = intval($param['cid']);
			$deal_type_id = intval($param['tid']);	
			
			//大区
			$area_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."area where city_id = ".$city_id." and pid = 0 order by sort desc");
			$area_list[]	=	array("name"=>$GLOBALS['lang']['ALL'],"id"=>0);
			foreach($area_list as $k=>$v)
			{
					if($area_id==$v['id'])
					{
						$area_list[$k]['act'] = 1;
					}
					$tmp_url_param = $url_param;
					unset($tmp_url_param['qid']);
					$tmp_url_param['aid'] = $v['id'];
					$area_list[$k]['url'] = url("youhui","store",$tmp_url_param);	
					$condition = build_deal_filter_condition($tmp_url_param);	
					
					$area_list[$k]['count'] = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."supplier_location where is_effect=1 $condition ");
			}		
			$result['area_list'] = $area_list;
			
			//小区
			if($area_id>0)
			{			
				$quan_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."area where city_id = ".$city_id." and pid = ".$area_id." order by sort desc");
				$quan_list[]	=	array("name"=>$GLOBALS['lang']['ALL'],"id"=>0);
				foreach($quan_list as $k=>$v)
					{
						if($quan_id==$v['id'])
						{
							$quan_list[$k]['act'] = 1;
						}
						$tmp_url_param = $url_param;
						$tmp_url_param['qid'] = $v['id'];
						$quan_list[$k]['url'] = url("youhui","store",$tmp_url_param);	
						$condition = build_deal_filter_condition($tmp_url_param);						
						$quan_list[$k]['count'] = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."supplier_location where is_effect=1 $condition ");
				}			
			}
			$result['quan_list'] = $quan_list;
			
			//大类
			//输出分类
			$cate_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal_cate where is_effect = 1 and is_delete = 0 and pid = 0 order by sort desc");
			$cate_list[]	=	array("name"=>$GLOBALS['lang']['ALL'],"cid"=>0);
			foreach($cate_list as $k=>$v)
			{
					if($cate_id==$v['id'])
					{
						$cate_list[$k]['act'] = 1;
					}
					$tmp_url_param = $url_param;
					unset($tmp_url_param['tid']);
					if($v['uname']!='')
					$tmp_url_param['cid'] = $v['uname'];
					else
					$tmp_url_param['cid'] = $v['id'];
					$cate_list[$k]['url'] = url("youhui","store",$tmp_url_param);	
					$condition = build_deal_filter_condition($tmp_url_param);						
					$cate_list[$k]['count'] = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."supplier_location where is_effect=1 $condition ");
				
			}		
			$result['cate_list'] = $cate_list;
			
			//小类		
			$deal_cate_id = $cate_id;
			if($deal_cate_id>0)
			{			
				$scate_list =$GLOBALS['db']->getAll("select t.id,t.name from ".DB_PREFIX."deal_cate_type as t left join ".DB_PREFIX."deal_cate_type_link as l on l.deal_cate_type_id = t.id where l.cate_id = ".$deal_cate_id." order by t.sort desc");				
				foreach($scate_list as $k=>$v)
				{									
							if($deal_type_id==$v['id'])
							$scate_list[$k]['act'] = 1;
		
							$tmp_url_param = $url_param;
							$tmp_url_param['tid'] = $v['id'];
							$durl = url("youhui","store",$tmp_url_param);						
							$scate_list[$k]['url'] = $durl;
							$condition = build_deal_filter_condition($tmp_url_param);
							$scate_list[$k]['count'] = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."supplier_location where is_effect=1 $condition ");
				
				}			
			}
			$result['scate_list'] = $scate_list;
			
			
			//分组筛选
			$tag_group = $GLOBALS['db']->getAll("select g.* from ".DB_PREFIX."tag_group as g left join ".DB_PREFIX."tag_group_link as l on l.tag_group_id = g.id where l.category_id = ".$deal_cate_id." and g.allow_search = 1 order by g.sort desc");
			if($tag_group)
			{
				foreach($tag_group as $k=>$v)
				{
					$arr = explode(" ",$v['tags']);
					$group_tags = array();
					foreach($arr as $kk=>$vv)
					{						
						if(trim($vv)!="")
						{
							$group_tags[$kk]['name'] = $vv;
							$tmp_url_param = $url_param;
							$tmp_url_param['g['.$v['id'].']'] = $vv;
							$group_tags[$kk]['url'] = url("youhui","store",$tmp_url_param);	
							if($vv==addslashes(trim($_REQUEST['g'][$v['id']])))
							{
								$group_tags[$kk]['act'] = 1;
							}	
						}
					}
					$tmp_url_param = $url_param;
					$tmp_url_param['g['.$v['id'].']'] = "";
					$group_tags[] = array("name"=>"全部","url"=>url("youhui","store",$tmp_url_param),"act"=>addslashes(trim($_REQUEST['g'][$v['id']]))==""?1:0);
					$tag_group[$k]["tags"] = $group_tags;
				}

				$result['tag_group'] = $tag_group;
			}			
			
			$db_data['cache_key'] = $key;
			$db_data['cache_type'] = __CLASS__;
			$db_data['cache_time'] = get_gmtime();
			$db_data['cache_data'] = serialize($result);
			$GLOBALS['db']->autoExecute(DB_PREFIX."auto_cache",$db_data);
		
		}	

		return $result;
	}
	public function rm($param)
	{
		$key = $this->build_key(__CLASS__,$param);
		$GLOBALS['db']->query("delete from ".DB_PREFIX."auto_cache where cache_type = '".__CLASS__."' and cache_key = '".$key."'");
	}
	public function clear_all()
	{
		$GLOBALS['db']->query("delete from ".DB_PREFIX."auto_cache where cache_type = '".__CLASS__."'");		
	}
}
?>