<?php
//header("Content-Type: text/html; charset=GBK");
define('JACCOUNT_KEY_ROOT','./ThinkPHP/Extend/Vendor/Jaccount');
session_start();

function postRequest($url,$data=null,$cookie=null,$gbk=true)
{
    if (is_array($data))
    {
       ksort($data);
       $data = http_build_query($data);
    }
    if(is_array($cookie))
    {
        $str = '';
        foreach ($cookie as $key => $value){
            $str .= $key.'='.$value.'; ';
        }
        $cookie = substr($str,0,-1);
     }
    $opts = array(
       'http'=>array(
       'method'=>"POST",
       'header'=>"Content-type: application/x-www-form-urlencoded\r\n".
                  "Content-length:".strlen($data)."\r\n" . 
                  "Cookie: ".$cookie."\r\n" . 
                  "\r\n",
       'content' => $data,
       )
    );
    $context = stream_context_create($opts);
    $ret = file_get_contents($url, false, $context);
	if ($gbk) $ret = mb_convert_encoding($ret, "UTF-8", "GBK");
    return $ret;
}

function join_cookie($cook)
{
    $d = Array();
    foreach( $cook as $k=>$v )
    {
		$d[] =$k."=".$v;
    }
    $data = implode(";",$d);
	return $data;
}

function join_post($cook)
{
 $fields_string='';
 foreach($cook as $key=>$value) { $fields_string .= urlencode($key).'='.$value.'&' ; }
 rtrim($fields_string ,'&') ;

 return $fields_string;
}

function catcha($url,$putout=1,&$post_data=array(),$cook=array(),$gbk=true)
{
		if ($putout) echo "\n<p/>";
		
		$ch = curl_init();
		// 设置 url
		curl_setopt($ch, CURLOPT_URL, $url);
		

		
		//cookie data
		curl_setopt($ch, CURLOPT_COOKIE, join_cookie($cook));
        
        // 页面内容我们并不需要
        curl_setopt($ch, CURLOPT_NOBODY, 0);
        // 返回HTTP header
        curl_setopt($ch, CURLOPT_HEADER, 1);
        // 返回结果，而不是输出它
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
		//post data
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$post_data);
		
		//重定向
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
		//执行！
        $output = curl_exec($ch);
		curl_close($ch);
        // 有重定向的HTTP头信息吗?
        if (preg_match("!Location: (.*)!", $output, $matches)) {
            //echo "redirects to $matches[1]\n<br>";

        } else {
            //echo "no redirection\n<br>";
        }
		

		
		if ($gbk) $result = mb_convert_encoding($output, "UTF-8", "GBK");
		else $result=$output;
		
		//echo join_cookie($cook);
		if ($putout) echo "$result\n<br>";
		return $result;
}
/*
function get_client_ip(){
   if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
       $ip = getenv("HTTP_CLIENT_IP");
   else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
       $ip = getenv("HTTP_X_FORWARDED_FOR");
   else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
       $ip = getenv("REMOTE_ADDR");
   else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
       $ip = $_SERVER['REMOTE_ADDR'];
   else
       $ip = "unknown";
   return($ip);
}
*/


class JAccountCrypt
{
    function JAccountCrypt(){
    }

    /* Function tripleDESEncrypt use 3DES to encrypt a string
    string is encoded to UTF8 first, encypted, then encoded to base64 if encodedForUrl is true
    $src: string, source string to be encrpyted with 3DES
    $key: string in bytes form, 3DES key
    $encodedForUrl: boolean, if src is URL, set $encodedForUrl to true */
    function tripleDESEncrypt($src, $key, $encodedForUrl)
    {
		//echo $src;
		//echo $key;
		
        if ($src == NULL) return NULL;

        $srcb =iconv("EUC-CN", "UTF-8", $src);
        $srcb= $this->PKCS5Padding($srcb);
		//echo $srcb; // TODO
		/* Encrypt data */
        $encryptedData = $this->tripleDESEncrypt1($srcb,$key);
		
        if ($encryptedData != NULL) {
            $encryptedData=base64_encode($encryptedData);
            //echo "base64 encoded:" . strlen($encryptedData)."|".bin2hex($encryptedData)."<br>\n";
            if ($encodedForUrl) {
                $encryptedData =urlencode($encryptedData);
            }
        }
        return $encryptedData;
    }

