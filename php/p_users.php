<?php
$search = (isset($_GET['search'])) ? (string)$_GET['search'] : NULL;
$category = (defined('arg1') && arg1 > 0) ? arg1 : 0;
$status	  = (defined('arg2') && arg2 > 0) ? arg2 : 0;
$limit	  = (defined('arg3')) ? arg3 : 0;
$perPage  = 8;

$t_results = SQL_DB::sql_select(MYSQL_PRE.'users', NULL, "ORDER BY `datainsert` DESC");

$results = array();
for($n=($limit+1); $n<=$limit+$perPage; $n++)
{
	if(isset($t_results[$n]))
	{
		if($search)
		{
			// conditionarea pentru cautare
			
		}
		else
			$results[] = $t_results[$n];
	}
	else
		break;
}

$max = count($results);
?>
    <div id="Content" class="clear">
    	<div id="Page" class="site_width center">
    		<?php include('php/navigator.php');?>
            <div class="title left"><h1>Lista utilizatori</h1></div>
            <form class="search right" method="get">
            	<fieldset>
                	<button class="right">Search</button>
                	<input class="right field" type="search" name="search" value="" />
                </fieldset>
            </form>
            <div class="cfix"></div>
            <div class="filter left"><select><option>Toate</option><option>Doar cele validate</option></select></div>
            <div class="pagination right clear">
				<?php echo pagination(array('admin', 'index', $category, $status), array(), $limit, $perPage, $max); ?>
            </div>
            <div class="cfix"></div>
            <div class="wp-table">
            	<div class="th">
                	<span class="td" style="width:20px;"></span>
                    <span class="td" style="width:390px;">Client</span>
                    <span class="td" style="width:50px;">Postari</span>
                    <span class="td" style="width:50px;">Share</span>
                    <span class="td" style="width:50px;">Comments</span>
                    <span class="td" style="width:100px;">Actualizat</span>
                </div>
                <?php
				foreach($results as $row)
				{
					$datainsert = new DateTime($row['datainsert']);
					//$category = $catModel->get($row['category']);
					echo '<section class="tr">';
						echo '<div class="td" style="width:20px; line-height:64px;">#'.$row['id'].'</div>';
                    	echo '<div class="td" style="width:390px;">';
							echo '<div class="image"><img id="Cimage_'.$row['id'].'" src="https://lh4.googleusercontent.com/-TbJPTyRfwTk/AAAAAAAAAAI/AAAAAAAAAIE/OKXlm7KRQ4k/photo.jpg?sz=50" width="53" height="53" alt="" /></div>';
							echo '<div class="info"><h1><a id="Cfname_'.$row['id'].'"  href="'.$row["url_comm"].'" target="_blank">'.$row["fullname"].'</a></h1><span id="Cfunc_'.$row['id'].'" >Senior web la Hosting</span><div class="options"><a href="">Editeaza</a> <a href="">Sterge</a></div></div>';
						echo '</div>';
						echo '<div class="td" style="width:50px; line-height:64px;">999,999</div>';
                    	echo '<div class="td" style="width:50px; line-height:64px;">999,999</div>';
						echo '<div class="td" style="width:50px; line-height:64px;">999,999</div>';
						echo '<div class="td" style="width:100px;">'.$datainsert->format("H:i").' <strong>'.$datainsert->format("d M Y").'</strong><br /><span style="color:#666">'.Datatime::ago($datainsert->format("Y-m-d")).'</span><div class="options2"><a onclick="return gplus.client_update('.$row["id"].', '.$row["gid"].');" href="#">Actualizeaza</a></div></div>';
					echo '</section>';
				}
				?>
            </div>
        </div>
    </div>