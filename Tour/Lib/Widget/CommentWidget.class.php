<?php

class CommentWidget extends Action {

	public function wShowList($type = 0, $id = 0, $page = 1, $limit = 5, $showPagination = 0) {
		$commentList = D('Comment')->rList($type, $id, $page, $limit);
		$commentCount = $commentList['count'];
		$commentList = $commentList['data'];
		foreach($commentList as $key => $item) {
			$commentList[$key] = A('Comment')->format($item);
		}
		$totPage = ceil($commentCount/$limit);
		$this->assign('commentList', $commentList);
		$this->assign('commentCount', $commentCount);
		$this->assign('showPagination', $showPagination);
		$this->assign('totPage', $totPage);
		$this->display('Comment:wShowList');
	}
}