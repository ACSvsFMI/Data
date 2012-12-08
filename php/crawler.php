<?php 
//Crawler g+
//function sql_insert($table, $keys = array(), $values = array())

/*
define('ANTIHACK', TRUE);
require_once('../config/_autoload.php');
include_once('../libs/SQL_DB.php');
*/

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

function crawl($gid){
	global $api_key;
	$sursa=fetch("https://www.googleapis.com/plus/v1/people/".$gid."/activities/public?maxResults=100&key=".$api_key);
	$json=json_decode($sursa);
	//Verificare Etag - daca luam sau nu datele
		echo "Etag:".$json->{'etag'};
	//echo "<pre>".var_dump($json->{'items'})."</pre>";
	
	for($i=0;$i<count($json->{'items'});$i++){
	/*Content stire - plusoners - comentarii - shareuri - url_comm  - data postarii - titlu - Tip postare(share/post) - Etag Postare */
		if(empty($json->{'items'}[0]->{'etag'})){
			return "0002";
		}
		echo $json->{'items'}[$i]->{'object'}->{'content'}."<br/>"
		.$json->{'items'}[$i]->{'object'}->{'plusoners'}->{'totalItems'}."<br/>"
		.$json->{'items'}[$i]->{'object'}->{'replies'}->{'totalItems'}."<br/>"
		.$json->{'items'}[$i]->{'object'}->{'resharers'}->{'totalItems'}."<br/>"
		.$json->{'items'}[$i]->{'object'}->{'url'}."<br/>"
		.date("H:i d/m/Y",strtotime($json->{'items'}[$i]->{'published'}))."<br/>"
		.$json->{'items'}[$i]->{'title'}."<br/>"
		.$json->{'items'}[$i]->{'verb'}."<br/>"
		.$json->{'items'}[$i]->{'etag'}."<br/>";

	}
	//SQL_DB::sql_insert(MYSQL_PRE."", array());
	
	unset($sursa,$json);
}

//111290814146404400956
//107478352790883449995 -m
crawl("111290814146404400956");
?>
