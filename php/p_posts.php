<?php
$search = (isset($_GET['search'])) ? (string)$_GET['search'] : NULL;
$category = (defined('arg1') && arg1 > 0) ? arg1 : 0;
$status	  = (defined('arg2') && arg2 > 0) ? arg2 : 0;
$limit	  = (defined('arg3')) ? arg3 : 0;
$perPage  = 100;

$where = NULL;
if($search)
	$where = "`title` LIKE '%$search%'";

$t_results = SQL_DB::sql_select(MYSQL_PRE.'posts', $where, "ORDER BY `datainsert` DESC");

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

$max = count($results);
?>
    <div id="Content" class="clear">
    	<div id="Page" class="site_width center">
    		<?php include('php/navigator.php');?>
            <div class="title left"><h1>Lista postari</h1></div>
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
				<a href="#" onclick="client_crawl();" style="float:right; margin:20px 30px 0 0; color:#900;">Actualizeaza toate stirile</a>
            </div>
            <div class="cfix"></div>
            <div class="wp-table">
            	<div class="th">
                	<span class="td" style="width:20px;"></span>
                    <span class="td" style="width:300px;">Postare</span>
                    <span class="td" style="width:100px;">Autor</span>
                    <span class="td" style="width:40px;">Postari</span>
                    <span class="td" style="width:40px;">Share</span>
                    <span class="td" style="width:40px;">Comms</span>
                    <span class="td" style="width:50px;">Data</span>
                </div>
                <?php
				foreach($results as $row)
				{
					if(empty($row["title"]))continue;// temp fix
					$datainsert = new DateTime($row['datainsert']);
					//$category = $catModel->get($row['category']);
					echo '<section class="tr">';
						echo '<div class="td" style="width:20px; line-height:64px;">#'.$row['id'].'</div>';
                    	echo '<div class="td" style="width:300px;">';
							echo '<div class="info"><h1><a href="'.$row["url_comm"].'" target="_blank">'.substr(strip_tags($row["title"]), 0, 40).''.((strlen($row["title"]) > 40) ? '...' : '').'</a></h1><span>'.substr(strip_tags($row["content"]), 0, 90).''.((strlen($row["content"]) > 90) ? '...' : '').'</span></div>';
						echo '</div>';
						echo '<div class="td tcenter" style="width:100px; line-height:64px;">'.$row["share"].'</div>';
						echo '<div class="td tcenter" style="width:40px; line-height:64px;">'.$row["share"].'</div>';
                    	echo '<div class="td tcenter" style="width:40px; line-height:64px;">'.$row["comms"].'</div>';
						echo '<div class="td tcenter" style="width:40px; line-height:64px;">'.$row["plus"].'</div>';
						echo '<div class="td" style="width:80px;">'.$datainsert->format("H:i").'<br /><strong>'.$datainsert->format("d.m.Y").'</strong><br /><span style="color:#666">'.Datatime::ago($datainsert->format("Y-m-d")).'</span></div>';
					echo '</section>';
				}
				?>
            </div>
        </div>
    </div>