    /* Function tripleDESEncrypt1 use 3DES to encrypt a string
    $src: string, source string to be encrpyted with 3DES
    $key: string in bytes form, 3DES key  */
    function tripleDESEncrypt1($src, $key)
    {
		
        if ($src == NULL) return NULL;
        $iv =$this->my_mcrypt_create_iv();
        
		/* Open module, and create IV */
        $td = mcrypt_module_open(MCRYPT_3DES, '', 'cbc', '');
        if ($key == NULL) $key="";
        
		$key = substr($key, 0, mcrypt_enc_get_key_size($td));
		
		

        /* Initialize encryption handle */
        if (mcrypt_generic_init($td, $key, $iv) != -1) {
            /* Encrypt data */
            $encryptedData = mcrypt_generic($td, $src);
            $iv_size=mcrypt_get_iv_size(MCRYPT_3DES, MCRYPT_MODE_CBC);
            $encryptedData=chr($iv_size).$iv. $encryptedData;
            mcrypt_generic_deinit($td);
            //echo "src is:" . $src. "<br>\n";
            //echo "iv is :" .bin2hex($iv)."<br>\n";
            //echo "key is :" .bin2hex($key)."<br>\n";
        }else {
            $encryptedData=null ;
        }
        mcrypt_module_close($td);
        return $encryptedData;
    }


    function tripleDESDecrypt($src, $key)
    {
		//echo $src;
        if ($src == NULL) return NULL;
        $src=base64_decode($src);

        //dump( $src );
        $decryptedData = $this->tripleDESDecrypt1($src, $key);
        //dump( $decryptedData );
        if ($decryptedData != NULL) {
            //$decryptedData = iconv("GB2312", "UTF-8", $decryptedData);
        }
        //dump( $decryptedData );
        return $decryptedData;
    }

    function tripleDESDecrypt1($src, $key)
    {
        if ($src == NULL) return NULL;
        /* Open module, and create IV */
        $td = mcrypt_module_open(MCRYPT_3DES, '', 'cbc', '');
        if ($key == NULL) return NULL;
        $iv_size=ord($src);
        $iv=substr($src,1,$iv_size);
        $key = substr($key, 0, mcrypt_enc_get_key_size($td));
		
		

        /* Initialize encryption handle */
        if (mcrypt_generic_init($td, $key, $iv) != -1) {
            /* Encrypt data */
            $srcb=substr($src,$iv_size+1);
            $decryptedData = mdecrypt_generic($td, $srcb);
            mcrypt_generic_deinit($td);
            $decryptedData =$this->PKCS5UnPadding($decryptedData);
        }else {
            $decryptedData=null ;
        }
        mcrypt_module_close($td);

        return $decryptedData;
    }

    function hex2bin($HexStr) {
        return pack('H*', $HexStr);
    }

    /* Windows mycrypt_create _iv has bug, it always return the same value, so
    I create my own */
    function my_mcrypt_create_iv(){
        $size=mcrypt_get_iv_size(MCRYPT_3DES, MCRYPT_MODE_CBC);
        $iv=md5("me".rand().rand().rand());
        $iv=substr($this->hex2bin($iv),0,$size);
        return $iv;
    }

    function PKCS5Padding($Str,$Size=8){
        $strLen=strlen($Str);
        $n=fmod($strLen,$Size);
        $n=$Size-$n;
        return ($Str . str_repeat(chr($n),$n));
    }

    function PKCS5UnPadding($Str,$Size=8){
        $l=strlen($Str);
        $n=ord(substr($Str,-1,1));
        if ($n>$Size) return $Str;
        return substr($Str,0,$l-$n);
    }
}

class JAccountManager
{
    //private java.lang.String uaBaseURL = "http://jaccount.sjtu.edu.cn/jaccount/";
    var $uaBaseURL;
    var $siteID;
    var $hasTicketInURL; //public boolean hasTicketInURL;
    var $userProfile; // Hast Table
    var $elapsedTimestamp; //private static long elapsedTimestamp = 0;
    var $ticketFromServer; //private java.lang.String ticketFromServer;
    var $returnURL; //private java.lang.String returnURL;
    var $siteKey; //private byte[] siteKey = null;

