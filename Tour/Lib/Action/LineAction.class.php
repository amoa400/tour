<?php

class LineAction extends Action {

	private $pointTypeList;
	public $zhoubian = array(1,2,3,4,6);
	public $guonei = array(5,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);

	// 线路显示页面
    public function show() {
		$id = $this->_get('id');
		$line = D('Line')->rAll($id);
		$line['schedule'] = D('LineSchedule')->rByLineIdDate($line['id'], getCntDate(), 70);
		$line['point'] = D('Point')->rByString($line['point_id'], true);
		$line = $this->format($line);
		$headTitle = $line['name'].'__'.$line['to_province'].$line['to_city'];
		$this->assign('line', $line);
		$this->assign('headTitle', $headTitle);
		$this->display();
    }
	
	// 周边游首页
	public function zhoubian() {
		// 获取线路主题
		$pointTypeList = D('PointType')->rList();
		$pointList = D('Point')->rListByProvinceList($this->zhoubian, '`id`,`name_abb`,`subject_id`', '`count` DESC');
		foreach($pointList as $item) {
			foreach($pointTypeList as $key => $item2) {
				if (count($pointTypeList[$key]['point']) >= 9) continue;
				if (strstr($item['subject_id'], ','.$item2['id'].',')) {
						$item['name_abb'] = mb_substr($item['name_abb'], 0, 5, 'utf-8');
						$pointTypeList[$key]['point'][] = $item;
						break;
				}
			}
		}
		$this->assign('pointTypeList', $pointTypeList);
		
		// 获取推荐线路
		$recommendList = array();
		$recommendS = D('Const')->r('zb_recommend');
		$recommendA = split(';', $recommendS);
		foreach($recommendA as $item) {
			if (empty($item)) continue;
			$s = split(',', $item);
			$recommendList[] = array();
			$cnt = count($recommendList);
			$recommendList[$cnt-1]['id'] = $s[0];
			$recommendList[$cnt-1]['name'] = $s[1];
		}
		$this->assign('recommendList', $recommendList);
		
		// 获取特价线路
		$specialList = array();
		$specialS = D('Const')->r('zb_special');
		$specialA = split(';', $specialS);
		foreach($specialA as $item) {
			if (empty($item)) continue;
			$s = split(',', $item);
			$specialList[] = array();
			$cnt = count($specialList);
			$specialList[$cnt-1]['id'] = $s[0];
			$specialList[$cnt-1]['name'] = $s[1];
			$specialList[$cnt-1]['price'] = $s[2];
		}
		$this->assign('specialList', $specialList);
		
		// 获取热门线路
		$para = array();
		$para['type_id'] = 1;
		$para['from_province_id'] = 1;
		$para['from_city_id'] = 1;
		$para['z'] = 1;
		$para['order_id'] = 2;
		$hotList = D('Line')->rList($para, 5);
		$this->assign('hotList', $hotList['data']);
	
		// 产品常量
		$product = array();
		$product['z'] = 1;
		$product['name'] = '周边游';
		$product['type'] = '周边';
		$product['typeAbb'] = 'zb';
		$this->assign('product', $product);
		
		$this->assign('headTitle', $product['name']);
		$this->display('../Tour/Tpl/Line/productIndex.html');
	}
	
