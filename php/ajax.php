<?php
$page=$_GET['page'];
$v_page=array('update','search','delete','edit','adaugare','cron');

if(!in_array($page,$v_page)){
	die("error page");
}
include("../libs/SQL_DB.php");


//Update datele utilizatorului
if($page=='update'){
 $id=$_GET['id'];
 $gid=$_GET['gid'];
 if(!is_numeric($id) || !is_numeric($gid)) die("gid nu e numeric");
$f=$_GET['f'];
$n=$_GET['n'];
$av=$_GET['av'];

 SQL_DB::sql_update(MYSQL_PRE."users",array('avatar'=>$av,'firstname'=>$f,'lastname'=>$n),"id=".$id,1);
 echo "ok";
//echo "<img src='design/images/loading.gif' alt='Loading'/>";


//Dupa nume pt utilizator, un search pentru articole (titlu + scor)

//Delete cont
}else if($page=='delete'){
$id=$_GET['id'];
	SQL_DB::sql_delete(MYSQL_PRE."users",array('id'=>$id));
	SQL_DB::sql_delete(MYSQL_PRE."posts",array('user_id'=>$id));
	echo "ok"



//Adaugare utilizator in baza de date
}else if($page=='adaugare'){
$gid=$_GET['gid'];
if(!is_numeric($gid)) die('eroare gid');

$g=$_GET['g'];
$f=$_GET['f'];
$n=$_GET['n'];
$av=$_GET['av'];
$pri=$_GET['pri']

SQL_DB::sql_insert(MYSQL_PRE."users",array('firstname'=>$n,'fullname'=>$f.' '.$n,'lastname'=>$n,'gender'=>$g,
'gurl'=>'https://plus.google.com/u/0/'.$gid.'/posts','priority'=>$pri,'datainsert'=>'NOW()'));



//Cron
}else if($page=='cron'){
	include("crawler.php");
	init();
}
?>
