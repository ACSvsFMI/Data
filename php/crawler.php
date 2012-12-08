<?php 

define('ANTIHACK', TRUE);
require_once('../config/_autoload.php');
include_once('../libs/SQL_DB.php');


$api_key="AIzaSyCRfALTO27KAX-v5LrCm2bMzppRuimHBGA";

function fetch($url) {
  $ch = curl_init();
  $timeout = 20;
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}
function init(){
	$r=SQL_DB::sql_select(MYSQL_PRE."users",NULL,NULL,0,0,array('gid'));
	foreach($r as $k=>$v){
		crawl($v['gid']);
	}

}
function crawl($gid){
	global $api_key;
	$sursa=fetch("https://www.googleapis.com/plus/v1/people/".$gid."/activities/public?maxResults=100&key=".$api_key);
	$json=json_decode($sursa);
	
	for($i=0;$i<count($json->{'items'});$i++){
	/*Content stire - plusoners - comentarii - shareuri - url_comm  - data postarii - titlu - Tip postare(share/post) - Etag Postare */
		if(empty($json->{'items'}[0]->{'etag'})){
			return "0002";
		}
		if($r=SQL_DB::sql_count(MYSQL_PRE."posts","user_id='".$gid."' AND etag='".$json->{'items'}[0]->{'etag'}."'",'*','1')){
			if($r)
				return "Already Updated";

		}
		SQL_DB::sql_insert(MYSQL_PRE."posts", array('user_id'=>$gid,
			'etag'=>$json->{'items'}[$i]->{'etag'},
			'title'=>$json->{'items'}[$i]->{'title'},
			'content'=>$json->{'items'}[$i]->{'object'}->{'content'},
			'url_comm'=>$json->{'items'}[$i]->{'object'}->{'url'},
			'share'=>$json->{'items'}[$i]->{'object'}->{'resharers'}->{'totalItems'},
			'comms'=>$json->{'items'}[$i]->{'object'}->{'replies'}->{'totalItems'},
			'plus'=>$json->{'items'}[$i]->{'object'}->{'plusoners'}->{'totalItems'},
			'type'=>$json->{'items'}[$i]->{'verb'},
			'datainsert'=>date("H:i d/m/Y",strtotime($json->{'items'}[$i]->{'published'}))
		));

	}

	
	unset($sursa,$json);
}

init();
?>