	// 国内游首页
	public function guonei() {
		// 获取线路主题
		$pointTypeList = D('PointType')->rList();
		$this->assign('pointTypeList', $pointTypeList);
		
		// 获取省份景点列表
		$provinceList = D('Province')->rList(2);
		$pointList = D('Point')->rListByProvinceList($this->guonei, '`id`,`name_abb`,`province_id`', '`count` DESC');
		foreach($pointList as $item) {
			foreach($provinceList as $key => $item2) {
				if (count($provinceList[$key]['point']) >= 9) continue;
				if ($item['province_id'] == $item2['id']) {
						$item['name_abb'] = mb_substr($item['name_abb'], 0, 5, 'utf-8');
						$provinceList[$key]['point'][] = $item;
						break;
				}
			}
		}
		$this->assign('provinceList', $provinceList);
		
		// 获取推荐线路
		$recommendList = array();
		$recommendS = D('Const')->r('gn_recommend');
		$recommendA = split(';', $recommendS);
		foreach($recommendA as $item) {
			if (empty($item)) continue;
			$s = split(',', $item);
			$recommendList[] = array();
			$cnt = count($recommendList);
			$recommendList[$cnt-1]['id'] = $s[0];
			$recommendList[$cnt-1]['name'] = $s[1];
		}
		$this->assign('recommendList', $recommendList);
		
		// 获取特价线路
		$specialList = array();
		$specialS = D('Const')->r('gn_special');
		$specialA = split(';', $specialS);
		foreach($specialA as $item) {
			if (empty($item)) continue;
			$s = split(',', $item);
			$specialList[] = array();
			$cnt = count($specialList);
			$specialList[$cnt-1]['id'] = $s[0];
			$specialList[$cnt-1]['name'] = $s[1];
			$specialList[$cnt-1]['price'] = $s[2];
		}
		$this->assign('specialList', $specialList);
		
		// 获取热门线路
		$para = array();
		$para['type_id'] = 1;
		$para['from_province_id'] = 1;
		$para['from_city_id'] = 1;
		$para['z'] = 2;
		$para['order_id'] = 2;
		$hotList = D('Line')->rList($para, 5);
		$this->assign('hotList', $hotList['data']);
	
		// 产品常量
		$product = array();
		$product['z'] = 2;
		$product['name'] = '国内游';
		$product['type'] = '国内';
		$product['typeAbb'] = 'gn';
		$this->assign('product', $product);
		
		$this->assign('headTitle', $product['name']);
		$this->display('../Tour/Tpl/Line/productIndex.html');
	}
	
	// 出境游首页
	public function chujing() {
		// 获取线路主题
		$pointTypeList = D('PointType')->rList();
		$this->assign('pointTypeList', $pointTypeList);
		
		// 获取省份景点列表
		$provinceList = D('Province')->rList(3);
		$pointList = D('Point')->rListByProvinceList('chujing', '`id`,`name_abb`,`province_id`', '`count` DESC');
		foreach($pointList as $item) {
			foreach($provinceList as $key => $item2) {
				if (count($provinceList[$key]['point']) >= 9) continue;
				if ($item['province_id'] == $item2['id']) {
						$item['name_abb'] = mb_substr($item['name_abb'], 0, 5, 'utf-8');
						$provinceList[$key]['point'][] = $item;
						break;
				}
			}
		}
		$this->assign('provinceList', $provinceList);
		
		// 获取推荐线路
		$recommendList = array();
		$recommendS = D('Const')->r('cj_recommend');
		$recommendA = split(';', $recommendS);
		foreach($recommendA as $item) {
			if (empty($item)) continue;
			$s = split(',', $item);
			$recommendList[] = array();
			$cnt = count($recommendList);
			$recommendList[$cnt-1]['id'] = $s[0];
			$recommendList[$cnt-1]['name'] = $s[1];
		}
		$this->assign('recommendList', $recommendList);
		
		// 获取特价线路
		$specialList = array();
		$specialS = D('Const')->r('cj_special');
		$specialA = split(';', $specialS);
		foreach($specialA as $item) {
			if (empty($item)) continue;
			$s = split(',', $item);
			$specialList[] = array();
			$cnt = count($specialList);
			$specialList[$cnt-1]['id'] = $s[0];
			$specialList[$cnt-1]['name'] = $s[1];
			$specialList[$cnt-1]['price'] = $s[2];
		}
		$this->assign('specialList', $specialList);
		
		// 获取热门线路
		$para = array();
		$para['type_id'] = 1;
		$para['from_province_id'] = 1;
		$para['from_city_id'] = 1;
		$para['z'] = 3;
		$para['order_id'] = 2;
		$hotList = D('Line')->rList($para, 5);
		$this->assign('hotList', $hotList['data']);
	
		// 产品常量
		$product = array();
		$product['z'] = 3;
		$product['name'] = '出境游';
		$product['type'] = '出境';
		$product['typeAbb'] = 'cj';
		$this->assign('product', $product);
		
		$this->assign('headTitle', $product['name']);
		$this->display('../Tour/Tpl/Line/productIndex.html');
	}
	
