<?php
$gid = (isset($_POST['gid'])) ? $_POST['gid'] : 0;
$error = NULL;

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


if(isset($_POST['add']))
{

	if($gid)
			{
			$c = SQL_DB::sql_count(MYSQL_PRE.'users', "gid = '$gid'");
			if(!$c)
			{
				// incepe inregistrarea
				$api_key="AIzaSyCRfALTO27KAX-v5LrCm2bMzppRuimHBGA";
				
				$user_id = SQL_DB::sql_insert(MYSQL_PRE."users", array('id'=>NULL,'gid'=>$gid,'datainsert'=>"NOW()"));
				// actualizare date client
				 $id=$user_id;
 $gid=$gid;
/*fetch*/
$sur=fetch("https://www.googleapis.com/plus/v1/people/"+$gid+"?key=".$api_key);

$jsursa=json_decode($sur);
//'&f='+data.name.familyName+'&n='+data.name.givenName+'&av='+data.image.url

$f=$jsursa->{'name'}->{'familyName'};
$n=$jsursa->{'name'}->{'givenName'};
$av=$jsursa->{'image'}->{'url'};
 SQL_DB::sql_update(MYSQL_PRE."users",array('avatar'=>$av,'firstname'=>$f,'lastname'=>$n),"id=".$id,1);
 echo "ok";
 
			}
			else
				$error = "ID-ul exista.";
		}
		else
			$error = "Completati campul.";
}
?>
    <div id="Content" class="clear">
    	<div id="Page" class="site_width center">
    		<?php include('php/navigator.php');?>
            <div class="title left"><h1>Client nou</h1></div>
            <form method="post" action="" class="add_form">
               <?php
			   if(isset($_POST['add']) && $error == NULL)
			   {
				   echo "Clientul a fost adaugat.";
			   }
			   else
			   {
					echo '<div class="errors">';
						echo $error;
					echo '</div>';
				?>
            	<fieldset>
                	<label>Client Google ID</label>
                    <input type="text" name="gid" value="<?php echo $gid;?>" />
                </fieldset>
                <button name="add">Adauga</button>
                <?php
			   }
			   ?>
            </form>
            <div class="cfix"></div>
        </div>
    </div>