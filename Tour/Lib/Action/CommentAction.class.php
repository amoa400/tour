<?php

class CommentAction extends Action {
	// 查看某条点评
	public function show() {
		$id = $this->_get('id');
		$comment = D('Comment')->r($id);
		$comment = $this->format($comment);
		$this->assign('comment', $comment);
		$this->display();
	}
	
	// 查看点评列表
	public function showList() {
		$type = $this->_get('type');
		$id = $this->_get('id');
		$cntPage = $this->_get('page');
		if ($type == 1) {
			$line = D('Line')->r($id);
			$this->assign('title', $line['name']);
			$this->assign('line', $line);
		} else {
			$point = D('Point')->r($id);
			$this->assign('title', $point['name']);
			$this->assign('point', $point);
		}
		$this->assign('cntPage', $cntPage);
		$this->assign('type', $type);
		$this->assign('id', $id);
		$this->display();
	}

	// 抓取驴妈妈数据
	public function generate($parms = array()) {
		set_time_limit(0);
		// 处理参数
		if (empty($parms)) $parms = $_GET;
		$product_type = $parms['product_type'];
		$product_id = $parms['product_id'];
		$lvmamaId = $parms['lvmamaId'];
		$totPage = 20;
		if (!empty($parms['totPage'])) $totPage = $parms['totPage'];
		$count = 0;
		$totsa = 0;

		// 删除之前的假数据
		D('Comment')->dFakeByProduct($product_type, $product_id);
	
		// 抓取驴妈妈数据
		// 对每页进行处理
		for ($i = $totPage; $i >= 1; $i--) {
			// 获取当页评论列表
			if ($product_type == 1)
				$url = 'http://www.lvmama.com/comment/getProductList.do?productId='.$lvmamaId.'&productPage='.$i;
			else
				$url = 'http://www.lvmama.com/comment/listCmtsOfDest!getAllComments.do?placeId='.
				$lvmamaId.'&allCommentsCurrentPage='.$i;
			
			$page = file_get_contents($url);
			preg_match_all('/<a href="(.*)" target="_blank" class="c_w_more">查看全文&gt;&gt;/', $page, $matches);
			$matches = $matches[1];
			if (empty($matches)) continue;
			
			// 倒序
			$tmp = $matches;
			$len = count($tmp);
			for ($j = 0; $j < $len; $j++)
				$matches[$j] = $tmp[$len-$j];

			foreach($matches as $url) {
				if (((rand()%(100))+1) < $i) continue;
				
				// 获取评论内容
				if (!strstr($url, 'http://'))
					$url = 'http://www.lvmama.com/'.$url;
				$page = file_get_contents($url);
				preg_match('/<div class="u_comment">(.*)<!--u_comment end-->/sU', $page, $comment);
				$comment = $comment[0];
				
				preg_match('/<img src="(.*)" width="76" height="76"/sU', $comment, $photo);
				preg_match('/<span>(.*)<\/span>/sU', $comment, $username);
				$username[1] = trim($username[1]);
				preg_match('/<i class="ct_Star(.*)"><\/i>/sU', $comment, $satisfaction);
				preg_match('/<dd id="shareID" class="c_comctext">(.*)<\/dd>/sU', $comment, $content);
				preg_match('/<small>(.*)<\/small>/sU', $comment, $time);

				$data = array();
				$data['user_id'] = '';
				//if (!strstr($photo[1], '.gif')) {
				//	for ($j = 0; $j < 4 ; $j++) $data['user_id'] .= rand()%9+1;
				//	$img = file_get_contents($photo[1]);
				//	file_put_contents('./images/user/photo/'.$data['user_id'].'.jpg', $img);
				//}
				//else {
				if (rand()%10 <= 4) $data['user_id'] = 0;
				else $data['user_id'] = rand()%76;
				//}
				$data['user_name'] = $username[1];
				if (strstr($data['user_name'], 'lv') || strstr($data['user_name'], 'user')) {
					$len = 5+(rand()%5);
					$data['user_name'] = '';
					for ($j = 0; $j < $len; $j++) {
						if ($j < 3 || rand()%5 != 0) $data['user_name'] .= chr(ord('a')+rand()%26);
						else $data['user_name'] .= chr(ord('0')+rand()%10);
					}
				}
				$data['product_type'] = $parms['product_type'];
				$data['product_id'] = $parms['product_id'];
				$data['content'] = $content[1];
				if (strstr($data['content'], '驴') || strstr($data['content'], 'lv')) continue;
				$data['time'] = timeToInt($time[1]);
				$data['satisfaction'] = (int)$satisfaction[1];
				if ($data['satisfaction'] <= 0) $data['satisfaction'] = 4;
				if ($data['satisfaction'] > 5) $data['satisfaction'] = 5;
				$t = D('Comment')->c($data);
				if ($t) {
					$count++;
					$totsa += $data['satisfaction'];		
				}
			}
		}

		$data = array();
		$data['id'] = $parms['product_id'];
		$data['comment_count'] = $count;
		$data['satisfaction'] = ceil($totsa/$count/5*100);
		$data['sell_count'] = $count*10+(rand()%100);
		dump($data);
		if ($product_type == 1) D('Line')->u($data);
		else D('Point')->u($data);
	}
	
	// 格式化
	public function format($comment = 0) {
		$comment['time'] = intToTime($comment['time']);
		return $comment;
	}

}