	// 班级游首页
	public function banji() {
		// 获取线路主题
		$pointTypeList = D('PointType')->rList();
		$this->assign('pointTypeList', $pointTypeList);
		
		// 获取省份列表
		$provinceZB = D('Province')->rList(1);
		$provinceGN = D('Province')->rList(2);
		$this->assign('provinceZB', $provinceZB);
		$this->assign('provinceGN', $provinceGN);
		
		// 获取特色标签
		$tagList = D('LineTag')->rList();
		$this->assign('tagList', $tagList);
		
		// 获取推荐线路
		$recommendList = array();
		$recommendS = D('Const')->r('bj_recommend');
		$recommendA = split(';', $recommendS);
		foreach($recommendA as $item) {
			if (empty($item)) continue;
			$s = split(',', $item);
			$recommendList[] = array();
			$cnt = count($recommendList);
			$recommendList[$cnt-1]['id'] = $s[0];
			$recommendList[$cnt-1]['name'] = $s[1];
		}
		$this->assign('recommendList', $recommendList);
		
		// 获取特价线路
		$specialList = array();
		$specialS = D('Const')->r('bj_special');
		$specialA = split(';', $specialS);
		foreach($specialA as $item) {
			if (empty($item)) continue;
			$s = split(',', $item);
			$specialList[] = array();
			$cnt = count($specialList);
			$specialList[$cnt-1]['id'] = $s[0];
			$specialList[$cnt-1]['name'] = $s[1];
			$specialList[$cnt-1]['price'] = $s[2];
		}
		$this->assign('specialList', $specialList);
		
		// 获取热门线路
		$para = array();
		$para['type_id'] = 2;
		$para['from_province_id'] = 1;
		$para['from_city_id'] = 1;
		$para['order_id'] = 2;
		$hotList = D('Line')->rList($para, 5);
		$this->assign('hotList', $hotList['data']);
	
		// 产品常量
		$product = array();
		$product['z'] = 4;
		$product['name'] = '班级游';
		$product['type'] = '班级';
		$product['typeAbb'] = 'bj';
		$this->assign('product', $product);
		
		$this->assign('pointTypeList', $pointTypeList);
		$this->assign('headTitle', $product['name']);
		$this->display('../Tour/Tpl/Line/productIndex.html');
	}
	
	// 线路搜索（返回线路数量）
	public function searchNum($s = '') {
		if (empty($s)) die();
		// 分解参数
		$data = array();
		$arr = split('&', $s);
		foreach($arr as $item) {
			$para = split('=', $item);
			$data[$para[0]] = $para[1];
		}
		$data['only_count'] = 1;
		$num = $this->search($data);
		return $num;
	}
	
