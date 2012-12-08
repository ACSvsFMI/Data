<?php
$gid = (isset($_POST['gid'])) ? (int)$_POST['gid'] : 0;
$error = NULL;


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