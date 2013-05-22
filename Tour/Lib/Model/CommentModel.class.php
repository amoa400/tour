<?php

class CommentModel extends Model {
	// 新增评论
	public function c($data = 0) {
		if (empty($data)) $data = $_POST;
		if ( $this->create( $data ) ) {
			$ret = $this->add();
			return $ret;
		} else {
			return $this->getError();
		}
	}
	
	// 获取评论信息
    public function r($id = 0){
		$sql = array('id' => (int)$id);
		$comment = $this->where($sql)->find();
		return $comment;
    }
	
	// 更新评论信息
	public function u($data = 0) {
		if (empty($data)) return;
		$comment = $this->save( $data );
		return $comment;
	}
	
	// 获取评论信息（列表）
	public function rList($product_type = 0, $product_id = 0, $page = 1, $limit = 10) {
		$sql = array();
		$sql['product_type'] = $product_type;
		$sql['product_id'] = $product_id;
		$sql['reply_id'] = 0;
		$commentList = array();
		$commentList['count'] = $this->where($sql)->count();
		$commentList['data'] = $this->where($sql)->page($page)->limit($limit)->order('`time` DESC')->select();
		return $commentList;
	}
	
	// 删除评论
	public function d($id = 0) {
		$comment = $this->delete((int)$id);
		return $comment;
	}
	
	// 删除假评论（通过产品）
	public function dFakeByProduct($product_type = 0, $product_id = 0) {
		$sql['product_type'] = $product_type;
		$sql['product_id'] = $product_id;
		$sql['user_id'] = array('LT', 10000);
		$comment = $this->where($sql)->delete();
		return $comment;
	}
}