	// 线路搜索页面
	public function search($data = array()) {
		if (!empty($data)) $_GET = $data;
		// 处理参数
		$para['type_id'] = $this->_get('line_type')+1;
		if ($this->_get('t') == 3) $para['type_id'] = 2;
		$para['from_province_id'] = 1;
		$para['from_city_id'] = 1;
		$para['to_province_id'] = $this->_get('province');
		$para['to_city_id'] = $this->_get('city');
		$para['duration_id'] = 	$this->_get('duration');
		$para['point_type_id'] = $this->_get('point_type');
		$para['point_id'] = $this->_get('point');
		$para['sort_id'] = $this->_get('sort');
		$para['begin_date'] = $this->_get('begin_date');
		$para['end_date'] = $this->_get('end_date');
		$para['order_id'] = $this->_get('sort');
		$para['begin_price'] = $this->_get('begin_price');
		$para['end_price'] = $this->_get('end_price');
		$para['page'] = $this->_get('page');
		$para['z'] = $this->_get('z');
		$para['tag_id'] = $this->_get('tag');
		$para['only_count'] = $this->_get('only_count');
		
		// 是否只获取数量
		if ($para['only_count']) {
			$count = (int)D('Line')->rList($para);
			return $count;
		}
		
		// 获取景点类型
		$this->pointTypeList = D('PointType')->rList();
		
		// 搜索结果
		$lineList = D('Line')->rList($para);
		$lineCount = (int)$lineList['count'][0]['count'];
		$linePage = ceil($lineCount/10);
		$lineList = $lineList['data'];
		foreach($lineList as $id => $item) {
			// 获取团期
			$lineList[$id]['schedule'] = D('LineSchedule')->rByLineIdDate($item['id'], getCntDate(), 7);
			// 格式化信息
			$lineList[$id] = $this->format($lineList[$id]);
		}
		
		// 处理过滤器显示
		$filter = array();
		$filter['showType'] = true;
		$filter['showTime'] = true;
		$filter['showDuration'] = true;
		$filter['showProvince'] = true;
		$filter['showCity'] = true;
		$filter['showPointType'] = true;
		$filter['showHotPoint'] = true;
		
		// 获取目的省份
		$cntProvince = D('Province')->rName($para['to_province_id']);
		if (!empty($para['z'])) {
			$provinceList = D('Province')->rList($para['z']);
		}

		// 获取目的城市
		$cntCity = D('City')->rName($para['to_province_id'], $para['to_city_id']);
		if (!empty($cntProvince)) {
			if (empty($cntCity)) {
				$cntCity = $cntProvince;
				$filter['showHotPoint'] = false;
			}
			$cityList = D('City')->rList($para['to_province_id']);
		}

		// 传递form信息，用于页面显示
		$form = $_GET;
		
		// 标题
		if (empty($form['province'])) {
			if (empty($para['z'])) 
				$headTitle = '国内旅游';
			else
			if ($para['z'] == 1)
				$headTitle = '上海周边游';
			else
			if ($para['z'] == 2)
				$headTitle = '国内游';
			else
			if ($para['z'] == 3)
				$headTitle = '出境游';
		}
		if (!empty($form['province']))
			$headTitle = $cntProvince.'旅游';
		if (!empty($form['province']) && !empty($form['city']))
			$headTitle .= '__'.$cntCity.'旅游';
		if (!empty($form['point_type']))
			$headTitle .= '__'.$this->pointTypeList[$form['point_type']-1]['name'].'游'; 
			
		// 搜索类型特殊处理
		if ($this->_get('t') == NULL || $this->_get('t') == 0) {
			if (!empty($cntProvince))
				$filter['showProvince'] = false;
		}
		if ($this->_get('t') == 1) {
			$headTitle = $this->pointTypeList[$form['point_type']-1]['name'].'游';
			$filter['showCity'] = false;
			$filter['showPointType'] = false;
			$filter['showHotPoint'] = false;
		}
		if ($this->_get('t') == 2) {
			$point = D('Point')->r($this->_get('point'));
			$headTitle = "上海到".$point['name'].'旅游';
			$this->assign('point', $point);
			$filter['showCity'] = false;
			$filter['showPointType'] = false;
			$filter['showHotPoint'] = false;
			$filter['showProvince'] = false;
		}	
		if ($this->_get('t') == 3) {
			$headTitle = "班级游";
			$filter['showType'] = false;
			$filter['showTime'] = false;
		}
		
		if ($para['duration_id'] == 1) $duration = '一日游';
		if ($para['duration_id'] == 2) $duration = '二日游';
		if ($para['duration_id'] == 3) $duration = '三日游';
		if ($para['duration_id'] == 4) $duration = '四到六日游';
		if ($para['duration_id'] == 5) $duration = '七到九日游';
		if ($para['duration_id'] == 6) $duration = '十日及以上游';
		if ($para['duration_id'] == 7) $duration = '多日游';
		if ($para['duration_id'] == 8) $duration = '七日及以上游';
		if ($this->_get('t') == 4) {
			$headTitle = "上海出发".$duration;
			$this->assign('duration', $duration);
			$filter['showDuration'] = false;
			$filter['showCity'] = false;
			$filter['showHotPoint']= false;
		}
		if ($this->_get('t') == 5) {
			$headTitle = "班级".$duration;
			$this->assign('duration', $duration);
			$filter['showDuration'] = false;
			$filter['showCity'] = false;
			$filter['showHotPoint']= false;
			$filter['showTime']= false;
			$filter['showProvince']= false;
			$filter['showType']= false;
		}
		if ($this->_get('t') == 6) {
			if ($this->_get('z') == 1)
				$headTitle = "班级周边游";
			if ($this->_get('z') == 2)
				$headTitle = "班级国内游";
			if ($this->_get('z') == 3)
				$headTitle = "班级出境游";
			if (!empty($cntProvince)) {
				$headTitle = "班级".$cntProvince."游";
				$filter['showProvince']= false;
			}
			$this->assign('duration', $duration);
			$filter['showCity'] = false;
			$filter['showHotPoint']= false;
			$filter['showTime']= false;
			$filter['showType']= false;
		}
		if ($this->_get('t') == 7) {
			$headTitle = '班级'.$this->pointTypeList[$form['point_type']-1]['name'].'游';
			$filter['showCity'] = false;
			$filter['showPointType'] = false;
			$filter['showHotPoint'] = false;
			$filter['showType'] = false;
			$filter['showTime'] = false;
			$filter['showProvince'] = false;
		}
		if ($this->_get('t') == 8) {
			$tagList = D('LineTag')->rList();
			$headTitle = $tagList[$form['tag']-1]['name'].'特色游';
			$filter['showCity'] = false;
			$filter['showPointType'] = false;
			$filter['showHotPoint'] = false;
			$filter['showType'] = false;
			$filter['showTime'] = false;
			$filter['showProvince'] = false;
		}
		
		// 获取热门景点
		if ($filter['showHotPoint'])
			$pointList = D('Point')->rList($para['to_province_id'], $para['to_city_id']);
		
		$this->assign('filter', $filter);
		$this->assign('lineList', $lineList);
		$this->assign('cntCity', $cntCity);
		$this->assign('cntProvince', $cntProvince);
		$this->assign('provinceList', $provinceList);
		$this->assign('cityList', $cityList);
		$this->assign('pointList', $pointList);
		$this->assign('pointTypeList', $this->pointTypeList);
		$this->assign('durationList', $durationList);
		$this->assign('lineCount', $lineCount);
		$this->assign('linePage', $linePage);
		$this->assign('form', $form);
		$this->assign('headTitle', $headTitle);
		$this->display();
	}