    function JAccountManager($sid, $keyDir) {
        //initialize viarables
        $this->siteID = $sid;
        $this->uaBaseURL="http://jaccount.sjtu.edu.cn/jaccount/";
        //$this->uaBaseURL="http://202.112.26.68:8080/jaccount/";
        //$this->uaBaseURL="http://202.120.2.55/jaccount/";
        $this->hasTicketInURL=false;
        $this->userProfile=NULL;
        if (isset($_SESSION['JAM_elapsedTimestamp'])){
            $this->elapsedTimestamp=$_SESSION['JAM_elapsedTimestamp'];
        }else{
            $this->elapsedTimestamp=0;
            $_SESSION['JAM_elapsedTimestamp']=0;
        }
		
        $this->siteKey=$this->readKey($sid, $keyDir);
    }

    function readKey($sid, $keyDir){
        $sep = '/';
        $filename = $keyDir. $sep . $sid. "_desede.key";
		//echo $filename;
        $handle = fopen($filename, "rb");
		//echo $filename;
        $contents = fread($handle, filesize($filename));
		//echo $contents;
        fclose($handle);
		//echo 'zxc'.$contents;
        return $contents;
    }

    function checkLogin($returnURL){
        if ($this->hasValidTicket()) {
            $this->setSiteCookie();
            $this->hasTicketInURL = true;
            return $this->userProfile;
        } else {
		
            if ($this->isSiteCookieValid()) {
                $this->hasTicketInURL = false;
                return $this->userProfile;
            }else {
				
                $this->hasTicketInURL = false;
                $scheme="https";
                if ($_SERVER["HTTPS"]="off") $scheme="http";
                $rurl = $scheme. '://'. $_SERVER["HTTP_HOST"];
                $rurl = $rurl . $returnURL;
				
                $JAcc_redirectURL= $this->uaBaseURL . "jalogin?sid=" . $this->siteID . "&returl=" . $this->encrypt($rurl). "&se=" .$this->encrypt(session_id());
				//echo $rurl." ".$JAcc_redirectURL;
				//die(); 	// TODELETE
				
				//die ( $JAcc_redirectURL );
				$this->redirectURL($JAcc_redirectURL) ;
                return null;
            }
        }
   }

    function decrypt($src) {
        if ($this->siteKey == NULL) return NULL;
		$JAccCrypt=new JAccountCrypt();
		
        return $JAccCrypt->tripleDESDecrypt($src, $this->siteKey);
    }

    function encrypt($src) {
        //echo $this->siteKey;
		if ($this->siteKey == NULL) return NULL;
        $JAccCrypt=new JAccountCrypt();
        //echo $src; //TODO
		return $JAccCrypt->tripleDESEncrypt($src, $this->siteKey, true);
    }

    //protected boolean hasValidTicket(HttpServletRequest request, HttpSession session)
     function hasValidTicket(){
         $ticket = $_GET["jatkt"];
		 
         if ($ticket == null || strlen($ticket) == 0) return false;
         //dump( $ticket );
         $decry = $this->decrypt($ticket);
         $this->parseUserProfile($decry);
         //echo $decry;
         //dump($this->userProfile);
		 //exit;
         if ($this->userProfile == NULL) {
             return false;
         }else {
             $ses = $this->userProfile["ja3rdpartySessionID"];
             if ($ses == NULL || !$ses==session_id())    return false;
             $timestamp = $this->userProfile["jaThisLoginTime"];
             if ($this->isTimestampValid($timestamp)) {
                $this->ticketFromServer = $ticket;
                $this->returnURL = $this->userProfile["jaReturnUrl"];
                return true;
              }else {
                  return false;
              }
        }
    }

     //protected boolean isSiteCookieValid(HttpServletRequest request)
     function isSiteCookieValid(){
         if (isset($_COOKIE['JASiteCookie'])) {
             $siteCookieValue = $_COOKIE["JASiteCookie"];
             $siteCookieValue = $this->decrypt($siteCookieValue);
             if ($siteCookieValue == NULL) return false;
             $this->parseUserProfile($siteCookieValue);
             if ($this->userProfile == NULL) return false;
             return true;
         }else {
             return false;
         }
     }

     //protected synchronized static boolean isTimestampValid(Long timestamp)
     function isTimestampValid($timestamp){
         $ts = $timestamp/1000;
         $valid = false;
         if ($ts > $this->elapsedTimestamp) {
             $valid = true;
             $this->elapsedTimestamp = $ts;
             $_SESSION['JAM_elapsedTimestamp']=$ts;
             //echo $_session['JAM_elapsedTimestamp'] .'<>' . $ts ;
             //exit;
         }
         return $valid;
     }

