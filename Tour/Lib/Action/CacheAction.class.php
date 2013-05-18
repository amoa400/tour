<?php

class CacheAction extends Action {
	
	public $url = '';
	public $tpl = '';
	public $parms = '';
	public $expire = 86400;
	public $tvar = '';
	public $count = 0;
	public $index = 0;
	public $ctArr = array();
	
	// 记录内容
	public function record($content) {
		$this->ctArr[] = $content[0];
		return '<!--nocache '.(int)($this->count++).'-->';
	}
	
	// 写回内容
	public function write() {
		return $this->ctArr[$this->index++];
	}

	// 获取文件名称
	public function getFileName($url = '', $parms = '', $type = 0) {
		if (empty($url)) $url = $this->url;
		if (empty($parms)) $parms = $this->parms;
		// 缓存后的文件名称
		if ($type == 0)
			$filename = APP_PATH.'Tpl/Cache/'.$url;
		// 缓存过程中临时储存的文件名称
		if ($type == 1)
			$filename = APP_PATH.'Tpl/Cache/Runtime/'.$url;
		// 原始模板名称
		if ($type == 2) {
			if (!empty($this->tpl)) $url = $this->tpl;
			$filename = APP_PATH.'Tpl/'.$url.'.html';
			return $filename;
		}
		if (!empty($parms)) {
			$data = array();
			if (!is_array($parms)) {
				$parmArr = split('&', $parms);
				foreach($parmArr as $item) {
					$tArr = split('=', $item);
					$cnt = count($data);
					$data[$cnt]['key'] = $tArr[0];
					$data[$cnt]['value'] = $tArr[1];
				}
			}
			else {
				foreach($parms as $key => $item) {
					$cnt = count($data);
					$data[$cnt]['key'] = $key;
					$data[$cnt]['value'] = $item;
				}
			}
			// 最小表示法
			for ($i = 0; $i < count($data)-1; $i++)
				for ($j = $i+1; $j < count($data); $j++)
					if ($data[$i]['key'] > $data[$j]['key']) {
						$t = $data[$i];
						$data[$i] = $data[$j];
						$data[$j] = $t;
					}
			// 设定名称
			$filename .= '/';
			for ($i = 0; $i < count($data)-1; $i++) {
				if ($i != 0) $filename .= '_';
				$filename .= $data[$i]['key'].'_'.$data[$i]['value'];
			}
			
		}
		$filename .= '.html';
		return $filename;
	}	
	
	// 检测文件是否被缓存
	public function isCached($url = '', $parms = '', $expire = '') {
		if (!C('PAGE_CACHE')) return false;
		if (empty($url)) $url = $this->url;
		if (empty($parms)) $parms = $this->parms;
		if (empty($expire)) $expire = $this->expire;
		// 获取文件名称
		$filename = $this->getFileName($url, $parms);
		if (file_exists($filename)) {
			// 检查是否过期
			$cntTime = getTime();
			$fileTime = filemtime($filename);
			if ($cntTime - $fileTime > $expire) {
				unlink($filename);
				return false;
			}
			else return true;
		}
		else return false;
	}

	// 显示文件
	public function showPage($url = '', $parms = '') {
		if (empty($url)) $url = $this->url;
		if (empty($parms)) $parms = $this->parms;
		$filename = $this->getFileName($url, $parms);
		$this->display($filename);
		die();
	}
	
	// 缓存文件
	public function cachePage($url = '', $parms = '', $tvar = '') {
		if (!C('PAGE_CACHE')) return;
		if (empty($url)) $url = $this->url;
		if (empty($parms)) $parms = $this->parms;
		if (empty($tvar)) $tvar = $this->tvar;

		// 生成临时文件
		$originFilename = $this->getFileName($url, $parms, 2);
		tag('view_begin',$originFilename);
		tag('view_template',$originFilename);
		$tpl = Think::instance('ThinkTemplate');
		$html = file_get_contents($tpl->loadTemplate($originFilename));
		$html = preg_replace_callback('/<!--nocache start-->.+<!--nocache end-->/sU', 'self::record', $html);
		$runtimeFilename = $this->getFileName($url, $parms, 1);
		recursiveMkdir(dirname($runtimeFilename));
		file_put_contents($runtimeFilename, $html);
		
		// 生成缓存文件
		ob_start();
        ob_implicit_flush(0);
		$tpl->fetch($runtimeFilename, $tvar);
        $html = ob_get_clean();
		tag('view_filter', $html);
		$html = preg_replace_callback('/<!--nocache .+-->/sU', 'self::write', $html);
		$cacheFilename = $this->getFileName($url, $parms);
		recursiveMkdir(dirname($cacheFilename));
		file_put_contents($cacheFilename, $html);
	}
}