	// 格式化线路信息
	public function format($line) {
		// TODO
		// 处理旅游类型
		switch($line['type_id']) {
			case '1': $line['type'] = '跟团游'; $line['unit'] = '人次'; break;
			case '2': $line['type'] = '团队游'; $line['unit'] = '个团队'; break;
			case '3': $line['type'] = '自助游'; $line['unit'] = '人次'; break;
		}
		// 处理线路类型
		if (empty($this->pointTypeList)) $this->pointTypeList = D('PointType')->rList();
		$line['point_type'] = split(',', $line['point_type_id']);
		foreach($line['point_type'] as $id => $item) {
			if (empty($item))
				unset($line['point_type'][$id]);
			else
				$line['point_type'][$id] = $this->pointTypeList[$item-1];
		}
		// 处理团期
		$weekArray = array('日', '一', '二', '三', '四', '五', '六');
		foreach($line['schedule'] as $id => $item) {
			$line['schedule'][$id]['date2'] = date('m/d', strtotime($item['date']));
			$line['schedule'][$id]['week'] = $weekArray[date('w', strtotime($item['date']))];
			$line['schedule'][$id]['year'] = date('Y', strtotime($item['date']));
			$line['schedule'][$id]['month'] = date('m', strtotime($item['date']));
			$line['schedule'][$id]['day'] = date('d', strtotime($item['date']));
		}

		$pointIDList = array();
		foreach($line['day'] as $id => $item) {
			$line['day'][$id]['city'] = split(',', $item['city']);
			$line['day'][$id]['vehicle'] = split(',', $item['vehicle']);
			$line['day'][$id]['cityCount'] = count($line['day'][$id]['city']);

			foreach($item['item'] as $id2 => $item2) {
				$line['day'][$id]['item'][$id2]['relate_point_id'] = split(',', $item2['relate_point_id']);
				foreach($line['day'][$id]['item'][$id2]['relate_point_id'] as $pointID) {
					if ($pointID != '0')
						$pointIDList[] = $pointID;
				}
			}
		}
		
		// 将景点信息加入
		/*
		$pointList = D('Point')->rByList($pointIDList);
		foreach($line['day'] as $id => $item) {
			foreach($item['item'] as $id2 => $item2) {
				$line['day'][$id]['item'][$id2]['point'] = array();
				foreach($item2['relate_point_id'] as $pointID) {
					foreach($pointList as $point) {
						if ($pointID == $point['id'])
							$line['day'][$id]['item'][$id2]['point'][] = $point;
					}
				}
			}
		}
		*/

		// 获取省市信息
		$cityList = split(';', $line['to_city_id']);
		$cityList = split(',', $cityList[1]);
		$provinceId = $cityList[0];
		$cityId = $cityList[1];
		$line['to_province_id'] = $provinceId;
		$line['to_city_id'] = $cityId;
		$line['to_province'] = D('Province')->rName($provinceId);
		$line['to_city'] = D('City')->rName($provinceId, $cityId);
		$line['point_in_city'] = D('Point')->rByCity($provinceId, $cityId);
		foreach($line['point_in_city'] as $id => $item) {
			if (strlen($item['name_abb']) <= 15) 
				$line['point_in_city'][$id]['name_display'] = $item['name_abb'];
			else
				$line['point_in_city'][$id]['name_display'] = substr($item['name_abb'], 0, 15).'..';
		}

		return $line;
	}

