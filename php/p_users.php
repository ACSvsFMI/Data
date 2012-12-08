<?php
$search = (isset($_GET['search'])) ? (string)$_GET['search'] : NULL;
$where = NULL;
if($search)
	$where = "`fullname` LIKE '%$search%'";
if(isset($_GET['del_id']))
{
	SQL_DB::sql_delete(MYSQL_PRE.'users', "id = ".$_GET['del_id']."", 1);
}
$limit	= (isset($_GET['limit'])) ? (string)$_GET['limit'] : 0;
$or_name	= (isset($_GET['limit'])) ? (string)$_GET['limit'] : 0;
$perPage  = 100;



$t_results = SQL_DB::sql_select(MYSQL_PRE.'users', $where, "ORDER BY `datainsert` DESC");
$max = count($t_results);
$results = array();
for($n=($limit+1); $n<=$limit+$perPage; $n++)
{
	if(isset($t_results[$n]))
	{
		if($search)
		{
			// conditionarea pentru cautare
			$results[] = $t_results[$n];
		}
		else
			$results[] = $t_results[$n];
	}
	else
		break;
}
?>
    <div id="Content" class="clear">
    	<div id="Page" class="site_width center">
    		<?php include('php/navigator.php');?>
            <div class="title left"><h1>Lista utilizatori</h1></div>
            <form class="search right" method="get" action="index.php">
            	<input type="hidden" name="page" value="<?php echo page;?>"  />
            	<fieldset>
                	<button class="right">Search</button>
                	<input class="right field" type="search" name="search" value="<?php echo $search;?>" />
                </fieldset>
            </form>
            <div class="cfix"></div>
            <div class="filter left"><select><option>Toate</option><option>Doar cele validate</option></select></div>
            <div class="pagination right clear">
				<a href="index.php?page=add" style="float:right; margin:20px 30px 0 0; color:#900;">Adauga client</a>
            </div>
            <div class="cfix"></div>
            <div class="wp-table">
            	<div class="th">
                	<span class="td" style="width:20px;"></span>
                    <span class="td" style="width:380px;">Client</span>
                    <span class="td" style="width:50px;">Postari</span>
                    <span class="td" style="width:50px;">Share</span>
                    <span class="td" style="width:50px;">Comments</span>
                    <span class="td" style="width:110px;">Actualizat</span>
                </div>
                <?php
				foreach($results as $row)
				{
					$datainsert = new DateTime($row['datainsert']);
					//$category = $catModel->get($row['category']);
					$posts = SQL_DB::sql_count(MYSQL_PRE."posts", "`user_id` = '".$row['id']."' AND `type` = 'post'");
					$share = SQL_DB::sql_count(MYSQL_PRE."posts", "`user_id` = '".$row['id']."' AND `type` = 'share'");
					echo '<section class="tr">';
						echo '<div class="td" style="width:20px; line-height:64px;">#'.$row['id'].'</div>';
                    	echo '<div class="td" style="width:380px;">';
							echo '<div class="image"><img id="Cimage_'.$row['id'].'" src="https://lh4.googleusercontent.com/-TbJPTyRfwTk/AAAAAAAAAAI/AAAAAAAAAIE/OKXlm7KRQ4k/photo.jpg?sz=50" width="53" height="53" alt="" /></div>';
							echo '<div class="info"><h1><a id="Cfname_'.$row['id'].'"  href="'.$row["url_comm"].'" target="_blank">'.$row["fullname"].'</a></h1><span id="Cfunc_'.$row['id'].'" >Senior web la Hosting</span></div>';
						echo '</div>';
						echo '<div class="td tcenter" style="width:50px; line-height:64px;">'.$posts.'</div>';
                    	echo '<div class="td tcenter" style="width:50px; line-height:64px;">'.$share.'</div>';
						echo '<div class="td" style="width:50px; line-height:64px;">999,999</div>';
						echo '<div class="td" style="width:110px;">'.$datainsert->format("H:i").' <strong>'.$datainsert->format("d M Y").'</strong><br /><span style="color:#666">'.Datatime::ago($datainsert->format("Y-m-d")).'</span><div class="options2"><a onclick="client_update('.$row["id"].', '.$row["gid"].'); return false;" href="#">Actualizeaza</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?page=users&del_id='.$row['id'].'">Sterge</a></div></div>';
					echo '</section>';
				}
				?>
            </div>
        </div>
    </div>