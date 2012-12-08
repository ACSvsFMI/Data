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
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}
function init(){
	$r=SQL_DB::sql_select(MYSQL_PRE."users",NULL,NULL,0,0,array('id','gid'));
	foreach($r as $k=>$v){
		crawl($v['id'], $v['gid']);
	}

}


function crawl($id, $gid){
	global $api_key;

	$sursa=fetch("https://www.googleapis.com/plus/v1/people/".$gid."/activities/public?maxResults=100&key=".$api_key);
	$json=json_decode($sursa);
	
	for($i=0;$i<count($json->{'items'});$i++){
		$eTag = trim($json->{'items'}[$i]->{'etag'}, '"');
		$published = new DateTime($json->{'items'}[$i]->{'published'});
		/*Content stire - plusoners - comentarii - shareuri - url_comm  - data postarii - titlu - Tip postare(share/post) - Etag Postare */
		if(empty($eTag))
			return "0002";
		
		if($r=SQL_DB::sql_count(MYSQL_PRE."posts","user_id='".$id."' AND etag='$eTag'",'*','1')){
			if($r)
				return "Already Updated ".$json->{'items'}[$i]->{'etag'}."<br />";

		}
		$gplus_sql=array('user_id'=>$id,
			'etag'=>$eTag,
			'title'=>$json->{'items'}[$i]->{'title'},
			'content'=>$json->{'items'}[$i]->{'object'}->{'content'},
			'url_comm'=>$json->{'items'}[$i]->{'object'}->{'url'},
			'share'=>(int)$json->{'items'}[$i]->{'object'}->{'resharers'}->{'totalItems'},
			'comms'=>(int)$json->{'items'}[$i]->{'object'}->{'replies'}->{'totalItems'},
			'plus'=>(int)$json->{'items'}[$i]->{'object'}->{'plusoners'}->{'totalItems'},
			'type'=>$json->{'items'}[$i]->{'verb'},
			'datainsert'=>$published->format('Y-m-d H:i:s')
		);
		//date("H:i d/m/Y",strtotime($json->{'items'}[$i]->{'published'}))
		SQL_DB::sql_insert(MYSQL_PRE."posts", $gplus_sql);

	}

	
	unset($sursa,$json,$gplus_sql);
}

$p=$_GET['p'];
if($p=='update')
	init();
?>