	// 获取线路列表（按类型）
	public function getTypeLineList() {
		$para = array();
		$para['type_id'] = 1;
		$para['from_province_id'] = 1;
		$para['from_city_id'] = 1;
		$para['z'] = (int)$this->_post('z');
		$para['point_type_id'] = (int)$this->_post('type_id');
		$para['point_type_id_t'] = 1;
		$para['order_id'] = 7;
		if ($this->_post('z') == 4) {
			$para['type_id'] = 2;
			unset($para['z']);
		}
		$lineList = D('Line')->rList($para);
		$lineList = $lineList['data'];
		foreach($lineList as $key => $item) {
			$lineList[$key]['schedule'] = D('LineSchedule')->rByLineIdDate($item['id'], getCntDate(), 7);
			$lineList[$key] = $this->format($lineList[$key]);
		}
		$this->ajaxReturn($lineList);
	}

	// 抓数据
	public function readData() {
		set_time_limit(0);
		$dir = '../Data';
		$handle = opendir($dir);
		while($file = readdir($handle)) {
			if (($file == '.') || ($file == '..')) continue;
			$this->doData($dir.'/'.$file);
		}
		closedir($handle); 
	}

	// 抓数据2
	private function doData($url) {
		$url2 = iconv("gb2312", "UTF-8", $url);
		$dataDo = D('DataCompleted');
		$tot = count($dataDo->where('`name`=\''.$url2.'\'')->select());
		if ($tot > 0) {
			echo '已存在：'.$url2.'<br>';
			return;
		}
		$dataDo->query('INSERT INTO `tour`.`tour_data_completed` (`id`, `name`) VALUES (NULL, \''.$url2.'\');');
	
		$file = file_get_contents($url);
		$data['name'] = $this->findItem($file, '&lt;', '&gt;', '<div class="tours_title">');
		$data['type_id'] = 1;
		$data['character'] = $this->findItem($file, '&gt;', '</a>', '<div class="tours_title">');
		$data['price'] = (int)$this->findItem($file, '<em class="tnPrice">', '</em>', '<dt>途牛价：</dt>');
		$data['from_province_id'] = 1;
		$data['from_city_id'] = 1;
		$data['satisfaction'] = (int)$this->findItem($file, '<span class="f_f60 mr_10">', '%</span>', '<dt>满意度：</dt>');
		$data['comment_count'] = (int)$this->findItem($file, '<em class="f_f60">', '</em>', '<dt>满意度：</dt>');
		$data['sell_count'] = $data['comment_count']*5+rand()%$data['comment_count'];
		$data['day_ahead'] = (int)$this->findItem($file, '建议提前', '天以上', '<dt>满意度：</dt>');
		$data['introduction'] = $this->findItem($file, '<div class="mRec_con">', '</div>', '<h3 class="mRec_title">产品经理推荐</h3>');
		$data['price_include'] = $this->findItem($file, '</h3>', '<h3>费用不包含', '<h3>费用包含');
		$data['price_not_include'] = $this->findItem($file, '</h3>', '<h3>自费项目', '<h3>费用不包含');
		$data['price_origin'] = (int)($data['price']*1.2);
		$data['price_group_origin'] = (int)($data['price']*1.6);
		$data['price_group_1'] = (int)($data['price']*1.4);
		$data['price_group_2'] = (int)($data['price']*1.2);
		$data['price_group_3'] = (int)$data['price'];
		
		// 随机生成景点编号
		$totPoint = 5;
		$data['point_id'] = '';
		for ($i = 1; $i <= $totPoint; $i++) {
			if (rand()%$totPoint == 1) $data['point_id'] .= $i.',';
			if (strlen($data['point_id'])>=6) break;
		}
		if (empty($data['point_id'])) $data['point_id'] .= (rand()%$totPoint+1).',';
		// 随机生成景点类型编号
		$totPointType = 5;
		$data['point_type_id'] = '';
		for ($i = 1; $i <= $totPointType; $i++) {
			if (rand()%$totPointType == 1) $data['point_type_id'] .= $i.',';
			if (strlen($data['point_id'])>=6) break;
		}
		if (empty($data['point_type_id'])) $data['point_type_id'] .= (rand()%$totPointType+1).',';		
		// 获取去往省份信息
		$tw = $this->findItem($file, '/">', '旅游</a>', '<p class="crumbs">', 0, true);
		$provinceName = $this->findItem($file, '/">', '旅游</a>', '', $tw);
		$province = D('Province')->rByName($provinceName);
		if (empty($province)) {
			D('')->query('INSERT INTO `tour`.`tour_province` (`id`, `name`, `count`) VALUES (NULL, \''.$provinceName.'\', \'0\');');
			$province = D('Province')->rByName($provinceName);
		}
		$data['to_province_id'] = (int)$province['id'];
		// 获取去往城市信息
		$tw = $this->findItem($file, '/">', '旅游</a>', '', $tw, true);
		$cityName = $this->findItem($file, '/">', '旅游</a>', '', $tw);
		$city = D('City')->rByName($cityName);
		if (empty($city)) {
			$tot = count(D('City')->rList($data['to_province_id']));
			D('')->query('INSERT INTO `tour`.`tour_city` (`id`, `province_id`, `name`, `count`) VALUES (\''.($tot+1).'\', \''.$data['to_province_id'].'\', \''.$cityName.'\', \'0\');');
			$city = D('City')->rByName($cityName);
		}
		$data['to_city_id'] = (int)$city['id'];
		// 几日游
		$durationText = $this->findItem($data['name'], '', '日游');
		$data['duration'] = '';
		for ($i = strlen($durationText)-1; $i >= 0; $i--) {
			if (!is_numeric($durationText[$i])) break;
			$data['duration'] = $durationText[$i].$data['duration'];
		}
		// 出发日期
		$goDateText = $this->findItem($file, '<ul class="s_list">', '</ul>', '请选择出发日期</p>');
		$tot = 1;
		$tw = 0;
		while (1) {
			$date = $this->findItem($goDateText, '">', '(', '', $tw);
			$tw = $this->findItem($goDateText, '">', '(', '', $tw, true);
			$data['schedule'][$tot] = '2013-'.trim($date);
			$flag = isDate($data['schedule'][$tot], 'Y-m-d');
			if(empty($flag)) {
				unset($data['schedule'][$tot]);
				break;
			}
			$tot++;
		}
		
		// 插入数据！
		
		// tour_line
		$lineDo = D('Line');
		$tot = count($lineDo->select());
		$data['id'] = 100000+$tot+1;
		$lineDo->create($data);
		$id = $lineDo->add();
		if (empty($id)) {
			echo 'ERROR: tour_line<br>';
			die();
		}
		
		// tour_line_content
		$lineContentDo = D('LineContent');
		$lineContentDo->create($data);
		$id = $lineContentDo->add();
		if (empty($id)) {
			echo 'ERROR: tour_line_content<br>';
			die();
		}
		
		// tour_line_schedule
		$lineScheduleDo = D('LineSchedule');
		foreach($data['schedule'] as $id => $item) {
			$tmp = array();
			$tmp['id'] = $id;
			$tmp['line_id'] = $data['id'];
			$tmp['date'] = $item;
			$lineScheduleDo->create($tmp);
			$tt = $lineScheduleDo->add();
			if (empty($tt)) {
				echo 'ERROR: tour_line '.$id.'<br>';
				die();
			}
		}
		
		// 保存图片
		$data['photoUrl'] = $this->findItem($file, 'data-src="', '"', '<div class="tour_img">');
		$photo = file_get_contents($data['photoUrl']);
		file_put_contents('./images/line/photo/'.$data['id'].'.jpg', $photo);
	
		echo '已完成：'.$url2.'<br>';
	}
	