     //public boolean logout(HttpServletRequest request, HttpServletResponse response, String returnURL)
     function logout($returnURL){
         $lo = $_GET["logout"];
         if ($lo != NULL && $lo=="1") {
             return true;
         }
         setcookie("JASiteCookie","",0,"/");
         $scheme="https";
         if ($_SERVER["HTTPS"]="off") $scheme="http";
         $rurl = $scheme. '://'. $_SERVER["HTTP_HOST"];
         $rurl = $rurl . $returnURL;
		 //echo $rurl;
         $JAcc_redirectURL=$this->uaBaseURL . "ulogout?sid=" . $this->siteID . "&returl=" .$this->encrypt($rurl);
         $this->redirectURL($JAcc_redirectURL) ;
         return false;
     }

     //protected Hashtable parseUserProfile($ticket)
     function parseUserProfile($ticket){
         $t=chr(10);
         $userProf1=explode($t,$ticket);
         $sep=1;
         foreach($userProf1 as $value) {
             $pos=strpos($value,"=");
             if (!$pos === false){
                 $name=substr($value,0,$pos);
                 $name_value= substr($value,$pos+1);
                 if (($pos==0) Or ($sep==1 && !($name=="jaThisLoginTime"))Or($sep==2 && !($name=="jaLastLoginTime"))) {
                     unset($this->userProfile);
                     $this->userProfile=NULL;
                     break;
                 }else{
                     $this->userProfile[$name]=$name_value;
                 }
             }
             $sep++;
         }
     }

     //public void redirectWithoutTicket(HttpServletResponse response)
     function redirectWithoutTicket(){
         $this->redirectURL($this->returnURL);
         //header("Location: ".$this->returnURL);
         /* Make sure that code below does not get executed when we redirect. */
         exit;
     }

     //protected void setSiteCookie(HttpServletResponse response)
     function setSiteCookie(){
         setcookie("JASiteCookie", $this->ticketFromServer,0,"/");
     }

    function redirectURL($redirectURL){
    	//echo $redirectURL;
    	//exit;
        echo '<html><head>';
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="1; URL='. $redirectURL. '">' ;
        echo "</head><body></body></html>";
        exit;
    }
}

function hex2bin($HexStr) {
    return pack('H*', $HexStr);
}

function jlogin()
{
//session_start();

//$_SESSION['JAM_elapsedTimestamp']=123;
$jam=new JAccountManager('jatgjxcy090508',JACCOUNT_KEY_ROOT);
//$strReturnURL=$_SERVER['PHP_SELF'] ;
$strReturnURL=U('User/login');//'/login.php';		// TODODO



$ht = $jam->checkLogin($strReturnURL);

//die ( 123 );

if (($ht !=NULL) && ($jam->hasTicketInURL)) {
    $jam->redirectWithoutTicket();
}


//$ht['dept'] = mb_convert_encoding($ht['dept'], "UTF-8", "GBK");
//$ht['chinesename'] = mb_convert_encoding($ht['chinesename'], "UTF-8", "GBK");
return $ht;
}

function jlogout()
{
session_start();
//$_SESSION['JAM_elapsedTimestamp']=123;
$jam=new JAccountManager('jatgjxcy090508',JACCOUNT_KEY_ROOT);
//$strReturnURL=$_SERVER['PHP_SELF'] ;
$strReturnURL=U( 'Index/index' );
if (!$jam->logout($strReturnURL)) {
    echo 'logout failed<br />';   
}

}

function  get_switch_state($room)
{
	
$output=catcha('http://campus.sjtu.edu.cn/bx/login.asp',0);
preg_match("!Set-Cookie: (.*); path=/!", $output, $matches);
$str=$matches[1];
$pos=strpos($str,'=');
$cookie = array
(
	'JASiteCookie' => 'CCkL%2F%2BpiL%2Fl0Ra1ndwq9ioY0aJvXAZQADyC%2FShb8Al4kDFPV%2BvrJ2FcN3DZbacrxEHOfKpIycij%2B%2BduqFQ84wVNkKtyjPHiBO5FRbbLq%2B%2FXnlH6fCQkhV9H1nrCVY2i93PCmbwESjm%2BaemILhYkLFUTuyO%2F72Iu7xnQ8TVxdn4ZOXRGc%2BCainQNYzYAT5fkK8HciMFjFCWM%2FTqel2dj3O8WsEwG7CNTRrMzlSjb7sLBk2ivPbfhDsX0Nz0cJss8wb2NAYDB%2Fxr5wf3Q0TT3bOC9etB0mWEcgIlCVPVCsDsxg09i3qs3269TMM9ZJyf9e78xCdm4dVoz6%2BbhRBTuzlAvSbn7kbWpx7MxrVTEf4%2FreT0O86Sk06%2FBbMBP%2FROOoAg%3D%3D',
	
);	

//echo substr($str,0,$pos).'.'.substr($str,$pos+1);
$cookie[substr($str,0,$pos)]=substr($str,$pos+1);
//print_r($cookie);
$data = array  
(  

);  
$result= postRequest('http://campus.sjtu.edu.cn/bx/chklogin.asp', $data, $cookie);  
$result= postRequest('http://campus.sjtu.edu.cn/bx/adm/switch/switch.asp?room='.$room, $data, $cookie);
//echo  $result;

preg_match("!<a href=\"(switchaction.asp\?action=viewport&amp;target=\w*&amp;port=\d*&amp;switchtype=\w*&amp;area=mh)\" target=\"_blank\">\W*<font color=blue>!", $result, $switchurl);
preg_match("!<a href=\"switchaction.asp\?action=viewport&amp;target=\w*&amp;port=(\d*)&amp;switchtype=\w*&amp;area=mh\" target=\"_blank\">\W*<font color=blue>!", $result, $switchport);
//echo '<br>port:'.$switchport[1];
preg_match("!<td colspan=8 bgcolor=#000000>\W*<font color=white>(.*)</font>!", $result, $switchtype);
//echo '<br>type:'.$switchtype[1];
preg_match("!交换机编号:<a href=\"switch.asp\?switch=(.*)\">!", $result, $switchID);
//echo '<br>ID:'.$switchID[1];


$PortStateList = array(
	array("未知"),
    array("未知", "10M", "端口打开、无连接", "未知"),
    array("未知", "端口关闭、有连接", "端口关闭、无连接", "未知"),
	array("未知", "未知", "未知", "未知"),
	array("100M","暂停"),
	array("1G","暂停")
	);
preg_match("!switchaction.asp\?(.*area=mh)'\);\"!", $result, $switchstateurl);
$url="http://campus.sjtu.edu.cn/bx/adm/switch/switchaction.asp?".$switchstateurl[1];
$url=str_replace("&amp;","&",$url);
$result= postRequest($url, $data, $cookie);
//echo  $result;
preg_match("! <P".$switchport[1].">\W*<ifSpeed>(\d*)</ifSpeed>\W*<ifAdmin>(\d)</ifAdmin>\W*<ifOper>(\d)</ifOper>!", $result, $switchstate);
//print_r($switchstate);
if($switchstate[2]==1&&$switchstate[3]==1&&$switchstate[1]>=100000000){
	if($switchstate[1]>=1000000000){
		$switchcondition = $PortStateList[5][0];
		}
		else{
			$switchcondition = $PortStateList[4][0];
		}
	}else{
		$switchcondition = $PortStateList[$switchstate[2]][$switchstate[3]];
	}	
//echo '<br>condition:'.$switchcondition;
return array(
			'type'	=>	$switchtype[1],
			'ID'	=>	$switchID[1],
			'port'	=>	$switchport[1],
			'state'	=>	$switchcondition,
			'url'	=>	'http://campus.sjtu.edu.cn/bx/adm/switch/'.$switchurl[1],
			);
} 
function SlashforCurrentOS($str)
{
	if (PATH_SEPARATOR == ';'){
		return str_replace('/', '\\', $str);
	}	
	else
	{
		return str_replace('\\', '/', $str);
	}
}

// 格式化时间
function format_time( $time, $mode = 0 ) {
	date_default_timezone_set ( "ASIA/SHANGHAI" ); 
	if ($mode)
	{
		$today = date("Y-m-d", time() );
		$date = date("Y-m-d", $time);
		if ($date != $today) return $date; 
			else return date("H:i:s", $time);
	}
	else
	{
		return date("Y-m-d H:i:s", $time);
	}
}

// 格式化字符串
function format_text( $str ) {
	import("ORG.Util.Input");
	return Input::forShow($str);
}

function get_time_stamp(){
	return time();
}