	// 抽取信息
	private function findItem($s, $prev, $next, $ahead = '', $ahead_w = 0, $retW = false) {
		$totW = 0;
		if (empty($ahead_w))
			$w = (int)strpos($s, $ahead)+strlen($ahead);
		else
			$w = $ahead_w;
		$totW += $w;
		$s = substr($s, $w);
		$w = (int)strpos($s, $prev)+strlen($prev);
		$totW += $w;
		$s = substr($s, $w);
		$w = (int)strpos($s, $next);
		$totW += $w+strlen($next);
		
		if ($retW)
			return $totW;
		
		$ret = '';
		for($i = 0; $i < $w; $i++)
			$ret .= $s[$i];
		return $ret;
	}
	
	// 制造假数据
	public function fakeDataGenerate() {
		$totSatis = 0;
		$totSell = 0;
		$lineList = D('Line')->rAllList();
		foreach($lineList as $item) {
			$item['satisfaction'] = 93+rand()%7;
			$base = 50+rand()%10;
			$item['sell_count'] = $base*(6-$item['duration'])+rand()%10;
			$data = array();
			$data['id'] = $item['id'];
			$data['satisfaction'] = $item['satisfaction'];
			$data['sell_count'] = $item['sell_count'];
			$totSell += $data['sell_count'];
			$totSatis += $data['satisfaction'];
			D('Line')->u($data);
			dump($item);
		}
		D('Const')->u('satisfaction', ceil($totSatis/count($lineList)));
		D('Const')->u('sell_count', $totSell);
	}
}